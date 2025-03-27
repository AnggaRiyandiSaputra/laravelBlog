<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Models\Posts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::getPostByUserLogin();

        return view('member.blogs.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $posts)
    {
        return view('member.blogs.edit', ['blog' => $posts]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostsRequest $request, Posts $posts): RedirectResponse
    {
        $validated = $request->validated();

        if ($request->hasFile('thumbnail')) {
            // hapus thumbnail lama jika ada
            if ($posts->thumbnail) {
                $old_thumbnail = storage_path('app/public/thumbnails/' . $posts->thumbnail);
                if (file_exists($old_thumbnail)) {
                    unlink($old_thumbnail);
                }
            }

            $image = $request->file('thumbnail');
            $image_name = time() . '_' . $image->getClientOriginalName();
            $destinationPath = storage_path('/app/public/thumbnails');

            $image->move($destinationPath, $image_name);
            $validated['thumbnail'] = $image_name;
        }

        $posts->update($validated);

        return redirect()->route('member.blogs.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
