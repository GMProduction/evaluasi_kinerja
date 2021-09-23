@if ($data == 'content')
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
    <div role="tablist" id="tablist">
        <div class="items-tab" id="menu-vendor">

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
