<x-admin-layout>
    <x-slot name="header">
        <div class="d-flex" style="align-items: center;">
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('لوحة التحكم') }}
            </h2>
        </div>
    </x-slot>   
    @livewire('admin.admin-dashboard-vertical-menu') 
    
</x-admin-layout>
