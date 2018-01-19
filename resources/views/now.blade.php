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
                              <h4></i>&nbsp&nbsp&nbsp 10 Siswa Terbaru Di Nilai</h4>


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
            <th>JK</th>
            <th>Point Awal</th>
            <th>Berkurang / Bertambah</th>
            <th>Point Akhir</th>
            <th>Pelanggaran / Prestasi </th>
            <th>Penilai</th>
            <th>Waktu</th>
          </tr>
        </thead>
            <tbody>
        @php $no=1; @endphp
        
        @foreach($History as $data)
        <tr>
        @php

        $bio = App\siswaa::find($data->id_siswa);
        @endphp
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$bio->nis}}</td>
        <td>{{$bio->nama}}</td>
        <td>{{$bio->kelas}}</td>
        <td>{{$bio->jenis_kelamin}}</td> 
        <td>{{$data->point_awal}}</td>
        <td>{{$data->point_tdk}}</td>
         @if($data->point_akhir > 150)
        <td><strong><font color="green">{{$data->point_akhir}}</font></strong></td>
        @elseif($data->point_akhir > 100 && $data->point_akhir <= 150)
        <td><strong><font color="yellow">{{$data->point_akhir}}</font></strong></td>
        @elseif($data->point_akhir > 50 && $data->point_akhir <= 100)
        <td><strong><font color="orange">{{$data->point_akhir}}</font></strong></td>
        @elseif($data->point_akhir <= 50)
        <td><strong><font color="red">{{$data->point_akhir}}</font></strong></td>
        @endif
       <td>{{$data->jenis}}</td>
        <td>{{$data->penilai}}</td>
        <td>{{$data->created_at}}</td>
  
        <td>    
              
      </tr>
      @endforeach
        </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
@endsection
