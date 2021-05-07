@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.post.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.id') }}
                        </th>
                        <td>
                            {{ $post->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.title') }}
                        </th>
                        <td>
                            {{ $post->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.description') }}
                        </th>
                        <td>
                            {!! $post->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.price') }}
                        </th>
                        <td>
                            ${{ number_format($post->price,2) ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.featured_image') }}
                        </th>
                        <td>
                            @if($post->featured_image)
                                <a href="{{ $post->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $post->featured_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.images') }}
                        </th>
                        <td>
                            @foreach($post->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.exterior_color') }}
                        </th>
                        <td>
                            {{ $post->exterior_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.interior_color') }}
                        </th>
                        <td>
                            {{ $post->interior_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.city_mpg') }}
                        </th>
                        <td>
                            {{ $post->city_mpg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.highway_mpg') }}
                        </th>
                        <td>
                            {{ $post->highway_mpg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.transmission') }}
                        </th>
                        <td>
                            {{ $post->transmission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.engine') }}
                        </th>
                        <td>
                            {{ $post->engine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.fuel_type') }}
                        </th>
                        <td>
                            {{ App\Models\Post::FUEL_TYPE_SELECT[$post->fuel_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Post::STATUS_RADIO[$post->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.brand') }}
                        </th>
                        <td>
                            {{ $post->brand->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.post.fields.category') }}
                        </th>
                        <td>
                            {{ $post->category->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
