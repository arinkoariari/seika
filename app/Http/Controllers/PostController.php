<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function mypage(Blog $post)
{
    return view('posts/mypage')->with(['posts' => $post->getPaginateByLimit()]);
}
    public function show(Blog $post)
{
    return view('posts/show')->with(['post' => $post]);
}
public function create()
{
    return view('posts/create');
}
public function store(PostRequest $request, Blog $post)
{
    
    $input = $request['post'];
    $input['user_id'] = Auth::id();
    $post->fill($input)->save();
    return redirect('/mypage/posts/' . $post->id);
}
public function edit(Blog $post)
{
    return view('posts/edit')-> with(['post' => $post]) ;
}
public function update(PostRequest $request, Blog $post)
{
    
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/mypage/posts/' . $post->id);
}
public function delete(Blog $post)
{
    $post->delete();
    return redirect('/mypage');
}
}
