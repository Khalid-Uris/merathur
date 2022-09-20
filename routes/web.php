<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LocationImageController;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\ResturantImageController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Culture;
use Illuminate\Foundation\Auth\User;
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

Route::get('/', function () {
    return view('welcome');
});

#Route::view('master', 'merathar/master');

Route::get('city/index',[CityController::class,'index'])->name('city.index');

Route::post('city/store',[CityController::class,'store'])->name('city.store');

Route::get('city/show',[CityController::class,'show'])->name('city.show');

Route::get('city/edit/{id}',[CityController::class,'edit'])->name('city.edit');
Route::post('city/update/{id}',[CityController::class,'update'])->name('city.update');

Route::get('city/destroy/{id}',[CityController::class,'destroy'])->name('city.destroy');

#Location Route

Route::get('location/index',[LocationController::class,'index'])->name('location.index');

Route::post('location/store',[LocationController::class,'store'])->name('location.store');

Route::get('location/show',[LocationController::class,'show'])->name('location.show');

Route::get('location/edit/{id}',[LocationController::class,'edit'])->name('location.edit');
Route::post('location/update/{id}',[LocationController::class,'update'])->name('location.update');

Route::get('location/destroy/{id}',[LocationController::class,'destroy'])->name('location.destroy');

#Location Image Routes
Route::get('locationImage/index',[LocationImageController::class,'index'])->name('locationImage.index');
Route::post('locationImage/store',[LocationImageController::class,'store'])->name('locationImage.store');

Route::get('locationImage/show',[LocationImageController::class,'show'])->name('locationImage.show');

Route::get('locationImage/edit/{id}',[LocationImageController::class,'edit'])->name('locationImage.edit');
Route::post('locationImage/update/{id}',[LocationImageController::class,'update'])->name('locationImage.update');
Route::get('locationImage/destroy/{id}',[LocationImageController::class,'destroy'])->name('locationImage.destroy');

#Hotel Routes
Route::get('hotel/index',[HotelController::class,'index'])->name('hotel.index');
Route::post('hotel/store',[HotelController::class,'store'])->name('hotel.store');

Route::get('hotel/show',[HotelController::class,'show'])->name('hotel.show');

Route::get('hotel/edit/{id}',[HotelController::class,'edit'])->name('hotel.edit');
Route::post('hotel/update/{id}',[HotelController::class,'update'])->name('hotel.update');
Route::get('hotel/destroy/{id}',[HotelController::class,'destroy'])->name('hotel.destroy');

#Room Routes
Route::get('room/index',[RoomController::class,'index'])->name('room.index');
Route::post('room/store',[RoomController::class,'store'])->name('room.store');

Route::get('room/show',[RoomController::class,'show'])->name('room.show');

Route::get('room/edit/{id}',[RoomController::class,'edit'])->name('room.edit');
Route::post('room/update/{id}',[RoomController::class,'update'])->name('room.update');
Route::get('room/destroy/{id}',[RoomController::class,'destroy'])->name('room.destroy');

#Bus Routes
Route::get('bus/index',[BusController::class,'index'])->name('bus.index');
Route::post('bus/store',[BusController::class,'store'])->name('bus.store');

Route::get('bus/show',[BusController::class,'show'])->name('bus.show');

Route::get('bus/edit/{id}',[BusController::class,'edit'])->name('bus.edit');
Route::post('bus/update/{id}',[BusController::class,'update'])->name('bus.update');
Route::get('bus/destroy/{id}',[BusController::class,'destroy'])->name('bus.destroy');

#Car Routes
Route::get('car/index',[CarController::class,'index'])->name('car.index');
Route::post('car/store',[CarController::class,'store'])->name('car.store');

Route::get('car/show',[CarController::class,'show'])->name('car.show');

Route::get('car/edit/{id}',[CarController::class,'edit'])->name('car.edit');
Route::post('car/update/{id}',[CarController::class,'update'])->name('car.update');
Route::get('car/destroy/{id}',[CarController::class,'destroy'])->name('car.destroy');

#Resturant Routes
Route::get('resturant/index',[ResturantController::class,'index'])->name('resturant.index');
Route::post('resturant/store',[ResturantController::class,'store'])->name('resturant.store');

Route::get('resturant/show',[ResturantController::class,'show'])->name('resturant.show');

Route::get('resturant/edit/{id}',[ResturantController::class,'edit'])->name('resturant.edit');
Route::post('resturant/update/{id}',[ResturantController::class,'update'])->name('resturant.update');
Route::get('resturant/destroy/{id}',[ResturantController::class,'destroy'])->name('resturant.destroy');

#ResturantImage Routes
Route::get('resturantImage/index',[ResturantImageController::class,'index'])->name('resturantImage.index');
Route::post('resturantImage/store',[ResturantImageController::class,'store'])->name('resturantImage.store');

Route::get('resturantImage/show',[ResturantImageController::class,'show'])->name('resturantImage.show');

Route::get('resturantImage/edit/{id}',[ResturantImageController::class,'edit'])->name('resturantImage.edit');
Route::post('resturantImage/update/{id}',[ResturantImageController::class,'update'])->name('resturantImage.update');
Route::get('resturantImage/destroy/{id}',[ResturantImageController::class,'destroy'])->name('resturantImage.destroy');

#ResturantImage Routes
Route::get('culture/index',[CultureController::class,'index'])->name('culture.index');
Route::post('culture/store',[CultureController::class,'store'])->name('culture.store');

Route::get('culture/show',[CultureController::class,'show'])->name('culture.show');

Route::get('culture/edit/{id}',[CultureController::class,'edit'])->name('culture.edit');
Route::post('culture/update/{id}',[CultureController::class,'update'])->name('culture.update');
Route::get('culture/destroy/{id}',[CultureController::class,'destroy'])->name('culture.destroy');


Route::get('user/index',[UserController::class,'index'])->name('user.index');
