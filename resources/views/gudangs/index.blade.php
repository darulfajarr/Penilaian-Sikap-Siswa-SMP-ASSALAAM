<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Penilaian Sikap Siswa</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

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
          
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
                </ul>
            </div>
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
                    
                  <li class="mt">
                      <a href="/home">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                 

                  
                  <li class="sub-menu">
                      <a class="sub" href="javascript:;" >
                          <i class="fa fa-th"></i>
                          <span>Data Tables</span>
                      </a>
                      <ul class="sub">
                          <li> <a href="{{ route('prestasis.index') }}">Prestasi</a></li>
                      </ul>
                  </li>
                  
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Akun</span>
                      </a>
                      <ul class="sub">
                          <li><a href="{{url('/settings/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
                    </a></li>
                          <li><li><a href="{{url('/settings/password')}}"><i class="fa fa-lock"></i> Ubah Password</a></li>
                    </a></li>
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
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            <b><h3></i>&nbsp&nbsp&nbsp Penilaian  Siswa</h3></b>
                <div class="row">
                
    


              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4></i>&nbsp&nbsp&nbsp Data Pelanggaran</h4>
                              <br>
<!-- Modal Tambah -->

       <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Tambah</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Tambah Data Pelanggaran</h4>
        </div>
        <div class="modal-body">
       <form action="{{ route('siswa.store') }}" method="post">
			{{csrf_field()}}
          <p><div class="form-group">
				<label class="control-label"> Nama Barang </label>
				<input type="text" name="a" class="form-control" required="">

			<div class="form-group">
				<label class="control-label"> Merk </label>
				<input type="text" name="b" class="form-control" required="">

			<div class="form-group">
				<label class="control-label"> Jumlah </label>
				<input type="text" name="c" class="form-control" required="">

			<div class="form-group">
					<label class="control-label"> Harga </label>
					<input type="text" name="d" files="true" class="form-control" required="">
				</div>

        <br>
      <div class="form-group">
        <button type="submit" class="btn btn-info btn-lg">Simpan</button>

            </div>
          </form>
        </div>
      </div></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>
</html>




<!-- Modal Eddit -->

  <div class="modal fade" id="myModall" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Data Prestasi</h4>
        </div>
        <div class="modal-body">
          <p>
            

          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

        <br>
                              <hr>
                              <thead>
					<tr>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Merk</th>
						<th>Jumlah</th>
						<th>Harga</th>
						<th>Total Harga</th>
						<th colspan="3">Action</th>
					</tr>
				</thead>
                               <tbody>
                @php $no=1; @endphp
				@foreach($gudang as $data)
				<tr>
				<td>{{$no++}}</td>
				<td>{{$data->nama_barang}}</td>
				<td>{{$data->merk}}</td>
				<td>{{$data->jumlah}}</td>
				<td>Rp.{{ number_format($data->harga, 2) }}</td>
				<td>Rp.{{ number_format($data->total_harga, 2)}}</td>

                <td>


                <button href="/gudangs/{{$data->id}}/edit class="btn btn-primary btn-xs"  data-toggle="modal" data-target="#myModall "><i class="fa fa-pencil"></i>
                
                <form action="{{route('gudangs.destroy',$data->id)}}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                <input name="_token" type="hidden" >
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                {{csrf_field()}}
                </form>
                </td>
            </tr>
            @endforeach
                </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->







        </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              Copyright Smp Assalam Bandung - 2017
              
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
