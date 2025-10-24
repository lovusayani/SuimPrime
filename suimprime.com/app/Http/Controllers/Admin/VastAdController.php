<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VastAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VastAdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = VastAd::query();

            // Apply filters
            if ($request->filled('name')) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }

            if ($request->filled('type')) {
                $query->where('type', $request->type);
            }

            if ($request->filled('target_type')) {
                $query->where('target_type', $request->target_type);
            }

            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            // Search
            if ($request->filled('search')) {
                $search = $request->search;
                $query->where(function($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('type', 'like', '%' . $search . '%')
                      ->orWhere('target_type', 'like', '%' . $search . '%');
                });
            }

            $vastAds = $query->orderBy('id', 'desc')->paginate(10);

            return response()->json($vastAds);
        }

        return view('admin.vastads.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vastads.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:pre-roll,mid-roll,post-roll,overlay',
            'url' => 'required|url|regex:/^https?:\/\/.+\.xml$/i',
            'target_type' => 'required|in:video,movie,tvshow',
            'target_selection' => 'required|array|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'nullable|boolean',
        ], [
            'url.regex' => 'The VAST Ad URL must be a valid XML URL ending with .xml',
            'target_selection.required' => 'Please select at least one target.',
            'target_selection.min' => 'Please select at least one target.',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;

        VastAd::create($validated);

        return redirect()->route('admin.vastads.index')
                         ->with('success', 'VAST Ad created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vastAd = VastAd::findOrFail($id);
        return view('admin.vastads.form', compact('vastAd'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vastAd = VastAd::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'type' => 'required|in:pre-roll,mid-roll,post-roll,overlay',
            'url' => 'required|url|regex:/^https?:\/\/.+\.xml$/i',
            'target_type' => 'required|in:video,movie,tvshow',
            'target_selection' => 'required|array|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'nullable|boolean',
        ], [
            'url.regex' => 'The VAST Ad URL must be a valid XML URL ending with .xml',
            'target_selection.required' => 'Please select at least one target.',
            'target_selection.min' => 'Please select at least one target.',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;

        $vastAd->update($validated);

        return redirect()->route('admin.vastads.index')
                         ->with('success', 'VAST Ad updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vastAd = VastAd::findOrFail($id);
        $vastAd->delete();

        return response()->json([
            'success' => true,
            'message' => 'VAST Ad deleted successfully.'
        ]);
    }

    /**
     * Update status of a VAST Ad.
     */
    public function updateStatus(Request $request, $id)
    {
        $vastAd = VastAd::findOrFail($id);
        $vastAd->status = !$vastAd->status;
        $vastAd->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.'
        ]);
    }

    /**
     * Handle bulk actions.
     */
    public function bulkAction(Request $request)
    {
        $action = $request->action_type;
        $ids = $request->datatable_ids ?? [];

        if (empty($ids)) {
            return redirect()->back()->with('error', 'No items selected.');
        }

        switch ($action) {
            case 'change-status':
                VastAd::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = 'Status updated successfully.';
                break;

            case 'delete':
                VastAd::whereIn('id', $ids)->delete();
                $message = 'Items deleted successfully.';
                break;

            case 'restore':
                VastAd::onlyTrashed()->whereIn('id', $ids)->restore();
                $message = 'Items restored successfully.';
                break;

            case 'permanently-delete':
                VastAd::onlyTrashed()->whereIn('id', $ids)->forceDelete();
                $message = 'Items permanently deleted.';
                break;

            default:
                $message = 'Invalid action.';
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Get targets based on type for dynamic loading in form.
     */
    public function getTargets(Request $request)
    {
        $type = $request->type;
        $data = [];

        switch ($type) {
            case 'video':
                // Assuming you have a Video model - adjust as needed
                // $data = \App\Models\Video::select('id', 'name')->get();
                // For now, returning sample data
                $data = [
                    ['id' => 1, 'name' => 'Sample Video 1'],
                    ['id' => 2, 'name' => 'Sample Video 2'],
                ];
                break;

            case 'movie':
                // Get movies
                $movies = \App\Models\Movie::select('id', 'title as name')->get()->toArray();
                $data = $movies;
                break;

            case 'tvshow':
                // Get TV shows - you might need to adjust this based on your model structure
                // Assuming episodes from Content model
                $episodes = \App\Models\Content::select('id', DB::raw('CONCAT("S", season_number, " E", episode_number, " ", title, " (", (SELECT title FROM movies WHERE id = contents.movie_id), ")") as name'))
                    ->whereNotNull('season_number')
                    ->whereNotNull('episode_number')
                    ->orderBy('movie_id')
                    ->orderBy('season_number')
                    ->orderBy('episode_number')
                    ->get()
                    ->toArray();
                $data = $episodes;
                break;
        }

        return response()->json(['data' => $data]);
    }
}
