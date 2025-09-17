<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit(Profile $profile)
    {
           return view('admin.profile.edit', compact('profile'));
    }
    public function update(Request $request, Profile $profile)
    {
        //validate fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'video_url' => 'nullable|url|max:255',
            'map_embed' => 'nullable|string'    
        ]);
        //verify if logo is uploaded    
        if($request->hasFile('logo')){
            //delete old logo
            if($profile->logo){
                $oldLogoPath = str_replace('/storage/', '', $profile->logo);
                Storage::disk('public')->delete($oldLogoPath);
            }
            //store new logo
            $path = $request->file('logo')->store('profile','public');
            $validated['logo'] = '/storage/'.$path;
        }
        //update profile
        $profile->update($validated);
        return redirect()->route('admin.profile.edit', $profile->id)->with('success','Perfil actualizado con exito');
    }
}
