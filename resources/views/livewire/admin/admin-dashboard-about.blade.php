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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <form class="form-horizontal" enctype="multipart/form-data"
                                            wire:submit.prevent="saveContent">
                                            <div class="card-body">
                                                @if(Session::has('message'))
                                                <div class="alert alert-success" role="alert">
                                                    {{Session::get('message')}}
                                                </div>
                                                @endif
                                                <h1 style="font-weight: bold;margin-bottom: 30px;"
                                                    class="card-title text-center">من  نحن</h1>
                                                <div class="col-sm-12">
                                                    <textarea
                                                        style="direction: rtl;min-height: 200px;margin-bottom: 30px;text-align: center;font-weight: bold;"
                                                        wire:model="about" class="form-control" placeholder=""
                                                        id="example-text-input"></textarea>
                                                    @error('about')
                                                    <p class="text-danger">يرجى إضافة نص من نحن</p>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12 md-offset-6">
                                                    <div class="text-center">
                                                        <button style="min-width: 150px;" type="submit"
                                                            class="btn btn-primary">حفظ</button>
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
            </div>
        </div>
    </div>
</div>