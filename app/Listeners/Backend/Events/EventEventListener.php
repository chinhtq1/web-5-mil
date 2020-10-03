<?php

namespace App\Listeners\Backend\Events;

/**
 * Class EventEventListener
 */
class EventEventListener
{
    private $history_slug = 'Event';

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->events->id)
            ->withText('trans("history.backend.events.created") <strong>'.$event->events->name.'</strong>')
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
            ->withEntity($event->event->id)
            ->withText('trans("history.backend.events.updated") <strong>'.$event->event->name.'</strong>')
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
            ->withEntity($event->event->id)
            ->withText('trans("history.backend.events.deleted") <strong>'.$event->event->name.'</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Events\EventCreated::class,
            'App\Listeners\Backend\Events\EventEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Events\EventUpdated::class,
            'App\Listeners\Backend\Events\EventEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Events\EventDeleted::class,
            'App\Listeners\Backend\Events\EventEventListener@onDeleted'
        );
    }
}
