<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function index() {
        $editors = Editor::orderBy('name')->get();

        return response()->json([
            'success'=>true,
            'data'=> $editors
        ]);
    }
}
