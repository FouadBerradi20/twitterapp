<?php

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');


Route::get('/accueil', function () {
    return view('accueil');
})->middleware('auth');


// Profils
Route::get('/profil','TwitterController@createprofil');// creer Un profil
Route::post('/followprofile','TwitterController@followprofile');// follow un profile

Route::post('profiles','ProfilController@store');      // enregister un profil sur la base de donnee
Route::get('/profilpar/{id}/groupe','ProfilController@findbyid');   //rechercher un profil par son id
Route::get('/rechercherprofil','ProfilController@rechercherprofil');   // cette route permet de faire le recherche des profils
Route::get('/searchprofil', ['uses' => 'TwitterController@searchprofil', 'as' => 'searchprofil']);  // recherche d'un profil
Route::post('sendmessage',['uses' => 'TwitterController@sendmessage', 'as' => 'sendmsg']);  // cette fonction permet d'envoyer un msg au plusieur s profils

// tweet
Route::post('retweettweet',['uses' => 'TwitterController@retweettweet', 'as' => 'retweettweet']);
Route::get('/retweettweet','TwitterController@retweettweet');// follow un profile
Route::get('mytweets', 'TwitterController@mytweets');
Route::get('scheduletweets', 'TwitterController@scheduletweets');
Route::get('/createtweet','TwitterController@createtweet'); // Ajouter un tweet au profil du user connecte
Route::post('tweets','TweetController@store'); // poster un tweet sur le profil connecte
Route::get('/search', ['uses' => 'TwitterController@searchtweetbykewords', 'as' => 'search']); // recherches des tweets par des keywords
Route::get('/tweetpar/{id}/groupe','TweetController@findbyid');   //rechercher un tweet par son id
Route::get('/getUsers', 'TwitterController@getUsers');  // les informations d'un user
Route::get('/infostweets', 'TwitterController@infostweets'); // des informations des tweets de user connecte
Route::post('/tweet', ['as'=>'post.tweet','uses'=>'TwitterController@tweet']); //  connue
Route::get('/recherchertweet','TweetController@recherchertweet'); // cette route permet de faire le recherche des tweets par keywords
Route::get('/searchtweet', ['uses' => 'TwitterController@searchtweetbykewords', 'as' => 'searchtweet']);  // recherche d'un tweet
Route::post('/twitterUserTimeLine', ['as'=>'post.message','uses'=>'TwitterController@twitterUserTimeLine']); //des informations des tweets de user connecte avec post
// send message
Route::get('/message','TwitterController@createmessage'); //  remplir le formulaire de msg envpyer le profil les message
Route::post('/sendmessageuser', ['as'=>'post.sendmessageuser','uses'=>'TwitterController@sendmessageuser']); //  envoyer le message au plusieurs users
//Route::post('/sendmessagetweet', ['as'=>'post.sendmessagetweet','uses'=>'TwitterController@sendmessagetweet']); //  envoyer le message au plusieurs tweets
Route::post('sendmessagetweets',['uses' => 'TwitterController@sendmessagetweets', 'as' => 'sendmessagetweets']);  // cette fonction permet d'envoyer un msg au plusieur s tweets


//location
Route::get('/location','TwitterController@createlocation'); // page permet de recherche une place
Route::get('/searchlocation', ['uses' => 'TwitterController@twitterUserTimeLine4', 'as' => 'searchlocation']); // rechercher une place
// groupes
Route::get('creategroupe','GroupeController@create'); // permet de creer un groupe
Route::post('groupes','GroupeController@store'); // permet d'enregistrer un groupe
Route::get('listegroupe','GroupeController@index'); // permet de lister les groupes de la base de donnes

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
