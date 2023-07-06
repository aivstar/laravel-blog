{{--这只是为了向后兼容而包括在内。它将在未来的某个阶段被删除。.--}}
@if (config('binshopsblog.search.search_enabled') )
    @include('binshopsblog::sitewide.search_form')
@endif