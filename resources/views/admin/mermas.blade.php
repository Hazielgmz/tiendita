<!-- resources/views/admin/mermas.blade.php -->
@extends('admin.layout')

@section('header-title', 'Control de Mermas')

@section('content')
    <div class="grid gap-6">
        <div class="card">
            <div class="card-header flex flex-row items-center justify-between">
                <div>
                    <h3 class="card-title">Control de Mermas</h3>
                    <p class="card-description">Gestiona las mermas de productos</p>
                </div>
                <!-- Botón de Registrar Merma -->
                <a href="{{ route('admin.mermas.create') }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Registrar Merma
                </a>
            </div>

            <div class="card-content">
                <div class="table-container">
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($mermas->isEmpty())
                        <p class="text-gray-600 p-4">No hay mermas registradas.</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Motivo</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mermas as $merma)
                                    <tr>
                                        {{-- Fecha de creación --}}
                                        <td>{{ $merma->created_at->format('d/m/Y H:i') }}</td>

                                        {{-- Nombre del producto --}}
                                        <td>{{ $merma->producto->nombre_producto }}</td>

                                        {{-- Cantidad --}}
                                        <td>{{ $merma->cantidad }}</td>

                                        {{-- Motivo --}}
                                        <td>{{ $merma->motivo }}</td>

                                        {{-- Valor: precio_unitario * cantidad --}}
                                        <td>
                                            ${{ number_format($merma->producto->precio_unitario * $merma->cantidad, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
