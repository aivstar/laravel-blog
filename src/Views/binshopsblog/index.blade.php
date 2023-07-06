@extends("layouts.app",['title'=>$title])

@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
@endsection

@section("content")

    <div class='col-sm-12 binshopsblog_container'>
        @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
            <div class="text-center">
                <p class='mb-1'>你是管理员。
                    <br>
                    <a href='{{route("binshopsblog.admin.index")}}'
                       class='btn border  btn-outline-primary btn-sm '>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        后台管理</a>
                </p>
            </div>
        @endif

        <div class="row">
            <div class="col-md-9">

                @if($category_chain)
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                @forelse($category_chain as $cat)
                                    / <a href="{{$cat->categoryTranslations[0]->url($locale)}}">
                                        <span class="cat1">{{$cat->categoryTranslations[0]['category_name']}}</span>
                                    </a>
                                @empty @endforelse
                            </div>
                        </div>
                    </div>
                @endif

                @if(isset($binshopsblog_category) && $binshopsblog_category)
                    <h2 class='text-center'> {{$binshopsblog_category->category_name}}</h2>

                    @if($binshopsblog_category->category_description)
                        <p class='text-center'>{{$binshopsblog_category->category_description}}</p>
                    @endif

                @endif

                <div class="container">
                    <div class="row">
                        @forelse($posts as $post)
                            @include("binshopsblog::partials.index_loop")
                        @empty
                            <div class="col-md-12">
                                <div class='alert alert-danger'>No posts!</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h6>分类</h6>
                <ul class="binshops-cat-hierarchy">
                    @if($categories)
                        @include("binshopsblog::partials._category_partial", [
    'category_tree' => $categories,
    'name_chain' => $nameChain = "",
    'routeWithoutLocale' => $routeWithoutLocale
    ])
                    @else
                        <span>无分类</span>
                    @endif
                </ul>
            </div>
        </div>

        @if (config('binshopsblog.search.search_enabled') )
            @include('binshopsblog::sitewide.search_form')
        @endif
        <div class="row">
            <div class="col-md-12 text-center">
                @foreach($lang_list as $lang)
                    <a href="{{route("binshopsblog.index" , $lang->locale)}}">
                        <span>{{$lang->name}}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
