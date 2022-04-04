<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="currentLesson" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="currentLessonLabel" aria-hidden="true">
    <style>
    .inp-style {
        border: 0;
        background-color: #fff;
        width: 30px;
        height: 30px;
        font-size: 0.75em;
        text-align: center;
        color: #fff;
        border-radius: 20px;
        color: black;
    }
    </style>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="currentLessonLabel">محتويات الدرس</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">اسم
                                    الدرس</label>
                                <div class="col-sm-9">
                                    <input style=" border: 0;" type="text" class="form-control input-md"
                                        wire:model="lesson_name" disabled />
                                </div>

                            </div>
                            <div class="text-center mb-3">

                                <button
                                style="display: flex;justify-content: space-between;align-items: center;margin: 0 auto;width:170px"
                                    type="button" wire:click.prevent="goSummary()" class="btn btn-primary">ملخصات
                                    &nbsp;&nbsp;
                                    <input type="text" class="form-control input-md inp-style"
                                        wire:model="summary_count" disabled />
                                </button>


                            </div>
                            <div class="text-center mb-3">
                                <button
                                    style="display: flex;justify-content: space-between;align-items: center;margin: 0 auto;width:170px"
                                    type="button" wire:click.prevent="goVideo()" class="btn btn-primary">فيديوهات
                                    &nbsp;&nbsp;
                                    <input type="text" class="form-control input-md inp-style" wire:model="video_count"
                                        disabled />
                                </button>

                            </div>                            


                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    wire:click.prevent="resetInput()">إغلاق</button>
            </div>
        </div>
    </div>
</div>