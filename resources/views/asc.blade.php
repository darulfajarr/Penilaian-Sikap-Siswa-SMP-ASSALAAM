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

                              <h4></i>&nbsp&nbsp&nbsp Kategori 10 Siswa Kurang Baik Dan Bermasalah</h4>

                              <!-- Modal Tambah -->







    
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
        
  
        
      </tr>
      @endforeach
        </tbody>
                          </table>



                          
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

@endsection