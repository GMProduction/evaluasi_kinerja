@extends('superuser.base')

@section('content')
    <style>
        .paket td {
            font-size: unset;
        }
    </style>
    <section class="pt-3">
        <div class="row justify-content-center mt-3">
            @if($type == 'vendor')
                @php
                    $text = "";
                    switch ($data->notification->score->score){
                        case 1:
                            $text = "Buruk";
                            break;
                        case 2:
                            $text = "Cukup";
                            break;
                        case 3:
                            $text = "Baik";
                            break;
                        default:
                            break;
                }
                @endphp

                <div class="col-8 table-container ">
                    <p>Peringatan Penilaian</p>
                    <table class="paket">
                        <tr>
                            <td style="width: 100px">Paket</td>
                            <td>:</td>
                            <td><span class="fw-bold">{{ $data->notification->score->package->name }}</span></td>
                        </tr>
                        <tr>
                            <td style="height: 40px">Indikator</td>
                            <td>:</td>
                            <td><span class="fw-bold">{{ $data->notification->score->subIndicator->indicator->name }}</span></td>
                        </tr>
                    </table>
                    <p>Peringatan Penilaian Terhadap Indikator <span
                            style="font-weight: bold">{{ $data->notification->score->subIndicator->name }}</span> Mendapatkan Catatan
                        Penilaian Sebagai Berikut : </p>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Nilai</td>
                            <td>Nilai Angka</td>
                            <td>File Lampiran</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{ $text }}
                            </td>
                            <td>
                                {{ $data->notification->score->score }}
                            </td>
                            <td>
                                @if($data->notification->score->file == null)
                                    -
                                @else
                                    <a href="{{$data->notification->score->file}}">Unduh</a>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <p class="mt-5">Sanggahan Vendor</p>
                    <table class="paket mb-4">
                        <tr>
                            <td style="width: 150px">Nama Vendor</td>
                            <td style=" vertical-align: top">:</td>
                            <td>{{$data->sender->vendor->name}}</td>
                        </tr>
                        <tr>
                            <td style="width: 150px; vertical-align: top">Catatan Sanggah</td>
                            <td style=" vertical-align: top">:</td>
                            <td><p class="mb-0">{{$data->text ??  '-'}}</p></td>
                        </tr>
                        <tr>
                            <td>File Terlampir</td>
                            <td>:</td>
                            <td><a class="{{$data->file ? '' : 'd-none'}}" target="_blank"
                                   href="{{$data->file ?? ''}}">{{$data->file ?? ''}}</a></td>
                        </tr>
                        <tr>
                            <td>Tanggal Sanggah</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($data->updated_at)->isoFormat('LLL')}}</td>
                        </tr>
                    </table>
                    <a class="btn bt-primary" href="/penilaian/detail/{{$data->notification->score->package_id}}?q={{$data->notification->score->id}}">Lihat Penilaian</a>
                </div>
            @else
                @php
                    $text = "";
                    switch ($data->score->score){
                        case 1:
                            $text = "Buruk";
                            break;
                        case 2:
                            $text = "Cukup";
                            break;
                        case 3:
                            $text = "Baik";
                            break;
                        default:
                            break;
                }
                @endphp

                <div class="col-8 table-container ">
                    <p>Peringatan Penilaian</p>
                    <p>Peringatan Penilaian Terhadap Indikator <span
                            style="font-weight: bold">{{ $data->score->subIndicator->name }}</span> Mendapatkan Catatan
                        Penilaian Sebagai Berikut : </p>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Nilai</td>
                            <td>Nilai Angka</td>
                            <td>File Lampiran</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                {{ $text }}
                            </td>
                            <td>
                                {{ $data->score->score }}
                            </td>
                            <td>
                                @if($data->score->file == null)
                                    -
                                @else
                                    <a href="{{$data->score->file}}">Unduh</a>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <form id="form" onsubmit="return save()">
                        @csrf
                        <input type="hidden" value="{{$data->id}}" name="id">
                        @if($data->claim != null)
                            <input type="hidden" value="{{$data->claim->id}}" name="claim_id">
                        @endif
                        <div class="mb-3">
                            <label for="text" class="form-label">Catatan Sanggah</label>
                            <textarea type="text" class="form-control" id="text" name="text">{{$data->claim && $data->claim->text ? $data->claim->text : ''}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label">File</label>
                            <input type="file" id="file" name="file" class="form-control">
                            <a class="{{$data->claim && $data->claim->file ? '' : 'd-none'}}" target="_blank"
                               href="{{$data->claim && $data->claim->file ? $data->claim->file : ''}}">{{$data->claim && $data->claim->file ? $data->claim->file : ''}}</a>
                        </div>
                        <button type="submit" class="btn bt-primary">Simpan</button>
                    </form>
                </div>
            @endif
        </div>
    </section>

@endsection

@section('script')
    <script>
        function save() {
            if ($('#text').val() === '' && $('#file').val() === ''){
                swal("Silahkan mengisi catatan atau melampirkan file untuk menyanggah ", {
                    icon: "warning",
                })
                return false
            }
            saveData('Sanggah', 'form', '/peringatan/claim', aftersave)
            return false;
        }

        function aftersave() {
            window.location.href = '/peringatan';
        }
    </script>
@endsection
