<div>

    <style>
    .btn-circle {
        width: 40px;
        height: 40px;
        border-radius: 20px;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;

    }

    .collect {
        display: inline-block;
        align-items: center;
        justify-content: start;
        margin-bottom: 5px;
        border: 1px solid #e4e4e4;
        border-radius: 0.25rem;
        
    }

    .divider {
        width: 100%;
        height: 1px;
        background-color: #e5e5e5;
    }
    </style>
    @include('admin.add-lesson-popup')
    @include('admin.add-unit-popup')
    @include('admin.edit-lesson-popup')
    @include('admin.delete-lesson-popup')
    @include('admin.delete-unit-popup')
    @include('admin.edit-unit-popup')
    @include('admin.current-lesson-popup')
    @include('admin.add-exam-popup')
    @include('admin.add-exercise-popup')
    @include('admin.delete-exercise-popup')
    @include('admin.delete-exam-popup')

    <x-slot name="header">
        <div class="d-flex" style="align-items: center;">
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('المواد') }}
            </h2>
        </div>
    </x-slot>
    @livewire('admin.admin-dashboard-vertical-menu')
    <div class="main-content">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex" style="flex-wrap: wrap;align-items: center;justify-content: center;">
                                @foreach ($subjects as $subject )
                                @if ($subject->path_id == 1)
                                @if($subject_id == $subject->id)
                                <a href="{{route('subjects', ['subject_id' => $subject->id, 'term_id'=> $subject->term_id,'stage_id'=> $subject->stage_id,'class_id'=> $subject->class_id ])}}"
                                    style="margin: 3px;" class="btn btn-success">
                                    {{$subject->name}}
                                </a>
                                @else
                                <a href="{{route('subjects', ['subject_id' => $subject->id, 'term_id'=> $subject->term_id, 'stage_id'=> $subject->stage_id,'class_id'=> $subject->class_id])}}"
                                    style="margin: 3px;" class="btn btn-secondary">
                                    {{$subject->name}}
                                </a>
                                @endif
                                @else
                                @if($subject_id == $subject->id)
                                <a href="{{route('subjects', ['subject_id' => $subject->id, 'term_id'=> $subject->term_id, 'stage_id'=> $subject->stage_id,'class_id'=> $subject->class_id])}}"
                                    style="margin: 3px;" class="btn btn-success">
                                    {{$subject->name}}
                                </a>
                                @else
                                <a href="{{route('subjects', ['subject_id' => $subject->id, 'term_id'=> $subject->term_id, 'stage_id'=> $subject->stage_id,'class_id'=> $subject->class_id])}}"
                                    style="margin: 3px;" class="btn btn-primary">
                                    {{$subject->name}}
                                </a>
                                @endif
                                @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-xl-3"></div>
                <div class="col-md-6 col-xl-6">
                    <div class="card" style="border: 1px solid #e5e5e5;">
                        <div class="card-body">
                            <div class="mini-stat widget-chart-sm clearfix">

                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="mini-stat-info text-start">
                                        @if ($subjects->first()->stage_id == 0)
                                        <span class="counter text-info">الإبتدائية</span>
                                        @elseif($subjects->first()->stage_id == 1 )
                                        <span class="counter text-info">الإعدادية</span>
                                        @else
                                        <span class="counter text-info">الثانوية</span>
                                        @endif

                                        المرحلة
                                    </div>
                                    <div style="background-color: darkmagenta;" class="btn-circle">
                                        @if ($subjects->first()->stage_id == 0)
                                        <i class="mdi mdi-note-outline text-white"></i>
                                        @elseif($subjects->first()->stage_id == 1 )
                                        <i class="mdi mdi-note-text text-white"></i>
                                        @else
                                        <i class="mdi mdi-note text-white"></i>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="card-body">
                            <div class="mini-stat widget-chart-sm clearfix">

                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="mini-stat-info text-start">
                                        @if ($subjects->first()->class_id != 11)
                                        @if ($subjects->first()->term_id == 0)
                                        <span class="counter text-info">الأول</span>
                                        @else
                                        <span class="counter text-info">الثاني</span>
                                        @endif
                                        @else
                                        <span class="counter text-info">الترمين</span>
                                        @endif
                                        الترم
                                    </div>
                                    <div style="background-color: darkmagenta;" class="btn-circle">
                                        <i class="mdi mdi-arrange-bring-forward text-white"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="card-body">
                            <div class="mini-stat widget-chart-sm clearfix">

                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="mini-stat-info text-start">
                                        <span class="counter text-info">
                                            @if($subjects->first()->class_id == 0 )
                                            الأول
                                            @elseif($subjects->first()->class_id == 1 )
                                            الثاني
                                            @elseif($subjects->first()->class_id == 2 )
                                            الثالث
                                            @elseif($subjects->first()->class_id == 3 )
                                            الرابع
                                            @elseif($subjects->first()->class_id == 4 )
                                            الخامس
                                            @elseif($subjects->first()->class_id == 5 )
                                            السادس
                                            @elseif($subjects->first()->class_id == 6 )
                                            الأول
                                            @elseif($subjects->first()->class_id == 7 )
                                            الثاني
                                            @elseif($subjects->first()->class_id == 8 )
                                            الثالث
                                            @elseif($subjects->first()->class_id == 9 )
                                            الأول
                                            @elseif($subjects->first()->class_id == 10 )
                                            الثاني
                                            @else
                                            الثالث
                                            @endif
                                        </span>
                                        الصف
                                    </div>
                                    <div class="btn-circle bg-primary">
                                        <i class="mdi mdi-account text-white"></i>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="divider"></div>
                        <div class="card-body">
                            <div class="mini-stat widget-chart-sm clearfix">

                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="mini-stat-info text-start">
                                        <span class="counter text-info">{{$subjects->count()}}</span>
                                        عدد المواد
                                    </div>
                                    <div style="background-color: goldenrod;" class="btn-circle">
                                        <i class="mdi mdi-book-multiple text-white"></i>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="divider"></div>
                        <div class="card-body">
                            <div class="mini-stat widget-chart-sm clearfix">

                                <div style="display: flex;align-items: center;justify-content: space-between;">
                                    <div class="mini-stat-info text-start">
                                        <span class="counter text-info">{{$currentSubject->name}}</span>
                                        المادة الحالية
                                    </div>
                                    <div style="background-color: #4ac18e;" class="btn-circle">
                                        <i class="mdi mdi-note text-white"></i>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-xl-3"></div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" style=" display: flex; align-items: center;">
                                    وحدات مادة &nbsp;&nbsp;
                                    <div class="counter text-info">{{$currentSubject->name}} </div>


                                </div>
                                <div style="direction: ltr;" class="col-md-6">

                                    <button class="btn btn-success pull-left" data-bs-toggle="modal"
                                        data-bs-target="#addUnit">وحدة جديدة</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>اسم الوحدة</th>
                                            <th>الترتيب</th>
                                            <th>دروس الوحدة</th>
                                            <th>أسئلة على الوحدة</th>
                                            <th>نشاط الوحدة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentSubject->units as $unit )
                                        <tr>
                                            <td>{{$unit->name}}</td>
                                            <td> الوحدة &nbsp; {{$unit->unit_order}}</td>
                                            <td>

                                                @foreach ($unit->lessons as $lesson )
                                                <div>
                                                    <div class="collect">
                                                        <button style="margin: 5px;width:170px" href="#" class="btn btn-secondary"
                                                            data-bs-toggle="modal"
                                                            wire:click="$emit('setCurrentLessonId', {{$lesson->id}})">{{$lesson->name}}</button>
                                                        <button style="margin: 5px;"
                                                            wire:click="$emit('setLessonId', {{$lesson->id}})"
                                                            class="btn btn-info" data-bs-toggle="modal"><i
                                                                class="mdi mdi-table-edit"></i></button>

                                                        <button style="margin: 5px;"
                                                            wire:click="$emit('setDeleteLessonId', {{$lesson->id}})"
                                                            class="btn btn-danger" data-bs-toggle="modal"><i
                                                                class="mdi mdi-delete"></i></button>

                                                    </div>
                                                </div>

                                                @endforeach
                                                <div  class="collect">
                                                <button wire:click="$emit('setUnitId', {{$unit->id}})"
                                                    class="btn btn-success" data-bs-toggle="modal">درس جديد</button>
                                                </div>
                                                

                                            </td>
                                            <td>
                                                @foreach ($unit->exercises as $exercise )
                                                <div>
                                                    <div class="collect">
                                                    <a style="margin: 5px;width:170px" class="btn btn-secondary" target="blank" href="http://127.0.0.1:8000/assets/images/exercises/{{$exercise->link}}">{{$exercise->name}}</a>                                                      
                                                       

                                                    <button style="margin: 5px;"
                                                            wire:click="$emit('setDeleteExerciseId', {{$exercise->id}})"
                                                            class="btn btn-danger" data-bs-toggle="modal"><i
                                                                class="mdi mdi-delete"></i></button>

                                                    </div>
                                                </div>
                                                @endforeach
                                                <div  class="collect">
                                                    <button wire:click="$emit('setUnitExerciseId', {{$unit->id}})"
                                                    class="btn btn-success" data-bs-toggle="modal">إضافة</button>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="collect">
                                                    <button style="margin: 5px;"
                                                        wire:click="$emit('setEditUnitId', {{$unit->id}})"
                                                        class="btn btn-info" data-bs-toggle="modal"><i
                                                            class="mdi mdi-table-edit"></i></button>
                                                    <button style="margin: 5px;"
                                                        wire:click="$emit('setDeleteUnitId', {{$unit->id}})"
                                                        class="btn btn-danger" data-bs-toggle="modal"><i
                                                            class="mdi mdi-delete"></i></button>

                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" style=" display: flex; align-items: center;">
                                    إمتحانات مادة &nbsp;&nbsp;
                                    <div class="counter text-info">{{$currentSubject->name}} </div>


                                </div>
                                <div style="direction: ltr;" class="col-md-6">

                                    <button class="btn btn-success pull-left" data-bs-toggle="modal"
                                        data-bs-target="#addExam">امتحان جديدة</button>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>اسم الإمتحان</th> 
                                            <th>نشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($currentSubject->exams as $exam )
                                        <tr>
                                            <td> <a target="blank" href="http://127.0.0.1:8000/assets/images/exams/{{$exam->link}}">{{$exam->name}}</a></td>
                                            <td>
                                                <div class="collect">                                                    
                                                    <button style="margin: 5px;"
                                                        wire:click="$emit('setDeleteExamId', {{$exam->id}})"
                                                        class="btn btn-danger" data-bs-toggle="modal"><i
                                                            class="mdi mdi-delete"></i></button>

                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    Livewire.on('openAddLessonDialogue', function() {
        $("#addLesson").modal('show');
    })
    Livewire.on('openEditLessonDialogue', lessonName => {
        $("#lessonInput").val(lessonName);
        $("#editLesson").modal('show');
    })
    Livewire.on('openDeleteLessonDialogue', lessonName => {
        $("#lessonName").html(lessonName);
        $("#deleteLesson").modal('show');
    })
    Livewire.on('openDeleteUnitDialogue', unitName => {

        $("#unitDeleteName").html(unitName);
        $("#deleteUnit").modal('show');
    })
    Livewire.on('openEditUnitDialogue', (unitName, unitOrder) => {

        $("#unitInput").val(unitName);
        $("#unitInputOrder").val(unitOrder);
        $("#editUnit").modal('show');
    })
    Livewire.on('openCurrentLessonDialogue', function() {
        $("#currentLesson").modal('show');
    })

    Livewire.on('openAddExerciseDialogue', function() {
        $("#addExercise").modal('show');
    })

    Livewire.on('openDeleteExerciseDialogue', exerciseName => {
        $("#exerciseName").html(exerciseName);
        $("#deleteExercise").modal('show');
    })
    Livewire.on('openDeleteExamDialogue', examName => {
        $("#examName").html(examName);
        $("#deleteExam").modal('show');
    })
    

    

    




})
</script>
@endpush