<?php

namespace App\Http\Services;

use Illuminate\Http\Request;

interface AuthorService
{
    public function getAuthors();

    public function addAuthor(Request $request);
}
