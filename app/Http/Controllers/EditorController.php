<?php

namespace App\Http\Controllers;

use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $editors = Editor::where('name', 'like', '%' . $request->search . '%')
            ->get();

        if ($request->ajax()) {
            return view('editors.partials.editors-list', compact('editors'));
        }

        return view('editors.index', compact('editors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:authors,name|max:255|regex:/^[\pL\s]+$/u'
        ]);

        $newEditor = new Editor();
        $newEditor->name = $validatedData['name'];
        $newEditor->save();

        return redirect()->route('editors.show', compact('newEditor'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Editor $editor)
    {
        return view('editors.show', compact('editor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editor $editor)
    {
        return view('editors.edit', compact('editor'));
        
    }
        
        /**
         * Update the specified resource in storage.
        */
    public function update(Request $request, Editor $editor)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:authors,name|max:255|regex:/^[\pL\s]+$/u'
        ]);
    
        $editor->name = $validatedData['name'];
        $editor->update();
    
        return redirect()->route('editors.show', compact('editor'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editor $editor)
    {
        $editor->delete();

        return redirect()->route('editors.index');
    }
}
