@if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
    <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">编辑帖子</a>
@endif

<h1 class='blog_title'>{{$post->title}}</h1>
<h5 class='blog_subtitle'>{{$post->subtitle}}</h5>


<?=$post->image_tag("medium", false, 'd-block mx-auto'); ?>

<p class="blog_body_content">
    {!! $post->post_body_output() !!}

    {{--@if(config("binshopsblog.use_custom_view_files")  && $post->use_view_file)--}}
    {{--                                // 使用一个自定义的 blade 文件来输出这些文章--}}
    {{--   @include("binshopsblog::partials.use_view_file")--}}
    {{--@else--}}
    {{--   {!! $post->post_body !!}        // 不安全, 输出纯 html/js--}}
    {{--   {{ $post->post_body }}          // 安全输出 --}}
    {{--@endif--}}
</p>

<hr/>

发布 <strong>{{$post->post->posted_at->diffForHumans()}}</strong>

@includeWhen($post->author,"binshopsblog::partials.author",['post'=>$post])
@includeWhen($categories,"binshopsblog::partials.categories",['categories'=>$categories])
