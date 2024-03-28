@extends('app')

@section('title', 'Home')

@section('content')
    <!-- Navbar -->

    <!-- Formulario -->
    <div style="max-width: 600px; margin: 20px auto;">
        <div style="background-color: white; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 20px;">Login</h2>
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; color: #333; margin-bottom: 8px;">Email</label>
                    <input type="email" id="email" name="email" style="width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" placeholder="Ingrese su email">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="password" style="display: block; color: #333; margin-bottom: 8px;">Contraseña</label>
                    <input type="password" id="password" name="password" style="width: 100%; border: 1px solid #ccc; border-radius: 4px; padding: 8px;" placeholder="Ingrese su contraseña">
                </div>

                <button type="submit" style="background-color: #2563EB; color: white; border: none; border-radius: 4px; padding: 10px 20px; font-weight: bold; cursor: pointer;">Ingresar</button>
            </form>
        </div>
    </div>
@endsection
