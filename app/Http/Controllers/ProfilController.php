<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profil;
use App\Groupe;
use Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function store(Request $request) {


     	foreach ($request->input('groupe') as $key=> $tab) {
     		$selected_row = $request->input('groupe')[$key];
	     	$profil = new Profil();
	     	$profil->idprofil=$request->input('id')[$selected_row];
	     	$profil->name=$request->input('name')[$selected_row];
	     	$profil->description=$request->input('description')[$selected_row];
	       	$profil->groupe_id=$request->input('groupes');
	     	$profil->save();

		}
		return back();

    	
    } // enregister un profil dans la base de donnee
     public function  findbyid($id)

    {      
            $data = Profil:: where('groupe_id', '=', $id)->get();

            
        return view('profilpargroupe',compact('data'));


    }   // rechercher un profil par son id
     public  function rechercherprofil()
    {

        return view('searchprofil');



    }  // page web permet de recherche un profil



}
