@if ($data == 'content')
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
                        '                        <div class="div-image"> <img src="https://1.bp.blogspot.com/-zO8hzjH7BrQ/W9wXmTIy5qI/AAAAAAAAPiY/Qqb70x0AnMAksHofqiT7APHhZXTchM1nACLcBGAs/w1200-h630-p-k-no-nu/Wika.png"/> </div>\n' +
                        ' <div class="w-100"><p  class="nama">'+ value['vendor']['name'] +'</p><p class="email">email@gmail.com</p> <h6 class="t-right number"> 10 </h6> </div>' +
                        '                    </div>\n' +
                      
                        '                </a>')
                })
            })
        }
    </script>
@endif
