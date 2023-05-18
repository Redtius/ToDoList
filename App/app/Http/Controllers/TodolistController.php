<?php

namespace App\Http\Controllers;

use App\Models\todolist;
use App\Http\Requests\StoretodolistRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {
        $created = todolist::query()->get()->where('user_id','=',$user);

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
    public function update(StoretodolistRequest $request,$todolist)
    {


        // Return the updated todolist as a JSON response
        return $request->all();
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
