<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;

class AssignedTasks extends Component
{
    use WithPagination;

    protected $listeners = ['taskAssigned' => '$refresh'];

    public function render()
    {
        $authAssignedTasks = Task::with('user', 'category')
            ->where('assigned_to_user_id', auth()->id())->paginate(15);

        return view('livewire.assigned-tasks', compact('authAssignedTasks'));
    }

    public function markCompleted($id)
    {
        $task = Task::where('assigned_to_user_id', auth()->id())->findOrFail($id);

        if ($task->completed) {
            session()->flash('message', 'Task Already Completed !');
            return;
        }

        $task->completed = true;
        $task->completed_at = now()->toDateString();
        $task->save();

        session()->flash('message', 'Task Status Updated !');

        return redirect()->route('admin.auth_tasks.index');
    }

    public function deleteTask($id)
    {
        $task = Task::where('assigned_to_user_id', auth()->id())->findOrFail($id);
        $task->delete();

        session()->flash('message', 'Task Deleted !');

        return redirect()->route('admin.auth_tasks.index', $task->id);
    }
}