<div class='add_comment_area'>
    <h5 class='text-center'>添加评论</h5>
    <form method='post' action='{{route("binshopsblog.comments.add_new_comment",[app('request')->get('locale'),$post->slug])}}'>
        @csrf


        <div class="form-group ">

            <label id="comment_label" for="comment">你的评论 </label>
                    <textarea
                            class="form-control"
                            name='comment'
                            required
                            id="comment"
                            placeholder="Write your comment here"
                            rows="7">{{old("comment")}}</textarea>


        </div>

        <div class='container-fluid'>
            <div class='row'>

                @if(config("binshopsblog.comments.save_user_id_if_logged_in", true) == false || !\Auth::check())

                    <div class='col'>
                        <div class="form-group ">
                            <label id="author_name_label" for="author_name">名称 </label>
                            <input
                                    type='text'
                                    class="form-control"
                                    name='author_name'
                                    id="author_name"
                                    placeholder="Your name"
                                    required
                                    value="{{old("author_name")}}">
                        </div>
                    </div>

                    @if(config("binshopsblog.comments.ask_for_author_email"))
                        <div class='col'>
                            <div class="form-group">
                                <label id="author_email_label" for="author_email">Email
                                    <small>(Email不会公开)</small>
                                </label>
                                <input
                                        type='email'
                                        class="form-control"
                                        name='author_email'
                                        id="author_email"
                                        placeholder="Your Email"
                                        required
                                        value="{{old("author_email")}}">
                            </div>
                        </div>
                    @endif
                @endif


                @if(config("binshopsblog.comments.ask_for_author_website"))
                    <div class='col'>
                        <div class="form-group">
                            <label id="author_website_label" for="author_website">网址
                                <small>(将显示在评论中)</small>
                            </label>
                            <input
                                    type='url'
                                    class="form-control"
                                    name='author_website'
                                    id="author_website"
                                    placeholder="Your Website URL"
                                    value="{{old("author_website")}}">
                        </div>
                    </div>

                @endif
            </div>
        </div>


        @if($captcha)
            {{--验证码已启用。加载类型类，然后包括验证码类中定义的视图 --}}
            @include($captcha->view())
        @endif


        <div class="form-group ">
            <input type='submit' class="form-control input-sm btn btn-success "
                   value='Add Comment'>
        </div>

    </form>
</div>
