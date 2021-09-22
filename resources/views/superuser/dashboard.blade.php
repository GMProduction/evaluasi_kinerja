@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')

    <section class="mt-content">
        @if (auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
            @include('superuser.dashboard.superuser', ['data' => 'content'])
            @include('superuser.dashboard.table', ['data' => 'content'])
        @elseif(auth()->user()->roles[0] == 'accessor' || auth()->user()->roles[0] == 'accessorppk')
            <div class="d-flex justify-content-between">
                <p class="fw-bold">Data Penyedia Jasa</p>
                <div class="search">
                    <input type="text" placeholder="search"/>
                    <div class="symbol">
                        <svg style="width:25px;height:25px" class="cloud" viewBox="0 0 25 25">
                            <path fill="white"
                                  d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/>
                        </svg>
                    </div>
                </div>
            </div>
            @include('superuser.dashboard.accessor',['data' => 'content'])
        @else
            @include('superuser.dashboard.vendor',['data' => 'content'])
        @endif

    </section>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if (auth()->user()->roles[0] == 'superuser' || auth()->user()->roles[0] == 'admin')
        @include('superuser.dashboard.superuser', ['data' => 'script'])
        @include('superuser.dashboard.table', ['data' => 'script'])
    @elseif(auth()->user()->roles[0] == 'accessor' || auth()->user()->roles[0] == 'accessorppk')
        @include('superuser.dashboard.accessor',['data' => 'script'])
    @else
        @include('superuser.dashboard.vendor',['data' => 'script'])
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
