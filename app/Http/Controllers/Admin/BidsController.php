<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBidRequest;
use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;
use App\Models\Bid;
use App\Models\Post;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BidsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bid_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bids = Bid::with(['post', 'user'])->get();

        return view('admin.bids.index', compact('bids'));
    }

    public function create()
    {
        abort_if(Gate::denies('bid_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = Post::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bids.create', compact('posts', 'users'));
    }

    public function store(StoreBidRequest $request)
    {
        $bid = Bid::create($request->all());

        return redirect()->route('admin.bids.index');
    }

    public function edit(Bid $bid)
    {
        abort_if(Gate::denies('bid_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posts = Post::all()->pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bid->load('post', 'user');

        return view('admin.bids.edit', compact('posts', 'users', 'bid'));
    }

    public function update(UpdateBidRequest $request, Bid $bid)
    {
        $bid->update($request->all());

        return redirect()->route('admin.bids.index');
    }

    public function show(Bid $bid)
    {
        abort_if(Gate::denies('bid_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bid->load('post', 'user');

        return view('admin.bids.show', compact('bid'));
    }

    public function destroy(Bid $bid)
    {
        abort_if(Gate::denies('bid_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bid->delete();

        return back();
    }

    public function massDestroy(MassDestroyBidRequest $request)
    {
        Bid::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
