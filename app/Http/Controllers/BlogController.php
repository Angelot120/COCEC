<?php

namespace App\Http\Controllers;

use App\Interfaces\BlogInterface;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    private BlogInterface $blogInterface;

    public function __construct(BlogInterface $blogInterface)
    {
        $this->blogInterface = $blogInterface;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::all();

        return view('main.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
            'is_published' => 'required|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
        }

        $data = [
            "title" => $request->title,
            "short_description" => $request->short_description,
            "long_description" => $request->long_description,
            "image" => $imagePath,
            "is_published" => $request->is_published,
        ];

        $response = $this->blogInterface->create($data);
        if (!$response) {
            return back()->with('error', 'Erreur lors de la création du blog !');
        }

        return redirect()->route('admin.blogs')->with('success', 'Blog créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Récupère le blog affiché
        $blog = Blog::findOrFail($id);

        // Récupère 4 autres blogs récents, excluant celui en cours
        $blogs = Blog::where('id', '!=', $id)
            ->where('is_published', true)
            ->latest() // équivalent à orderBy('created_at', 'desc')
            ->take(4)
            ->get();


        return view('main.blog.detail', compact('blog', 'blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'required|string|max:500',
            'long_description' => 'required|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog', 'public');
        } else {
            $imagePath = $blog->image; // Keep the existing image if no new one is uploaded
        }

        $data = [
            "title" => $request->title,
            "short_description" => $request->short_description,
            "long_description" => $request->long_description,
            "image" => $imagePath,
            "is_published" => $request->is_published,
        ];

        $response = $this->blogInterface->edit($id, $data);
        if (!$response)
            return back()->with('error', 'Erreur lors de la modification du blog!');

        return back()->with('success', 'Blog modifié avec succès!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = $this->blogInterface->destroy($id);
        if (!$response)
            return back()->with('error', 'Erreur lors de la suppression du blog!');

        return back()->with('success', 'Blog supprimé avec succès');
    }
}
