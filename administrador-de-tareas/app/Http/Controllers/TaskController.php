<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->is_admin) {
            $tasks = Task::all();
        } else {
            $tasks = Task::where('assigned_to', $user->id)->get();
        }

        return response()->json(['tasks' => $tasks], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'assigned_to' => 'required|exists:users,id',
            'file' => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = Auth::user();

        if (!$user->is_admin) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads'); // Almacena el archivo en el sistema de archivos
        }

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
            'status' => 'Pendiente',
            'attachment' => $filePath,
        ]);

        return response()->json(['task' => $task], 201);
    }
}
