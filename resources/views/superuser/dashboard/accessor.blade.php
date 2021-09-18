@if($data == 'content')
    <div role="tablist" id="tablist">
        <div class="items-tab" id="menu-vendor">

        </div>
    </div>


@elseif($data == 'script')
    <script>
        $(document).ready(function () {
            getVendor();
        })
        function getVendor() {
            var vendor =  $('#menu-vendor');
            vendor.empty();
            $.get('/vendor',function (data) {
                $.each(data, function (key, value) {
                    vendor.append(' <a class="card-tab  d-block c-text card-user" id="">\n' +
                        '                    <div class="d-flex justify-content-center">\n' +
                        '                        <i class=\'bx bx-user-circle \' style="font-size: 3rem"></i>\n' +
                        '                    </div>\n' +
                        '                    <h6 class="mt-2 text-center">'+value['name']+'</h6>\n' +
                        '                </a>')
                })
            })
        }

    </script>
@endif
