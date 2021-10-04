@if ($data == 'content')
    <div class="mb-3" style="padding-right: 30px; padding-left: 30px">
        {{-- <p class="fw-bold t-primary">Dashboard</p> --}}
        <div role="tablist" id="tablist">
            <div class="items-tab" id="menu-tab">
                <a class="card-tab  d-block c-text card-user"
                    id="user">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-user-circle icon-size-lg '></i>
                        <p class="number-card" id="vendor-count">0</p>
                    </div>
                    <div class="mt-2">
                        Data Penyedia Jasa
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" 
                    id="package">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-building-house icon-size-lg'></i>
                        <p class="number-card" id="package-count">0</p>
                    </div>
                    <div class="mt-2">
                        Data Paket Konstruksi
                    </div>
                </a>

                <a class="card-tab d-block c-text card-user" 
                    id="indicator">
                    <div class="d-flex justify-content-between">
                        <i class='bx bx-receipt icon-size-lg'></i>
                        <p class="number-card" id="claim-count">0</p>
                    </div>
                    <div class="mt-2">
                        Data Sanggahan
                    </div>
                </a>


            </div>
        </div>
    </div>
    <div style="padding-right: 30px; padding-left: 30px" class="mt-5">
        <div class="d-flex justify-content-between">

            <p class="fw-bold t-black">Data Penyedia Jasa</p>
            {{-- <div class="search"> --}}
            {{-- <input type="text" placeholder="search"/> --}}
            {{-- <div class="symbol"> --}}
            {{-- <svg style="width:25px;height:25px" class="cloud" viewBox="0 0 25 25"> --}}
            {{-- <path fill="white" --}}
            {{-- d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"/> --}}
            {{-- </svg> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
        {{-- <div class="row g-3 row-cols-xl-4 row-cols-lg-3 row-cols-md-2">
            <div class="col">
                <div class="card-vendor-2 d-flex">
                    <div class="left-box-card" style="width: 80px; margin-right: 10px">
                        <img src="{{ asset('/images/noimage.png') }}" width="80" height="118" style="border: gray solid 1px; object-fit: contain">
                    </div>
                    <div class="right-box-card">
                        <p class="fw-bold t-primary mb-0" style="font-weight: bold;font-size: 1rem; margin-bottom: 0;">PT. Wika Kontraktor</p>
                        <p class="mb-0" style="font-size: 0.8rem;margin-bottom: 0;color: gray;">wikakon@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card-vendor-2"></div>
            </div>
            <div class="col">
                <div class="card-vendor-2"></div>
            </div>
            <div class="col">
                <div class="card-vendor-2"></div>
            </div>
        </div> --}}

        <div role="tablist"  id="tablist">
            <div id="menu-vendor" class="row">

            </div>
        </div>
    </div>



@elseif($data == 'script')
    <script>
        $(document).ready(function() {
            getVendor();
            countClaim();
        });

        function elVendor(data) {
            return '<a href="/penilaian?vendor=' + data['id'] + '" class="card-vendor-2 d-block c-text card-user">' +
                'abcd' +
                '</a>';
        }

        function getVendor() {
            var vendor = $('#menu-vendor');
            vendor.empty();
            $.get('/vendor', function(data) {
                console.log(data);
                let allVendor = data.length;
                let ongoing = 0;
                $.each(data, function(key, value) {
                    // vendor.append(elVendor(value));
                    ongoing += value['package_vendor_going'].length;
                    vendor.append(' <div class="items-tab col-xl-3 col-lg-6 col-sm-12 mb-4"><a href="/scoring/' + value[
                        'id'] +
                        '" class="card-vendor d-block c-text card-user" id="">\n' +
                        '                    <div class="d-flex justify-content-left">\n' +
                        '                        <div class="div-image"> <img src="' + value['image'] +
                        '" onerror="this.onerror=null; this.src=\'{{ asset('/images/noimage.png') }}\'"/> </div>\n' +
                        '<div class="d-flex flex-column w-100  justify-content-between" style="height: 130px"> ' +
                        ' <div class="w-100"><p  class="nama">' + value['vendor']['name'] +
                        '</p><p class="email">' + value['email'] + '</p>  </div>' +
                        '                    <h6 class="t-right number"> ' +
                        value['package_vendor_going'].length + ' </h6></div></div>\n' +

                        '                </a></div>')
                })
                $('#package-count').html(ongoing);
                $('#vendor-count').html(allVendor);
            })
        }

        async function countClaim() {
            try {
                let response = await $.get('/peringatan/count');
                let count = response['data'];
                $('#claim-count').html(count);
                console.log(response)
            }catch(e) {
                console.log(e)
            }
        }
    </script>
@endif
