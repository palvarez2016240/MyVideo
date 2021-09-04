<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// MyVideo
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('MyVideo', route('home'));
});

// MyVideo > Creadores
Breadcrumbs::for('creators', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Creadores', route('creators.index'));
});

// MyVideo > Categorias
Breadcrumbs::for('categorias', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Categorias', route('categorias.index'));
});

// MyVideo > Categorias > [Category]
Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $categoria) {
    $trail->parent('categorias');
    $trail->push($categoria->name, route('categorias.show', $categoria));
});

// MyVideo > Creadores > [Creators]
Breadcrumbs::for('creator', function (BreadcrumbTrail $trail, $creator) {
    $trail->parent('creators');
    $trail->push($creator->username, route('creators.show', $creator));
});
