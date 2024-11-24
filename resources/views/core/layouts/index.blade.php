@extends('template.dashboard-template')

@section('content')
    <div class="w-full h-full">
        {{-- content container --}}
        <div id="dashboard" class="lg:ml-60 flex flex-col items-center space-y-16">
        @include('core.layouts.navbar')
            <div class="max-w-[1300px] w-[calc(100%-8rem)] h-[860px]"> 
                @yield('core-content')
            </div>
        </div>
    </div>
@endsection