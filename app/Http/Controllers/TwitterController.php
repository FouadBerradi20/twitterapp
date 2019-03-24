<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Groupe;
use File;
use Twitter;


class TwitterController extends Controller
{
    // profil
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createprofil() {





   return view('profil');
 }  // creer Un profil
    public function searchprofil(Request $request)

    {



        $searchprofil=$request->input('searchprofil');

        $data = Twitter::getUsersSearch(['q'=>$searchprofil,'count' => 10, 'format' => 'array']);
        $datas=Groupe::pluck('titre','id');


        return view('searchprofil',compact('data','datas'));



    }  // recherche d'un profil
    public function sendmessage(Request $request)
    {



        foreach ($request->input('Profil') as $key=> $value)


        {


            $idprofil = $request->input('Profil')[$key];


            //$idprofil=$request->input('Profil')[$selected_row];

            $message=$request->input('message');

            $data = Twitter::postDm(['user_id'=>$idprofil,'text'=>$message,'count' => 10, 'format' => 'array']);





        }


        return back();
    }  // page web permet de recherche un profil
    public function followprofile(Request $request)
    {     

        $profile=$request->input('sc');
        dd($profile);


        $data = Twitter::postFollow(['screen_name'=>$profile,'count' => 10, 'format' => 'array']);


        return back();


        return view('profile',compact('data'));

    }   
    //  follow un user
    //location
     public function createlocation() {

   return view('twitterlocation',compact('data'));
 } // page permet de recherche une place
     public function twitterUserTimeLine4(Request $request)

    {
        $me=$request->input('query');

        $data = Twitter::getGeoSearch(['count' => 10,'query'=>$me ,'format' => 'array']);

        $data=$data['result'];
        $data=$data['places'];


        return view('twitterlocation',compact('data'));



    }  // recherche une place
    // send message aux profils
    public function createmessage() {

   return view('twitterlogin',compact('data'));
 }  //  remplir le formulaire de msg envpyer le profil les message
    public function sendmessageuser(Request $request)




    {     $pro=$request->input('profil');
        $mess=$request->input('message');

        $data = Twitter::postDm(['screen_name'=>$pro,'text'=>$mess,'count' => 10, 'format' => 'array']);


        return back();


        return view('twitterlogin',compact('data'));

    }   //  envoyer le message au plusieurs users
    public function sendmessagetweet(Request $request)




    {     $pro=$request->input('profil');
        $mess=$request->input('message');

        $data = Twitter::postDm(['screen_name'=>$pro,'text'=>$mess,'count' => 10, 'format' => 'array']);


        return back();


        return view('twitterlogin',compact('data'));

    }   //  envoyer le message au plusieurs users
    public function sendmessagetweets(Request $request)
    {
        foreach ($request->input('Tweet') as $key=> $value)

        {
            $idtwitter = $request->input('Tweet');
            $screen_name = $request->input('screen_name');
            $message=$request->input('message');
            //$idprofil=$request->input('Profil')[$selected_row];

            $msg='@'.$screen_name.''.$message;
            dd($msg,$idtwitter);

            $messagecomplet='@'.$screen_name.' '.$message;
            dd($idtwitter,$messagecomplet);
            $post = Twitter::postTweet(['status'=>$messagecomplet,'in_reply_to_status_id'=>$idtwitter]);
        }

        return back();
    }  // page web permet de recherche un profil
    //tweets
    public function retweettweet(Request $request)




    {     $profile=$request->input('retweetteweet');

        dd($retweetteweet);
        $data = Twitter::postFollow(['screen_name'=>$retweetteweet,'count' => 10, 'format' => 'array']);


        return back();


        return view('tweet',compact('data'));

    }   //  retweet
    public function mytweets()
    {
        $data = Twitter::getUserTimeline(['count' => 200, 'format' => 'array']);
        return view('mytweets',compact('data'));
    }



    public function scheduletweets()
    {
        $data = Twitter::getUserTimeline(['count' => 200, 'format' => 'array']);
        return view('scheduletweets',compact('data'));
    }



    public function createtweet() {

        return view('twitter',compact('data'));
    }  // // Ajouter un tweet au profil du user connecte
    public function tweet(Request $request)

    {

        $this->validate($request, [

            'tweet' => 'required'

        ]);





$url=$request->urlvideo;
$newTwitte = ['status' => $request->tweet. " " .$url];



        
      
 




        if(!empty($request->images)){

            foreach ($request->images as $key => $value) {

                $uploaded_media = Twitter::uploadMedia(['media' => File::get($value->getRealPath())]);

                if(!empty($uploaded_media)){

                    $newTwitte['media_ids'][$uploaded_media->media_id_string] = $uploaded_media->media_id_string;

                }

            }

        }




        $twitter = Twitter::postTweet($newTwitte);




        return back();

    }  //  posttweet
    public function searchtweetbykewords(Request $request)

    {
        $searchtweet=$request->input('searchtweet');
        $data = Twitter::getSearch(['q'=>$searchtweet,'count' => 10, 'format' => 'array']);


        $data=$data['statuses'];

        $datas=Groupe::pluck('titre','id');
        return view('searchtweet',compact('data','datas'));
    } // recherches des tweets par des keywords
    public function getUsers()

    {

        $data = Twitter::getUsers(['user_id'=>'19210695','count' => 10, 'format' => 'array']);

        return view('twitter',compact('data'));



    } // les informations d'un user
    public function infostweets()

    {

        $data = Twitter::getUserTimeline(['count' => 10, 'format' => 'array']);

        return view('twitterlogin',compact('data'));

    } // des informations des tweets de user connecte
}