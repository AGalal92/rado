<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\HomeController as UserHomeController;
use App\Http\Controllers\ProfileCtrl;
use App\Http\Controllers\servicesCtrl;
use App\Http\Controllers\SkillCategoryController;
use App\Http\Controllers\portfolioCategoryController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    /** Skills Categories CRUD routes */
    Route::get('/skills/categories', [SkillCategoryController::class, 'index'])->name('admin.skill.category.index');
    Route::get('/skills/category/create', [SkillCategoryController::class, 'create'])->name('admin.skill.category.create');
    Route::post('/skills/category/store', [SkillCategoryController::class, 'store'])->name('admin.skill.category.store');
    Route::delete('/skills/category/delete', [SkillCategoryController::class, 'delete'])->name('admin.skill.category.delete');
    Route::get('/skills/category/edit/{id}', [SkillCategoryController::class, 'edit'])->name('admin.skill.category.edit');
    Route::put('/skills/category/update', [SkillCategoryController::class, 'update'])->name('admin.skill.category.update');

    /** Skills CRUD routes */
    Route::get('/skills', [SkillsController::class, 'index'])->name('admin.skill.index');
    Route::get('/skills/create', [SkillsController::class, 'create'])->name('admin.skill.create');
    Route::post('/skills/store', [SkillsController::class, 'store'])->name('admin.skill.store');
    Route::delete('/skills/delete', [SkillsController::class, 'delete'])->name('admin.skill.delete');
    Route::get('/skills/edit/{id}', [SkillsController::class, 'edit'])->name('admin.skill.edit');
    Route::put('/skills/update', [SkillsController::class, 'update'])->name('admin.skill.update');

    /** Porftolio Categories CRUD routes */
    Route::get('/portfolio/categories', [portfolioCategoryController::class, 'index'])->name('admin.portfolio.category.index');
    Route::get('/portfolio/category/create', [portfolioCategoryController::class, 'create'])->name('admin.portfolio.category.create');
    Route::post('/portfolio/category/store', [portfolioCategoryController::class, 'store'])->name('admin.portfolio.category.store');
    Route::delete('/portfolio/category/delete', [portfolioCategoryController::class, 'delete'])->name('admin.portfolio.category.delete');
    Route::get('/portfolio/category/edit/{id}', [portfolioCategoryController::class, 'edit'])->name('admin.portfolio.category.edit');
    Route::put('/portfolio/category/update', [portfolioCategoryController::class, 'update'])->name('admin.portfolio.category.update');

    /** Porftolio  CRUD routes */
    Route::get('/portfolio', [portfolioController::class, 'index'])->name('admin.portfolio.index');
    Route::get('/portfolio/create', [portfolioController::class, 'create'])->name('admin.portfolio.create');
    Route::post('/portfolio/store', [portfolioController::class, 'store'])->name('admin.portfolio.store');
    Route::delete('/portfolio/delete', [portfolioController::class, 'delete'])->name('admin.portfolio.delete');
    Route::get('/portfolio/edit/{id}', [portfolioController::class, 'edit'])->name('admin.portfolio.edit');
    Route::put('/portfolio/update', [portfolioController::class, 'update'])->name('admin.portfolio.update');

    /** About CRUD routes */
    Route::get('/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about/update', [AboutController::class, 'update'])->name('admin.about.update');

    /** Users CRUD routes */
    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::delete('/users/delete', [UsersController::class, 'delete'])->name('admin.users.delete');
    Route::get('/users/edit{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('/users/update', [UsersController::class, 'update'])->name('admin.users.update');

    /** profile routes */
    route::get('/profile/edit',[ProfileCtrl::class,'edit'])->name('admin.profile.edit');
    route::post('/profile/update',[ProfileCtrl::class,'update'])->name('admin.profile.update');

    /** services CRUD routes */
    Route::get('/services', [servicesCtrl::class, 'index'])->name('admin.service.index');
    Route::get('/services/create', [servicesCtrl::class, 'create'])->name('admin.service.create');
    Route::post('/services/store', [servicesCtrl::class, 'store'])->name('admin.service.store');
    Route::delete('/services/delete', [servicesCtrl::class, 'delete'])->name('admin.service.delete');
    Route::get('/services/edit/{id}', [servicesCtrl::class, 'edit'])->name('admin.service.edit');
    Route::post('/services/update', [servicesCtrl::class, 'update'])->name('admin.service.update');

    /** Students CRUD routes */
    Route::get('/students', [StudentController::class, 'index'])->name('admin.student.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('admin.student.create');
    Route::post('/students/store', [StudentController::class, 'store'])->name('admin.student.store');
    Route::delete('/students/delete', [StudentController::class, 'delete'])->name('admin.student.delete');
    Route::get('/students/edit/{id}', [StudentController::class, 'edit'])->name('admin.student.edit');
    Route::put('/students/update', [StudentController::class, 'update'])->name('admin.student.update');
    Route::get('/students/invoice', [StudentController::class, 'invoice'])->name('admin.student.invoice');

     /** Teachers CRUD routes */
     Route::get('/teachers', [TeacherController::class, 'index'])->name('admin.teacher.index');
     Route::get('/teachers/create', [TeacherController::class, 'create'])->name('admin.teacher.create');
     Route::post('/teachers/store', [TeacherController::class, 'store'])->name('admin.teacher.store');
     Route::delete('/teachers/delete', [TeacherController::class, 'delete'])->name('admin.teacher.delete');
     Route::get('/teachers/edit/{id}', [TeacherController::class, 'edit'])->name('admin.teacher.edit');
     Route::put('/teachers/update', [TeacherController::class, 'update'])->name('admin.teacher.update');


});

Route::get('/', [UserHomeController::class, 'index']);
