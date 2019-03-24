<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Groupe;
use App\Profil;

use Auth;



class GroupeController extends Controller
{
    //



         public function create() {
    
return view('cv.creategroupe');
    	
    } // permet de creer un groupe
         public function index() {

     $data=Groupe::all();



        return view('groupe',compact('data'));

    } // afficher tous les groupes de la base de donnes
         public function store(Request $request) {
     	$groupe = new Groupe();
     	$groupe->titre=$request->input('titre');
  	$groupe->description=$request->input('description');


  	$groupe->save();
    session()->flash('success','Le Groupe à été Bien Enregisté !! ');
  	return redirect('/listegroupe');


    	
    } // enregistrer un groupe dans la base de donnee
         public function  findbyid($id)

    {       $data = groupe():: where('groupe_id', '=', $id)->get()->profils;
    dd($data);
            $data = Profil:: where('groupe_id', '=', $id)->get();

            
        return view('profilpargroupe',compact('data'));


    }

    public function __construct()
    {
        $this->middleware('auth');
    }





}
