<?php

namespace App\Http\Controllers;

use App\Http\Services\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(public BookService $bookService){

    }

    public function getBooks(){
        return $this->bookService->getBooks();
    }

    public function addBook(Request $request){
        return $this->bookService->addBook($request);
    }

    public function updateBook($id, Request $request){
        return $this->bookService->updateBook($id, $request);
    }

    public function deleteBook($id){
        return $this->bookService->deleteBook($id);
    }
}
