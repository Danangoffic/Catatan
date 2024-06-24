<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('id', 'DESC')->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'nullable|string',
            'due_date' => 'nullable|date'
        ]);
        $data = $request->all();
        // dd($data);
        $data['user_id'] = auth()->user()->id;
        if(!$request->has('priority') || $request->priority == ''){
            $data['priority'] = '2';
        }
        if(!$request->has('due_date') || $request->due_date == ''){
            $data['due_date'] = now();
        }
        if(!$request->has('completed') || $request->completed == ''){
            $data['completed'] = false;
        }
        if(!$request->has('description') || $request->description == ''){
            $data['description'] = '-';
        }
        Todo::create($data);
        return redirect()->route('todo.index')->with('success', 'Todo created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::where(['user_id' => auth()->user()->id, 'id' => $id])->first();
        if($todo == null){
            return redirect()->route('todo.index')->with('error', 'Todo Not found.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        if(auth()->user()->id != $todo->user_id){
            return redirect()->route('todo.index')->with('error', 'Todo Not found.');
        }
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'priority' => 'required',
            'due_date' => 'required'
        ]);
        $todo->title = $validate['title'];
        $todo->description = $validate['description'];
        $todo->priority = $validate['priority'];
        $todo->due_date = $validate['due_date'];
        if($request->has('is_completed')){
            $todo->is_completed = $request->is_completed;
        }
        $todo->save();
        return redirect()->route('todo.index')->with('success', 'Todo Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        if($todo->user_id != auth()->user()->id){
            return redirect()->route('todo.index')->with('error', 'Todo Not found.');
        }
        $todo->delete();
        return redirect()->route('todo.index')->with('success', 'Todo Delete successfully.');
    }
}
