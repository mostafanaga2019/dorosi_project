<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="addExercise" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="addExerciseLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="addExerciseLabel">إضافة أسئلة
                    جديدة </h5>
                    <h5 class="modal-title" id="addExerciseLabel">&nbsp;{{$unit_name}}&nbsp;</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12"> 

                            <div class="row  mb-3">
                                <label class="col-sm-3 col-form-label">
                                    عنوان</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-md" wire:model="exercise_name" />                                  
                                    @error('exercise_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror  
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-3 col-form-label">تحميل
                                    الأسئلة</label>
                                <div class="col-sm-9">
                                    <input class="mb-3" type="file" class="input-file" wire:model="exercise_file" />
                                    @if($exercise_file)
                                    <input type="text" style="border: 0;" class="form-control input-md"
                                        wire:model="exam_file" disabled />
                                    @endif
                                    @error('exercise_file')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click.prevent="resetInput()">إغلاق</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="addExercise()">إضافة</button>
            </div>
        </div>
    </div>
</div>