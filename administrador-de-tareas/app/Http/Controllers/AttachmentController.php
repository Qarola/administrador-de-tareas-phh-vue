<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Attachment;
use App\Models\Task;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        // Valida la solicitud para asegurar que el archivo esté presente y tenga el tipo correcto
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048', // máximo 2MB
            'task_id' => 'required|exists:tasks,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        // Obtiene el usuario autenticado y la tarea asociada al archivo adjunto
        $user = Auth::user();
        $task = Task::find($request->task_id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // Verifica si el usuario tiene permiso para adjuntar archivos a la tarea
        if ($task->assigned_to !== $user->id && !$user->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Obtiene el archivo de la solicitud
        $file = $request->file('file');

        // Guarda el archivo en el sistema de archivos
        $filePath = $file->store('attachments');

        // Crea el registro en la base de datos para el archivo adjunto
        $attachment = Attachment::create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $filePath,
            'user_id' => $user->id,
            'task_id' => $task->id,
        ]);

        return response()->json(['attachment' => $attachment], 201);
    }

    public function destroy($id)
    {
        $attachment = Attachment::findOrFail($id);
        $user = Auth::user();

        // Verifica si el usuario tiene permiso para eliminar el adjunto
        if ($user->is_admin || $user->id === $attachment->user_id || $user->id === $attachment->task->assigned_to) {
            $attachment->delete();
            return response()->json(['message' => 'Attachment deleted successfully']);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

}
