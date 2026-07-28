<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::orderBy('name');

        return response()->json([
            'success' => true,
            'data' => $authors
        ], 200);
    }
}
