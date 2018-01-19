@extends('layouts.admin')
@section('content')

  <section id="main-content">
          <section class="wrapper">
            <div class="row mt">
                  <div class="col-md-12">
                      
                          <table class="table table-striped table-advance table-hover">
                              <h4></i>&nbsp&nbsp&nbsp Data Siswa</h4>

    
			<form action="{{ route('siswa.update',$siswaa->id) }}" method="post">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      	

       <div class="form-group">
        <label class="control-label"> Nis </label>
        <input type="number" name="a" value="{{$siswaa->nis}}" class="form-control" required="">

      <div class="form-group">
        <label class="control-label"> Nama </label>
        <input type="text" name="b" value="{{$siswaa->nama}}" class="form-control" required="">

         <div class="form-group">
            <br>
        <label class="control-label"> Jenis Kelamin </label>
        <br>
        <br>
        Data Saat Ini : {{$siswaa->jenis_kelamin}}<br><br>
        <input type="radio" name="d" value="Laki - Laki"  required="">Laki - Laki &nbsp &nbsp
        <input type="radio" name="d" value="Perempuan"  required="">Perempuan 
        <br>
        <br>

      <div class="form-group">
        <label class="control-label"> Kelas </label>
        <br>
        <br>
        @php
        $k = App\Kelas::find($siswaa->kelas);
        @endphp
        Data Saat Ini : {{$k->tingkat_kelas}}{{$k->nama_kelas}}<br><br>
        <select name="c" class="select2 form-control">
        @php
        $kelas = App\Kelas::orderBy('tingkat_kelas', 'asc')->get();
        @endphp
        @foreach($kelas as $data)
        <option class="form-control" value="{{$data->id}}">{{$data->tingkat_kelas}}{{$data->nama_kelas}}</option>
        @endforeach
        <br>
        </select>
        <br>
<br>
 <input type="hidden" name="e" value="{{$siswaa->point}}">
      <div class="form-group">

	</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</table>
</div>
</div>
</div>
</section>
</section>

@endsection