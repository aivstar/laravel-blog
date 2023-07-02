<?php


namespace AivstarBlog\Middleware;
use Closure;
use AivstarBlog\Models\BinshopsConfiguration;
use AivstarBlog\Models\BinshopsLanguage;

class LoadLanguage
{

    public function handle($request, Closure $next)
    {
        $default_locale = BinshopsConfiguration::get('DEFAULT_LANGUAGE_LOCALE');
        $lang = BinshopsLanguage::where('locale', $default_locale)
            ->first();

        $request->attributes->add([
            'locale' => $lang->locale,
            'language_id' => $lang->id
        ]);

        return $next($request);
    }
}
