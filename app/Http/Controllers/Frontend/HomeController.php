<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function read()
    {
        $hot_products = DB::table("products")->where("hot","=","1")->orderBy("id","desc")->offset(0)->take(10)->get();
        $categories = DB::table("categories")->where("display_at_home_page","=","1")->orderBy("id","desc")->get();
        $news = DB::table("news")->where("hot","=","1")->orderBy("id","desc")->offset(0)->take(3)->get();
        return view("frontend.home.read",["hot_products"=>$hot_products,"categories"=>$categories,"news"=>$news]);
    }
}
