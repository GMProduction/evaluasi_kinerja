@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection

@section('title')
    Dashboard
@endsection

@section('content')

<section class="" style="margin-top: 100px">
    <div role="tablist">
        <div class="items-tab">
            <a class="card-tab active d-block c-text"  data-toggle="tab" href="#home" role="tab">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-user-circle icon-size-lg '></i> 
                    <p class="number-card">40</p>
                </div>
                <div class="mt-2">
                    Super User
                </div>
            </a>

            <a class="card-tab d-block c-text"  data-toggle="tab" href="#home" role="tab">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-user-voice' ></i>
                    <p class="number-card">40</p>
                </div>
                <div class="mt-2">
                    Admin Balai
                </div>
            </a>

            <a class="card-tab d-block c-text"  data-toggle="tab" href="#home" role="tab">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-user' ></i>
                    <p class="number-card">40</p>
                </div>
                <div class="mt-2">
                    Asesor Balai
                </div>
            </a>

            <a class="card-tab d-block c-text"  data-toggle="tab" href="#home" role="tab">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-user' ></i> 
                    <p class="number-card">40</p>
                </div>
                <div class="mt-2">
                    Asesor PPK
                </div>
            </a>

            <a class="card-tab d-block c-text"  data-toggle="tab" href="#home" role="tab">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-user' ></i>
                    <p class="number-card">23</p>
                </div>
                <div class="mt-2">
                    Penyedia Jasa
                </div>
            </a>
        </div>

    

    </div>
    <!-- Tab panes -->
    <div class="" style="min-height: 23vh">
        <!-- Tab panes -->
        @yield('contentUser')
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        
        $("#user").addClass("active");
    });
</script>
@endsection
