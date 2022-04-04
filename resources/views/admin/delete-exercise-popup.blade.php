<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="deleteExercise" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteExerciseLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="deleteExerciseLabel">  حذف الأسئلة
                    </h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">العنوان
                                            </label>
                                        <label id="exerciseName" class="col-sm-3 col-form-label"> </label>
                                    </div>
                                    <div class="row">
                                        <p style="text-align: center;">
                                            سيتم حذف الأسئلة نهائيا؟
                                        </p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  wire:click.prevent="resetInput()">إغلاق</button>
                <button type="button" class="btn btn-danger" wire:click.prevent="deleteExercise()"  data-bs-dismiss="modal">حذف</button>
            </div>
        </div>
    </div>
</div>