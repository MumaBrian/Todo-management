<?php

namespace App\Http\Livewire;

use App\Models\Category as CategoryModel;
use App\Models\Task as TaskModel;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Task extends Component
{
    use WithPagination;
    public $title;
    public $description;
    public $due_date;
    public $assigned_to_user_id;
    public $category_id;
    public $priority = 'medium';

    protected $rules = [
        'title' => 'required|min:6|max:50',
        'description' => 'required|min:6|max:500',
        'due_date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
        'category_id' => 'required|exists:categories,id',
        'assigned_to_user_id' => 'nullable|exists:users,id',
        'priority' => 'required|in:low,medium,high',
    ];

    public function store()
    {
        $this->validate();

        TaskModel::create([
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'assigned_to_user_id' => $this->assigned_to_user_id,
            'assigned_date' => now()->toDateString(),
            'category_id' => $this->category_id,
            'priority' => $this->priority,
            'user_id' => auth()->id()
        ]);

        $this->reset();

        session()->flash('message', 'Task Created');

        $this->emit('taskAssigned');
    }

    public function render()
    {
        return view(
            'livewire.task',
            [
                'tasks' => TaskModel::with('user', 'assignedUser')->latest()->paginate(5),
                'users' => User::select('id', 'name')->get(),
                'categories' => CategoryModel::select('id', 'name')->get()
            ]
        );
    }
}