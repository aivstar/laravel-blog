<h5>随机帖子</h5>
<ul class="nav">
    @foreach(\AivstarBlog\Models\BinshopsPost::inRandomOrder()->limit(5)->get() as $post)
        <li class="nav-item">
            <a class='nav-link' href='{{$post->url()}}'>{{$post->title}}</a>
        </li>
    @endforeach
</ul>