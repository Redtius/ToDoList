<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use App\Http\Requests\StoretodolistRequest;
use App\Http\Requests\UpdatetodolistRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {
        $created = todolist::query()->get()->where('user_id','=','2');

        return new JsonResponse([
            'data'=>$created
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodolistRequest $request,$user)
    {
        //error_log('User ID: ' . $user); // Debug statement

        $user = User::find($user);

        //error_log('User: ' . $user); // Debug statement

        if (!$user) {
            return new JsonResponse([
                'data' => 'User Not Found'
            ], 400);
        }

        //error_log('User ID:'. $user->id);

        $created = todolist::query()->create([
            'title' => $request->title,
            'user_id' => $user->id,
        ]);

        return new JsonResponse([
            'data' => $created,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($user)
    {
        $todolist = todolist::find($user);

        if(!$todolist){
            return new JsonResponse([
                'data'=>'List not Found',
            ],404);
        }

        return new JsonResponse([
            'data' => $todolist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodolistRequest $request, $todolist)
    {
        if ($request->has('id') || $request->has('user_id')) {
            return new JsonResponse([
                'message' => 'The "id" attribute cannot be updated.'
            ], 400);
        }

        $todolist=todolist::find($todolist);
        if(!$todolist)
        {
            return new JsonResponse([
                'message'=>'Invalid List'
            ],400);
        }

        $updated = $todolist->update([
            'title' => $request->title?? $request->title
        ]);

        if(!$updated)
        {
            return new JsonResponse([
                'data'=>'Failed To Update'
            ],400);
        }

        return new JsonResponse(
            [
                'data'=>$todolist
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todolist $todolist)
    {
        $deleted = $todolist->forceDelete();

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
