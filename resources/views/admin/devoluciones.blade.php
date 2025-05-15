{{-- resources/views/admin/devoluciones.blade.php --}}

@extends('admin.layout')

@section('header-title', 'Gestión de Devoluciones')

@section('content')
    <div class="grid gap-6">
        <div class="card bg-white shadow-md rounded-lg overflow-hidden">
            <div class="card-header flex flex-row items-center justify-between p-6">
                <div>
                    <h3 class="card-title">Gestión de Devoluciones</h3>
                    <p class="card-description">Administra las ventas y procesa sus devoluciones</p>
                </div>
            </div>
            <div class="card-content p-6">
                <div class="table-container overflow-x-auto">
                    <table class="table min-w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($devoluciones as $venta)
                                <tr>
                                    <td>{{ $venta->id }}</td>
                                    <td>{{ $venta->user->name ?? '—' }}</td>
                                    <td>{{ $venta->fecha->format('d/m/Y H:i') }}</td>
                                    <td>${{ number_format($venta->total, 2) }}</td>
                                    <td>
                                        <form
                                           action="{{ route('admin.devoluciones.devolver', $venta->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('¿Estás seguro que deseas devolver la venta #{{ $venta->id }}?');"
>
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning">Devolver</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">
                                        No hay ventas para devolver.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
