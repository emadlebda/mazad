<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;
use App\Http\Resources\Admin\BidResource;
use App\Models\Bid;
use App\Models\Post;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BidsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bid_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BidResource(Bid::with(['post', 'user'])->get());
    }

    public function store(StoreBidRequest $request)
    {
        $post = Post::findOrFail($request->post_id);
        $bid = $post->postBids()->create($request->all());

        if ($bid->bid_amount > $post->orignal_price) $post->update(['price' => $bid->bid_amount]);


        return (new BidResource($bid))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bid $bid)
    {
        abort_if(Gate::denies('bid_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BidResource($bid->load(['post', 'user']));
    }

    public function update(UpdateBidRequest $request, Bid $bid)
    {
        $bid->update($request->all());

        return (new BidResource($bid))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bid $bid)
    {
        abort_if(Gate::denies('bid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bid->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
