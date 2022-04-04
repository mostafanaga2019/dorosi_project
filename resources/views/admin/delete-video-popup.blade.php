<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="deleteVideo" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteVideoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="deleteVideoLabel">  حذف الفيديو
                    </h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12">
                                   
                                    <div class="row">
                                        <p style="text-align: center;">
                                            سيتم حذف الفيديو نهائيا؟
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
                <button type="button" class="btn btn-danger" wire:click.prevent="deleteVideo()"  data-bs-dismiss="modal">حذف</button>
            </div>
        </div>
    </div>
</div>