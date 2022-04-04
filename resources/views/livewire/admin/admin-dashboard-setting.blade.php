<div>
    <x-slot name="header">
        <div class="d-flex" style="align-items: center;">
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 ml-3 leading-tight">
                {{ __('من نحن') }}
            </h2>

        </div>

    </x-slot>
    @livewire('admin.admin-dashboard-vertical-menu')
    <div class="main-content">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div style="margin: 30px;" class="card">
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="saveSettings">
                            <div class="card-body">
                                @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}
                                </div>
                                @endif
                                <h4 class="card-title">اعدادت الموقع</h4>
                                <div class="divider"></div>                               
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">تكلفة
                                        الترقية</label>
                                    <div class="col-sm-10">
                                        <input style="direction: rtl;" wire:model="fees" class="form-control"
                                            type="number" placeholder="تكلفة الترقية" id="example-text-input">
                                        @error('fees')
                                        <p class="text-danger">يرجى تحديد تكلفة الترقية</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">رقم
                                        الجوال</label>
                                    <div class="col-sm-10">
                                        <input style="direction: rtl;" wire:model="pay_phone" class="form-control"
                                            type="text" placeholder="رقم الجوال" id="example-text-input">
                                        @error('pay_phone')
                                        <p class="text-danger">يرجى تحديد رقم الجوال</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">فيس بوك
                                        </label>
                                    <div class="col-sm-10">
                                        <input style="direction: rtl;" wire:model="facebook" class="form-control"
                                            type="text" placeholder="فيس بوك" id="example-text-input">
                                        @error('facebook')
                                        <p class="text-danger">يرجى تحديد رابط حساب الفيس بوك</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">تويتر
                                        </label>
                                    <div class="col-sm-10">
                                        <input style="direction: rtl;" wire:model="twitter" class="form-control"
                                            type="text" placeholder="تويتر" id="example-text-input">
                                        @error('twitter')
                                        <p class="text-danger">يرجى تحديد رابط حساب التويتر</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">جوجل بلاي
                                        </label>
                                    <div class="col-sm-10">
                                        <input style="direction: rtl;" wire:model="google_play" class="form-control"
                                            type="text" placeholder="جوجل بلاي" id="example-text-input">
                                        @error('google_play')
                                        <p class="text-danger">يرجى تحديد رابط التطبيق جوجل بلاي</p>
                                        @enderror
                                    </div>
                                </div>                              
                                
                                <div class="form-group col-md-6 md-offset-3">
                                    <div class="row">
                                        <label class="col-md-4 control-panel"></label>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">حفظ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
</div>