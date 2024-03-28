<!DOCTYPE html>  <!-- Crea la vista para el reporte -->
<html>
<head>
    <title>Task Report</title>
</head>
<body>
    <h1>Task Report</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Completed At</th>
                <th>Assigned To</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->completed_at }}</td>
                <td>{{ $task->assignedTo->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
