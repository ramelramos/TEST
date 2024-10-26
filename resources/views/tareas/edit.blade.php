@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Editar Tarea: {{ $tarea->titulo }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Método PUT para actualizaciones -->
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI:</label>
                        <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni', $tarea->dni) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $tarea->titulo) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $tarea->descripcion) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Fecha de Vencimiento:</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $tarea->due_date) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Estado:</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pendiente" {{ old('status', $tarea->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="progreso" {{ old('status', $tarea->status) == 'progreso' ? 'selected' : '' }}>En Progreso</option>
                            <option value="completado" {{ old('status', $tarea->status) == 'completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
