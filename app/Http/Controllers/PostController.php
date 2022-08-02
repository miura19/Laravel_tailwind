<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = auth()->user();
        return view('post.index',compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // for($i=1; $i<=100; $i++){
        //     if ($i % 15 === 0){
        //         echo $i.'-'.'15の倍数'.'FizzBuzz!'.'<br>';
        //     } elseif($i % 5 === 0){
        //         echo $i.'-'.'5の倍数'.'Buzz!'.'<br>';
        //     } elseif($i % 3 === 0){
        //         echo $i.'-'.'3の倍数'.'Fizz!'.'<br>';
        //     } else {
        //         echo $i.'<br>';
        //     }
        // }
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    { 
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;

        if ($request->file('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            $post->image = $name;
            request()->file('image')->storeAs('public/images', $name);
        };
        $post->save();
        return back()->with('message', '投稿を作成しました!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->file('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            $post->image = $name;
            request()->file('image')->storeAs('public/images', $name);
        };
        $post->save();
        return back()->with('message', '投稿を更新しました!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message','投稿を削除しました！！');
    }
}
