<?php

namespace AivstarBlog\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use AivstarBlog\Models\BinshopsCategory;

/**
 * Class CategoryWillBeDeleted
 * @package AivstarBlog\Events
 */
class CategoryWillBeDeleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var  BinshopsCategory */
    public $binshopsBlogCategory;

    /**
     * CategoryWillBeDeleted constructor.
     * @param BinshopsCategory $binshopsBlogCategory
     */
    public function __construct(BinshopsCategory $binshopsBlogCategory)
    {
        $this->binshopsBlogCategory=$binshopsBlogCategory;
    }

}
