@extends('layouts.admin')

@section('content')
      <section id="main-content">
          <section class="wrapper">
            <b><h3></i>&nbsp&nbsp&nbsp Penilaian  Siswa</h3></b>
                <div class="row">
                
    


              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4></i>&nbsp&nbsp&nbsp Data Guru</h4>


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
          <h4 class="modal-title"> Tambah Data </h4>
        </div>
        <div class="modal-body">
      <form action="{{ route('user.store') }}" method="post">
      {{csrf_field()}}

          <p>

              <div class="project-detail">
                <h6>Nama Lengkap</h6>
                <h5><input type="text" name="a" class="form-control" placeholder="Nama Lengkap" required=""></h5>
                <div class="job-description">
                  <h6>E-mail</h6>
                  <input type="email" name="b" class="form-control" placeholder="E-mail" required="">
                  <input type="hidden" name="c" value="tanyaadmin">
                  
                  <br>
                  <br>
                 <div class="form-group">
        <button type="submit" class="btn btn-info btn-lg">Simpan</button>
            </div>
          </form>
                    </div>
            </form>
          <!-- End Add Project -->
        </div>    
      </div></p>
        </div>
        <div class="modal-footer">
          
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
          <h4 class="modal-title">Edit Data Siswa</h4>
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
            <th></th>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
        @php $no=1; @endphp
        @foreach($user as $data)
        <tr>
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->email}}</td>
        <td>    
               
                <form action="{{route('user.destroy',$data->id)}}" method="post">
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

@endsection