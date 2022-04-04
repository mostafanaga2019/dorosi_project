<div style="z-index: 5000;" wire:ignore.self class="modal fade no-spinner" id="addUnit" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUnitLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="justify-content:center;">
                <h5 class="modal-title" id="addUnitLabel">إضافة وحدة
                    جديدة</h5>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="row" dir="rtl">
                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">اسم
                                    الوحدة</label>
                                <div class="col-sm-9">
                                    <input type="text" placeholder="اسم الوحدة" class="form-control input-md"
                                        wire:model="unit_name" />
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @error('unit_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror

                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-sm-3 col-form-label">ترتيب
                                    الوحدة</label>
                                <div class="col-sm-9">
                                    <input style="text-align: center;" type="number" placeholder="ترتيب الوحدة" class="form-control input-md"
                                        wire:model="unit_order" />
                                </div>

                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    @error('unit_order')
                                    <p class="text-danger">{{$message}}</p>
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
                    wire:click.prevent="addUnit()">إضافة</button>
            </div>
        </div>
    </div>
</div>