<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Data Siswa</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset ('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{asset ('assets/css/style-responsive.css') }}" rel="stylesheet">

    <link href="{{asset ('dist/css/select2.min.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/home" class="logo"><b>Penilaian Sikap Siswa</b></a>
            <!--logo end-->
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">


              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="settings/profile"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered">{{ Auth::user()->name}}</h5>
                    



                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Dashboard</span>
                      </a>
                      <ul class="sub">
                       <li><a href="{{url('/home')}}"><i class="fa fa-user"></i>Terbaru Di Nilai</a></li>
                

                          <li><a href="{{'/des'}}"><i class="fa fa-user"></i>Point Terbesar</a></li>
                    </a></li>
                    <li><a href="{{url('/asc')}}"><i class="fa fa-user"></i>Point Terkecil</a></li>
                      </ul>
                  </li>

                       
          
          @if (Auth::check())
          @role('walikelas')        
          <li class="sub-menu">
          @php
          $penghubung = App\Penghubung::find(Auth::user()->id);
          $kelas = App\Kelas::find($penghubung->kelas_id);
          @endphp
                      <a href="{{ url('/walikelas',$kelas->id )}}">
                          <i class="fa fa-user"></i>
                          <span>Wali Kelas</span>
                      </a>
                  </li>

          @endrole
          @role('admin')
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>User</span>
                      </a>
                      <ul class="sub">
                      
                      <li><a href="{{ url('/admin') }}"><i class="fa fa-user"></i> Admin</a></li>
                    </a></li>
                      

                      <li><a href="{{ url('/kepsek') }}"><i class="fa fa-user"></i>Kepala Sekolah</a></li>
                    </a></li>
                  

                  <li><a href="{{ url('/bk') }}"><i class="fa fa-user"></i>BK</a></li>
                    </a></li>
                  
                          <li><a href="{{ route('user.index') }}"><i class="fa fa-user"></i> Guru</a></li>
                    </a></li>
                    <li><a href="{{ url('/wawali') }}"><i class="fa fa-user"></i> Wali Kelas</a></li>
                    </a></li>
                      </ul>
                  </li>
                  
                  

                <li class="sub-menu">
                      <a href="{{ route('jenis.index') }}">
                          <i class="fa fa-th"></i>
                          <span>Pelanggaran & Prestasi</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{ route('kelas.index') }}">
                          <i class="fa fa-th"></i>
                          <span>Kelas</span>
                      </a>
                  </li>
                  

                  <li class="sub-menu">
                      <a href="{{ url('/walikelas') }}">
                          <i class="fa fa-book"></i>
                          <span>Penentuan Wali Kelas</span>
                      </a>
                  </li>
          @endrole
                  
              <li class="sub-menu">
                      <a class="sub" href="javascript:;" >
                         <i class="fa fa-th"></i></i>
                          <span>Siswa</span>
                      </a>
                      <ul class="sub">
 @role('admin')
         
<li><a href="{{ route('siswa.index') }}"><i class="fa fa-th"></i>Semua Siswa</a></li> 
@endrole                 
         @endif
@php
$no=1;
$kelas = App\Kelas::orderBY('tingkat_kelas', 'ASC')->get();
@endphp
<li class="sub-menu">
  <a class="sub" href="javascript:;" >
     <i class="fa fa-th"></i></i>
      <span>Kelas 7</span>
  </a>
  <ul class="sub">
        @php
        $nama = App\Kelas::where('tingkat_kelas', 7)->get();
        @endphp
                @if($nama->count() == 0)
        <li><i class="fa fa-th"></i>Kosong</li>
        @endif
        @foreach($nama as $n)
       <li><a href="{{ url('/siswakelas',$n->id) }}"><i class="fa fa-th"></i>{{$n->tingkat_kelas}} {{$n->nama_kelas}}</a></li>                 
        @endforeach
  </ul>
</li>

<li class="sub-menu">
  <a class="sub" href="javascript:;" >
     <i class="fa fa-th"></i></i>
      <span>Kelas 8</span>
  </a>
  <ul class="sub">
        @php
        $nama = App\Kelas::where('tingkat_kelas', 8)->get();
        @endphp
        @if($nama->count() == 0)
        <li><i class="fa fa-th"></i>Kosong</li>
        @endif
        @foreach($nama as $n)
       <li><a href="{{ url('/siswakelas',$n->id) }}"><i class="fa fa-th"></i>{{$n->tingkat_kelas}} {{$n->nama_kelas}}</a></li>                 
        @endforeach
  </ul>
</li>

<li class="sub-menu">
  <a class="sub" href="javascript:;" >
     <i class="fa fa-th"></i></i>
      <span>Kelas 9</span>
  </a>
  <ul class="sub">
        @php
        $nama = App\Kelas::where('tingkat_kelas', 9)->get();
        @endphp
        @if($nama->count() == 0)
        <li>Kosong</li>
        @endif
        @foreach($nama as $n)
       <li><a href="{{ url('/siswakelas',$n->id) }}"><i class="fa fa-th"></i>{{$n->tingkat_kelas}} {{$n->nama_kelas}}</a></li>                 
        @endforeach
  </ul>
</li>

     

                      </ul>
                  </li>
                


                  <li class="sub-menu">
                      <a href="{{ route('history.index') }}">
                          <i class="fa fa-book"></i>
                          <span>History</span>
                      </a>
                  </li>

                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Akun</span>
                      </a>
                      <ul class="sub">
                          <li><a href="{{url('/...')}}"><i class="fa fa-user"></i> Profile</a></li>
                         <li>  </li>  <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <em class="fa fa-power-off">&nbsp;</em>
                                        Keluar
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->



  @yield('content')
 <!--main content end-->
      <!--footer start-->
      
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{asset ('assets/js/jquery.js') }}"></script>
    <script src="{{asset ('assets/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{asset ('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{asset ('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{asset ('assets/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

    <script src="{{asset ('dist/js/select2.full.js') }}" type="text/javascript"></script>

    <!--common script for all pages-->
    <script src="{{ asset('assets/js/common-scripts.js') }}"></script>

    <!--script for this page-->
    
  <script type="text/javascript">
      //custom select box
      $(document).ready(function() {
          $('.select2').select2();
      });
  </script>

  </body>
</html>
