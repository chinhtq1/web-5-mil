<?php

namespace App\Listeners\Backend\Banners;

/**
 * Class EventEventListener
 */
class BannerEventListener
{
    private $history_slug = 'Banner';

    public function onCreated($event)
    {
        history()->withType($this->history_slug)
            ->withEntity($event->banners->id)
            ->withText('trans("history.backend.banners.created") <strong>' . $event->banners->name . '</strong>')
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
            ->withEntity($event->banners->id)
            ->withText('trans("history.backend.banners.updated") <strong>' . $event->banners->name . '</strong>')
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
            ->withEntity($event->banners->id)
            ->withText('trans("history.backend.banners.deleted") <strong>' . $event->banners->name . '</strong>')
            ->withIcon('trash')
            ->withClass('bg-maroon')
            ->log();
    }

    public function subscribe($events)
    {
        $events->listen(
            \App\Events\Backend\Banners\BannerCreated::class,
            'App\Listeners\Backend\Banners\BannerEventListener@onCreated'
        );

        $events->listen(
            \App\Events\Backend\Banners\BannerUpdated::class,
            'App\Listeners\Backend\Banners\BannerEventListener@onUpdated'
        );

        $events->listen(
            \App\Events\Backend\Banners\BannerDeleted::class,
            'App\Listeners\Backend\Banners\BannerEventListener@onDeleted'
        );
    }
}
