@extends('layouts.admin')

@section('content')

      <section id="main-content">
          <section class="wrapper">
       @if ($errors->has('nis'))
            <span class="help-block">
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  NIS yang anda masukan telah di gunakan.
                </div>
            </span>
        @endif
            <b><h3></i>&nbsp&nbsp&nbsp Penilaian  Siswa</h3></b>
                <div class="row">
                
    


              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                              <h4></i>&nbsp&nbsp&nbsp Data Siswa</h4>


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

  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Tambah</button>

<br>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> Tambah Data Siswa</h4>
        </div>
        <div class="modal-body">
       <form action="{{ route('siswa.store') }}" method="post">
      {{csrf_field()}}

          <p><div class="form-group">
        <label class="control-label"> Nis </label>
        <input type="number" name="nis" class="form-control" required>
        

      <div class="form-group">
        <label class="control-label" required> Nama </label>
        <input type="text" name="b" class="form-control" required="">

         <div class="form-group">
            <br>
        <label class="control-label"> Jenis Kelamin </label>
        <br>
        <br>

        <input type="radio" name="d" value="Laki - Laki" required>Laki - Laki &nbsp &nbsp
        <input type="radio" name="d" value="Perempuan">Perempuan 
        <br>
        <br>

      <div class="form-group">
        <label class="control-label"> Kelas </label>
        <br>
        <br>

        <select name="c" class="form-control" required>
        @php
        $kelas = App\Kelas::orderBy('tingkat_kelas','asc')->get();
        @endphp
        @foreach($kelas as $data)
        <option value="{{$data->id}}">{{$data->tingkat_kelas}} {{$data->nama_kelas}}</option>
        @endforeach
        </select>
        <br>
<br>
 <input type="hidden" name="e" value="200">
      <div class="form-group">
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
            <th>Nis</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
            <th>Point</th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>
        @php $no=1; @endphp
        @foreach($siswaa as $data)
        <tr>
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$data->nis}}</td>
        <td>{{$data->nama}}</td>
        <td>{{$data->tingkat_kelas}} {{$data->nama_kelas}}</td>
        <td>{{$data->jenis_kelamin}}</td>
        @if($data->point > 150)
        <td><strong><font color="green">{{$data->point}}</font></strong></td>
        @elseif($data->point > 100 && $data->point <= 150)
        <td><strong><font color="yellow">{{$data->point}}<</font></strong></td>
        @elseif($data->point > 50 && $data->point <= 100)
        <td><strong><font color="orange">{{$data->point}}</font></strong></td>
        @elseif($data->point <= 50)
        <td><strong><font color="red">{{$data->point}}</font></strong></td>
        @endif
        
  
        <td>    
                <button class="btn-btn primary btn-xs"><a href="{{route('siswa.edit',$data->id)}}"><li class="fa fa-pencil"></li></a></button>
                <form action="{{route('siswa.destroy',$data->id)}}" method="post">
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
