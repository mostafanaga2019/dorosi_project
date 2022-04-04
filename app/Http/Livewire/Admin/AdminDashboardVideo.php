<?php

namespace App\Http\Livewire\Admin;

use App\Models\Lesson;
use App\Models\LessonNd;
use App\Models\Video;
use App\Models\VideoNd;
use Livewire\Component;

class AdminDashboardVideo extends Component
{
    public $term_id;
    public $stage_id;
    public $class_id;
    public $subject_id;
    public $lesson_id;
    public $video_url;
    public $video_id;

    protected $listeners = [
        'setDeleteVideoId' => 'setDeleteVideoId',           
    ];

    public function setDeleteVideoId($video_id){        
        $this->video_id = $video_id;         
        $this->emit('openDeleteVideoDialogue');
    }

    public function deleteVideo(){
     
        if($this->term_id == 0){
            $video =  Video::find($this->video_id);     
        }else{
            $video =  VideoNd::find($this->video_id);    
        } 
        
       
        $video->delete();  
        session()->flash('message', 'تم حذف الفيديو  بنجاح');  
        if($this->term_id == 0){
            $allVideos = Video::where('lesson_id', $this->lesson_id)->get();
            $lesson = Lesson::find($this->lesson_id);
        }else{
            $allVideos = VideoNd::where('lesson_id', $this->lesson_id)->get();
            $lesson = LessonNd::find($this->lesson_id);
        }
        $lesson->video_count = $allVideos->count();
        $lesson->save();
        $this->video_id = null;
        

      
    }
    
    protected $rules = [
        'video_url' => 'required',  
    ];
    
    protected $messages = array(
        'video_url.required' => 'رابط الفيديو مطلوب',       
    );

    public function mount($term_id = null, $stage_id = null, $class_id = null, $subject_id = null, $lesson_id = null){
        $this->term_id = $term_id;
        $this->stage_id = $stage_id;
        $this->class_id = $class_id;
        $this->subject_id = $subject_id;
        $this->lesson_id = $lesson_id;
    }
    
    public function addVideo(){        
        $this->validate(
            $this->rules, $this->messages
        );  
        if($this->term_id == 0){
            $video = new Video(); 
        }else{
            $video = new VideoNd();  
        }
      
        $video->video_url = $this->video_url;        
        $video->lesson_id = $this->lesson_id;
      
        $video->save();
        
        if($this->term_id == 0){
            $allVideos = Video::where('lesson_id', $this->lesson_id)->get();
            $lesson = Lesson::find($this->lesson_id);
        }else{
            $allVideos = VideoNd::where('lesson_id', $this->lesson_id)->get();
            $lesson = LessonNd::find($this->lesson_id);
        }

        $lesson->video_count = $allVideos->count();
        $lesson->save();
        $this->video_link = null;
        
    }

    public function resetInput(){
        $this->video_link = null;
    }

    public function render()
    {
        $term_id  = $this->term_id;
        $stage_id  = $this->stage_id;
        $class_id  = $this->class_id;
        $subject_id  = $this->subject_id;
        if( $term_id == 0){
            $videos =  Video::where('lesson_id', $this->lesson_id)->get();
            $lesson = Lesson::where('id', $this->lesson_id)->first();
        }else{
            $videos =  VideoNd::where('lesson_id', $this->lesson_id)->get();
            $lesson = LessonNd::where('id', $this->lesson_id)->first();
        }
        return view('livewire.admin.admin-dashboard-video',compact('videos', 'lesson', 'term_id', 'stage_id', 'class_id', 'subject_id'))->layout('layouts.admin');
    }
}
