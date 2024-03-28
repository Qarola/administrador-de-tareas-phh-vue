<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;

class CommentController extends Controller
{
    // Comenta tareas propias y de compañeros: store (para crear comentarios) y index (para obtener comentarios)
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required|string',
            'task_id' => 'required|exists:tasks,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        // Crea el comentario asociado al usuario autenticado
        $comment = $user->comments()->create([
            'content' => $request->content,
            'task_id' => $request->task_id,
        ]);

        return response()->json(['comment' => $comment], 201);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Verifica si el usuario autenticado es el propietario del comentario o un super admin
        if ($comment->user_id !== Auth::id() && !Auth::user()->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $comment->delete();
        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
