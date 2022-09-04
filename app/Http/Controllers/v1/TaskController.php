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
            $tasks = Task::desc()->get();
            return $this->success(false, 'Tasks List Found Successfully', $tasks);
        } catch (Exception $e) {
            return $this->success(true, $e->getMessage(), null);
        }
    }

    public function store(TaskCreateRequest $request)
    {

        try {
            $task = Task::create($request->validated());
            if ($task) {
                return $this->success(false, 'Task Created Successfully', $task);
            } else {
                return $this->success(true, 'Task Cretion Error', null);
            }
        } catch (Exception $e) {
            return $this->success(true, $e->getMessage(), null);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $task = Task::find($id);
            if ($task) {
                $task->update([
                    'status' => $request->status
                ]);
                return $this->success(false, 'Task Updated Successfully', $task);
            } else {
                return $this->success(true, 'Task Update Error', null);
            }
        } catch (Exception $e) {
            return $this->success(true, $e->getMessage(), null);
        }
    }
}
