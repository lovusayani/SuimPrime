<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Media;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::latest()->paginate(10);
        $media = Media::all(); // Fetch media for modal

        return view('admin.genres.index', compact('genres', 'media'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $media = Media::all();

        return view('admin.genres.create', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        Genre::create([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('admin.genres.index')->with('success', 'Genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        $media = Media::all();

        return view('admin.genres.edit', compact('genre', 'media'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        // Find the genre by ID
        $genre = Genre::findOrFail($id);

        $genre->update([
            'name' => $request->name,
            'description' => $request->description,
            'thumbnail' => $request->thumbnail,
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.genres.index')
            ->with('success', 'Genre updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        try {
            $genre->delete();

            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'Genre deleted successfully.']);
            }

            return redirect()
                ->route('admin.genres.index')
                ->with('success', 'Genre deleted successfully.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['success' => false, 'message' => 'Failed to delete genre.'], 500);
            }

            return redirect()
                ->route('admin.genres.index')
                ->with('error', 'Failed to delete genre.');
        }
    }
}
