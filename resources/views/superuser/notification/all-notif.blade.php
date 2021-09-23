@extends('superuser.base')

@section('content')
    <section class="mt-content">
        <div class="d-flex justify-content-between">
            {{-- <div class="search">
                <input type="text" placeholder="search" />
                <div class="symbol">
                    <svg style="width:25px;height:25px" class="cloud" viewBox="0 0 25 25">
                        <path fill="white"
                            d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                    </svg>
                </div>
            </div> --}}
        </div>

        <div class="row">
            <div class="offset-1 col-2">
                <p class="fw-bold" style="color: gray">Pemberitahuan</p>

                <div id="bcukup" class="tombol-notif active">
                    <div>
                        <i class='bx bx-meh-alt bx-md mb-2 t-cukup'></i>
                        <p class="t-cukup">Penilaian Cukup</p>
                    </div>
                </div>

                <div id="bkurang" class="tombol-notif">
                    <div>
                        <i class='bx bx-sad bx-md mb-2 t-kurang'></i>
                        <p class="t-kurang">Penilaian Kurang</p>
                    </div>
                </div>

            </div>
            <div class="col-8  mt-5">
                <div class="card-notif table-container" style="border-radius: 30px">
                    <div>
                        <a class="notifdiv " style="width: 100%">
                            <div class="div-image">
                                <img
                                    src="http://1.bp.blogspot.com/-6wgnCxmn_Jc/Tk9Recl6PII/AAAAAAAABFw/8neHTaGo6SM/s1600/Avril-Lavigne-Photos.jpg" />
                            </div>
                            <div class="div-content">
                                <div class="div-header">
                                    <p class="nama t-black">' + value['title'] + '</p>
                                    <p class="tanggal " style="color: gray">' +
                                        moment(value['created_at']).format('LLL')
                                        + '</p>
                                </div>
                                <p class="sub-indikator">
                                    ' + value['description'] + '
                                </p>
                            </div>
                        </a>
                        <hr class="hr-notif">
                    </div>

                    <div>
                        <a class="notifdiv " style="width: 100%">
                            <div class="div-image">
                                <img
                                    src="http://1.bp.blogspot.com/-6wgnCxmn_Jc/Tk9Recl6PII/AAAAAAAABFw/8neHTaGo6SM/s1600/Avril-Lavigne-Photos.jpg" />
                            </div>
                            <div class="div-content">
                                <div class="div-header">
                                    <p class="nama t-black">' + value['title'] + '</p>
                                    <p class="tanggal " style="color: gray">' +
                                        moment(value['created_at']).format('LLL')
                                        + '</p>
                                </div>
                                <p class="sub-indikator">
                                    ' + value['description'] + '
                                </p>
                            </div>
                        </a>
                        <hr class="hr-notif">
                    </div>

                    <div>
                        <a class="notifdiv " style="width: 100%">
                            <div class="div-image">
                                <img
                                    src="http://1.bp.blogspot.com/-6wgnCxmn_Jc/Tk9Recl6PII/AAAAAAAABFw/8neHTaGo6SM/s1600/Avril-Lavigne-Photos.jpg" />
                            </div>
                            <div class="div-content">
                                <div class="div-header">
                                    <p class="nama t-black">' + value['title'] + '</p>
                                    <p class="tanggal " style="color: gray">' +
                                        moment(value['created_at']).format('LLL')
                                        + '</p>
                                </div>
                                <p class="sub-indikator">
                                    ' + value['description'] + '
                                </p>
                            </div>
                        </a>
                        <hr class="hr-notif">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

    <script>
        $("#bcukup").click(function() {
            $( "#bcukup" ).addClass( "active" );
            $( "#bkurang" ).removeClass( "active" );
        });
        $("#bkurang").click(function() {
            $( "#bkurang" ).addClass( "active" );
            $( "#bcukup" ).removeClass( "active" );
        });
    </script>
@endsection
