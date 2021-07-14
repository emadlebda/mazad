<?php

namespace App\Rules;

use App\Models\Post;
use Illuminate\Contracts\Validation\Rule;

class BidAmountBiggerThanThePriceRule implements Rule
{
    private $postId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($postId)
    {
        //
        $this->postId = $postId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value > Post::findOrFail($this->postId)->orignal_price;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'the bid amount must be bigger than the orignal price ';
    }
}
