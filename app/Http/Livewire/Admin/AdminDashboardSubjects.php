<?php

namespace App\Http\Livewire\Admin;

use App\Models\Exams;
use App\Models\ExamsNd;
use App\Models\Lesson;
use App\Models\LessonNd;
use App\Models\Subject;
use App\Models\SubjectsNd;
use App\Models\Summary;
use App\Models\SummaryNd;
use App\Models\Unit;
use App\Models\UnitNd;
use App\Models\UnitsExercise;
use App\Models\UnitsExerciseNd;
use App\Models\Video;
use App\Models\VideoNd;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminDashboardSubjects extends Component
{
    use WithFileUploads;
    public $term_id;
    public $stage_id;
    public $class_id;
    public $subject_id;
    public $lesson_name;
    public $lesson_new_name;
    
    public $unit_id;
    public $lesson_id;
    public $unit_name;
    public $unit_order;
    public $unit_new_name;
    public $unit_new_order;
    
    public $summary_count;    
    public $video_count;
    public $exercise_count;
    public $query_count;


    public $exam_file;
    public $exam_name;

    public $exercise_file;
    public $exercise_name;

    public $exercise_id;
    public $exam_id;

    protected $rules = [
        'exam_name' => 'required',      
        'exam_file' => 'required',         
    ];
    
    protected $messages = array(
        'exam_name.required'=>'اسم الإمتحان مطلوب',
        'exam_file.required'=>'ملف الإمتحان مطلوب',      
           
       
    );

    protected $exerciseRules = [
        'exercise_file' => 'required',      
        'exercise_name' => 'required',         
    ];
    
    protected $exerciseMessages = array(
        'exercise_name.required'=>'العنوان مطلوب',
        'exercise_file.required'=>'الملف مطلوب',      
           
       
    );


    protected $listeners = [
        'setUnitId' => 'setUnitId',
        'setUnitExerciseId' => 'setUnitExerciseId',
        'setLessonId' => 'setLessonId',
        'setDeleteLessonId' => 'setDeleteLessonId',
        'setDeleteExerciseId' => 'setDeleteExerciseId',
        'setDeleteUnitId' =>'setDeleteUnitId',
        'setDeleteExamId'=>'setDeleteExamId',
        'setEditUnitId' => 'setEditUnitId',
        'setCurrentLessonId' => 'setCurrentLessonId',
    ];


    public function mount($term_id = null, $stage_id = null, $class_id = null, $subject_id = null){
        $this->term_id = $term_id;
        $this->stage_id = $stage_id;
        $this->class_id = $class_id;
        $this->subject_id = $subject_id;
        
       
        
    }

    public function setUnitId($unit_id){
        $this->unit_id = $unit_id; 
        if($this->term_id == 0){
            $unit =  Unit::find( $this->unit_id);     
        }else{
            $unit =  UnitNd::find( $this->unit_id);    
        }
        $this->unit_name = $unit->name;  

        $this->emit('openAddLessonDialogue');
    }

    public function setUnitExerciseId($unit_id){
        $this->unit_id = $unit_id; 
        if($this->term_id == 0){
            $unit =  Unit::find( $this->unit_id);     
        }else{
            $unit =  UnitNd::find( $this->unit_id);    
        }
        $this->unit_name = $unit->name;  

        $this->emit('openAddExerciseDialogue');
    }


    public function setEditUnitId($unit_id){
        
        $this->unit_id = $unit_id; 
        if($this->term_id == 0){
            $unit =  Unit::find( $this->unit_id);     
        }else{
            $unit =  UnitNd::find( $this->unit_id);    
        }
        $this->unit_new_name = $unit->name;  
        $this->unit_new_order = $unit->unit_order; 
        $this->emit('openEditUnitDialogue', $this->unit_new_name ,  $this->unit_new_order);
    }

    public function setDeleteUnitId($unit_id){
        $this->unit_id = $unit_id; 
        if($this->term_id == 0){
            $unit =  Unit::find( $this->unit_id);     
        }else{
            $unit =  UnitNd::find( $this->unit_id);    
        }
        $this->unit_name = $unit->name;  
       
        $this->emit('openDeleteUnitDialogue', $this->unit_name);
    }

    public function setLessonId($lesson_id){
        $this->lesson_id = $lesson_id;    
        if($this->term_id == 0){
            $lesson =  Lesson::find($this->lesson_id);     
        }else{
            $lesson =  LessonNd::find($this->lesson_id);    
        }   
        $this->emit('openEditLessonDialogue', $lesson->name);
    }

    public function setCurrentLessonId($lesson_id){
        $this->lesson_id = $lesson_id;
        if($this->term_id == 0){
            $lesson =  Lesson::find($this->lesson_id);     
        }else{
            $lesson =  LessonNd::find($this->lesson_id);    
        }  
        $this->lesson_name = $lesson->name;   
        $this->summary_count = $lesson->summary_count;
        $this->video_count = $lesson->video_count;
        $this->exercise_count = $lesson->exercise_count;
        $this->query_count = $lesson->query_count;
        $this->emit('openCurrentLessonDialogue');
    }

    public function setDeleteLessonId($lesson_id){
        $this->lesson_id = $lesson_id;    
        if($this->term_id == 0){
            $lesson =  Lesson::find($this->lesson_id);     
        }else{
            $lesson =  LessonNd::find($this->lesson_id);    
        }   
        $this->emit('openDeleteLessonDialogue', $lesson->name);
    }

    public function setDeleteExerciseId($exercise_id){
        $this->exercise_id = $exercise_id;    
        if($this->term_id == 0){
            $exercise =  UnitsExercise::find($this->exercise_id);     
        }else{
            $exercise =  LessonNd::find($this->exercise_id);    
        }   
        $this->emit('openDeleteExerciseDialogue', $exercise->name);
    }

    public function setDeleteExamId($exam_id){
        $this->exam_id = $exam_id;    
        if($this->term_id == 0){
            $exam =  Exams::find($this->exam_id);     
        }else{
            $exam =  ExamsNd::find($this->exam_id);    
        }   
        $this->emit('openDeleteExamDialogue', $exam->name);
    }
    public function resetInput(){
       
        $this->lesson_name = null;
        $this->lesson_new_name = null;        
        $this->unit_id = null;
        $this->lesson_id = null;
        $this->unit_name = null;
        $this->unit_order = null;
        $this->unit_new_name = null;
        $this->unit_new_order = null;
        $this->summary_count = null;        
        $this->video_count = null;
        $this->exercise_count = null;
        $this->query_count = null;
        
    }

    
    public function addUnit(){

        if($this->term_id == 0){
            $this->validate(
                [ 
                    'unit_name' => 'required|unique:units,name',
                                 
                ],
                [
                    'unit_name.required' => 'يرجى تحديد اسم الوحدة',
                    'unit_order.required' => 'يرجى تحديد ترتيب الوحدة',
                    'unit_order.unique' => 'عذرا ترتيب الوحدة محجوز',
                    'unit_name.unique' => 'عذرا إسم الوحدة محجوز'
                ]
            );
            $unit = new Unit();     
        }else{
            $this->validate(
                [ 
                    'unit_name' => 'required|unique:units,name',
                                  
                ],
                [
                    'unit_name.required' => 'يرجى تحديد اسم الوحدة',
                    'unit_order.required' => 'يرجى تحديد ترتيب الوحدة',                   
                    'unit_name.unique' => 'عذرا إسم الوحدة محجوز'
                ]
            ); 
            $unit = new UnitNd();     
        }        
       
       
        $unit->name = $this->unit_name;
        $unit->unit_order = $this->unit_order;  
        $unit->subject_id = $this->subject_id;               
        $unit->save();
        session()->flash('message', 'تم إنشاء وحدة جديدة بنجاح');
        $this->unit_order = null;
        $this->unit_name = null;

    }

    public function editUnit(){
     
        $this->validate(
            [ 
                'unit_new_name' => 'required',
                'unit_new_order' => 'required',                            
            ]
        );
        if($this->term_id == 0){
            $unit =  Unit::find($this->unit_id);     
        }else{
            $unit =  UnitNd::find($this->unit_id);        
        }
       
        $unit->name = $this->unit_new_name;
        $unit->unit_order = $this->unit_new_order;       
        $unit->save();        

        session()->flash('message', 'تم تعديل الوحدة  بنجاح');
        $this->unit_order = null;
        $this->unit_name = null;
        

    }
    

    public function addLesson(){

        $this->validate(
            [ 
                'lesson_name' => 'required',                            
            ]
        );

        if($this->term_id == 0){
            $lesson = new Lesson();     
        }else{
            $lesson = new LessonNd();     
        }

        $lesson->name = $this->lesson_name;
        $lesson->unit_id = $this->unit_id; 
        $lesson->save();        

        session()->flash('message', 'تم إنشاء درس جديد بنجاح');
        $this->lesson_name = null;
        

    }
    
    public function editLesson(){
     
        $this->validate(
            [ 
                'lesson_new_name' => 'required',                            
            ]
        );
        if($this->term_id == 0){
            $lesson =  Lesson::find($this->lesson_id);     
        }else{
            $lesson =  LessonNd::find($this->lesson_id);        
        }
       
        $lesson->name = $this->lesson_new_name;
       
        $lesson->save();        

        session()->flash('message', 'تم تعديل الدرس  بنجاح');
        
        

    }

    public function deleteLesson(){     
       
        if($this->term_id == 0){
            $lesson =  Lesson::find($this->lesson_id);  
            $summaries = Summary::where('lesson_id', $this->lesson_id)->get();   
            $videos = Video::where('lesson_id', $this->lesson_id)->get();   
          
        }else{
            $lesson =  LessonNd::find($this->lesson_id); 
            $summaries = SummaryNd::where('lesson_id', $this->lesson_id)->get(); 
            $videos = VideoNd::where('lesson_id', $this->lesson_id)->get();  
           
        } 

        foreach ($summaries as $summary) {
            $summary->delete();
            if(file_exists('assets/images/summaries/'.$summary->link)){
                unlink('assets/images/summaries/'.$summary->link);
            }
        }
        foreach ($videos as $video) {
            $video->delete();
        }
       
       
        $lesson->delete();
      
        
        

        session()->flash('message', 'تم حذف الدرس  بنجاح');

          
        

    }

    public function deleteExercise(){     
       
        if($this->term_id == 0){
            $exercise =  UnitsExercise::find($this->exercise_id);          
        }else{
            $exercise =  UnitsExerciseNd::find($this->exercise_id);            
        }        
        
       
        $exercise->delete();

        session()->flash('message', 'تم حذف الأسئلة  بنجاح');        

    }

    public function deleteExam(){     
       
        if($this->term_id == 0){
            $exam =  Exams::find($this->exam_id);          
        }else{
            $exam =  ExamsNd::find($this->exam_id);            
        }        
       
       
        $exam->delete();

        session()->flash('message', 'تم حذف الإمتحان  بنجاح');        

    }

    public function deleteUnit(){     
       
        if($this->term_id == 0){
            $unit =  Unit::find($this->unit_id);    
            $lessons = Lesson::where('unit_id', $unit->id)->get(); 
            $exercises = UnitsExercise::where('unit_id', $unit->id)->get();          
        }else{
            $unit =  UnitNd::find($this->unit_id);  
            $lessons = LessonNd::where('unit_id', $unit->id)->get(); 
            $exercises = UnitsExerciseNd::where('unit_id', $unit->id)->get();                       
        }  

       

        foreach ($lessons as $lesson) {
            if($this->term_id == 0){
                $summaries = Summary::where('lesson_id', $lesson->id)->get();   
                $videos = Video::where('lesson_id', $lesson->id)->get();   
               
            }else{
                $summaries = SummaryNd::where('lesson_id', $lesson->id)->get(); 
                $videos = VideoNd::where('lesson_id', $lesson->id)->get();  
               
            }

            foreach ($summaries as $summary) {
                $summary->delete();
                if(file_exists('assets/images/summaries/'.$summary->link)){
                    unlink('assets/images/summaries/'.$summary->link);
                }
            }
            foreach ($videos as $video) {
                $video->delete();
            }
            $lesson->delete();

        }
        
        
        foreach ($exercises as $exercise) {
            $exercise->delete();
            if(file_exists('assets/images/exercises/'.$exercise->link)){
                unlink('assets/images/exercises/'.$exercise->link);
            }
        } 

        $unit->delete();        
        
        session()->flash('message', 'تم حذف الوحدة  بنجاح');      
        

    }

    public function addExam(){        
        $this->validate(
            $this->rules, $this->messages
        );  
        if($this->term_id == 0){
            $exam = new Exams(); 
        }else{
            $exam = new ExamsNd();  
        }
        $examFileName = Carbon::now()->timestamp . '.' . $this->exam_file->extension(); 
        $this->exam_file->storeAs('exams', $examFileName);      
        $exam->link = $examFileName; 
        $exam->name = $this->exam_name;
        $exam->subject_id = $this->subject_id;
        if($this->exam_file->extension() == "pdf"){
            $exam->status = 1;
        }else {
            $exam->status = 0;
        } 
        $exam->save();        
       
        $this->exam_name = null;
        $this->exam_file = null;
    }

    public function addExercise(){        
        $this->validate(
            $this->exerciseRules, $this->exerciseMessages
        );  
        if($this->term_id == 0){
            $exercise = new UnitsExercise(); 
        }else{
            $exercise = new UnitsExerciseNd();  
        }
        $exerciseFileName = Carbon::now()->timestamp . '.' . $this->exercise_file->extension(); 
        $this->exercise_file->storeAs('exercises', $exerciseFileName);      
        $exercise->link = $exerciseFileName; 
        $exercise->name = $this->exercise_name;
        $exercise->unit_id = $this->unit_id;
        if($this->exercise_file->extension() == "pdf"){
            $exercise->status = 1;
        }else {
            $exercise->status = 0;
        } 
        $exercise->save();        
       
        $this->exercise_file = null;
        $this->exercise_name = null;
    }



    public function goSummary(){  
        
        return redirect()->route('summary',
        [
            'term_id'=> $this->term_id,
            'stage_id'=> $this->stage_id,
            'class_id' => $this->class_id,
            'subject_id'=> $this->subject_id,
            'lesson_id'=> $this->lesson_id,
            ]
        );
    }

    public function goVideo(){  
        
        return redirect()->route('video',
        [
            'term_id'=> $this->term_id,
            'stage_id'=> $this->stage_id,
            'class_id' => $this->class_id,
            'subject_id'=> $this->subject_id,
            'lesson_id'=> $this->lesson_id,
            ]
        );
    }

   
   
    public function render()
    {
        $subject_id = $this->subject_id;
        if($this->term_id == 0){
            $subjects = Subject::where('stage_id', $this->stage_id)->where('class_id', $this->class_id)->get();  
            $currentSubject =Subject::find($subject_id); 
            
        }else{
            $subjects = SubjectsNd::where('stage_id', $this->stage_id)->where('class_id', $this->class_id)->get();
            $currentSubject =SubjectsNd::find($subject_id); 
        }
       
       
        return view('livewire.admin.admin-dashboard-subjects', compact('subjects','subject_id', 'currentSubject'))->layout('layouts.admin');
    }



}
