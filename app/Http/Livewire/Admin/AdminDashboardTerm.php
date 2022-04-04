<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminDashboardTerm extends Component
{
    public $term;
    public function mount(){
        $this->term = Setting::find(1)->terms;
    }

    public function saveContent(){
        $this->validate([
            'term' => 'required',
        ]);
        $settings = Setting::find(1);
        $settings->terms = $this->term;
        $settings->save();
        session()->flash('message', 'تم الحفظ بنجاح');
        
    }
    public function render()
    {
        return view('livewire.admin.admin-dashboard-term')->layout('layouts.admin');
    }
}
