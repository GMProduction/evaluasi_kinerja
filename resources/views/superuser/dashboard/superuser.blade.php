@if($data == 'content')

    <div role="tablist" id="tablist">
        <div class="items-tab w-100-in-small flex-wrap" id="menu-tab">
            <a class="card-tab d-block c-text card-user w-100-in-small mb-1-in-small" id="user">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-user-circle icon-size-lg '></i>
                    <p class="number-card">0</p>
                </div>
                <div class="mt-2">
                    Data User
                </div>
            </a>

            <a class="card-tab d-block c-text card-user w-100-in-small mb-1-in-small" id="ppk">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-message-square-detail icon-size-lg'></i>
                    <p class="number-card">0</p>
                </div>
                <div class="mt-2">
                    Data PPK
                </div>
            </a>

            <a class="card-tab d-block c-text card-user w-100-in-small mb-1-in-small" id="package">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-building-house icon-size-lg'></i>
                    <p class="number-card">0</p>
                </div>
                <div class="mt-2">
                    Data Paket Konstruksi
                </div>
            </a>

            <a class="card-tab d-block c-text card-user w-100-in-small mb-1-in-small" id="indicator">
                <div class="d-flex justify-content-between">
                    <i class='bx bx-doughnut-chart icon-size-lg'></i>
                    <p class="number-card">0</p>
                </div>
                <div class="mt-2">
                    Data Indikator
                </div>
            </a>


        </div>
    </div>



@elseif($data == 'script')
    <script>
        $(document).ready(function () {
            console.log('adadasdad')
            getCount();
        })

        function getCount() {
            $.get('/get-count-dashboard', function (data) {
                console.log(data)
                $('#tablist #indicator .number-card').html(data['indicator'])
                $('#tablist #package .number-card').html(data['package'])
                $('#tablist #ppk .number-card').html(data['ppk'])
                $('#tablist #user .number-card').html(data['user'])
            })
        }

    </script>
@endif
