<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\User;
use App\Movies;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //create new user
    public function store(Request $request)
    {
        $user = User::insert($request->all());
        return response()->json($user, 201);
        
    }

    
    public function findUser($id){

        return  User ::where('id',$id)->get();

    }

    //function that uploads image to an external server an gets its URL as a response
    public function UploadUserAvatar(Request $request){
        
        $client = new Client();

        $response = $client->post('https://api.imgbb.com/1/upload?key=37a88e50a894156c615b2baffe7db973',[  
          'headers' => [                
                'content-type' => 'application/x-www-form-urlencoded',
            ],            
         'form_params' =>[
             
              'image'=> base64_encode(file_get_contents($request->file('image')->path())),
              //'filename' => end(explode('/', $file))
          ] 
         ]);

        //return $response;
        $response_json = json_decode($response->getBody()->getContents());
        $imageUrl= $response_json->data->url;

        // foreach($response_json as $response_final){
        //     $url = $response_final;
        // }
        
        return response()->json($imageUrl, 200);

    }



    //function to verify if an email exists
    public function verifyEmail(Request $request)
    {
        return User::where('email', $request->param)->get();
        
    }
    

    //update the user's infos 
    public function update($id,Request $request)
    {
        $user = User :: findOrFail($id);

       $user->email = $request->email;
       $user->password = $request->password;
       $user->avatar_path = $request->user_avatar;

        $user->save();
        return $user;

    }

   //delete the user
    public function destroy($id)
    {
        $user = User :: findOrFail($id);
        $user->movies()->detach();
        $user->delete();
    }

    //find all favorites from an user
    public function favorites(Request $request){

        return User::find($request->param)->movies()->get();
    }

    //add new favorite to an user
    public function newFavorite(Request $request){

         $movie = Movies::find($request->movie_id);
         $movie->users()->attach($request->user_id);
        //return User::find($request->param)->movies()->get();  
    }

    //remove a favorite
    public function unFavorite(Request $request){

        $movie = Movies::find($request->movie_id);
        $movie->users()->detach($request->user_id);
       //return User::find($request->param)->movies()->get();
   }


}
