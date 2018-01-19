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

                              <h4></i>&nbsp&nbsp&nbsp Jenis Jenis Pelanggaran Dan Prestasi</h4>

                              <!-- Modal Tambah -->





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
          <h4 class="modal-title"> Tambah Data Pelanggaran & Prestasi</h4>
        </div>
        <div class="modal-body">
       <form action="{{ route('jenis.store') }}" method="post">
      {{csrf_field()}}

          <p>
        <label class="control-label"> Jenis </label>
        <br>
        <br>

        <input type="radio" name="a" value="Prestasi">Prestasi &nbsp &nbsp
        <input type="radio" name="a" value="Pelanggaran">Pelanggaran 
<br>
<br>
      <div class="form-group">
        <label class="control-label"> Nama </label>
        <br>
        <input type="text" name="b" class="form-control" required="">
        <br>
        <br>
<div class="form-group">
        <label class="control-label"> Point  </label><br><i>
        <br> ~ Untuk Pelanggaran Gunakan (-) , Contoh : -5
        <br> ~ Untuk Prestasi Tidak Menggunakan + , Contoh : 5 </i>
        <br>
        <br>
        <input type="number" name="c" class="form-control" required="">

         <div class="form-group">
            <br>
        <br>
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






    
        <br>
                              <hr>
                              <thead>
          <tr>
            <th></th>
            <th>No</th>
            <th>Jenis</th>
            <th>Nama</th>
            <th>Point</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
        @php $no=1; @endphp
        @foreach($jenis as $data)
        <tr>
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$data->jenis}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->point}}</td>
 

        <td>
        <button class="btn-btn primary btn-xs"><a href="{{route('jenis.edit',$data->id)}}"><li class="fa fa-pencil"></li></a></button>
        <form action="{{route('jenis.destroy',$data->id)}}" method="post">
                <input name="_method" type="hidden" value="DELETE">
                <input name="_token" type="hidden" >
                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>
                {{csrf_field()}}
                </form></td>
  
            
  
               
                      </tr>
      @endforeach
        </tbody>
                          </table>



                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

@endsection