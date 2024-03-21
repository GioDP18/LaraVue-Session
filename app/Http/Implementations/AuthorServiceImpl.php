<?php

namespace App\Http\Implementations;


use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;

Class AuthorServiceImpl implements AuthorService
{
    public function getAuthors(){
        $result = Author::all();

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal server error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "authors fetched.",
            "data" => $result
        ], 200);
    }

    public function addAuthor(Request $request){
        $result = Author::create([
            'name' => $request->name
        ]);

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal server error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Author added successfully.",
            "data" => $result
        ], 200);
    }
}
