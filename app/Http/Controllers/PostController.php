<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;
use Storage;
use Embed\Embed;
use Auth;
use Spatie\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Default Post Info
        $post = New Post;
        $post->user_id = Auth::id();
        $post->post_type = 'default';
        $post->has_image = 0;



        //Check if Post has File
        if($request->hasFile('image')){
          $image = $request->file('image');
          $filename = 'media-post-' . Auth::id() . '-' . time() . '.' . $image->getClientOriginalExtension();
          $imagemake = Image::make($image->getRealPath())->orientate()->stream();
          $store = Storage::put(
             'public/uploads/posts/' . $filename, $imagemake
            );
          $post->post_type = 'image';
          $post->post_image = $filename;
          $post->has_image = 1;
          }
          // The Regular Expression filter
          $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

          // The Text you want to filter for urls
          $text = $request->get('body');
          // Check if there is a url in the text
          if(preg_match($reg_exUrl, $text, $url)) {
          $postBody = preg_replace($reg_exUrl, ' ', $text);
          $post->body = $postBody;
          $post->embed_link = $url[0];
          $embed = Embed::create($url[0]);
          if(empty($embed->code)){
            $post->post_type = 'link';
          }else {
              $post->post_type = 'embed';
          }
          } else {
          $post->body = $text;

        }
          $post->save();
          //Get Post Hastags
          $reg_exHash = '/\W(\#[a-zA-Z]+\b)(?!;)/m';
          $text = $request->get('body');
          if(preg_match_all($reg_exHash, $text, $hashtags)){
          $post->attachTags($hashtags[0]);
          }
          return back()->with('success', 'Posted');
    }

    public function reshare($id)
    {
      //Find Original Post
      $original_post = Post::find($id);
      $post = $original_post->replicate();
      $post->user_id = Auth::id();
      $post->post_type = 'reshare';
      $post->origin_user_id = $original_post->user_id;
      $post->origin_post_id = $id;
      $post->save();

      return back()->with('success', 'Shared');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post = Post::find($post)->first();
        $tags = $post->tags;
        $data = array();
        foreach($tags as $tag)
        {
          $data[] =  "$tag->name";
        }
        $others = Post::withAnyTags($data)->limit(5)->get();
        return view('posts.single')->with(array(
          'post' => $post,
          'others' => $others,
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $id)
    {
        $post = Post::find($id)->first();

        $imageDelete = Storage::delete(
           'public/uploads/posts/' . $post->post_image
          );

        $post->delete();

        return redirect()->route('home')->with('success', "Post Deleted");
    }
    public function like($id)
    {
      $like = Auth::user()->toggleLike($id, 'App\Post');

      return back();
    }
    public function vote($id)
    {
      $vote = Auth::user()->upvote($id, 'App\Post');

      return back();
    }
    public function cancelVote($id)
    {
      $vote = Auth::user()->cancelVote($id, 'App\Post');

      return back();
    }
}
