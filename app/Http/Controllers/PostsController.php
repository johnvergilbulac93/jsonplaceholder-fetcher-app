<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\PostsRequest;
use App\Http\Resources\Posts\PostsResource;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return  Post::get(['user_id as userId', 'id', 'title', 'body']);
    }
    public function show($id)
    {
        return Post::select(['user_id as userId', 'id', 'title', 'body'])->whereId($id)->get();
    }
    public function posts($id)
    {
        return Post::select(['user_id as userId', 'id', 'title', 'body'])->where('user_id', $id)->get();
    }
    public function comments(Request $request)
    {
        return Comment::select(['post_id as postId', 'id', 'name', 'email', 'body'])->where('post_id', $request->postId)->get();
    }
    public function store(PostsRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = rand(1, 10);
        $post =  Post::create($validated);

        return [
            'message' => 'successfully saved.',
            'data' => $post,
        ];
    }
    public function update(PostsRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['user_id'] = rand(1, 10);
        $post =  Post::whereId($id)->update($validated);
        return [
            'message' => 'successfully updated.',
        ];
    }
    public function patch(Request $request, $id)
    {
        $validated = $request->all();
        $validated['user_id'] = rand(1, 10);
        $post =  Post::whereId($id)->update($validated);
        return [
            'message' => 'successfully updated.',
        ];
    }
    public function destroy($id)
    {

        $post =  Post::findOrFail($id);
        $post->delete();
        return [
            'message' => 'successfully deleted.',
        ];
    }
}
