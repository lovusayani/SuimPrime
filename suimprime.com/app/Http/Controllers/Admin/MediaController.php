<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::all(); // Model storing media

        return view('admin.media-library.index', compact('media'));
    }

    public function list(Request $request)
    {
        $media = \App\Models\Media::orderBy('created_at', 'desc')->paginate(24);

        // if AJAX expecting HTML partial
        return view('admin.partials.media-list', compact('media'));
    }

    public function destroy(Media $media)
    {
        if (file_exists(public_path($media->url))) {
            unlink(public_path($media->url));
        }
        $media->delete();

        return response()->json(['success' => true]);
    }

    private function getFileType($file)
    {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $videoExtensions = ['mp4', 'mov', 'avi'];

        if (in_array(strtolower($ext), $imageExtensions)) {
            return 'image';
        }
        if (in_array(strtolower($ext), $videoExtensions)) {
            return 'video';
        }

        return 'file';
    }

    public function getMedia(Request $request)
    {
        $query = Media::query(); // Replace Media with your model
        if ($request->has('query') && $request->query('query') != '') {
            $query->where('url', 'like', '%'.$request->query('query').'%');
        }

        $perPage = $request->query('perPage', 21);
        $page = $request->query('page', 1);

        $media = $query->orderBy('created_at', 'desc')->paginate($perPage, ['*'], 'page', $page);

        $html = view('admin.media-library.partials.grid', compact('media'))->render();

        return response()->json([
            'html' => $html,
            'hasMore' => $media->hasMorePages(),
        ]);
    }

    public function store(Request $request)
    {
        // Validate multiple files
        $request->validate([
            'file_url.*' => 'required|file|max:512000', // 500MB per file
        ]);

        $uploadedFiles = [];

        if ($request->hasFile('file_url')) {
            foreach ($request->file('file_url') as $file) {
                $path = $file->store('media', 'public'); // storage/app/public/media
                $url = '/'.$path; // change to uploads/media/filename.ext
                // $url = Storage::url($path); // /storage/media/filename.ext
                $mime = $file->getMimeType();
                $type = Str::startsWith($mime, 'image') ? 'image' : 'video';

                // Save to database
                $media = Media::create([
                    'url' => $url,
                    'type' => $type,
                    'title' => $file->getClientOriginalName(),
                ]);

                $uploadedFiles[] = [
                    'id' => $media->id,
                    'path' => $path,
                    'url' => $url,
                    'type' => $type,
                    'name' => $file->getClientOriginalName(),
                ];

                // 3. Delete all temp chunks for this file
                $tempDir = storage_path('app/public/temp_uploads');
                $pattern = $tempDir.'/*_'.$file->getClientOriginalName();
                foreach (glob($pattern) as $chunkFile) {
                    if (is_file($chunkFile)) {
                        @unlink($chunkFile);
                    }
                }

            }

            return response()->json([
                'success' => true,
                'files' => $uploadedFiles,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No files uploaded',
            ], 400);
        }
    }

    public function upload(Request $request)
    {
        // For chunked upload
        $file = $request->file('file_chunk');
        $index = $request->input('index');
        $totalChunks = $request->input('total_chunks');
        $originalName = $request->input('file_name');

        $tempPath = storage_path('app/public/temp_uploads');
        if (! file_exists($tempPath)) {
            mkdir($tempPath, 0777, true);
        }

        $chunkName = $tempPath.'/'.$index.'_'.$originalName;
        $file->move($tempPath, $index.'_'.$originalName);

        return response()->json(['success' => true]);
    }
}
