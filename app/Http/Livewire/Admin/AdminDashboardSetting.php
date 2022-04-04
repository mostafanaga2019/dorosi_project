<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminDashboardSetting extends Component
{
    public $fees;
    public $pay_phone;
    public $facebook;
    public $twitter;
    public $google_play;

    public function mount(){
        $setting = Setting::find(1);
        $this->fees= $setting->fees;
        $this->pay_phone= $setting->pay_phone;
        $this->facebook= $setting->facebook;
        $this->twitter= $setting->twitter;
        $this->google_play= $setting->google_play;
    }

    public function saveSettings(){        
        $this->validate(
            [ 
                'fees' => 'required',
                'pay_phone' => 'required',
                'facebook' => 'required',   
                'twitter' => 'required',
                'google_play' => 'required'

            ]
        );      
        $setting = Setting::find(1);
        $setting->fees = $this->fees;
        $setting->facebook = $this->facebook;
        $setting->pay_phone = $this->pay_phone; 
        $setting->twitter = $this->twitter;
        $setting->google_play = $this->google_play; 
        $setting->save();
        session()->flash('message', 'تم تعديل الإعدادت بنجاح');
    }


    public function render()
    {
        return view('livewire.admin.admin-dashboard-setting')->layout('layouts.admin');
    
    }
}