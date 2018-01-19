@extends('layouts.base')

@section('content')

<!-- BEGIN DASHBOARD WRAP -->
<div class="main">
  </header>
  <!-- END HEADER -->

    <!-- BEGIN WRAP CONTENT -->
  <div class="content">


    <!-- begin dashboard content -->
    <div class="main-dashboard">

      <!-- begin top option dashboard -->
      <div class="dashboard-top">
        <div class="container">
          <h1>Selamat Datang, <span>{{ Auth::user()->name }}</span><h3><a href="/home">Close</a></h3></h1>
        </div>
      </div>
      <!-- end top option dashboard -->

      <!-- begin dashboard content dashboard
       add "dashboard-content no-title" for content without top dashboard option-->
      <div class="dashboard-content">
        <div class="container">
          <div class="top-content has-search">
            <h3>Edit Profile</h3>
          </div>
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
              <p class="alert alert-{{ $msg }}" style="text-align: center;">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
          @endforeach

          <!-- begin main resume -->
          <div class="smt-resume">

            <div class="user-profile">
              <div class="circle-image">
              <form action="{{ url('/input/'.Auth::user()->id)}}" enctype="multipart/form-data" method="POST" class="horizontal-form" >
              {!! csrf_field() !!}
              {!! method_field('PUT') !!}
              </form>
              </div>
              <div class="user-detail">
                <ul>
                  <li>
                     <h2><label class="control-label"> Nama :  </label> {{ Auth::user()->name }}</h2>
                  </li>
                  <li>
                    <h2><label class="control-label"> Email :  </label> {{ Auth::user()->email }}</h2>
                  </li>
                <button type="button" class="btn btn-lg btn-edit" onclick="cpassword()">
                  <i class="mdi mdi-table-edit"></i> Ganti Password
                </button>  
                </ul>
              </div>
              <div class="edit-option">
                
              </div>
            </div>

            <div id="editProfile" class="collapse" style="display: none;">
              <form action="{{ url('/view/'.Auth::user()->id)}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
              {!! csrf_field() !!}
              {!! method_field('PUT') !!}
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                  @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}" style="text-align: center;">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                  @endif
                @endforeach
                <div class="profile-extended">

                  <div class="profile-form">
                    <div class="form-group">
                      <label for="example3"> Password Baru</label>
                      <input type="password"  name="password" class="form-control" id="pw1" placeholder="Password Baru">
                    </div>
                    <div class="form-group">
                      <label for="example3">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control" name="newpassword" id="pw2" placeholder="Konfirmasi Password Baru">
                    </div>

                    <!-- with validation style -->
                    <!-- <div class="form-group">
                      <label for="example3">Title</label>
                      <input type="text" class="form-control has-error" id="example3" placeholder="title">
                      <span class="form-notify error">This field required</span>
                    </div> -->
                  </div>
                </div>
                <div class="form-group has-button">
                  <button type="submit" class="btn btn-default btn-save">Simpan</button>
                  <button type="submit" id="cancelEdit" onclick="cancel();return false" class="btn btn-default btn-save cancel">Batal</button>
                </div>
              </form>

            </div>

          </div>
          <!-- end main resume -->


        </div>
      </div>
      <!-- end dashboard content dashboard -->


    </div>
    <!-- end dashboard content -->


  </div>
  <!-- END WRAP CONTENT -->


  <!-- BEGIN FOOTER -->
  <footer class="main-footer">

      <div class="container">
        <p class="text-center">Penilaian Sikap SMP Asaalaam Bandung 2017. All Rights Reserved</p>
      </div>

  </footer>
  <!-- END FOOTER -->

</div>

@endsection
@section('scripts')

<script type="text/javascript">
     window.onload = function () {
      document.getElementById("pw1").onchange = validatePassword;
      document.getElementById("pw2").onchange = validatePassword;
     }

     function validatePassword(){
      var pass2=document.getElementById("pw2").value;
      var pass1=document.getElementById("pw1").value;
      if(pass1!=pass2)
       document.getElementById("pw2").setCustomValidity("Confirm Password is not match !!");
      else
      document.getElementById("pw2").setCustomValidity('');
     }

     function adduser(){
      var x = document.getElementById('adduser');
      if(x.style.display === 'none'){
        x.style.display = 'block';
      }else{
        x.style.display = 'none';
      }
      var y = document.getElementById("name").focus();
     }

     function cpassword(){
      var x = document.getElementById('editProfile');
      if(x.style.display === 'none'){
        x.style.display = 'block';
      }else{
        x.style.display = 'none';
      }
     }

     function cancel(){
      var x = document.getElementById('editProfile');
      if(x.style.display === 'block'){
        x.style.display = 'none';
      }else{
        x.style.display = 'block';
      }
     }

    </script>
    <script type="text/javascript">
      $(":file").filestyle({input: false});
     function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#showgambar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#inputgambar").change(function () {
            readURL(this);
        });

    </script>

@endsection