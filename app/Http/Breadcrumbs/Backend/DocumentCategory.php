<?php

Breadcrumbs::register('admin.documentcategories.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.documentcategories.management'), route('admin.documentcategories.index'));
});

Breadcrumbs::register('admin.documentcategories.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.documentcategories.index');
    $breadcrumbs->push(trans('menus.backend.documentcategories.create'), route('admin.documentcategories.create'));
});

Breadcrumbs::register('admin.documentcategories.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.documentcategories.index');
    $breadcrumbs->push(trans('menus.backend.documentcategories.edit'), route('admin.documentcategories.edit', $id));
});
