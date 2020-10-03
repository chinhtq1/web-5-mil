<?php

Breadcrumbs::register('admin.documents.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.documents.management'), route('admin.documents.index'));
});

Breadcrumbs::register('admin.documents.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.documents.index');
    $breadcrumbs->push(trans('menus.backend.documents.create'), route('admin.documents.create'));
});

Breadcrumbs::register('admin.documents.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.documents.index');
    $breadcrumbs->push(trans('menus.backend.documents.edit'), route('admin.documents.edit', $id));
});
