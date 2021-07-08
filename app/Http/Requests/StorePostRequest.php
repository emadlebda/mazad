<?php

namespace App\Http\Requests;

use App\Models\Post;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('post_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'orignal_price' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'featured_image' => [
                'required',
            ],
            'exterior_color' => [
                'string',
                'required',
            ],
            'interior_color' => [
                'string',
                'required',
            ],
            'city_mpg' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'highway_mpg' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'transmission' => [
                'string',
                'nullable',
            ],
            'engine' => [
                'string',
                'nullable',
            ],
            'fuel_type' => [
                'required',
            ],
            'brand_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
