<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Cetak Laporan </title>
    <style>
        table {
            border-collapse: collapse;
        }
        td,th {
            border:1px solid;
        }
    </style>
</head>
<body>
    <table>
          <tr>
            
            <th> No </th>
            <th>Nis</th>
            <th>Nama Lengkap</th>
            <th>Kelas</th>
            <th>JK</th>
            <th>Point Awal</th>
            <th>Berkurang / Bertambah</th>
            <th>Point Akhir</th>
            <th>Pelanggaran / Prestasi </th>
            <th>Penilai</th>
            <th>Waktu</th>
          </tr>
  
        @php $no=1; @endphp
        @foreach($detail as $data)
        <tr>
        @php

        $bio = App\siswaa::find($data->id_siswa);
        @endphp
        <td>{{$no++}}</td>
        <td>{{$bio->nis}}</td>
        <td>{{$bio->nama}}</td>
        <td>{{$bio->kelas}}</td>
        <td>{{$bio->jenis_kelamin}}</td> 
        <td>{{$data->point_awal}}</td>
        <td>{{$data->point_tdk}}</td>
        <td>{{$data->point_akhir}}</td>
        <td>{{$data->jenis}}</td>
        <td>{{$data->penilai}}</td>
        <td>{{$data->created_at}}</td>
           @endforeach
    </table>
</body>
</html>