<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //imgur Auth
        //clientID = 3c5e090399fb9b5
        //clientSecret = 3dec61cd4ffd5ff37f97c58e36bb8fcfc3518d50
        //
        $photo = $request->user_avatar;
        // $request->toFile($photo);
        
        $user = User::insert($request->all());
    
        return response()->json($user, 201);
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
       $user->avatar_path = "avatar_path_up";

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
