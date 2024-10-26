<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="API de Gestión de Tareas", version="1.0.0")
 */

/**
 * @OA\Tag(
 *     name="Tareas",
 *     description="Operaciones relacionadas con las tareas"
 * )
 */
class TareaController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tareas",
     *     tags={"Tareas"},
     *     summary="Obtener la lista de tareas",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tareas",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Tarea"))
     *     )
     * )
     */
    public function index()
    {
        $tareas = Tarea::all();

        return request()->wantsJson()
            ? response()->json($tareas)
            : view('tareas.index', compact('tareas'));
    }


    public function create()
    {
        return view('tareas.crear');
    }

    /**
     * @OA\Post(
     *     path="/api/tareas",
     *     tags={"Tareas"},
     *     summary="Crear una nueva tarea",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TareaRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Tarea creada",
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(response=400, description="Error de validación")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|string',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pendiente,progreso,completado',
        ]);

        $tarea = Tarea::create($request->all());

        return request()->wantsJson()
            ? response()->json($tarea, 201)
            : redirect()->route('tareas.index')->with('success', 'Tarea creada exitosamente');
    }

    /**
     * @OA\Get(
     *     path="/api/tareas/{id}",
     *     tags={"Tareas"},
     *     summary="Obtener una tarea específica",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=200,
     *         description="Tarea encontrada",
     *         @OA\JsonContent(ref="#/components/schemas/Tarea")
     *     ),
     *     @OA\Response(response=404, description="Tarea no encontrada")
     * )
     */
    public function show(Tarea $tarea)
    {
        return request()->wantsJson()
            ? response()->json($tarea)
            : view('tareas.show', compact('tarea'));
    }


    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * @OA\Put(
     *     path="/api/tareas/{id}",
     *     tags={"Tareas"},
     *     summary="Actualizar una tarea existente",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/TareaRequest")
     *     ),
     *     @OA\Response(response=200, description="Tarea actualizada"),
     *     @OA\Response(response=404, description="Tarea no encontrada")
     * )
     */
    public function update(Request $request, Tarea $tarea)
    {

        // return $request->all();
        $request->validate([
            'dni' => 'required|string',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pendiente,progreso,completado',
        ]);

        $tarea->update($request->all());

        return request()->wantsJson()
            ? response()->json($tarea, 200)
            : redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente');
    }

    /**
     * @OA\Delete(
     *     path="/api/tareas/{id}",
     *     tags={"Tareas"},
     *     summary="Eliminar una tarea",
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Tarea eliminada"),
     *     @OA\Response(response=404, description="Tarea no encontrada")
     * )
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return request()->wantsJson()
            ? response()->json(null, 204)
            : redirect()->route('tareas.index')->with('success', 'Tarea eliminada exitosamente');
    }
}

/**
 * @OA\Schema(
 *     schema="Tarea",
 *     required={"dni", "titulo", "descripcion", "due_date", "status"},
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="dni", type="string"),
 *     @OA\Property(property="titulo", type="string"),
 *     @OA\Property(property="descripcion", type="string"),
 *     @OA\Property(property="due_date", type="string", format="date"),
 *     @OA\Property(property="status", type="string", enum={"pendiente", "progreso", "completada"})
 * )
 */

/**
 * @OA\Schema(
 *     schema="TareaRequest",
 *     required={"dni", "titulo", "descripcion", "due_date", "status"},
 *     @OA\Property(property="dni", type="string"),
 *     @OA\Property(property="titulo", type="string"),
 *     @OA\Property(property="descripcion", type="string"),
 *     @OA\Property(property="due_date", type="string", format="date"),
 *     @OA\Property(property="status", type="string", enum={"pendiente", "progreso", "completada"})
 * )
 */
