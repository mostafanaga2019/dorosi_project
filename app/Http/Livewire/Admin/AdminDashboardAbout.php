<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminDashboardAbout extends Component
{
    public $about;
    public function mount(){
        $this->about = Setting::find(1)->about;
    }

    public function saveContent(){
        $this->validate([
            'about' => 'required',
        ]);
        $settings = Setting::find(1);
        $settings->about = $this->about;
        $settings->save();
        session()->flash('message', 'تم الحفظ بنجاح');
        
    }
    public function render()
    {
        return view('livewire.admin.admin-dashboard-about')->layout('layouts.admin');;
    }
}
