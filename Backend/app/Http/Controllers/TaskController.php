<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use Illuminate\Http\JsonResponse;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = task::query()->get();

        return new JsonResponse([
            'data' => $task
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretaskRequest $request)
    {
//        $request->validate([
//            'name'=>'required',
//        ]);

        $created = task::query()->create([
            'name' => $request->name,
            'deadline'=>$request->deadline,
            'Description'=>$request->Description,
            'list_id'=>$request->list_id,
            'status'=>$request->status
        ]);
        return new JsonResponse([
            'data'=>$created,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $task = task::find($id);

        if(!$task){
            return new JsonResponse([
                'data'=>'Task not Found',
            ],404);
        }

        return new JsonResponse([
            'data' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetaskRequest $request, task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        //
    }
}
