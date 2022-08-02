<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneralController;
use App\Http\Requests\api\posts\CommentRequest;
use App\Http\Requests\api\posts\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PostController extends GeneralController

{
    use ApiResponse;

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function posts()
    {
        $posts = Post::with('comments')->paginate(10);
        $data = PostResource::collection($posts);
        return $this->respondWithData($data, true);
    }

    public function selectPosts(PostRequest $request)
    {
        $posts = Post::with('comments')->where('id', $request->post_id)->first();
        $data = new PostResource($posts);
        return $this->respondWithData($data, false);
    }

    public function addComment(CommentRequest $request)
    {
        $data=$request->validated();
        $data['user_id']= auth('api')->user()->id;
        Comment::create($data);
        return $this->respondWithSuccess();
    }

}
