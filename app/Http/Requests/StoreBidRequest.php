<?php

namespace App\Http\Requests;

use App\Models\Bid;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBidRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bid_create');
    }

    public function rules()
    {
        return [
            'post_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
