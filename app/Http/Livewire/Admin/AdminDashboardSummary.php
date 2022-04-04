<?php

namespace App\Http\Livewire\Admin;

use App\Models\Lesson;
use App\Models\LessonNd;
use App\Models\Summary;
use App\Models\SummaryNd;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class AdminDashboardSummary extends Component
{
    use WithFileUploads;
    public $term_id;
    public $stage_id;
    public $class_id;
    public $subject_id;
    public $lesson_id;
    public $summary_name;
    public $summary_file;
    public $summary_id;

    protected $listeners = [
        'setDeleteSummaryId' => 'setDeleteSummaryId',           
    ];

   

    protected $rules = [
        'summary_name' => 'required',      
        'summary_file' => 'required',         
    ];
    
    protected $messages = array(
        'summary_name.required'=>'اسم الملخص مطلوب',
        'summary_file.required'=>'ملف الملخص مطلوب',      
           
       
    );

    public function mount($term_id = null, $stage_id = null, $class_id = null, $subject_id = null, $lesson_id = null){
        $this->term_id = $term_id;
        $this->stage_id = $stage_id;
        $this->class_id = $class_id;
        $this->subject_id = $subject_id;
        $this->lesson_id = $lesson_id;
    }

    public function setDeleteSummaryId($summary_id){        
        $this->summary_id = $summary_id;  
        if($this->term_id == 0){
            $summary =  Summary::find($this->summary_id);     
        }else{
            $summary =  SummaryNd::find($this->summary_id);    
        } 
        $this->emit('openDeleteSummaryDialogue', $summary->name);
    }

    public function deleteSummary(){
     
        if($this->term_id == 0){
            $summary =  Summary::find($this->summary_id);     
        }else{
            $summary =  SummaryNd::find($this->summary_id);    
        } 
        
        if(file_exists('assets/images/summaries/'.$summary->link)){
            unlink('assets/images/summaries/'.$summary->link);
        }
        $summary->delete();  
        session()->flash('message', 'تم حذف الملخص  بنجاح');  
        if($this->term_id == 0){
            $allSummaries = Summary::where('lesson_id', $this->lesson_id)->get();
            $lesson = Lesson::find($this->lesson_id);
        }else{
            $allSummaries = SummaryNd::where('lesson_id', $this->lesson_id)->get();
            $lesson = LessonNd::find($this->lesson_id);
        }
        $lesson->summary_count = $allSummaries->count();
        $lesson->save();
        $this->summary_id = null;
        

      
    }
    
    public function addSummary(){        
        $this->validate(
            $this->rules, $this->messages
        );  
        if($this->term_id == 0){
            $summary = new Summary(); 
        }else{
            $summary = new SummaryNd();  
        }
        $summaryFileName = Carbon::now()->timestamp . '.' . $this->summary_file->extension(); 
        $this->summary_file->storeAs('summaries', $summaryFileName);      
        $summary->link = $summaryFileName; 
        $summary->name = $this->summary_name;
        $summary->lesson_id = $this->lesson_id;
        if($this->summary_file->extension() == "pdf"){
            $summary->status = 1;
        }else {
            $summary->status = 0;
        } 
        $summary->save();
        
        if($this->term_id == 0){
            $allSummaries = Summary::where('lesson_id', $this->lesson_id)->get();
            $lesson = Lesson::find($this->lesson_id);
        }else{
            $allSummaries = SummaryNd::where('lesson_id', $this->lesson_id)->get();
            $lesson = LessonNd::find($this->lesson_id);
        }

        $lesson->summary_count = $allSummaries->count();
        $lesson->save();
        $this->summary_name = null;
        $this->summary_file = null;
    }

    public function resetInput(){
        $this->summary_name = null;
        $this->summary_file = null;
        $this->summary_id = null;
    }
    
    public function render()
    {
       
       $term_id  = $this->term_id;
       $stage_id  = $this->stage_id;
       $class_id  = $this->class_id;
       $subject_id  = $this->subject_id;
        if( $term_id == 0){
            $summaries =  Summary::where('lesson_id', $this->lesson_id)->get();
            $lesson = Lesson::where('id', $this->lesson_id)->first();
        }else{
            $summaries =  SummaryNd::where('lesson_id', $this->lesson_id)->get();
            $lesson = LessonNd::where('id', $this->lesson_id)->first();
        }
       
        return view('livewire.admin.admin-dashboard-summary' , compact('summaries', 'lesson', 'term_id', 'stage_id', 'class_id', 'subject_id'))->layout('layouts.admin');
    }
}
