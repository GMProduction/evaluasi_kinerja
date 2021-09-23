@if ($data == 'content')
    <div role="tablist" class="row" id="tablist">
        <div class="items-tab col-3" id="menu-vendor">

        </div>
    </div>


@elseif($data == 'script')
    <script>
        $(document).ready(function() {
            getVendor();
        })

        function getVendor() {
            var vendor = $('#menu-vendor');
            vendor.empty();
            $.get('/vendor', function(data) {
                $.each(data, function(key, value) {
                    vendor.append(' <a href="/penilaian?vendor=' + value['id'] +
                        '" class="card-vendor  d-block c-text card-user" id="">\n' +
                        '                    <div class="d-flex justify-content-left">\n' +
                        '                        <div class="div-image"> <img src="'+value['image']+'" onerror="this.onerror=null; this.src=\'{{ asset('/images/noimage.png') }}\'"/> </div>\n' +
                        ' <div class="w-100"><p  class="nama">'+ value['vendor']['name'] +'</p><p class="email">email@gmail.com</p> <h6 class="t-right number"> '+value['package_vendor_going'].length+' </h6> </div>' +
                        '                    </div>\n' +

                        '                </a>')
                })
            })
        }
    </script>
@endif
