{{-- resources/views/admin/create-merma.blade.php --}}
@extends('admin.layout')

@section('header-title', 'Alta de Mermas')

@section('content')
    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #f9fafb;
            color: #111827;
            line-height: 1.5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        
        /* Encabezado */
        .header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
            justify-content: center; /* Centra horizontalmente */
            text-align: center;
        }
        
        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 0.75rem;
            margin-right: 1rem;
            background-color: transparent;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .back-button:hover {
            background-color: #f3f4f6;
        }
        
        .back-icon {
            margin-right: 0.5rem;
            width: 1rem;
            height: 1rem;
        }
        
        .title {
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        /* Tarjeta */
        .card {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            max-width: 48rem;
            margin: 0 auto 1.5rem auto;
        }
        
        .card-header {
            padding: 1.5rem 1.5rem 0 1.5rem;
        }
        
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
        }
        
        .card-content {
            padding: 1.5rem;
        }
        
        .card-footer {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: flex-end;
            border-top: 1px solid #e5e7eb;
        }
        
        /* Formulario */
        .form-grid {
            display: grid;
            gap: 1rem;
        }
        
        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        .form-group {
            display: grid;
            gap: 0.5rem;
        }
        
        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }
        
        .form-input,
        .form-select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            background-color: white;
            color: #111827;
            font-size: 0.875rem;
        }
        
        .form-input:focus,
        .form-select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 1px #2563eb;
        }
        
        /* Botón */
        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            background-color: #2563eb;
            color: white;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .button:hover {
            background-color: #1d4ed8;
        }

        .btn-secondary {
            background-color: #6b7280;
            color: white;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-right: 0.5rem;
        }
    </style>

    <div class="container">
        <div class="header">
            <button class="back-button" onclick="history.back()">
                <svg class="back-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Volver
            </button>
            <h1 class="title">Alta de Mermas</h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Registrar Nueva Merma</h2>
            </div>
            <div class="card-content">
                <form method="POST" action="{{ route('admin.mermas.store') }}" class="form-grid">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="producto_id">Producto</label>
                        <select name="producto_id" id="producto_id" class="form-select" required>
                            <option value="" disabled selected>Seleccionar producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}">
                                    {{ $producto->nombre_producto }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="cantidad">Cantidad</label>
                        <input name="cantidad" id="cantidad" class="form-input" type="number" min="1" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="motivo">Motivo</label>
                        <select name="motivo" id="motivo" class="form-select" required>
                            <option value="" disabled selected>Seleccionar motivo</option>
                            <option value="caducidad">Caducidad</option>
                            <option value="daño">Daño</option>
                            <option value="robo">Robo</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>

                    <div class="card-footer" style="grid-column: span 2; justify-content: flex-end;">
                        <button type="button" class="btn-secondary" onclick="history.back()">Atrás</button>
                        <button type="submit" class="button">Registrar Merma</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
