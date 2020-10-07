<?php

namespace App\Listeners\Backend\Partners;

/**
 * Class EventEventListener
 */
class PartnerEventListener
{
    private $history_slug = 'Partner';

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->partners->id)
            ->withText('trans("history.backend.partners.created") <strong>' . $event->partners->name . '</strong>')
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
            ->withEntity($event->partners->id)
            ->withText('trans("history.backend.partners.updated") <strong>' . $event->partners->name . '</strong>')
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
            ->withEntity($event->partners->id)
            ->withText('trans("history.backend.partners.deleted") <strong>' . $event->partners->name . '</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Partners\PartnerCreated::class,
            'App\Listeners\Backend\Partners\PartnerEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Partners\PartnerUpdated::class,
            'App\Listeners\Backend\Partners\PartnerEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Partners\PartnerDeleted::class,
            'App\Listeners\Backend\Partners\PartnerEventListener@onDeleted'
        );
    }
}
