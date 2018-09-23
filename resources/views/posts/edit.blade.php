@extends('master.master')
@section('content')


<!-- MAIN -->
<main>
    <div class="container">
        <!--sections-->
        <div class="row">
            <div class="col-lg-8">
                <!--section-->
                <div class="lb-section lb-section__edit-post">
                    <div class="lb-section__content">
                        <form action="{{ route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input  name="body" id="body" type="text" class="form-control ttg-border-none" placeholder="" value="{{ $post->body }}"/>
                        @if($post->has_image == 1)
                        <div class="lb-section__image">
                            <img src="{{ url('/uploads/posts/'. $post->post_image)}}" alt="">
                        </div>
                      @endif
                    </div>
                    <div class="lb-section__footer">
                        {{--<a href="#" class="lb-section__btn-upvote lb-btn-icon"><i class="icon-Crop"></i></a>
                        <a href="#" class="lb-section__btn-downvote lb-btn-icon"><i class="icon-Rotate_Right"></i></a>
                        <a href="#" class="lb-section__btn-repost lb-btn-icon"><i class="icon-Rotate_Left"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="lb-aside lb-aside__edit-post">
                    <div>
                        <a href="#" type="submit" name="submit" id="submit" class="lb-btn">Update</a>
                    </div>
                    <div class="lb-aside__edit-post-head">
                        <select class="form-control">
                            <option>Choose Topic</option>
                        </select>
                    </div>
                    <div class="lb-aside__get-code">
                        <p>Embeded Link</p>
                        <div class="lb-input-copy">
                            <input name="embed_link" id="embed_link" type="text" class="form-control" placeholder='Enter Link' value="{{ $post->embed_link}}">
                          
                        </div>
                        {{--<p>Embed in HTML</p>
                        <div class="lb-input-copy">
                            <input type="text" class="form-control" placeholder='<blockquote class="lifebridge-embed-pu'disabled>
                            <a href="#">Copy</a>
                        </div>
                        <p>BBCode (Forums)</p>
                        <div class="lb-input-copy">
                            <input type="text" class="form-control" placeholder='http://lifebridge.com/gzFAbcsm'disabled>
                            <a href="#">Copy</a>
                        </div>
                        <p>Markdown (Reddit)</p>
                        <div class="lb-input-copy">
                            <input type="text" class="form-control" placeholder='<blockquote class="lifebridge-embed-pu'disabled>
                            <a href="#">Copy</a>
                        </div> --}}
                    </div>
                    <p>Share Post</p>
                    <div class="lb-aside__social">
                        <a href="" class="lb-btn-social__facebook lb-btn-social"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__twitter lb-btn-social"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__google lb-btn-social"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__pinterest lb-btn-social"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__btc lb-btn-social"><i class="fa fa-btc" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__tumblr lb-btn-social"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__vk lb-btn-social"><i class="fa fa-vk" aria-hidden="true"></i></a>
                        <a href="" class="lb-btn-social__reddit lb-btn-social"><i class="fa fa-reddit-alien" aria-hidden="true"></i></a>
                    </div>
                    <div class="lb-aside__edit-post-footer">
                        <span>Post Privacy</span>
                        <label class="lb-checkbox">
                            <input type="checkbox" checked="checked">
                            <span></span>
                            <p>Public</p>
                        </label>
                        <label class="lb-checkbox">
                            <input type="checkbox">
                            <span></span>
                            <p>Hidden</p>
                        </label>
                        <a href="{{ route('post.delete', $post->id)}}" class="lb-btn"><i class="icon-Delete"></i> Delete Post</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
</form>
<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                {{-- <div class="lb-footer">
                    <a href="#" class="lb-footer__btn-add-image lb-btn"><i class="icon-Add_Image"></i> Add another image</a>
                </div> --}}
            </div>
        </div>
    </div>
</footer>
@endsection
