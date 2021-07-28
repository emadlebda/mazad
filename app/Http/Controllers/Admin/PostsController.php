<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use App\Notifications\YouHaveWinTheBidNotification;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PostsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = Post::with(['brand', 'category', 'media'])->get();

        $brands = Brand::get();

        $categories = Category::get();

        return view('admin.posts.index', compact('posts', 'brands', 'categories'));
    }

    public function create()
    {
        abort_if(Gate::denies('post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.posts.create', compact('brands', 'categories'));
    }

    public function store(StorePostRequest $request)
    {
        $post = Post::create(array_merge($request->all(), ['orignal_price' => $request->price]));

        if ($request->input('featured_image', false)) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($request->input('featured_image'))))->toMediaCollection('featured_image');
        }

        foreach ($request->input('images', []) as $file) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $post->id]);
        }

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $brands = Brand::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $post->load('brand', 'category');

        return view('admin.posts.edit', compact('brands', 'categories', 'post'));
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

        if (count($post->images) > 0) {
            foreach ($post->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $post->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $post->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('brand', 'category', 'postBids');

        return view('admin.posts.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        abort_if(Gate::denies('post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostRequest $request)
    {
        Post::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('post_create') && Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Post();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function sell(Post $post)
    {
        abort_if($post->user_id == auth()->id(), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $highest_bid = $post->postBids()->latest()->firstOrFail();

        // send to user an email
        Notification::send($highest_bid->user, new YouHaveWinTheBidNotification($post));
        // close the post
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
