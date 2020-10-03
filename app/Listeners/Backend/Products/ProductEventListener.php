<?php

namespace App\Listeners\Backend\Products;

class ProductEventListener
{
    private $history_slug = 'Product';

    /**
     * Create Product Category
     * @param $event
     */

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->products->id)
            ->withText('trans("history.backend.products.created") <strong>' . $event->products->name . '</strong>')
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
            ->withEntity($event->products->id)
            ->withText('trans("history.backend.products.updated") <strong>' . $event->products->name . '</strong>')
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
            ->withEntity($event->products->id)
            ->withText('trans("history.backend.products.deleted") <strong>' . $event->products->name . '</strong>')
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
            \App\Events\Backend\Products\ProductCreated::class,
            'App\Listeners\Backend\Products\ProductEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Products\ProductUpdated::class,
            'App\Listeners\Backend\Products\ProductEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Products\ProductDeleted::class,
            'App\Listeners\Backend\Products\ProductEventListener@onDeleted'
        );
    }
}
