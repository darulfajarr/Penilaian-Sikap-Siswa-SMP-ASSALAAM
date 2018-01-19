@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
	<center><h1> Edit Gudang </h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading">Edit Gudang
		<div class="panel-title pull-right">
		<a href="{{ URL::previous() }}">Kembali</a></div>
		</div>

		<div class="panel-body">
			<form action="{{ route('gudangs.update',$gudang->id) }}" method="post">
			<input type="hidden" name="_method" value="PUT">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				
				<div class="form-group">
					<label class="control-label"> Nama Barang </label>
					<input type="text" name="a" value="{{$gudang->nama_barang}}" class="form-control" readonly="">
				</div>

				<div class="form-group">
					<label class="control-label">Merk</label>
					<input type="text" name="b" value="{{$gudang->merk}}" class="form-control" readonly="">
				</div>

				<div class="form-group">
					<label class="control-label">Jumlah</label>
					<input type="text" name="c" value="{{$gudang->jumlah}}" class="form-control" readonly="">
				</div>

				<div class="form-group">
					<label class="control-label">Harga</label>
					<input type="text" name="d" files="true" value="{{$gudang->harga}}" class="form-control" readonly="">
					
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@endsection