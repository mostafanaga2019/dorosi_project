<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="addExam" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="addExamLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="addExamLabel">إضافة إمتحان
                    جديد </h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12"> 

                            <div class="row  mb-3">
                                <label class="col-sm-3 col-form-label">اسم
                                    الإمتحان</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-md" wire:model="exam_name" />                                  
                                    @error('exam_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror  
                                </div>
                            </div>
                            
                            <div class="row">
                                <label class="col-sm-3 col-form-label">تحميل
                                    الإمتحان</label>
                                <div class="col-sm-9">
                                    <input class="mb-3" type="file" class="input-file" wire:model="exam_file" />
                                    @if($exam_file)
                                    <input type="text" style="border: 0;" class="form-control input-md"
                                        wire:model="exam_file" disabled />
                                    @endif
                                    @error('exam_file')
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
                <button type="button" class="btn btn-primary" wire:click.prevent="addExam()">إضافة</button>
            </div>
        </div>
    </div>
</div>