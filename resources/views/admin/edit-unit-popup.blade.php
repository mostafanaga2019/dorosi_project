<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="editUnit" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="editUnitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="editUnitLabel">تعديل الوحدة</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">اسم
                                    الوحدة</label>
                                    
                                <div class="col-sm-9">
                                    <input id="unitInput" type="text" placeholder="اسم الوحدة" class="form-control input-md"
                                        wire:model="unit_new_name" />
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @error('unit_new_name')
                                    <p class="text-danger">يرجى تحديد اسم الوحدة الجديد </p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">ترتيب
                                    الوحدة</label>
                                    
                                <div class="col-sm-9">
                                    <input id="unitInputOrder" type="number" placeholder="ترتيب الوحدة" class="form-control input-md"
                                        wire:model="unit_new_order" />
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @error('unit_new_order')
                                    <p class="text-danger">يرجى تحديد اسم الوحدة الجديد </p>
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
                    wire:click.prevent="editUnit()">حفظ</button>
            </div>
        </div>
    </div>
</div>