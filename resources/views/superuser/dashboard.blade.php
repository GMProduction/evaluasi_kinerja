@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')

    <section class="" style="margin-top: 100px">
        @if(auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
            @include('superuser.dashboard.superuser', ['data' => 'content'])
            @include('superuser.dashboard.table', ['data' => 'content'])
        @elseif(auth()->user()->roles[0] == 'accessor' || auth()->user()->roles[0] == 'accessorppk')
            @include('superuser.dashboard.accessor',['data' => 'content'])
        @endif

    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if(auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
        @include('superuser.dashboard.superuser', ['data' => 'script'])
        @include('superuser.dashboard.table', ['data' => 'script'])
    @elseif(auth()->user()->roles[0] == 'accessor' || auth()->user()->roles[0] == 'accessorppk')
        @include('superuser.dashboard.accessor',['data' => 'script'])
    @endif

    <script>
        var roles, textRoles;
        var table;
        $(document).ready(function () {
            // chart()
            // cahar11()
            roles = 'superuser';
            textRoles = 'Superuser'
        });




    </script>
@endsection
