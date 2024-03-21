<?php

namespace App\Http\Implementations;


use App\Http\Services\BookService;
use App\Models\Book;
use Illuminate\Http\Request;

Class BookServiceImpl implements BookService
{
    public function getBooks(){
        $result = Book::with('author')->get();

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal server error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Books fetched.",
            "data" => $result
        ], 200);
    }

    public function addBook(Request $request){
        $result = Book::create([
            'title' => $request->title,
            'author_id' => $request->author_id
        ]);

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal server error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Book added successfully.",
            "data" => $result
        ], 200);
    }

    public function updateBook($id, Request $request){
        $result = Book::where('id', $id)->update([
            'title' => $request->title,
        ]);

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal server error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Book updated successfully.",
            "data" => $result
        ], 200);
    }

    public function deleteBook($id){
        $result = Book::find($id)->delete();

        if(!$result){
            return response()->json([
                "success" => false,
                "message" => "Internal server error.",
            ], 500);
        }

        return response()->json([
            "success" => true,
            "message" => "Book deleted successfully.",
            "data" => $result
        ], 200);
    }
}
