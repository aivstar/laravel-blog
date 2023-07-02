<?php

namespace AivstarBlog\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use AivstarBlog\Models\BinshopsCategory;
use AivstarBlog\Models\BinshopsCategoryTranslation;

/**
 * Class CategoryAdded
 * @package AivstarBlog\Events
 */
class CategoryAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var  BinshopsCategory */
    public $binshopsCategory;
    public $binshopsCategoryTranslation;

    /**
     * CategoryAdded constructor.
     * @param BinshopsCategory $binshopsCategory
     */
    public function __construct(BinshopsCategory $binshopsCategory, BinshopsCategoryTranslation  $binshopsCategoryTranslation)
    {
        $this->binshopsCategory=$binshopsCategory;
        $this->binshopsCategoryTranslation = $binshopsCategoryTranslation;
    }

}
