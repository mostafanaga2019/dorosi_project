<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="editLesson" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLessonabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="editLessonLabel">تعديل الدرس</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">اسم
                                    الدرس</label>
                                    
                                <div class="col-sm-9">
                                    <input id="lessonInput" type="text" placeholder="اسم الدرس" class="form-control input-md"
                                        wire:model="lesson_new_name" />
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @error('lesson_new_name')
                                    <p class="text-danger">يرجى تحديد اسم الدرس الجديد </p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click.prevent="resetInput()">إغلاق</button>
                <button type="button" class="btn btn-primary"
                    wire:click.prevent="editLesson()">حفظ</button>
            </div>
        </div>
    </div>
</div>