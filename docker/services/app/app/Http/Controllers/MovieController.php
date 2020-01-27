<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movies;

class MovieController extends Controller
{
    //
    public function index()
    {
        return Movies::all();
    }
 
    // public function show($id)
    // {
    //     return Movies::find($id);
    // }

    public function show(Movies $movie)
    {
        return $movie;
    }

    public function searchByName(Request $request)
    {
        return Movie::whereLike('original_title', $request->param)->get();
    }


    public function store(Request $request)
    {
        $Movies = Movies::create($request->all());

        return response()->json($Movies, 201);
    }

    

    public function delete(Movies $Movies)
    {
        $Movies->delete();

        return response()->json(null, 204);
    }
}


