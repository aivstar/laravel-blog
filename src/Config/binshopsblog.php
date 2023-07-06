<?php

//Aivstar/laravel-blogger的配置

return [
    'default_language' => 'en',

    //你的自定义用户模块
    //旧版laravel，请把它改成\App\User::class
    'user_'=>\App\Models\User::class,

    // reading progress bar 是当你向下滚动页面时，显示在你的文章顶部的条形图。 可以禁用这个功能。
    'reading_progress_bar' => true,

    'include_default_routes' => true, // 设置为false，routes.php里不包括BinshopsReaderController和管理员相关的路由。默认：true。如果禁用它，需要手动复制routes.php中的数据并将其添加到web.php中。

    'blog_prefix' => "blog", // 仅在routes.php中使用。. 如果你想把你的首页地址改成类似 http://yoursite.com/latest-news (或其他后缀), 在此修改. 默认是: blog
    'admin_prefix' => "blog_admin", // 与上面类似，此为后台管理面板地址。默认是: blog_admin

    'use_custom_view_files' => false, // 是否使用resources/views/custom_blog_posts/*.blade.php的视图。设置为 "true" 启用。默认值是：false

    'per_page' => 10, // 在索引页上每页显示的帖子数量。默认值是：10


    'image_upload_enabled' => true, // 是否允许上传图片.
    'blog_upload_dir' => "blog_images", // 图片上传目录，应该在public_path()中（即/public/blog_images），并且应该是可写的。


    'memory_limit' => '2048M', // 图片上传大小限制 :
    //                              @ini_set('memory_limit', config("binshopsblog.memory_limit"));
    //                            详见PHP.net。
    //                            设置为false则不设置任何值。


    //设置为true将无转义直接输出文章 (with {!! !!}) !发布者可以放入任何HTML或JS代码。 如果你不信任发布者，这是危险的！ 
    // (如果你不信任发布者，应该禁用这个功能。设置为false).
    // 这适用于所有帖子 (包括已发布的和以后发布的).
    'echo_html' => true, // 默认值是： true

    // 如果 strip_html 为 true, 它将在转义和输出之前运行 strip_tags()。
    // 这不会增加安全，但如果你禁用了echo_html，此设置可以避免出现任何HTML标签。
    // 只有在echo_html为false时才生效。
    'strip_html' => false, // 默认值是：false.

    //  只有在echo_html为false时才生效。如果auto_nl2br为true，输出将在转义后通过nl2br运行。
    'auto_nl2br' => true, // 默认值是： true.

    // 使用ckeditor WYWIWYG（富文本编辑器）来编辑你的HTML文章
    // 这将加载来自https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js的脚本
    // echo_html必须设置为 "true "才会生效。
    'use_wysiwyg' => true, // 默认值是： true


    'image_quality' => 80, // 保存图像时使用什么样的图像质量。higher = better + bigger 的尺寸。80左右是正常的。


    'image_sizes' => [

        // 如果你把 'enabled' 设置为 false, 它将在下次更新任何行时清除该字段的所有数据。但是，它不会删除你的文件服务器上的.jpg文件。
        // 建议只在上传图片之前改变此设置!

        // 另外，如果你改变 w/h (以像素为单位), 它不会改变先前上传的图片.

        // 只有三种尺寸 - image_large, image_medium, image_thumbnail.


        'image_large' => [ // 这个键必须以'image_'开头。 必须是已命名的数据列
            'w' => 1000, // 宽度，以像素为单位
            'h' => 700, //高度
            'basic_key' => "large", // 与主键相同，但没有'image_'。
            'name' => "Large", // 在管理面板上显示的名称
            'enabled' => true, // 见上面注释
            'crop' => true, // 如果为 true 那么将裁剪和调整大小，使之正好为w/h。 如果为 false 那么将保持比例缩放，最大宽度为'w'，最大高度为'h'。
        ],
        'image_medium' => [ // 这个键必须以'image_'开头。 必须是已命名的数据列
            'w' => 600, // 宽度，以像素为单位
            'h' => 400, //高度
            'basic_key' => "medium",// 与主键相同，但没有'image_'。
            'name' => "Medium",// 在管理面板上显示的名称
            'enabled' => true, // 见上面注释
            'crop' => true, // 如果为 true 那么将裁剪和调整大小，使之正好为w/h。 如果为 false 那么将保持比例缩放，最大宽度为'w'，最大高度为'h'。 如果使用这些图片作为网站模板的一部分，那么你应该把这设置为 true 。
        ],
        'image_thumbnail' => [ // 这个键必须以'image_'开头。 必须是已命名的数据列
            'w' => 150, // 宽度，以像素为单位
            'h' => 150, //高度
            'basic_key' => "thumbnail",// 与主键相同，但没有'image_'。
            'name' => "Thumbnail",// 在管理面板上显示的名称
            'enabled' => true, // 见上面注释
        ],

        // 你可以添加更多的字段，但要确保数据库里创建了相关的数据列！
        // 它们的格式必须与默认格式相同--image_xxxxx（而且这个数据列必须存在于binshops_posts表中）。
        /*
        'image_custom_example_size' => [ // << 用这个名字创建数据列。.
                                         //   你可以给它起任何名字，但它必须以image_开头。
            'w' => 123,                  // << 自定义宽度/高度
            'h' => 456,
            'basic_key' =>
                  "custom_example_size", // << 这应该与主键相同，但没有'image_'。
            'name' => "Test",            // 在管理面板上显示的名称
            'enabled' => true,           // 见上面关于启用/禁用的说明
            ],
        */
        // 通过以下方式创建自定义数据库表
        //  php artisan make:migration --table=binshops_posts AddCustomBlogImageSize
        //   然后在 up() 方法中添加：
        //       $table->string("image_custom_example_size")->nullable();
        //   和 down() 方法中：
        //        $table->dropColumn("image_custom_example_size"); for the down()
        // 然后运行
        //   php artisan migrate
    ],


    'captcha' => [
        'captcha_enabled' => true, // true 开启验证码, false 禁用验证码. 在评论功能启用时生效.
        'captcha_type' => \AivstarBlog\Captcha\Basic::class, // 这是一个实现AivstarBlog\Interfaces\CaptchaInterface 接口类。
        'basic_question' => "What is the opposite of white?", // 一个简单的验证码问题 (如果验证码类型被设置为 'basic'
        'basic_answers' => "black,dark", // 逗号分隔的验证码答案列表。 不区分大小写.
    ],

    ////////// 评论:

    'comments' => [


        // 使用什么类型（如果有的话）的评论/评论表。
        // 选项:
        //      'built_in' (默认值，使用数据库评论数据),
        //      'disqus' (使用https://disqus.com/，请在下面输入进一步的配置选项),
        //      'custom' (将加载binshopsblog::partials.custom_comments模块，你可以将其复制到 vendor view 目录下自定义
        //      'disabled' (关闭评论)
        'type_of_comments_to_show' => 'built_in', // 默认值: built_in

        'max_num_of_comments_to_show' => 1000, // 在一篇文章上显示的最大评论数。最好设置为较小的数值。目前还没有内置的评论分页功能。

        // 是否在数据库中保存IP地址?
        'save_ip_address' => true, // 默认值: true


        //是否审核评论？ (设置为 false 时需审核)
        'auto_approve_comments' => false, // 默认值: false


        'save_user_id_if_logged_in' => true, // 是否保存已登录用户ID？(如果设置为 false 每次登录都将要求提供名字。）

        'user_field_for_author_name' => "name", // 作者名称显示用户模块上的 'name'或者 'username' 字段.

        'ask_for_author_email' => true, // 评论是否显示 email 输入框？
        'require_author_email' => false, //  email是否必填项 ( ask_for_author_email 需同时设置为设置为 true  )
        'ask_for_author_website' => true, // 评论是否显示 "作者网站"输入框 ，在查看评论时显示链接

        'disqus' => [

            //  只有当type_of_comments_to_show被设置为'disqus'时才适用。
//              可在你的disqus嵌入代码上找到以下配置选项：
//                          s.src = 'https://yourusername_or_sitename.disqus.com/embed.js';
//
//             你必须输入完整网址 (但不要输入 "s.src = '"部分！)
            'src_url' => "https://GET_THIS_FROM_YOUR_EMBED_CODE.disqus.com/embed.js", // 在这里输入disqus提供的html网址。

        ],
    ],

    'search' => [
        'search_enabled' => true, //你可以轻松关闭搜索功能

        'limit-results'=> 50,
        'enable_wildcards' => true,
        'weight' => [
            'title' => 1.5,
            'content' => 1,
        ],
    ],

    //在搜索结果页或分类页等列表页中显示帖子的全文。现在它显示的是预览
    'show_full_text_at_list' => true,
];
