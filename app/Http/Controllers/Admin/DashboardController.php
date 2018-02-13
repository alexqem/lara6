<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;

class DashboardController extends Controller
{
    //Dashboard
    public function dashboard() {
        return view('admin.dashboard', [
            'articles'      => Article::published()->get(),
            'categories'    => Category::LastCategories(5),
            'count_cat'     => Category::count(),
            'count_articles'=> Article::count(),
        ]);
    }

}
