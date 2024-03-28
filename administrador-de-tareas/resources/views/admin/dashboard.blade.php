@extends('app')

@section('title', 'Panel de Administración')

@section('content')
    <!-- Navbar -->
   

    <!-- Botones -->
    <div style="max-width: 600px; margin: 20px auto;">
        <div style="background-color: white; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 20px;">Panel de Administración</h2>
            <div style="display: flex; gap: 20px;">
                <button id="showRegistrationForm" style="background-color: #2563EB; color: white; border: none; border-radius: 4px; padding: 10px 20px; font-weight: bold; cursor: pointer;">Registrar Nuevo Usuario</button>
                <button style="background-color: #2563EB; color: white; border: none; border-radius: 4px; padding: 10px 20px; font-weight: bold; cursor: pointer;">Crear Tarea</button>
                <button style="background-color: #2563EB; color: white; border: none; border-radius: 4px; padding: 10px 20px; font-weight: bold; cursor: pointer;">Generar Reporte</button>
            </div>

            <!-- Formulario de Registro -->
            <div id="registrationForm" style="display: none; margin-top: 20px;">
                <!-- Aquí va tu formulario de registro -->
                <form>
                    <!-- Campos del formulario -->
                </form>
            </div>
        </div
    </div>
@endsection

@push('scripts')
    <script>
const showRegistrationForm = document.getElementById('showRegistrationForm');
const registrationForm = document.getElementById('registrationForm');

// Agrega un evento al botón para mostrar/ocultar el formulario
showRegistrationForm.addEventListener('click', () => {
    if (registrationForm.style.display === 'none') {
        registrationForm.style.display = 'block';
    } else {
        registrationForm.style.display = 'none';
    }
});

    </script>
@endpush
