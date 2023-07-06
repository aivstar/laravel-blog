{{--用在索引页上（所以显示一个小的摘要--}}
{{--请参阅binshops.com上的指南，了解如何将这些文件复制到你的  /resources/views/ directory--}}

<div class="col-md-6">
    <div class="blog-item">

        <div class='text-center blog-image'>
            <?=$post->image_tag("medium", true, ''); ?>
        </div>
        <div class="blog-inner-item">
            <h3 class=''><a href='{{$post->url($locale, $routeWithoutLocale)}}'>{{$post->title}}</a></h3>
            <h5 class=''>{{$post->subtitle}}</h5>

            @if (config('binshopsblog.show_full_text_at_list'))
                <p>{!! $post->post_body_output() !!}</p>
            @else
                <p>{!! mb_strimwidth($post->post_body_output(), 0, 400, "...") !!}</p>
            @endif

            <div class="post-details-bottom">
                <span class="light-text">Authored by: </span> {{$post->post->author->name}} <span class="light-text">发布于: </span> {{date('d M Y ', strtotime($post->post->posted_at))}}
            </div>
            <div class='text-center'>
                <a href="{{$post->url($locale, $routeWithoutLocale)}}" class="btn btn-primary">查看帖子</a>
            </div>
        </div>
    </div>

</div>
