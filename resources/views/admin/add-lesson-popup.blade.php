<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="addLesson" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="addLessonLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5  class="modal-title" id="addLessonLabel">إضافة درس
                    جديد </h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">اسم
                                    الوحدة</label>
                                <div class="col-sm-9">
                                    <input style=" border: 0;" type="text" class="form-control input-md"
                                        wire:model="unit_name"  disabled/>                                   
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">اسم
                                    الدرس</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="اسم الدرس" class="form-control input-md"
                                        wire:model="lesson_name" />
                                   
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @error('lesson_name')
                                    <p class="text-danger">يرجى تحديد اسم الدرس </p>
                                    @enderror

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click.prevent="resetInput()">إغلاق</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="addLesson()">إضافة</button>
            </div>
        </div>
    </div>
</div>