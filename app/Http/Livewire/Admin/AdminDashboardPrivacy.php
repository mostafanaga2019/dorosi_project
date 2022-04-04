<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminDashboardPrivacy extends Component
{
    public $privacy;
    public function mount(){
        $this->privacy = Setting::find(1)->privacy;
    }

    public function saveContent(){
        $this->validate([
            'privacy' => 'required',
        ]);
        $settings = Setting::find(1);
        $settings->privacy = $this->privacy;
        $settings->save();
        session()->flash('message', 'تم الحفظ بنجاح');
        
    }
    public function render()
    {
        return view('livewire.admin.admin-dashboard-privacy')->layout('layouts.admin');
    }
}
