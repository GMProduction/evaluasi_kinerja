@extends('superuser.base')

@section('content')
    <section class="mt-content">

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
                    <div id="cardNotif">

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

    <script>

        $(document).ready(function () {
            showNotifAll();
        })

        $("#bcukup").click(function () {
            $("#bcukup").addClass("active");
            $("#bkurang").removeClass("active");
        });
        $("#bkurang").click(function () {
            $("#bkurang").addClass("active");
            $("#bcukup").removeClass("active");
        });

        function showNotifAll() {
            $.get('/show-notif/all', function (data) {
                console.log(data)
                if (data) {
                    const {id, type} = value;
                    var read = value['is_read'] === 0 ? 'isRead' : '';
                    var img = value['sender']['image'] ?? '';
                    var senderName = value['sender']['vendor'] ? value['sender']['vendor']['name'] : value['sender']['data']['name'];
                    $.each(data, function (key, value) {
                        $('#cardNotif').append('<div>\n' +
                            '                        <a class="notifdiv " style="width: 100%">\n' +
                            '                            <div class="div-image">\n' +
                            '                                <img\n' +
                            '                                    src="' + img + '" onerror="this.onerror=null; this.src=\'{{ asset('/images/noimage.png') }}\'"/>\n' +
                            '                            </div>\n' +
                            '                            <div class="div-content">\n' +
                            '                                <div class="div-header">\n' +
                            '                                    <p class="nama t-black">\' + value[\'title\'] + \'</p>\n' +
                            '                                    <p class="tanggal " style="color: gray">\' +\n' +
                            '                                        moment(value[\'created_at\']).format(\'LLL\')\n' +
                            '                                        + \'</p>\n' +
                            '                                </div>\n' +
                            '                                <p class="sub-indikator">\n' +
                            '                                    \' + value[\'description\'] + \'\n' +
                            '                                </p>\n' +
                            '                            </div>\n' +
                            '                        </a>\n' +
                            '                        <hr class="hr-notif">\n' +
                            '                    </div>')
                    })
                }
            })
        }
    </script>
@endsection
