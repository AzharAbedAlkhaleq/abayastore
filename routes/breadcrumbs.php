<?php

use App\Models\Category;
use App\Models\Product;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('الرئيسية', route('user'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('home');
    $trail->push($category->slug_ar, route('category.detalis',$category));
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, Product $product) {
    $trail->parent('category');
    $trail->push($product->name_ar, route('shopping',$product));
});
