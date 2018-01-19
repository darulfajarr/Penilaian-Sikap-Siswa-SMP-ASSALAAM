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
                              <h4></i>&nbsp&nbsp&nbsp Penetapan Wali Kelas</h4>


                              <!-- Modal Tambah -->

         <br>
                              <hr>
                              <thead>
          <tr>
            <th></th>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas Saat Ini </th>
            <th>Kelas </th>
            <th>Action</th>
          </tr>
        </thead>
            <tbody>

        @php $no=1; @endphp
        @foreach($user as $data)
        <form action="{{url('/tambah',$data->id)}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$data->id}}">
        <tr>
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$data->name}}</td>
        <td>
        @php
        if($p = App\Penghubung::where('id',$data->id)->count() == 0){
        echo"Belum jadi wali kelas";
        }else{
          $p = App\Penghubung::find($data->id);
          $kelas = App\Kelas::find($p->kelas_id);
          echo $kelas->tingkat_kelas . $kelas->nama_kelas;
        }

        @endphp

        </td>

        <td>
        <select name="c" class="select2" style="width:50%;" required>
        @php
        $kelas = App\Kelas::orderBy('tingkat_kelas','asc')->get();
        @endphp
        @foreach($kelas as $data)
        <option value="{{$data->id}}">{{$data->tingkat_kelas}} {{$data->nama_kelas}}</option>
        @endforeach
        </select></td>
        <td><button type="submit" class="btn btn-info btn-xs">Simpan</button></td>
        </form>
       </tr>
      @endforeach
        </tbody>
                          </table>
    
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

@endsection