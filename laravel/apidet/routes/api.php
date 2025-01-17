<?php

use Illuminate\Http\Request;
use App\Contact;
use App\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/contacts', 'ContactController@index');
// Route::post('/contacts', 'ContactController@store');
// Route::resource('contacts', 'ContactController');

                    // FIRST METHOD

// Route::get('articles', function () {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return Article::all();
// });

// Route::get('articles/{id}', function ($id) {
//     return Article::find($id);
// });

// Route::post('articles', function (Request $request) {
//     return Article::create($request->all);
// });

// Route::put('articles/{id}', function (Request $request, $id) {
//     $article = Article::findOrFail($id);
//     $article->update($request->all());

//     return $article;
// });

// Route::delete('articles/{id}', function ($id) {
//     Article::find($id)->delete();

//     return 204;
// });




                    // SECOND METHOD

// Route::get('articles', 'ArticleController@index');
// Route::get('articles/{id}', 'ArticleController@show');
// Route::post('articles', 'ArticleController@store');
// Route::put('articles/{id}', 'ArticleController@update');
// Route::delete('articles/{id}', 'ArticleController@delete');




                        //THIRD METHOD

Route::get('articles', 'ArticleController@index');
Route::get('articles/{article}', 'ArticleController@show');
Route::post('articles', 'ArticleController@store');
Route::put('articles/{article}', 'ArticleController@update');
Route::delete('articles/{article}', 'ArticleController@delete');


                        //MIXED METHOD

Route::get('contacts', 'ContactController@index');
Route::get('contacts/{contact}', 'ContactController@show');
Route::post('contacts', 'ContactController@stored');
Route::delete('contacts/{id}', 'ContactController@destroy');
Route::put('contacts/{id}', 'ContactController@update');