<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $category = Category::with(['user'])->get();
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        return view('categories.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $data = $request->validate([
                'name' => 'required|string'
            ]);

            $data['user_id'] = Auth::id();
            Category::create($data);

            return redirect('/category')->with('success', 'data created successfully');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //
        try {
            $category = Category::findOrFail($id);
            return view('categories.edit', compact("category"));                    
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        //
        try {
            $data = $request->validate([
                'name' => 'required|string'
            ]);

            $category = Category::findOrFail($id);

            $category->update($data);

            return redirect('/category')->with('success', 'data updated successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        try {
            Category::findOrFail($id)->delete();
            return redirect('/category')->with('success', 'data created successfully');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}
