<?php

namespace AivstarBlog\Requests;


use Illuminate\Validation\Rule;
use AivstarBlog\Models\BinshopsPost;
use AivstarBlog\Requests\Traits\HasCategoriesTrait;
use AivstarBlog\Requests\Traits\HasImageUploadTrait;

class UpdateBinshopsBlogPostRequest  extends BaseBinshopsBlogPostRequest {

    use HasCategoriesTrait;
    use HasImageUploadTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $return = $this->baseBlogPostRules();
//        $return['slug'] [] = Rule::unique("binshops_post_translations", "slug")->ignore($this->route()->parameter("blogPostId"));
        return $return;
    }
}
