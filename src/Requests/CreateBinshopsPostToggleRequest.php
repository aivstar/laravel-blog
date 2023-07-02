<?php

namespace AivstarBlog\Requests;


use Illuminate\Validation\Rule;
use AivstarBlog\Requests\Traits\HasCategoriesTrait;
use AivstarBlog\Requests\Traits\HasImageUploadTrait;

class CreateBinshopsPostToggleRequest extends BaseBinshopsBlogPostRequest
{
    use HasCategoriesTrait;
    use HasImageUploadTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //no rules
        return [];
    }
}
