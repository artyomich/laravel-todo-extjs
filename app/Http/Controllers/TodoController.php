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


    public function store(Request $request)
    {
        $this->validate($request, ['id' => 'required']);

        foreach ($request as $item) {

            $id = $item->get('id');
            $name = $item->get('name');
            $complete = $item->get('complete');

            $shouldUpdateData = false;
            $todo = Todo::find($id);

            if (isset($name)) {
                $todo->name = $name;
                $shouldUpdateData = true;
            }
            if (isset($complete)) {
                $todo->complete = boolval($complete);
                $shouldUpdateData = true;
            }
            if ($shouldUpdateData) {
                $todo->save();
            }
        }

        return response()->json([
            "code" => 200,
            "message" => "Todos updated successfully"
        ]);
    }

    /**
     * Create new Todo.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
/*    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        Todo::create([
            'name' => $request->get('name'),
            'complete' => false
        ]);

        return response()->json([
            "code" => 200,
            "message" => "Todo added successfully"
        ]);
    }*/

    /**
     * Toggle Status.
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        //dd($request);
        $this->validate($request, ['name' => 'required']);
        $todo = Todo::findOrFail($request[0]->id);
        $todo->complete = true;
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
            "message" => "Todo deleted successfully"
        ]);
    }
}
