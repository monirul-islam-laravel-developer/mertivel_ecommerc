<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\BlogController;

use App\Models\RoleRoute;

function getRoleName($routeName)
{
    $routesData = RoleRoute::where('route_name', $routeName)->get();
    $result = [];
    foreach ($routesData as $routeData) {
        array_push($result, $routeData->role_name);
    }
    return $result;
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/error', function () {
    return view('errors.404');
});


Route::get('/privacy-policy', [PrivacyController::class, 'page_view'])->name('privacy.view');
Route::get('/terms-and-condition', [PrivacyController::class, 'condition_page_view'])->name('condition.view');

Route::prefix('profile')->group(function () {
    Route::get('/', [HomeController::class, 'profileView'])->name('profile.view');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::middleware(['roles'])->group(function () {
            Route::group(['prefix' => 'role', 'as' => 'role.'], function(){
                Route::get('/add', [RoleController::class, 'index'])->name('add');
                Route::post('/new', [RoleController::class, 'create'])->name('new');
                Route::get('/manage', [RoleController::class, 'manage'])->name('manage');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
                Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
            });

            Route::prefix('user')->group(function () {
                Route::get('/add', [UserController::class, 'index'])->name('user.add');
                Route::post('/new', [UserController::class, 'create'])->name('user.new');
                Route::get('/manage', [UserController::class, 'manage'])->name('user.manage');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
                Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
                Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
            });
            Route::prefix('slider')->group(function () {
                Route::get('/add', [SliderController::class, 'index'])->name('slider.add');
                Route::post('/new', [SliderController::class, 'create'])->name('slider.new');
                Route::get('/manage', [SliderController::class, 'manage'])->name('slider.manage');
                Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
                Route::post('/update/{id}', [SliderController::class, 'update'])->name('slider.update');
                Route::get('/delete/{id}', [SliderController::class, 'delete'])->name('slider.delete');
            });
            Route::prefix('category')->group(function () {
                Route::get('/add', [CategoryController::class, 'index'])->name('category.add');
                Route::post('/new', [CategoryController::class, 'create'])->name('category.new');
                Route::get('/manage', [CategoryController::class, 'manage'])->name('category.manage');
                Route::get('/edit/{id}/{slug}', [CategoryController::class, 'edit'])->name('category.edit');
                Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
                Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
            });

            Route::prefix('subCategory')->group(function () {
                Route::get('/add', [SubCategoryController::class, 'index'])->name('subcategory.add');
                Route::post('/new', [SubCategoryController::class, 'create'])->name('subcategory.new');
                Route::get('/manage', [SubCategoryController::class, 'manage'])->name('subcategory.manage');
                Route::get('/edit/{id}/{slug}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
                Route::post('/update/{id}/{slug}', [SubCategoryController::class, 'update'])->name('subcategory.update');
                Route::post('/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');
            });
            Route::prefix('brand')->group(function () {
                Route::get('/add', [BrandController::class, 'index'])->name('brand.add');
                Route::post('/new', [BrandController::class, 'create'])->name('brand.new');
                Route::get('/manage', [BrandController::class, 'manage'])->name('brand.manage');
                Route::get('/edit/{id}/{slug}', [BrandController::class, 'edit'])->name('brand.edit');
                Route::post('/update/{id}/{slug}', [BrandController::class, 'update'])->name('brand.update');
                Route::post('/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
            });
            Route::prefix('unit')->group(function () {
                Route::get('/add', [UnitController::class, 'index'])->name('unit.add');
                Route::post('/new', [UnitController::class, 'create'])->name('unit.new');
                Route::get('/manage', [UnitController::class, 'manage'])->name('unit.manage');
                Route::get('/edit/{id}/{slug}', [UnitController::class, 'edit'])->name('unit.edit');
                Route::post('/update/{id}/{slug}', [UnitController::class, 'update'])->name('unit.update');
                Route::post('/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
            });
            Route::prefix('size')->group(function () {
                Route::get('/add', [SizeController::class, 'index'])->name('size.add');
                Route::post('/new', [SizeController::class, 'create'])->name('size.new');
                Route::get('/manage', [SizeController::class, 'manage'])->name('size.manage');
                Route::get('/edit/{id}/{slug}', [SizeController::class, 'edit'])->name('size.edit');
                Route::post('/update/{id}/{slug}', [SizeController::class, 'update'])->name('size.update');
                Route::post('/delete/{id}', [SizeController::class, 'delete'])->name('size.delete');
            });
            Route::prefix('color')->group(function () {
                Route::get('/add', [ColorController::class, 'index'])->name('color.add');
                Route::post('/new', [ColorController::class, 'create'])->name('color.new');
                Route::get('/manage', [ColorController::class, 'manage'])->name('color.manage');
                Route::get('/edit/{id}/{slug}', [ColorController::class, 'edit'])->name('color.edit');
                Route::post('/update/{id}/{slug}', [ColorController::class, 'update'])->name('color.update');
                Route::post('/delete/{id}', [ColorController::class, 'delete'])->name('color.delete');
            });

            Route::prefix('product')->group(function () {
                Route::get('/add', [ProductController::class, 'index'])->name('product.add');
                Route::post('/new', [ProductController::class, 'create'])->name('product.new');
                Route::get('/manage', [ProductController::class, 'manage'])->name('product.manage');
                Route::get('/manage/{id}{slug}', [ProductController::class, 'open'])->name('product.open');
                Route::get('/edit/{id}/{slug}', [ProductController::class, 'edit'])->name('product.edit');
                Route::post('/update/{id}/{slug}', [ProductController::class, 'update'])->name('product.update');
                Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
            });
            Route::prefix('aboutus')->group(function () {
                Route::get('/add', [AboutController::class, 'index'])->name('about.add');
                Route::post('/new', [AboutController::class, 'create'])->name('about.new');
                Route::post('/update/{id}', [AboutController::class, 'update'])->name('about.update');
            });

            Route::prefix('privacy')->group(function () {
                Route::get('/add', [PrivacyController::class, 'index'])->name('privacy.add');
                Route::post('/new', [PrivacyController::class, 'create'])->name('privacy.new');
                Route::get('/manage', [PrivacyController::class, 'manage'])->name('privacy.manage');
                Route::get('/edit/{id}', [PrivacyController::class, 'edit'])->name('privacy.edit');
                Route::post('/update/{id}', [PrivacyController::class, 'update'])->name('privacy.update');
                Route::post('/delete/{id}', [PrivacyController::class, 'delete'])->name('privacy.delete');
            });
            Route::prefix('contact')->group(function () {
                Route::get('/add', [ContactUsController::class, 'index'])->name('cantact.add');
                Route::post('/new', [ContactUsController::class, 'create'])->name('cantact.new');
                Route::get('/manage', [ContactUsController::class, 'manage'])->name('cantact.manage');
                Route::get('/edit/{id}', [ContactUsController::class, 'edit'])->name('cantact.edit');
                Route::post('/update/{id}', [ContactUsController::class, 'update'])->name('cantact.update');
                Route::post('/delete/{id}', [ContactUsController::class, 'delete'])->name('cantact.delete');
            });
            Route::prefix('Blog')->group(function () {
                Route::get('/add', [BlogController::class, 'index'])->name('blog.add');
                Route::post('/new', [BlogController::class, 'create'])->name('blog.new');
                Route::get('/manage', [BlogController::class, 'manage'])->name('blog.manage');
                Route::get('/edit/{id}/{slug}', [BlogController::class, 'edit'])->name('blog.edit');
                Route::post('/update/{id}', [BlogController::class, 'update'])->name('blog.update');
                Route::post('/delete/{id}', [BlogController::class, 'delete'])->name('blog.delete');
            });
        });
    });

