<?php

namespace App\Http\Controllers;

use App\Models\FaqComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Email;

class FaqCommentController extends Controller
{
    //
    /**
     * Stocke un nouveau commentaire ou une réponse en base de données.
     */
    public function store(Request $request)
    {
        $rules = [
            'body' => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:faq_comments,id',
        ];

        // Règles de validation spécifiques aux invités
        if (!Auth::check()) {
            $rules['name'] = 'required|string|max:255';
            $rules['email'] = 'required|email|max:255';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = [
            'body' => $request->body,
            'parent_id' => $request->parent_id,
        ];

        // Associer l'utilisateur s'il est connecté, sinon utiliser les infos du formulaire
        if (Auth::check()) {
            $data['user_id'] = Auth::id();
        } else {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
        }

        $comment = FaqComment::create($data);

        if ($request->email) {
            DB::table('newsletter_subscribers')->updateOrInsert(
                ['email' => $request->email],
            );
        }

        // Recharger le commentaire avec la relation utilisateur pour la réponse AJAX
        $comment->load('user');

        return response()->json([
            'success' => true,
            'message' => 'Votre message a été publié avec succès !',
            'comment' => $comment
        ]);
    }


    public function destroy($id)
    {

        // === LOGIQUE D'AUTORISATION ===
        if (Auth::user()->is_admin) {

            FaqComment::destroy($id);

            return response()->json(['success' => true, 'message' => 'Le commentaire a été supprimé avec succès.']);
        }

        // Si l'utilisateur n'a pas les droits, on renvoie une erreur 403 (Accès Interdit).
        return response()->json(['success' => false, 'message' => 'Vous n\'êtes pas autorisé à supprimer ce commentaire.'], 403);
    }
}
