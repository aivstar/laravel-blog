@extends("layouts.app",['title'=>"Saved comment"])
@section("content")

    <div class='text-center'>
        <h3>谢谢! 评论已保存!</h3>

        @if(!config("binshopsblog.comments.auto_approve_comments",false) )
            <p>在管理员批准该评论后，它将显示在网站上!</p>
        @endif

        <a href='{{$blog_post->url(app('request')->get('locale'))}}' class='btn btn-primary'>返回</a>
    </div>

@endsection