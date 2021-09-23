@extends('superuser.base')

@section('content')
    <section class="pt-3">
        <div class="row justify-content-center mt-3">
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
            </div>
        </div>
    </section>

@endsection
