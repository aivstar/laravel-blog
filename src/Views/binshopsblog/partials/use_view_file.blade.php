{{--This is used if a blog post has a 'use_view_file' value.--}}{{--It will (attempt to) load the view from /resources/views/custom_blog_posts/$use_view_file.blade.php. If that file doesn't exist, it'll show an error. --}}
@if(\View::exists($post->full_view_file_path()))

    {{--view file existed, so include it.--}}
    @include("custom_blog_posts." . $post->use_view_file, ['post' =>$post])

@else

    {{--uh oh! the view file wasn't there. Show a detailed error if user is logged in and can manage the blog, otherwise show generic error.--}}

    @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
         {{--is logged in + canManageBinshopsBlogPosts() == true, so show a detailed error--}}
        <div class='alert alert-danger'>自定义视图文件
                        (<code>{{$post->full_view_file_path()}}</code>) 找不到. <a
                    href='https://github.com/binshops/laravel-blog'
                    target='_blank'>See Laravel Blog Package help here</a>.
                    </div>

    @else
        {{--is not logged in, or User::canManageBinshopsBlogPosts() for current user == false--}}
        {{--show basic error message--}}
        <div class='alert alert-danger'>对不起，显示该博文时出现了错误。请稍后再来。</div>
    @endif
@endif
