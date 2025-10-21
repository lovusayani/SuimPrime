<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ActorController extends Controller
{
    public function index()
    {
        $actors = Actor::latest()->paginate(10);

        // print_r($actors);
        return view('admin.actors.index', compact('actors'));
    }

    public function create()
    {
        return view('admin.actors.create');
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
        ]);

        DB::beginTransaction();

        try {
            // ✅ Create the actor record
            $actor = Actor::create([
                'name' => $request->name,
                'designation' => $request->designation,
                'dob' => $request->dob,
                'birth_place' => $request->birth_place,
                'bio' => $request->bio,
                'thumbnail' => $request->thumbnail, // ✅ maps hidden input
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Actor created successfully!',
                'actor_id' => $actor->id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error creating actor: '.$e->getMessage(),
            ], 500);
        }
    }

    public function edit(Actor $actor)
    {
        return view('admin.actors.edit', compact('actor'));
    }

    public function update(Request $request, Actor $actor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'thumbnail' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($actor->image) {
                Storage::disk('public')->delete($actor->image);
            }
            $data['thumbnail'] = $request->file('image')->store('actors', 'public');
        }

        $actor->update($data);

        return redirect()->route('admin.actors.index')->with('success', 'Actor updated successfully!');
    }

    public function destroy(Actor $actor)
    {
        if ($actor->image) {
            Storage::disk('public')->delete($actor->image);
        }
        $actor->delete();

        return response()->json(['success' => true, 'message' => 'Actor deleted successfully.']);
    }
}
