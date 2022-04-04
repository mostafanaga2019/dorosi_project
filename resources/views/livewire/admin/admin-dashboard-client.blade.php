<div>
    <x-slot name="header">
        <div class="d-flex" style="align-items: center;">
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 ml-3 leading-tight">
                {{ __('الأعضاء') }}
            </h2>

        </div>

    </x-slot>
    @livewire('admin.admin-dashboard-vertical-menu')
    <div class="main-content">
        <div class="page-content">
            <div class="row mb-4">
                <div  class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="input-group rounded">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            wire:model="keyword" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-info" wire:click.prevent="checkUsers()">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div  class="col-md-1"></div>
            </div>
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" style=" display: flex; align-items: center;">
                                    أعضاء
                                    &nbsp;&nbsp;

                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>اسم العضو</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>المسار</th>
                                            <th>المرحلة</th>
                                            <th>الصف</th>
                                            <th>حالة العضوية</th>
                                            <th>تاريخ الانتهاء</th>
                                            <th>نشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user )
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if ($user->path_id == 0)
                                                حكومي
                                                @else
                                                تجريبي
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->stage_id == 0)
                                                إبتدائي
                                                @elseif ($user->stage_id == 1)
                                                إعدادي
                                                @else
                                                ثانوي
                                                @endif
                                            </td>
                                            <td>
                                                @if($user->class_id == 0 )
                                                الأول
                                                @elseif($user->class_id == 1 )
                                                الثاني
                                                @elseif($user->class_id == 2 )
                                                الثالث
                                                @elseif($user->class_id == 3 )
                                                الرابع
                                                @elseif($user->class_id == 4 )
                                                الخامس
                                                @elseif($user->class_id == 5 )
                                                السادس
                                                @elseif($user->class_id == 6 )
                                                الأول
                                                @elseif($user->class_id == 7 )
                                                الثاني
                                                @elseif($user->class_id == 8 )
                                                الثالث
                                                @elseif($user->class_id == 9 )
                                                الأول
                                                @elseif($user->class_id == 10 )
                                                الثاني
                                                @else
                                                الثالث
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->status == 0)
                                                معطل
                                                @else
                                                مفعل   
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->status == 0)
                                                عضوية منتهية
                                                @else
                                                {{$user->exp_date}}   
                                                @endif
                                                
                                            </td>
                                            <td>
                                                @if ($user->status == 0)
                                                <button style="margin: 5px;" wire:click="activate({{$user->id}})"
                                                    class="btn btn-success" data-bs-toggle="modal">تمكين</i>
                                                </button>
                                                @else
                                                <button style="margin: 5px;" wire:click.prevent="deActivate({{$user->id}})"
                                                    class="btn btn-danger" data-bs-toggle="modal">تعطيل</i>
                                                </button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>