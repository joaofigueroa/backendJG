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
    public function create()
    {
        $Users = User::create($request->all());
    }

    public function store(Request $request)
    {
        $user = User::insert($request->all());
        return response()->json($user, 201);
        
    }

    public function findUser($id){

        return  User ::where('id',$id)->get();

    }



    public function verifyEmail(Request $request)
    {
        return User::where('email', $request->param)->get();
        
    }
    
    public function update($id,Request $request)
    {
        $user = User :: findOrFail($id);

       $user->email = $request->email;
       $user->password = $request->password;
       $user->avatar_path = $request->user_avatar;

        $user->save();
        return $user;

    }

   
    public function destroy($id)
    {
        $user = User :: findOrFail($id);
        $user->movies()->detach();
        $user->delete();
    }

    public function favorites(Request $request){

        return User::find($request->param)->movies()->get();
    }

    public function newFavorite(Request $request){

         $movie = Movies::find($request->movie_id);
         $movie->users()->attach($request->user_id);
        //return User::find($request->param)->movies()->get();  
    }

    public function unFavorite(Request $request){

        $movie = Movies::find($request->movie_id);
        $movie->users()->detach($request->user_id);
       //return User::find($request->param)->movies()->get();
   }


}
