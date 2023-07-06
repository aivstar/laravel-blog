<div id="disqus_thread"></div>
<script>

    /**
     *  推荐的配置变量：编辑和取消下面的部分，插入你的平台或博客的参数。
     *  学习为什么定义这些变量: https://disqus.com/admin/universalcode/#configuration-variables*/
    var disqus_config = function () {
        this.page.url = "{{$post->url()}}";  // 将PAGE_URL替换为你的页面URL变量
        this.page.identifier = "{{$post->slug}}"; // Replace PAGE_IDENTIFIER 输入你的唯一标识符变量
    };
    (function() { // 不要编辑下面的参数
        var d = document, s = d.createElement('script');
        s.src = '{{config("binshopsblog.comments.disqus.src_url","ENTER YOUR URL HERE!!!")}}';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>请启用JavaScript查看 <a href="https://disqus.com/?ref_noscript">评论由Discuz提供</a>, and run by <a href='https://binshops.com/'>BinshopsBlog Laravel Blog package</a></noscript>
