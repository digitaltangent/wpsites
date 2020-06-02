<?php

// TaskController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskCollection;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $task = new Task([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'status' => $request->get('status')
        ]);

        $task->save();

        return response()->json('successfully added');
    }
    public function index()
    {
        return new TaskCollection(Task::all());
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);

        $task->update($request->all());

        return response()->json('successfully updated');
    }

    public function delete($id)
    {
        $task = Task::find($id);

        $task->delete();

        return response()->json('successfully deleted');
    }
}
