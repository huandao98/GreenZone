<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductsController as ProductsFrontend;
use App\Http\Controllers\Frontend\CustomersController;
use App\Http\Controllers\Frontend\NewsController as NewsFrontend;
use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Login
Route::get('/admin/login',function(){
    if(isset(Auth::user()->email) != false)
        return redirect(url('admin/home'));
    return view('admin.login.read');
});

Route::post('/admin/login-post',function(Request $request){
    $email = $request->get("email");
    $password = $request->get("password");
    if(Auth::attempt(["email"=>$email,"password"=>$password]))
    {
       return redirect(url('admin/home'));
    }
    else
    {
        return redirect(url('admin/login?notify=invalid'));
    }
});

// Logout
Route::get('admin/logout',function(){
    Auth::logout();
    return redirect(url('admin/login'));
});

// Admin
Route::get('/admin/home',function(){
    return view('admin.home.read');
})->middleware("checkLogin");

//CRUD users
Route::get('admin/users',[UsersController::class,'read'])->middleware("checkLogin");
Route::get('admin/users/update/{id}',[UsersController::class,'update'])->middleware("checkLogin");
Route::post('admin/users/update-post/{id}',[UsersController::class,'updatePost'])->middleware("checkLogin");
Route::get('admin/users/create',[UsersController::class,'create'])->middleware("checkLogin");
Route::post('admin/users/create-post',[UsersController::class,'createPost'])->middleware("checkLogin");
Route::get('admin/users/delete/{id}',[UsersController::class,'delete'])->middleware("checkLogin");

//CRUD categories
Route::get('admin/categories',[CategoriesController::class,'read'])->middleware("checkLogin");
Route::get('admin/categories/update/{id}',[CategoriesController::class,'update'])->middleware("checkLogin");
Route::post('admin/categories/update-post/{id}',[CategoriesController::class,'updatePost'])->middleware("checkLogin");
Route::get('admin/categories/create',[CategoriesController::class,'create'])->middleware("checkLogin");
Route::post('admin/categories/create-post',[CategoriesController::class,'createPost'])->middleware("checkLogin");
Route::get('admin/categories/delete/{id}',[CategoriesController::class,'delete'])->middleware("checkLogin");

//CRUD products
Route::get('admin/products',[ProductsController::class,'read'])->middleware("checkLogin");
Route::get('admin/products/update/{id}',[ProductsController::class,'update'])->middleware("checkLogin");
Route::post('admin/products/update-post/{id}',[ProductsController::class,'updatePost'])->middleware("checkLogin");
Route::get('admin/products/create',[ProductsController::class,'create'])->middleware("checkLogin");
Route::post('admin/products/create-post',[ProductsController::class,'createPost'])->middleware("checkLogin");
Route::get('admin/products/delete/{id}',[ProductsController::class,'delete'])->middleware("checkLogin");

//CRUD news
Route::get('admin/news',[NewsController::class,'read'])->middleware("checkLogin");
Route::get('admin/news/update/{id}',[NewsController::class,'update'])->middleware("checkLogin");
Route::post('admin/news/update-post/{id}',[NewsController::class,'updatePost'])->middleware("checkLogin");
Route::get('admin/news/create',[NewsController::class,'create'])->middleware("checkLogin");
Route::post('admin/news/create-post',[NewsController::class,'createPost'])->middleware("checkLogin");
Route::get('admin/news/delete/{id}',[NewsController::class,'delete'])->middleware("checkLogin");

//Orders -> danh sách đơn hàng
Route::get('admin/orders',[OrdersController::class,'read'])->middleware('checkLogin');
Route::get('admin/orders/detail/{id}',[OrdersController::class,'detail'])->middleware("checkLogin");
//update tinh trang don hang thanh da giao hang
Route::get('admin/orders/update/{id}',[OrdersController::class,'update'])->middleware("checkLogin");

// Frontend
// Trang chủ
Route::get('',[HomeController::class,'read']);

// Trang danh mục
Route::get('products/category/all',[ProductsFrontend::class,'all']);
Route::get('products/category/{id}',[ProductsFrontend::class,'category']);

// Trang chi tiết
Route::get('products/detail/{id}',[ProductsFrontend::class,'detail']);

// Thêm sản phẩm vào giỏ hàng
Route::get("/cart/buy/{id}",[CartController::class,"buy"]);

// Cập nhật sản phẩm trong giỏ hàng
Route::post("/cart/update",[CartController::class,"update"]);

// Xóa sản phẩm khỏi giỏ hàng
Route::get("/cart/remove/{id}",[CartController::class,"remove"]);

// Xóa toàn bộ sản phẩm khỏi giỏ hàng
Route::get("/cart/destroy",[CartController::class,"destroy"]);

// Thanh toán giỏ hàng
Route::get('/cart/bill',[CartController::class,"bill"]);
Route::get("/cart/checkout",[CartController::class,"checkout"]);

// Hiển thị danh sách sản phẩm trong giỏ hàng
Route::get("/cart",[CartController::class,"read"]);

// Đăng ký customer
Route::get("/customers/register",[CustomersController::class,"register"]);
Route::post("/customers/register-post",[CustomersController::class,"registerPost"]);

// Đăng nhập customer
Route::get("/customers/login",[CustomersController::class,"login"]);
Route::post("/customers/login-post",[CustomersController::class,"loginPost"]);

// Đăng xuất customer
Route::get("/customers/logout",[CustomersController::class,"logout"]);

// Đánh số sao sản phẩm
Route::get("/products/rate/{id}",[ProductsFrontend::class,"rate"]);

// Tìm kiếm theo mức giá
Route::get("/products/search-price",[ProductsFrontend::class,"searchPrice"]);

// Tìm kiếm theo tên sản phẩm
Route::get("/products/search-name",[ProductsFrontend::class,"searchName"]);

// Tìm kiếm sử dụng ajax
Route::get("/products/search-ajax",[ProductsFrontend::class,"searchAjax"]);

// Danh sách tin tức

// Chi tiết tin tức

// Liên hệ

