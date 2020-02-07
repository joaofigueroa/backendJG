<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movies;

class MovieController extends Controller
{
    //returns all movies
    public function index()
    {
        return Movies::all();
    }
    
    public function show(Movies $movie)
    {
        return $movie;
    }

    //finds movies by its name
    public function searchByName(Request $request)
    {
        return Movies::whereLike('title', $request->param)->get();
        
    }

    //function not being used hehee
    public function store(Request $request)
    {
        $Movies = Movies::create($request->all());

        return response()->json($Movies, 201);
    }

    
    //function not being used hehee
    public function delete(Movies $Movies)
    {
        $Movies->delete();

        return response()->json(null, 204);
    }
}


