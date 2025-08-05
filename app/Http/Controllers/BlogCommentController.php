<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    /**
     * Store a newly created comment
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'body' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:blog_comments,id'
        ]);

        $comment = BlogComment::create([
            'blog_id' => $request->blog_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->body,
            'parent_id' => $request->parent_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Commentaire ajouté avec succès !',
            'comment' => $comment->load('user')
        ]);
    }

    /**
     * Remove the specified comment
     */
    public function destroy(BlogComment $comment)
    {
        // Vérifier que l'utilisateur peut supprimer ce commentaire
        if (!Auth::check() || (!Auth::user()->is_admin && Auth::id() != $comment->user_id)) {
            return response()->json([
                'success' => false,
                'message' => 'Vous n\'êtes pas autorisé à supprimer ce commentaire.'
            ], 403);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Commentaire supprimé avec succès !'
        ]);
    }
}
