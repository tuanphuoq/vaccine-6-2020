<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getPost() {
    	$posts = Post::paginate(10);
    	return view('admin.post.post', ['posts' => $posts]);
    }

    public function create() {
    	return view('admin.post.add');
    }

    public function store(StorePostRequest $request) {
    	$data = $request->all();
    	$data['id_user'] = Auth::user()->id;
    	$post = Post::create($data);
    	return response()->json([
    		'error' => false
    	]);
    }

    public function edit($id) {
    	$post = Post::find($id);
    	if ($post == null) {
    		return abort(404);
    	}
    	else {
    		return view('admin.post.edit', ['post' => $post]);
    	}
    }

    public function update(UpdatePostRequest $request, $id) {
    	$data = array();
    	$data['id_user'] = Auth::user()->id;
    	$data['title'] = $request->title;
    	$data['content'] = $request->content;
    	$data['description'] = $request->description;
    	$post = Post::find($id)->update($data);
    	return response()->json([
    		'error' => false
    	]);
    }

    public function delete($id) {
    	$post = Post::find($id)->delete();
    	return response()->json([
    		'message' => 'Xoa thanh cong'
    	]);
    }

    public function allPost() {
    	$posts = Post::paginate(10);
    	return view('pages.news', ['posts' => $posts]);
    }

    public function show($id) {
    	$post = Post::find($id);
    	if ($post == null) {
    		return abort(404);
    	}
    	else {
    		return view('pages.detail-news', ['post' => $post]);
    	}
    }
}
