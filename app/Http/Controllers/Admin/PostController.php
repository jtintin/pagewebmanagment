<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }   
    public function create()
    {
    $categories = Category::all();
    return view('admin.post.create', compact('categories'));
    }
    public function store(Request $request)
    {
        //first valdated data send by form
        $validated = $request->validate([
            'title' => 'required|string|max:190',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
            'published_at' => 'nullable|date'
        ]);                  
        //if image is uploaded, we must save in public storage and get url
        if($request->hasFile('image_url')){
            $path = $request->file('image_url')->store('post','public');
            $validated['image_url'] = '/storage/'.$path;
        }
        //assiging autor post
    $validated['user_id'] = Auth::id();
        //save post in database
        Post::create($validated);
        return redirect()->route('admin.post.index')->with('success','Post creado con exito');
    }
    public function show($id)
    {
        //
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories'));
    }
    public function update(Request $request, Post $post)  
    {
        $validated = $request->validate([
            'title' => 'required|string|max:190',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160',
        ]);
        // Always set user_id to the authenticated user
        $validated['user_id'] = Auth::id();
        //if image is uploaded, we must save in public storage and get url
        if($request->hasFile('image_url')){
            //delete old image
            if($post->image_url){
                $oldPath = str_replace('/storage/', '', $post->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image_url')->store('post','public');
            $validated['image_url'] = '/storage/'.$path;
        }
        //update Post in database
        $post->update($validated);
        return redirect()->route('admin.post.index')->with('success','Post actualizado con exito');
    }
    public function destroy(Post $post)
    {
        //delete image from storage
        if($post->image_url){
            $oldPath = str_replace('/storage/', '', $post->image_url);
            Storage::disk('public')->delete($oldPath);
        }
        $post->delete();
        return redirect()->route('admin.post.index')->with('success','Post eliminado con exito');
    }
    
}
