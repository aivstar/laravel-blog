<h1 align="center">Laravel Blog Package</h1>
基于Laravel平台的 博客 / CMS 。此 package 以 [binshops/laravel-blog](https://github.com/binshops/laravel-blog) v.9.3.1 为模板修改。与最新的laravel兼容

### 快速安装
1- 通过composer安装

如果是Laravel的全新安装，还要运行以下命令：


```
composer require laravel/ui
php artisan ui vue --auth
```
已安装以上组件则直接输入以下命令：

`composer require aivstar/laravel-blog`



2- 项目支架

```
npm install && npm run build
```

3- 执行以下两个命令，复制配置文件、迁移文件和查看文件

`php artisan vendor:publish --provider="AivstarBlog\BinshopsBlogServiceProvider" --force`

4-  执行迁移命令创建表

`php artisan migrate;`

5- 添加方法到 \App\User (laravel 8 以上版本 \App\Models\User). 它决定了哪个用户可以管理帖子。

```
 /**
     * Enter your own logic (e.g. if ($this->id === 1) to
     *   enable this user to be able to add/edit blog posts
     *
     * @return bool - true = they can edit / manage blog posts,
     *        false = they have no access to the blog admin panel
     */
    public function canManageBinshopsBlogPosts()
    {
        // Enter the logic needed for your app.
        // Maybe you can just hardcode in a user id that you
        //   know is always an admin ID?

        if (       $this->id === 1
             && $this->email === "your_admin_user@your_site.com"
           ){

           // return true so this user CAN edit/post/delete
           // blog posts (and post any HTML/JS)

           return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;
    }
```

6- 在 `public/` 创建一个名为 `blog_images` 的目录

7- 启动服务器

```
php artisan serve
```

8- 以管理员身份登录`/blog_admin/setup`（URL 可在配置文件中自定义）并设置您的软件包: 

  管理面板 URI: `/blog_admin`
  前端 URI: `/en/blog`

要查看packagist上的安装包，请单击此 [Link](https://packagist.org/packages/aivstar/laravel-blog)

## 重要说明
- 对于 laravel 8.xs 默认身份验证用户模型，请在 `binshopsblog.php` 的: `\App\Models\User::class`

## 如何自定义博客视图/模板

所有默认模板文件都将在 /resources/views/vendor/binshopsblog/ 中找到。

### 自定义管理视图
如果您需要自定义管理视图，只需从
`vendor/binshopsblog/src/Views/binshopsblog_admin`
复制文件到
`resources/views/vendor/binshopsblog_admin`
然后，您可以像修改任何其他视图文件一样修改它们。

## 路由

它将自动设置所有必需的路由（面向公共的路由和管理后端）。有一些配置选项（例如将 /blog/ url 更改为其他内容），可以在 binshopsblog.php 文件中完成。

## 配置选项
所有配置选项都有描述其功能的注释。请参考 binshopsblog.php 文件中的 /config/ dir。

### 自定义用户模型
您可以通过配置文件更改默认用户模型。

## 事件

您可以通过查看 /src/Events 目录找到触发的所有事件。将这些事件（和事件侦听器）添加到 EventServiceProvider.php 文件中，以便在触发时使用这些事件。

## 内置验证码/反垃圾邮件

内置了一个内置的验证码（反垃圾邮件评论）系统，您可以轻松将其替换为自己的实现。内置了一个基本的反垃圾邮件验证码功能。


请参阅config/binshops.php 验证码部分。有一个内置系统（基本）可以防止大多数自动垃圾邮件尝试。编写自己的验证码系统：I故意编写验证码系统简单，因此您可以添加自己的验证码选项。添加任何其他验证码系统应该很容易。

编写自己的验证码系统：

您可以添加自己的验证码选项。

如果要编写自己的实现，请创建自己的实现类 \AivstarBlog\Interfaces\CaptchaInterface, 然后更新 config/binshopsblog.php 文件（更改captcha_type选项）。


您需要实现三种方法：
public function captcha_field_name() : string

返回一个字符串，例如 "captcha". 它用于表单验证和 <input name=???>.
public function view() : string

binshops::partials.add_comment_form 视图应包括哪个视图文件？您可以根据需要将其设置为任何设置，然后创建自己的视图文件。默认包含的基本验证码类将返回 "binshops::captcha.basic".
public function rules() : array

返回规则的数组。 这只是标准的Laravel验证规则。您可以在此处检查验证码是否成功。
自选：
public function runCaptchaBeforeShowingPosts() : null

这不是接口的一部分，不是必需的。默认情况下，它不执行任何操作。但是你可以在这种方法中放一些代码，它将在BinshopsReaderController：：viewSinglePost方法中运行。

## 图片上传错误

尝试将其添加到 config/app.php:

    'Image' => Intervention\Image\Facades\Image::class

- 还要确保 /tmp 是可写的。如果您启用了open_basedir，请务必将 ：/tmp 添加到其值中.
- 确保 /public/blog_images（或您在配置中将其设置为的任何目录）可由服务器写入 
- 您可能需要设置更高的内存限制，或上传较小的图像文件。这将取决于您的服务器。一旦服务器正确设置为处理较大的文件上传，就能上传大的（10mb+）jpg图像，而不会出现问题。

## Version History       
- 0.1.6                   - First release
