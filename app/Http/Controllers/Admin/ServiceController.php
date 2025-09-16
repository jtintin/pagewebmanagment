<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    //we must obtain id category to obtain all services according to category selected
    public function index()
    {
        $categoryId=session('category_id');
        $services = Service::with('category')
        ->where('category_id',$categoryId)->get();
        return view('admin.service.index', compact('services'));
    }   
    public function create()
    {
    $categories = Category::all();
    return view('admin.service.create', compact('categories'));
    }
    public function store(Request $request)
    {
        //first valdated data send by form
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160'
        ]);                  
        //for validate field category_id, we use session variable
        $categoryId=session('category_id');
        $validated['category_id']=$categoryId;
        //if image is uploaded, we must save in public storage and get url
        if($request->hasFile('image_url')){
            $path = $request->file('image_url')->store('services','public');
            $validated['image_url'] = '/storage/'.$path;
        }
        //save service in database
        Service::create($validated);
        return redirect()->route('admin.service.index')->with('success','Servicio creado con exito');
    }
    public function show($id)
    {
        //
    }
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.service.edit', compact('service','categories'));
    }
    public function update(Request $request, Service $service)  
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_id' => 'required|exists:categories,id',
            'meta_title' => 'nullable|string|max:70',
            'meta_description' => 'nullable|string|max:160'
        ]);                  
        //if image is uploaded, we must save in public storage and get url
        if($request->hasFile('image_url')){
            //delete old image
            if($service->image_url){
                $oldPath = str_replace('/storage/', '', $service->image_url);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image_url')->store('services','public');
            $validated['image_url'] = '/storage/'.$path;
        }
        //update service in database
        $service->update($validated);
        return redirect()->route('admin.service.index')->with('success','Servicio actualizado con exito');
    }
    public function destroy(Service $service)
    {
        //delete image from storage
        if($service->image_url){
            $oldPath = str_replace('/storage/', '', $service->image_url);
            Storage::disk('public')->delete($oldPath);
        }
        $service->delete();
        return redirect()->route('admin.service.index')->with('success','Servicio eliminado con exito');
    }
}
