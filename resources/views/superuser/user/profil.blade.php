@extends('superuser.base')

@section('moreCss')
    {{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}" type="text/css"> --}}
@endsection


@section('content')


    <div class="" style=" margin-top: 160px">
        <div class="profile-card js-profile-card">
            <div class="profile-card__img">
                <img src="https://img.okezone.com/content/2012/02/07/452/570827/2y210LhfJH.jpg" alt="profile card">
            </div>

            <div class="profile-card__cnt js-profile-cnt">
                <div class="profile-card__name">Nama Perusahaan</div>
                <div class="profile-card__txt">Alamat Email</div>


                <div class="profile-card-inf">
                    <div class="profile-card-inf__item">
                        <div class="profile-card-inf__title">267</div>
                        <div class="profile-card-inf__txt">Penyedia Jasa</div>
                    </div>

                    <div class="profile-card-inf__item">
                        <div class="profile-card-inf__title">351</div>
                        <div class="profile-card-inf__txt">Proyek</div>
                    </div>


                </div>

                {{-- <div class="profile-card-social">
          <a href="https://www.facebook.com/nt.Zangkw/" class="profile-card-social__item facebook" target="_blank">
            <span class="icon-font">
                <svg class="icon"><use xlink:href="#icon-facebook"></use></svg>
            </span>
          </a>
  
          <a href="https://twitter.com/EtsZangs" class="profile-card-social__item twitter" target="_blank">
            <span class="icon-font">
                <svg class="icon"><use xlink:href="#icon-twitter"></use></svg>
            </span>
          </a>
  
          <a href="https://www.instagram.com/zeniii.02/" class="profile-card-social__item instagram" target="_blank">
            <span class="icon-font">
                <svg class="icon"><use xlink:href="#icon-instagram"></use></svg>
            </span>
          </a>        
  
          <a href="https://github.com/Zasthes24" class="profile-card-social__item github" target="_blank">
            <span class="icon-font">
                <svg class="icon"><use xlink:href="#icon-github"></use></svg>
            </span>
          </a>
          
          
  
          
          
  
        </div> --}}

                <div class="profile-card-ctr">
                    <button class="profile-card__button button--blue js-message-btn" id="addData">Edit</button>
                </div>
            </div>

       

        </div>


        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahdata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="form" onsubmit="return Save()">
                            @csrf
                            <input id="id" name="id" hidden>
                            <input name="roles" id="roles" hidden>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div id="ppkDiv"></div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>
                            <div class="mb-4"></div>
                            <button type="submit" class="bt-primary">Simpan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('script')

<script>
      $(document).on('click', '#addData, #editData', function() {
            $('#tambahdata #id').val($(this).data('id'));
            $('#tambahdata #roles').val(roles);
            title = $(this).data('type');
            $('#tambahdata #email').val($(this).data('email'));
            $('#tambahdata #name').val($(this).data('name'));
            $('#tambahdata #username').val($(this).data('username'));
            $('#tambahdata #password_confirmation').val('');
            $('#tambahdata #password').val('');
            if ($(this).data('id')) {
                $('#tambahdata #password_confirmation').val('********');
                $('#tambahdata #password').val('********');
            }
          

            $('#tambahdata').modal('show');
        })
</script>
@endsection
