<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('categories.index');
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
                'user_id' => 'required',
                'name' => 'required|string'
            ]);

            Category::create($data);

            return redirect('/category')->with('success', 'data created successfully');
        } catch (\Exception $th) {
            return back()->with($th->getMessage());
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
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
