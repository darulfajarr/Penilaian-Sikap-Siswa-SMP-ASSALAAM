@extends('layouts.admin')
@section('content')
<div class="container">
<div class="row">
	<center><h1> Tambah Data Gudang </h1></center>
	<div class="panel panel-primary">
		<div class="panel-heading"> Tambah Data Gudang
		
		<a href="{{ URL::previous() }}"> Kembali </a>
		</div>

		<div class="panel-body">
			<form action="{{ route('gudangs.store') }}" method="post">
			{{csrf_field()}}


			<div class="form-group">
				<label class="control-label"> Nama Barang </label>
				<input type="text" name="a" class="form-control" required="">

			<div class="form-group">
				<label class="control-label"> Merk </label>
				<input type="text" name="b" class="form-control" required="">

			<div class="form-group">
				<label class="control-label"> Jumlah </label>
				<input type="text" name="c" class="form-control" required="">

			<div class="form-group">
					<label class="control-label"> Harga </label>
					<input type="text" name="d" files="true" class="form-control" required="">
				</div>

			

			<div class="form-group">
				<button type="submit" class="btn btn-danger">Submit</button>

				<button type="submit" class="btn btn-warning">Reset</button>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection