<?php

namespace App\Http\Controllers;

use App\Todo;
use App\Lists;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        $data = [
            'todos' => $todos
        ];
        return view('todos.index', $data);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request)
    {
        Todo::create($request->all());
        // Lists::insert('insert into lists (id, name, todo, created_at, updated_at) values(?, ?, ?, ?, ?)', [null, $request['name'], 'null', 'CURRENT_TIMESTAMP', 'CURRENT_TIMESTAMP']);
        
        return redirect('/');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());

        return redirect('/');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        return redirect('/');
    }

    public function list(Todo $todo, Lists $lists)
    {
        return view('todos.list', compact(['todo', 'lists']));
    }

    public function add(Request $request)
    {
        $lists = Lists::all('name');
        $data = serialize($lists);
        if(strpos($data, $request->name)) {
            $name = Lists::where('name', $request->name); 
            if($name) {
                $name->delete();
            }
        }
        Lists::create($request->all());

        return 'oke'.$lists.','.$request->name;
    }

    public function show_lists(Request $request)
    {
        $lists = Lists::where('name', $request->name)->first();
        return response()->json(
            [
            'name' => $lists->name,
            'todo' => $lists->todo
            ]
        );
    }
}
