<?php

namespace AivstarBlog\Requests;

use Illuminate\Foundation\Http\FormRequest;
use AivstarBlog\Interfaces\BaseRequestInterface;

/**
 * Class BaseRequest
 * @package AivstarBlog\Requests
 */
abstract class BaseRequest extends FormRequest implements BaseRequestInterface
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check() && \Auth::user()->canManageBinshopsBlogPosts();
    }
}
