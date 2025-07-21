<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerHomeImages;
use Illuminate\Support\Facades\Auth;

class CustomerHomeImagesController extends Controller
{
    public function index()
    {
        $images = CustomerHomeImages::latest()->get();
        return view("admin.customer-home-images.index", compact('images'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|max:255',
        ]);

        try {
            CustomerHomeImages::create([
                'url' => $validated['url'],
                'created_by' => Auth::user()->name,
            ]);

            return redirect()->back()->with('success', 'Image added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add image. Please try again.');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'url' => 'required|url|max:255',
        ]);

        $image = CustomerHomeImages::findOrFail($request->id);
        $image->update([
            'url' => $request->url,
            'created_by' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Image updated successfully.');
    }

    public function destroy($id)
    {
        $image = CustomerHomeImages::findOrFail($id);

        try {
            $image->delete();
            return redirect()->back()->with('success', 'Image deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete image.');
        }
    }
}
