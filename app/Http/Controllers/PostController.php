<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Jobs\NewPostNotificationJob;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return ApiResponse(true, 'All posts', Post::get(), 200);
    }

    /**
     * This method not in use
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created post.
     *
     * @param CreatePostRequest $request
     * @return JsonResponse
     */
    public function store(CreatePostRequest $request)
    {
        $newPost = Post::create($request->validated());
        if ($newPost) {
            dispatch(new NewPostNotificationJob($newPost));
            return ApiResponse(true, 'New Post created successfully.', $newPost);
        } else {
            return ApiResponse(false, 'Unable to create post right now!', [], 500);
        }
    }

    /**
     * This method not in use
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * This method not in use
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * This method not in use
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * This method not in use
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
