<?php

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
use App\TheLoai;
use App\TinTuc;
use App\LoaiTin;
use App\User;
use App\Comment;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/lienhe', function () {
    return view('lienhe');
});
Route::get('/tkb', function () {
    return view('tkb');
});

Route::get('/tintuc', function () {
    return view('tintuc');
});
Route::get('/thu', function () {
	$theloai = TheLoai::find(1);
    foreach ($theloai->loaitin as $loaitin)
    {
    	echo $loaitin->Ten."</br>";
    }
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin'); 
Route::post('admin/dangnhap','UserController@postDangnhapAdmin'); 
Route::get('admin/logout','UserController@getDangXuatAdmin');    


Route::get('/tintucthu', function () {
    return view('admin.theloai.danhsach');
});

Route::group(['prefix'=>'admin','Middleware'=>'adminLogin'],function(){
    Route::group(['prefix'=>'theloai'],function (){
    	//admin/theloai/danhsach
    	Route::get('danhsach','TheLoaiController@getDanhSach');

    	Route::get('sua/{id}','TheLoaiController@getSua');
        Route::post('sua/{id}','TheLoaiController@postSua');

    	Route::get('them','TheLoaiController@getThem');
    	Route::post('them','TheLoaiController@postThem');

        Route::get('xoa/{id}','TheLoaiController@getXoa');
        


    });

    Route::group(['prefix'=>'loaitin'],function (){
    	//admin/theloai/danhsach
    	Route::get('danhsach','LoaiTinController@getDanhSach');


    	Route::get('sua/{id}','LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');


    	Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');

        Route::get('xoa/{id}','LoaiTinController@getXoa');


    });

    Route::group(['prefix'=>'tintuc'],function (){
    	//admin/theloai/danhsach
    	Route::get('danhsach','TinTucController@getDanhSach');

    	Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

    	Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('xoa/{id}','TinTucController@getXoa');


    });
    Route::group(['prefix'=>'ajax'],function (){
        //admin/theloai/danhsach
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');

        Route::get('sua','TinTucController@getSua');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');


    });
    Route::group(['prefix' => 'comment'],function(){
        Route::get('danhsach','CommentController@getDanhSach');

        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
    });

    Route::group(['prefix'=>'slide'],function (){
    	//admin/theloai/danhsach
    	Route::get('danhsach','SlideController@getDanhSach');

    	Route::get('sua','SlideController@getSua');

    	Route::get('them','SlideController@getThem');

    });
    Route::group(['prefix'=>'user'],function (){
    	//admin/theloai/danhsach
    	Route::get('danhsach','UserController@getDanhSach');

    	Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

    	Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('xoa/{id}','UserController@getXoa');

    });
});
