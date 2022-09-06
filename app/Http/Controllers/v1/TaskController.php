<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use App\Traits\ResponseTraits;

class TaskController extends Controller
{
    use ResponseTraits;

    public function index()
    {
        try {
            $tasks = Task::asc()->get();
            return $this->success(false, 'Tasks List Found Successfully', $tasks);
        } catch (Exception $e) {
            return $this->error(true, $e->getMessage(), null);
        }
    }

    public function store(TaskCreateRequest $request)
    {
        try {
            $task = Task::create($request->validated());
            return $this->success(false, 'Task Created Successfully', $task);
        } catch (Exception $e) {
            return $this->error(true, $e->getMessage(), null);
        }
    }

    public function update(Request $request)
    {
        try {
            $task = Task::findOrFail($request->id);
            $task->update([
                'status' => $request->status
            ]);
            return $this->success(false, 'Task Updated Successfully', $task);
        } catch (Exception $e) {
            return $this->error(true, $e->getMessage(), null);
        }
    }
}
