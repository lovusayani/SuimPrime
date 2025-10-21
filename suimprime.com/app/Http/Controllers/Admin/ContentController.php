<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller {
public function index() {
$content = Content::all();
return view('admin.content', compact('content'));
}

public function create() {
return view('admin.content_create');
}

public function store(Request $request) {
Content::create($request->all());
return redirect()->route('admin.content.index');
}

public function edit($id) {
$content = Content::findOrFail($id);
return view('admin.content_edit', compact('content'));
}

public function update(Request $request, $id) {
$content = Content::findOrFail($id);
$content->update($request->all());
return redirect()->route('admin.content.index');
}

public function destroy($id) {
Content::destroy($id);
return redirect()->route('admin.content.index');
}
}