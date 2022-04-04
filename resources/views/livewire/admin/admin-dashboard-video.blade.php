<div>
    @include('admin.add-video-popup')
    @include('admin.delete-video-popup')
    <x-slot name="header">
        <div class="d-flex" style="align-items: center;">
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('فيديوهات') }}
            </h2>
        </div>
    </x-slot>
    @livewire('admin.admin-dashboard-vertical-menu')
    <div class="main-content">
        <div class="page-content">


            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6" style=" display: flex; align-items: center;">
                                    فيديوهات درس
                                    &nbsp;&nbsp;
                                    {{$lesson->name}}
                                </div>
                                <div style="direction: ltr;" class="col-md-6">
                                    <button class="btn btn-success pull-left" data-bs-toggle="modal"
                                        data-bs-target="#addVideo">فيديو جديد</button>
                                    &nbsp;&nbsp;
                                    <a href="{{route('subjects', [
                                         'term_id'=> $term_id,
                                         'stage_id'=> $stage_id,
                                         'class_id' => $class_id,
                                         'subject_id'=>$subject_id,
                                         ])}}" class="btn btn-info pull-left">رجوع</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>رابط الفيديو</th>
                                            <th>نشاط</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video )
                                        <tr>
                                            <td>{{$video->id}}</td>
                                            <td><a target="blank" href="{{$video->video_url}}">{{$video->video_url}}</a>
                                            </td>
                                            <td> <button style="margin: 5px;"
                                                    wire:click="$emit('setDeleteVideoId', {{$video->id}})"
                                                    class="btn btn-danger" data-bs-toggle="modal"><i
                                                        class="mdi mdi-delete"></i></button>
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


@push('scripts')
<script>  
document.addEventListener('DOMContentLoaded', function() {   
    
    Livewire.on('openDeleteVideoDialogue', function() {
        
        $("#deleteVideo").modal('show');
    })
})
</script>
@endpush