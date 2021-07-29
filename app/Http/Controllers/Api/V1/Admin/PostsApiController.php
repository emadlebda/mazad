<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\Admin\PostResource;
use App\Models\Post;
use App\Notifications\YouHaveSuccessfullySellPostNotification;
use App\Notifications\YouHaveWinTheBidNotification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class PostsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostResource(Post::with(['brand', 'category'])->get());
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create(array_merge($request->all(), ['orignal_price' => $request->price, 'user_id' => auth()->id()]));

        if ($request->input('featured_image', false)) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        if ($request->input('images', false)) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('images'))))->toMediaCollection('images');
        }

        return (new PostResource($post))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostResource($post->load(['brand', 'category']));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->all());

        if ($request->input('featured_image', false)) {
            if (!$post->featured_image || $request->input('featured_image') !== $post->featured_image->file_name) {
                if ($post->featured_image) {
                    $post->featured_image->delete();
                }
                $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
            }
        } elseif ($post->featured_image) {
            $post->featured_image->delete();
        }

        if ($request->input('images', false)) {
            if (!$post->images || $request->input('images') !== $post->images->file_name) {
                if ($post->images) {
                    $post->images->delete();
                }
                $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('images'))))->toMediaCollection('images');
            }
        } elseif ($post->images) {
            $post->images->delete();
        }

        return (new PostResource($post))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function sell(Post $post)
    {
        abort_if($post->user_id != auth()->id(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highest_bid = $post->postBids()->latest()->firstOrFail();

        // send to user an email
        Notification::send($highest_bid->user, new YouHaveWinTheBidNotification($post));
        Notification::send(auth()->user(), new YouHaveSuccessfullySellPostNotification($post, $highest_bid->user));
        // close the post
        $post->update(['status' => 3]);
//        $post->delete();

        return response('selled successfully', Response::HTTP_CREATED);
    }
}
