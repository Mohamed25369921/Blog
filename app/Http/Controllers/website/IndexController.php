<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories_with_posts = Category::with(['posts' => function($q){
            $q->latest()->limit(2);
        }]);
        return view('website.index',compact('categories_with_posts'));
    }
}
