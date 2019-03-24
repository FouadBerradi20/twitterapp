<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tweet;
use App\Groupe;

class TweetController extends Controller
{
    //


    public  function recherchertweet()
    {

        return view('searchtweet');



    } // page permet de recherche un tweet par keywords
    public function store(Request $request) {



        foreach ($request->input('groupe') as $key=> $tab) {
            $selected_row = $request->input('groupe')[$key];
            $tweet = new Tweet();
            $tweet->idtwitter=$request->input('id')[$selected_row];
            $tweet->text=$request->input('text')[$selected_row];
            $tweet->screenname=$request->input('screen_name')[$selected_row];
            $tweet->retweet_count=$request->input('retweet_count')[$selected_row];
            $tweet->groupe_id=$request->input('groupes');

            $tweet->save();

        }
        return back();
    } // enregister un profil dans la base de donnee
    public function  findbyid($id)

    {
        $data = Tweet:: where('groupe_id', '=', $id)->get();


        return view('Tweetpargroupe',compact('data'));


    }   // rechercher un tweet par son id

    public function __construct()
    {
        $this->middleware('auth');
    }

}
