@extends('layouts.app')
@section('content')

        </div>
      </div>
      
    </div>
  </div>
  
</div>

</body>

<div class="container">
<div class="row">
	<center><h1>Penilaian Sikap Siswa</h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Penilaian Siswa
		<div class="panel-title pull-right">


		<a href="{{ URL::previous() }}">Kembali</a></div>
		</div>
		<div class="panel-body">
			<form action="{{ route('jenis.update',$jenis->id) }}" method="post">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      	

                 <p>
    
      <label class="control-label"> Jenis </label>
        <br>
        <br>
        Data Saat Ini : {{$jenis->jenis}}<br><br>
        <input type="radio" name="a" value="Prestasi"  required="">Prestasi &nbsp &nbsp
        <input type="radio" name="a" value="Pelanggaran"  required="">Pelanggaran 
        <br>
  
<br>
      <div class="form-group">
        <label class="control-label"> Nama </label>
        <br>
        <input type="text" name="b" value="{{$jenis->nama}}" class="form-control" required="">
        <br>
        <br>
<div class="form-group">
        <label class="control-label"> Point  </label><br><i>
        <br> ~ Untuk Pelanggaran Gunakan (-) , Contoh : -5
        <br> ~ Untuk Prestasi Tidak Menggunakan + , Contoh : 5 </i>
        <br>
        <br>
        <input type="number" name="c" value="{{$jenis->point}}" class="form-control" required="">

         <div class="form-group">
            <br>
        <br>
        <br>

 <br>
<br></div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Simpan</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection