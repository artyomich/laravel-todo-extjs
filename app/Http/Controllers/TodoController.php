<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * View ToDos listing.
     *
     * @return \Illuminate\View\View
     */

    public function index()
    {

        $todoList = Todo::All();

        return response()->json(['todos' => $todoList]);
    }



    /**
     * Create new Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Todo::create([
            'name' => $request->get('name'),
        ]);

        return response()->json([
            "code" => 200,
            "message" => "Todo added successfully"
        ]);
    }

    /**
     * Toggle Status.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->complete = !$todo->complete;
        $todo->save();

        return response()->json([
            "code" => 200,
            "message" => "Todo updated successfully"
        ]);
    }

    /**
     * Delete Todo.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return response()->json([
            "code" => 200,
            "message" => "Task deleted successfully"
        ]);
    }
}
