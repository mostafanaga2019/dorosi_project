<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardVerticalMenu extends Component
{
    public function render()
    {
        $subjects = \App\Models\Subject::all();
        $subjectsNd = \App\Models\SubjectsNd::all();
        return view('livewire.admin.admin-dashboard-vertical-menu', compact('subjects', 'subjectsNd'));
    }
}
