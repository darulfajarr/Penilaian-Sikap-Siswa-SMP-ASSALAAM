@extends('layouts.admin')

@section('content')

      <section id="main-content">
          <section class="wrapper">
            <b><h3></i>&nbsp&nbsp&nbsp Penilaian  Siswa</h3></b>
                <div class="row">
                
    


              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
    @if($detail->count() == 0)
        @php
        $bio = App\siswaa::find($d);
        @endphp
    <p>Belum Terjadi Proses Penilaian Terhadap siswa yang bernama {{$bio->nama}} </p>
    @else
                          <table class="table table-striped table-advance table-hover">
                              <h4></i>&nbsp&nbsp&nbsp Data Siswa</h4>
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
            <th>Point Awal</th>
            <th>Point Berkurang / Bertambah</th>
            <th>Point Akhir</th>
            <th>Pelanggaran / Prestasi </th>
            <th>Penilai</th>
            <th>Waktu</th>
          </tr>
        </thead>
            <tbody>
        @php $no=1; @endphp
        @foreach($detail as $data)
        <tr>
        @php

        $bio = App\siswaa::find($data->id_siswa);
        @endphp
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$bio->nis}}</td>
        <td>{{$bio->nama}}</td>
        @php
        $k = App\Kelas::find($bio->kelas);
        @endphp
        <td>{{$k->tingkat_kelas}}{{$k->nama_kelas}}</td>
        <td>{{$bio->jenis_kelamin}}</td> 
        <td>{{$data->point_awal}}</td>
        <td>{{$data->point_tdk}}</td>
        <td>{{$data->point_akhir}}</td>
        <td>{{$data->jenis}}</td>
        <td>{{$data->penilai}}</td>
        <td>{{$data->created_at}}</td>
  
        <td>    
              
      </tr>
      @endforeach
        </tbody>
        @endif
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
@endsection
