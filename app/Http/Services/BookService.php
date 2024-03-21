<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface BookService
{
    public function getBooks();

    public function addBook(Request $request);

    public function updateBook($id, Request $request);

    public function deleteBook($id);
}
