<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task;

class ShowSingleAssignedTask extends Component
{
    public $task;

    public function mount($id)
    {
        $this->task = Task::with('user', 'category')
            ->where('assigned_to_user_id', auth()->id())->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.show-single-assigned-task');
    }
}