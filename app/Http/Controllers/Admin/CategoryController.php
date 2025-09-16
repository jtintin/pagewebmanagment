<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
Use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //show view categories
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }
    //show form create category
    public function create()
    {
        return view('admin.category.create');
    }
    //store category in database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160'
        ]);
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Categoria creada con exito');
    }
    //show form edit category    
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }
    //update category in database   
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160'
        ]);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description
        ]);
        return redirect()->route('admin.category.index')->with('success', 'Categoria actualizada con exito');
    }
    //delete category in database
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', 'Categoria eliminada con exito');
    }   
    //show all category services, create session and redirect to services index
    public function show(Category $category)
    {
        //create session
     \Session::put('category_id', $category->id);
     return  redirect('admin/service');
    }

}   
