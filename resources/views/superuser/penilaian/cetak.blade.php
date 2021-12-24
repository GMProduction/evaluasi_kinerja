<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        .report-title {
            font-size: 14px;
            font-weight: bolder;
        }

        .f-bold {
            font-weight: bold;
        }

        .footer {
            position: fixed;
            bottom: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>
<body>
<div>
    <img src="{{ public_path('/images/logo1.png') }}" height="100">
    <p>Sistem Evaluasi Kinerja Penyedia Jasa </p>
</div>

<img src="{{ public_path($vendor->image) }}" height="100" width="100" style="border-radius: 50%"
     onerror="this.onerror=null;this.src='{{ asset('/images/noimage.png') }}';"/>
<div>
    <p style="font-weight: bold">Penyedia jasa</p>
    <p style="font-weight: bold">{{ $vendor->vendor->name }}</p>
</div>
<div>
    <p>Alamat</p>
    <p>{{ $vendor->vendor->address }}</p>
</div>
<div>
    <p>IUJK</p>
    <p>{{ $vendor->vendor->iujk }}</p>
</div>
<div>
    <p>NPWP</p>
    <p>{{ $vendor->vendor->npwp }}</p>
</div>
<div>
    <p style="font-weight: bold">Paket Pekerjaan</p>
    <p style="font-weight: bold">{{ $package !== null ? $package->name : '-' }}</p>
</div>
<div>
    <p>No. Kontrak</p>
    <p>{{ $package !== null ? $package->no_reference : '-' }}</p>
</div>
<div>
    <p>Pengguna Jasa</p>
    <p>{{ $package !== null ? $package->ppk->name : '-' }}</p>
</div>
<div>
    <p>Tanggal Mulai</p>
    <p>{{ $package !== null ? $package->start_at : '-' }}</p>
</div>
<div>
    <p>Tanggal Selesai</p>
    <p>{{ $package !== null ? $package->finish_at : '-' }}</p>
</div>

<div>
    <p style="font-weight: bold">Nilai Kinerja Komulatif</p>
    <p>{{ $cumulative['cumulative'] }}</p>
    <p>{{ $cumulative['text'] }}</p>
    <p>Update Terakhir : {{ $cumulativeLast }}</p>
</div>

<div>
    <img src="{{ $html }}" width="250">
</div>

<div>
    <p style="font-weight: bold">Penilaian Mandiri</p>
    <p>{{ $vendorCumulative['cumulative'] }}</p>
    <p>{{ $vendorCumulative['text'] }}</p>
    <p>Update Terakhir : {{ $vendorCumulative['last']->updated_at }}</p>
</div>

<div>
    <p style="font-weight: bold">Penilaian PPK</p>
    <p>{{ $ppkCumulative['cumulative'] }}</p>
    <p>{{ $ppkCumulative['text'] }}</p>
    <p>Update Terakhir : {{ $ppkCumulative['last']->updated_at }}</p>
</div>

<div>
    <p style="font-weight: bold">Penilaian Balai</p>
    <p>{{ $officeCumulative['cumulative'] }}</p>
    <p>{{ $officeCumulative['text'] }}</p>
    <p>Update Terakhir : {{ $officeCumulative['last']->updated_at }}</p>
</div>

<div id="detail_penilaian_mandiri" class="row">
    <div class="sangat_kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Sangat Kurang</p>
        @foreach($vendorCumulative['very_bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Kurang</p>
        @foreach($vendorCumulative['bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="medium col-xs-3">
        <p style="font-weight: bold">Kinerja Cukup</p>
        @foreach($vendorCumulative['medium'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="good col-xs-3">
        <p style="font-weight: bold">Kinerja Baik</p>
        @foreach($vendorCumulative['good'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
</div>
<div id="detail_penilaian_ppk" class="row">
    <div class="sangat_kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Sangat Kurang</p>
        @foreach($ppkCumulative['very_bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Kurang</p>
        @foreach($ppkCumulative['bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="medium col-xs-3">
        <p style="font-weight: bold">Kinerja Cukup</p>
        @foreach($ppkCumulative['medium'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="good col-xs-3">
        <p style="font-weight: bold">Kinerja Baik</p>
        @foreach($ppkCumulative['good'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
</div>

<div id="detail_penilaian_balai" class="row">
    <div class="sangat_kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Sangat Kurang</p>
        @foreach($officeCumulative['very_bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="kurang col-xs-3">
        <p style="font-weight: bold">Kinerja Kurang</p>
        @foreach($officeCumulative['bad'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="medium col-xs-3">
        <p style="font-weight: bold">Kinerja Cukup</p>
        @foreach($officeCumulative['medium'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
    <div class="good col-xs-3">
        <p style="font-weight: bold">Kinerja Baik</p>
        @foreach($officeCumulative['good'] as $v)
            <p>{{$v->subIndicator->name}}</p>
        @endforeach
    </div>
</div>

</body>
</html>
