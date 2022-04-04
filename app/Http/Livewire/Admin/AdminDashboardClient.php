<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardClient extends Component
{
    public $stage_id;
    public $keyword;
    public $users;

    public function mount($stage_id = null , $keyword = null){
        $this->stage_id = $stage_id;
        $this->keyword = $keyword;   

        $exp_users = User::where('utype', 'USR')->where('status' , 1)->where('exp_date' , '=' , Carbon::today() )->get();
        foreach ($exp_users as $exp_user) {
             $exp_user->status = 0;
             $exp_user->save();          
        }

        if($this->keyword == null)  {
            if($this->stage_id != 3){
                $this->users = User::where('utype', 'USR')  
                ->where('stage_id',$this->stage_id)              
                ->get();
            }else{
                $this->users = User::where('utype', 'USR')                
                ->get();
            }
        } else{
            if($this->stage_id != 3){
                $this->users = User::where('utype', 'USR')
                ->where('stage_id',$this->stage_id)
                ->where('name', 'LIKE', "%{$this->keyword}%") 
                ->orWhere('email', 'LIKE', "%{$this->keyword}%")                 
                ->get();
            }else{
                $this->users = User::where('utype', 'USR')                
                ->where('name', 'LIKE', "%{$this->keyword}%") 
                ->orWhere('email', 'LIKE', "%{$this->keyword}%")                
                ->get();
            }
        }   
    }
    public function checkUsers(){ 
        return redirect(
            route('clients', ['stage_id'=> $this->stage_id, $this->keyword ]));            
    }

    public function activate($user_id){       
        $user = User::find($user_id);
        $user->status = 1;
        $date = Carbon::today();
        $date->addMonth(1);
        $user->exp_date = $date;
        $user->save();
        return redirect(
            route('clients', ['stage_id'=> $this->stage_id, $this->keyword ]));
    }
    public function deActivate($user_id){        
        $user = User::find($user_id);
        $user->status = 0;
        $user->save();
        return redirect(
            route('clients', ['stage_id'=> $this->stage_id, $this->keyword ]));
    }


    public function render()
    {
        $users = $this->users;        
       
        return view('livewire.admin.admin-dashboard-client', compact('users'))->layout('layouts.admin');
    }
}
