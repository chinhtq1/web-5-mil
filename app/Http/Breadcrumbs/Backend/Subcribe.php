<?php

Breadcrumbs::register('admin.subcribes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.subcribes.management'), route('admin.subcribes.index'));
});

Breadcrumbs::register('admin.subcribes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.subcribes.index');
    $breadcrumbs->push(trans('menus.backend.subcribes.create'), route('admin.subcribes.create'));
});

Breadcrumbs::register('admin.subcribes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.subcribes.index');
    $breadcrumbs->push(trans('menus.backend.subcribes.edit'), route('admin.subcribes.edit', $id));
});
