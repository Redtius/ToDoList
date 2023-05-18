<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Http\Requests\StoretaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Models\todolist;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Js;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($listid)
    {
        $task = task::query()->get()->where('list_id','=',$listid);

        return new JsonResponse([
            'data' => $task
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $list_id,StoretaskRequest $request)
    {

        $isvalid = todolist::query()->where('id','=',$list_id)->count() > 0;

        if($isvalid == 0)
        {
            return new JsonResponse([
               'data'=>'invalid list'
            ],400);
        }

        $created = task::query()->create([
            'name' => $request->name,
            'deadline'=>null,
            'Description'=>" ",
            'list_id'=>$list_id,
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
    public function update(UpdatetaskRequest $request,task $task)
    {
        if ($request->has('id')) {
            return new JsonResponse([
                'message' => 'The "id" attribute cannot be updated.'
            ], 400);
        }

//        if($task->list_id != $list_id)
//        {
//            return new JsonResponse([
//                'data'=>'incompatible task/list'
//            ],400);
//        }

        $updated = $task->update([
            'name' => $request->name?? $task->name,
            'deadline'=>$request->deadline?? $task->deadline,
            'Description'=>$request->Description?? $task->Description,
            'status'=>$request->status?? $task->Status,
        ]);

        if(!$updated)
        {
            return new JsonResponse([
                'data'=>'Failed To Update'
            ],400);
        }

        return new JsonResponse(
            [
                'data'=>$task
            ]
        );

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(task $task)
    {
        $deleted = $task->forceDelete();

        if(!$deleted)
        {
            return new JsonResponse([
               'data'=>'Failed to delete'
            ],400);
        }

        return new JsonResponse([
            'data'=>$deleted
        ]);



    }
}
