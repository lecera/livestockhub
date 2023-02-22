{{-- @if(session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show=false, 3000)" x-show="show" class="fixed top-0">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif --}}

@if (session('message'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show=false, 3000)" x-show="show" class="alert alert-success" style="text-align: center;">
        {{ session('message') }}
    </div>
@endif
