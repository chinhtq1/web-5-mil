<?php

namespace App\Listeners\Backend\ProductCategories;

class ProductCategoryEventListener
{
    private $history_slug = 'ProductCategory';

    /**
     * Create Product Category
     * @param $event
     */

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->productCategory->id)
            ->withText('trans("history.backend.productCategories.created") <strong>' . $event->productCategory->name . '</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * Update Product Category
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->productCategory->id)
            ->withText('trans("history.backend.productCategories.updated") <strong>' . $event->productCategory->name . '</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * Delete Product Category
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->productCategory->id)
            ->withText('trans("history.backend.productCategories.deleted") <strong>' . $event->productCategory->name . '</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\ProductCategories\ProductCategoryCreated::class,
            'App\Listeners\Backend\ProductCategories\ProductCategoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\ProductCategories\ProductCategoryUpdated::class,
            'App\Listeners\Backend\ProductCategories\ProductCategoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\ProductCategories\ProductCategoryDeleted::class,
            'App\Listeners\Backend\ProductCategories\ProductCategoryEventListener@onDeleted'
        );
    }
}
