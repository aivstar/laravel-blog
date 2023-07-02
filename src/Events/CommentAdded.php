<?php

namespace AivstarBlog\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use AivstarBlog\Models\BinshopsComment;
use AivstarBlog\Models\BinshopsPost;

/**
 * Class CommentAdded
 * @package AivstarBlog\Events
 */
class CommentAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var  BinshopsPost */
    public $binshopsBlogPost;
    /** @var  BinshopsComment */
    public $newComment;

    /**
     * CommentAdded constructor.
     * @param BinshopsPost $binshopsBlogPost
     * @param BinshopsComment $newComment
     */
    public function __construct(BinshopsPost $binshopsBlogPost, BinshopsComment $newComment)
    {
        $this->binshopsBlogPost=$binshopsBlogPost;
        $this->newComment=$newComment;
    }

}
