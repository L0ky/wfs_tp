<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(int $userId)
    {
        $user = User::findOrFail($userId);
        return $user->tasks;
    }

    public function store(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        return Task::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'user_id' => $user->id,
        ]);
    }

    public function show(Task $task, User $user)
    {
        return Task::where('user_id', $user->id)
                    ->where('id', $task->id)->first();
    }

    public function update(Request $request, Task $task, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);

        $task = Task::where('user_id', $user->id)
            ->where('id', $task->id)
            ->update($data);

        return $task;
    }

    public function destroy(Task $task, User $user)
    {
        return Task::where('user_id', $user->id)
            ->where('id', $task->id)
            ->delete();
    }
}
