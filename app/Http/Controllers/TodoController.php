<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        
        // return response()->json(['data' => $todos]);
        return TodoResource::collection($todos);
    }

    public function show($id)
    {
        $todo = Todo::findOrFail($id);

        // return response()->json(['data' => $todo]);
        return new TodoResource($todo);
    }    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $todo = Todo::create($request->all());
        $todo->refresh();

        return response()->json(['data' => $todo]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $todo = Todo::findOrFail($id);
        $todo->name = $request->name;
        $todo->save();

        return response()->json(['data' => $todo]);
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();

        return response()->json(['data' => $todo]);
    }
}
