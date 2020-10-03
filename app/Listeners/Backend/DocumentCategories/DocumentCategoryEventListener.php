<?php

namespace App\Listeners\Backend\DocumentCategories;

use App\Events\Backend\DocumentCategories\DocumentCategoryCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DocumentCategoryEventListener
{
    private $history_slug = 'DocumentCategory';

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->documentcategory->id)
            ->withText('trans("history.backend.documentcategories.created") <strong>' . $event->documentcategory->name . '</strong>')
            ->withIcon('plus')
            ->withClass('bg-green')
            ->log();
    }

    /**
     * @param $event
     */
    public function onUpdated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->documentcategory->id)
            ->withText('trans("history.backend.documentcategories.updated") <strong>' . $event->documentcategory->name . '</strong>')
            ->withIcon('save')
            ->withClass('bg-aqua')
            ->log();
    }

    /**
     * @param $event
     */
    public function onDeleted($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->documentcategory->id)
            ->withText('trans("history.backend.documentcategories.deleted") <strong>' . $event->documentcategory->name . '</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\DocumentCategories\DocumentCategoryCreated::class,
            'App\Listeners\Backend\DocumentCategories\DocumentCategoryEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\DocumentCategories\DocumentCategoryUpdated::class,
            'App\Listeners\Backend\DocumentCategories\BlogCategoryEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\DocumentCategories\DocumentCategoryDeleted::class,
            'App\Listeners\Backend\DocumentCategories\BlogCategoryEventListener@onDeleted'
        );
    }
}
