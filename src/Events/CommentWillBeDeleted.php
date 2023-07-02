<?php

namespace AivstarBlog\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use AivstarBlog\Models\BinshopsComment;

/**
 * Class CommentWillBeDeleted
 * @package AivstarBlog\Events
 */
class CommentWillBeDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var  BinshopsComment */
    public $comment;

    /**
     * CommentWillBeDeleted constructor.
     * @param BinshopsComment $comment
     */
    public function __construct(BinshopsComment $comment)
    {
        $this->comment=$comment;
    }

}
