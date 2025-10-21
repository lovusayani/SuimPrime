<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DirectorController extends Controller
{
    public function index()
    {
        $directors = Director::latest()->paginate(10);

        return view('admin.directors.index', compact('directors'));
    }

    public function create()
    {
        return view('admin.directors.create');
    }

    public function store(Request $request)
    {
        // ✅ Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'bio' => 'required|string',
            'thumbnail' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        DB::beginTransaction();

        try {
            // ✅ Create the director record
            $director = Director::create([
                'name' => $request->name,
                'slug' => $request->slug ?? Str::slug($request->name),
                'designation' => $request->designation,
                'dob' => $request->dob,
                'birth_place' => $request->birth_place,
                'bio' => $request->bio,
                'thumbnail' => $request->thumbnail, // maps hidden input
                'status' => $request->status ?? 1,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Director created successfully!',
                'director_id' => $director->id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error creating director: '.$e->getMessage(),
            ], 500);
        }
    }

    public function edit(Director $director)
    {
        return view('admin.directors.edit', compact('director'));
    }

    public function update(Request $request, Director $director)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:directors,slug,'.$director->id,
            'designation' => 'nullable|string|max:255',
            'dob' => 'nullable|date',
            'birth_place' => 'nullable|string|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['name']);
        $director->update($data);

        return redirect()->route('directors.index')->with('success', 'Director updated successfully.');
    }

    public function destroy(Director $director)
    {
        $director->delete();

        return redirect()->route('directors.index')->with('success', 'Director deleted successfully.');
    }
}
