<?php

namespace App\Listeners\Backend\Documents;


class DocumentEventListener
{
    private $history_slug = 'Document';

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->document->id)
            ->withText('trans("history.backend.documents.created") <strong>' . $event->document->name . '</strong>')
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
            ->withEntity($event->document->id)
            ->withText('trans("history.backend.documents.updated") <strong>' . $event->document->name . '</strong>')
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
            ->withEntity($event->document->id)
            ->withText('trans("history.backend.documents.deleted") <strong>' . $event->document->name . '</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Documents\DocumentCreated::class,
            'App\Listeners\Backend\Documents\DocumentEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Documents\DocumentUpdated::class,
            'App\Listeners\Backend\Documents\DocumentEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Documents\DocumentDeleted::class,
            'App\Listeners\Backend\Documents\DocumentEventListener@onDeleted'
        );
    }
}
