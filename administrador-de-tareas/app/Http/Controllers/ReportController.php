<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ReportController extends Controller
{
    public function generate(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Obtener las fechas seleccionadas
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Realizar la consulta para obtener las tareas dentro del rango de fechas
        $tasks = Task::whereBetween('completed_at', [$startDate, $endDate])->get();

        // Verificar si se encontraron tareas
        if ($tasks->isEmpty()) {
            return response()->json(['message' => 'No se encontraron tareas para el período especificado'], 404);
        }

        // Devolver las tareas encontradas
        return response()->json(['tasks' => $tasks], 200);
    }
}
