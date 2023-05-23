<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
        // $posts = Post::all();
        // return view('post.index')->with('posts', $posts);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'asal_daerah' => 'required|string|max:155',
            'cara_pemakaian' => 'required|string|max:50',
            'bahan' => 'required|string|max:20'
        ]);

        $post = Post::create([
            'nama' => $request->nama,
            'asal_daerah' => $request->asal_daerah,
            'cara_pemakaian' => $request->cara_pemakaian,
            'bahan' => $request->bahan
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Data Berhasil Di Tambah'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Di Tambah'
                ]);
        }
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:100',
            'asal_daerah' => 'required|string|max:155',
            'cara_pemakaian' => 'required|string|max:50',
            'bahan' => 'required|string|max:20'
        ]);

        $post = Post::findOrFail($id);

        $post->update([
            'nama' => $request->nama,
            'asal_daerah' => $request->asal_daerah,
            'cara_pemakaian' => $request->cara_pemakaian,
            'bahan' => $request->bahan
        ]);

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Data Berhasil Di Edit'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Di Edit'
                ]);
        }
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()
                ->route('post.index')
                ->with([
                    'success' => 'Data Berhasil Di Hapus'
                ]);
        } else {
            return redirect()
                ->route('post.index')
                ->with([
                    'error' => 'Data Gagal Di Hapus'
                ]);
        }
    }
}
