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
            @if  (Auth::check())
                @role('admin')
                  <th>Action</th>
                @endrole
                @role('walikelas')
                  <th>Action</th>
                @endrole
                @role('bk')
                  <th>Action</th>
                @endrole
                @role('guru')
                  <th>Action</th>
                @endrole
                @endif


            
          </tr>
        </thead>
            <tbody>
        @php $no=1; @endphp
        @foreach($siswaa as $data)
        <tr>
        <td></td>
        <td>{{$no++}}</td>
        <td>{{$data->nis}}</td>
        <td><a href="{{url('/detail/'.$data->id)}}"> {{$data->nama}}</a></td>
        <td>{{$data->tingkat_kelas}} {{$data->nama_kelas}}</td>
        <td>{{$data->jenis_kelamin}}</td>
        @if($data->point > 150)
        <td><strong><font color="green">{{$data->point}}</font></strong></td>
        @elseif($data->point > 100 && $data->point <= 150)
        <td><strong><font color="yellow">{{$data->point}}</font></strong></td>
        @elseif($data->point > 50 && $data->point <= 100)
        <td><strong><font color="orange">{{$data->point}}</font></strong></td>
        @elseif($data->point <= 50)
        <td><strong><font color="red">{{$data->point}}</font></strong></td>
        @endif
        

         @if  (Auth::check())
                @role('admin')
                <td>
                  <a class="btn btn-xs btn-primary" href="{{url('/pelanggaran/'.$data->id)}}">Pelanggaran</a><br>
                  <a class="btn btn-xs btn-primary" href="{{url('/prestasi/'.$data->id)}}">&nbsp&nbsp&nbsp Prestasi &nbsp&nbsp&nbsp</a>
                  
                </td>
                {{csrf_field()}}
                </form>
                @endrole
                @role('walikelas')
                <td>
                  <a class="btn btn-xs btn-primary" href="{{url('/pelanggaran/'.$data->id)}}">Pelanggaran</a><br>
                  <a class="btn btn-xs btn-primary" href="{{url('/prestasi/'.$data->id)}}">&nbsp&nbsp&nbsp Prestasi &nbsp&nbsp&nbsp</a>
                </td>
                {{csrf_field()}}
                </form>
                @endrole
                @role('bk')
                <td>
                  <a class="btn btn-xs btn-primary" href="{{url('/pelanggaran/'.$data->id)}}">Pelanggaran</a><br>
                  <a class="btn btn-xs btn-primary" href="{{url('/prestasi/'.$data->id)}}">&nbsp&nbsp&nbsp Prestasi &nbsp&nbsp&nbsp</a>
                </td>
                {{csrf_field()}}
                </form>
                @endrole
                @role('guru')
                <td>
                  <a class="btn btn-xs btn-primary" href="{{url('/pelanggaran/'.$data->id)}}">Pelanggaran</a><br>
                  <a class="btn btn-xs btn-primary" href="{{url('/prestasi/'.$data->id)}}">&nbsp&nbsp&nbsp Prestasi &nbsp&nbsp&nbsp</a>
                </td>
                {{csrf_field()}}
                </form>
                @endrole
                @endif

      </tr>
      @endforeach
        </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

@endsection
