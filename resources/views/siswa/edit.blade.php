@extends('layouts.admin')
@section('content')
<section id="main-content">
          <section class="wrapper">
            <div class="row mt">
                  <div class="col-md-12">
                      
                          <table class="table table-striped table-advance table-hover">
                              <h4></i>&nbsp&nbsp&nbsp  Penilaian Siswa</h4>

		<div class="panel-body">
			<form action="{{ route('penilaian.update',$siswaa->id) }}" method="post">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				


				<input type="hidden" name="a" value="{{$siswaa->nis}}">
				<input type="hidden" name="b" value="{{$siswaa->nama}}">
				<input type="hidden" name="c" value="{{$siswaa->kelas}}">
				<input type="hidden" name="d" value="{{$siswaa->jenis_kelamin}}">
				<input type="hidden" name="g" value="{{ Auth::user()->name}}">
        <input type="hidden" name="x" value="{{$siswaa->point}}">

	<b><strong><label class="control-label"> Nama </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : &nbsp&nbsp{{$siswaa->nama}}
				<br>
				<label class="control-label">Nama Penilai </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp {{ Auth::user()->name}}
				<br>
        <label class="control-label">Point Awal </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp {{$siswaa->point}}
        <br>
				<br>

        <label>Pilih Pelanggaran & Prestasi</label>
					<select name="ketetapan" class="form-control select2">
                  @foreach($ketetapan as $data)
                    <option value="{{$data->id}}">{{$data->nama}}</option>
                  @endforeach
          </select>
        
 
        <br>
        <br>

				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
</div>
</b></strong>
</table>
</div>
</div>
</section>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection