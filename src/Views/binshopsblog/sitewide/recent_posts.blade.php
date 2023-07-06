<h5>最近的帖子</h5>
<ul class="nav">
    @foreach(\AivstarBlog\Models\BinshopsPost::orderBy("posted_at","desc")->limit(5)->get() as $post)
        <li class="nav-item">
            <a class='nav-link' href='{{$post->url()}}'>{{$post->title}}</a>
        </li>
    @endforeach
</ul>