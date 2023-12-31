<?php

namespace AivstarBlog;

use AivstarBlog\Models\BinshopsPostTranslation;
use Illuminate\Support\ServiceProvider;
use AivstarBlog\Models\BinshopsPost;
use AivstarBlog\Laravel\Fulltext\Commands\Index;
use AivstarBlog\Laravel\Fulltext\Commands\IndexOne;
use AivstarBlog\Laravel\Fulltext\Commands\UnindexOne;
use AivstarBlog\Laravel\Fulltext\ModelObserver;
use AivstarBlog\Laravel\Fulltext\Search;
use AivstarBlog\Laravel\Fulltext\SearchInterface;

class BinshopsBlogServiceProvider extends ServiceProvider
{

    protected $commands = [
        Index::class,
        IndexOne::class,
        UnindexOne::class,
    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if (config("binshopsblog.search.search_enabled") == false) {
            // if search is disabled, don't allow it to sync.
            ModelObserver::disableSyncingFor(BinshopsPostTranslation::class);
        }

        if (config("binshopsblog.include_default_routes", true)) {
            include(__DIR__ . "/routes.php");
        }

        foreach ([
                     '2020_10_16_005400_create_binshops_categories_table.php',
                     '2020_10_16_005425_create_binshops_category_translations_table.php',
                     '2020_10_16_010039_create_binshops_posts_table.php',
                     '2020_10_16_010049_create_binshops_post_translations_table.php',
                     '2020_10_16_121230_create_binshops_comments_table.php',
                     '2020_10_16_121728_create_binshops_uploaded_photos_table.php',
                     '2020_10_16_004241_create_binshops_languages_table.php',
                     '2020_10_22_132005_create_binshops_configurations_table.php',
                     '2016_11_04_152913_create_laravel_fulltext_table.php'
                 ] as $file) {

            $this->publishes([
                __DIR__ . '/../migrations/' . $file => database_path('migrations/' . $file)
            ]);

        }

        $this->publishes([
            __DIR__ . '/Views/binshopsblog' => base_path('resources/views/vendor/binshopsblog'),
            __DIR__ . '/Config/binshopsblog.php' => config_path('binshopsblog.php'),
            __DIR__ . '/css/binshopsblog_admin_css.css' => public_path('binshopsblog_admin_css.css'),
            __DIR__ . '/css/binshops-blog.css' => public_path('binshops-blog.css'),
            __DIR__ . '/css/admin-setup.css' => public_path('admin-setup.css'),
            __DIR__ . '/js/binshops-blog.js' => public_path('binshops-blog.js'),
            //by aivstar
            __DIR__ . '/Views/layouts' => base_path('resources/views/layouts'),


        ]);


    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            SearchInterface::class,
            Search::class
        );

        // for the admin backend views ( view("binshopsblog_admin::BLADEFILE") )
        $this->loadViewsFrom(__DIR__ . "/Views/binshopsblog_admin", 'binshopsblog_admin');

        // for public facing views (view("binshopsblog::BLADEFILE")):
        // if you do the vendor:publish, these will be copied to /resources/views/vendor/binshopsblog anyway
        $this->loadViewsFrom(__DIR__ . "/Views/binshopsblog", 'binshopsblog');
    }

}
