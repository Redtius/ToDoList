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
    public function index()
    {
        $created = todolist::query()->get();

        return new JsonResponse([
            'data'=>$created
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodolistRequest $request,int $user_id)
    {
        $isvalid = User::query()->where('id','=',$user_id)->count() > 0;

        if($isvalid == 0)
        {
            return new JsonResponse([
               'data'=>'User Not Found'
            ],400);
        }
            $created = todolist::query()->create([
                'title'=>$request->title,
                'user_id'=> $user_id
            ]);

            return new JsonResponse([
                'data'=>$created
            ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(todolist $todolist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetodolistRequest $request, todolist $todolist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todolist $todolist)
    {
        //
    }
}
