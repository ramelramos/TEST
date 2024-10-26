@extends('layouts.app')

@section('content')
    <h1>Lista de Tareas</h1>
    <a href="{{ route('tareas.create') }}" class="btn btn-primary mb-3">Crear Nueva Tarea</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Progreso</th>
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
            <th scope="col">Metodo</th>
          </tr>
        </thead>
        <tbody>
            @foreach($tareas as $tarea)
            <tr class="
              @if ($tarea->status === 'pendiente') table-danger
              @elseif ($tarea->status === 'progreso') table-warning
              @elseif ($tarea->status === 'completado') table-info
              @endif ">

              <th scope="row">{{ $tarea->dni }}</th>
              <td>{{ $tarea->titulo }}</td>
              <td>{{ $tarea->descripcion }}</td>
              <td>{{ $tarea->status }}</td>
              <td>{{ $tarea->due_date }}</td>
              <td> <a href="{{ route('tareas.edit', $tarea->id) }}">Editar</a></td>
              <td> <form action="{{ route('tareas.destroy', $tarea->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit">Eliminar</button>
                </form></td>
            @endforeach
            </tr>

          </tbody>
        </table>



@endsection
