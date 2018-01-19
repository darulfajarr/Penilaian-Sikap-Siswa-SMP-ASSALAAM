<table style="width: 762px; margin-left: auto; margin-right: auto;" border="1">
<tbody>
<tr>
<td style="width: 806px; text-align: center;" colspan="11">YAYASAN ASSALAAM</td>
</tr>
<tr>
<td style="width: 806px; text-align: center;" colspan="11">SMP PLUS ASSALAAM BANDUNG</td>
</tr>
<tr>
<td style="width: 806px; text-align: center;" colspan="11">Jl.Sasak Gantung No. 12-14 Telp. 4201351 Bandung 40251</td>
</tr>
<tr>
<td style="width: 156px; text-align: left;" colspan="2">Bulan</td>
<td style="width: 123.906px;">{{date('F', strtotime($tgl->created_at))}}</td>
<td style="width: 526.094px;" colspan="8" rowspan="2">&nbsp;</td>
</tr>
<tr>
<td style="width: 156px; text-align: left;" colspan="2">Tahun</td>
<td style="width: 123.906px; text-align: left;">{{date('Y', strtotime($tgl->created_at))}}</td>
</tr>
<tr>
<td style="width: 806px;" colspan="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<td style="width: 24px;">NO</td>
<td style="width: 132px; text-align: center;">NIS</td>
<td style="width: 123.906px; text-align: center;">&nbsp;Nama</td>
<td style="width: 19.0938px;">&nbsp;JK</td>
<td style="width: 53px; text-align: center;">Kelas</td>
<td style="width: 66px;">Keterangan</td>
<td style="width: 35px; text-align: center;">&nbsp;P.Awal</td>
<td style="width: 42px;">&nbsp;(+/-)</td>
<td style="width: 61px; text-align: center;">&nbsp;P.Akhir</td>
<td style="width: 141px; text-align: center;">&nbsp;Penilai</td>
<td style="width: 109px;">&nbsp; Waktu</td>
</tr>
@foreach($detail as $data)
@php
$no=1;
$bio = App\siswaa::find($data->id_siswa);
@endphp
@php
$k = App\Kelas::find($bio->kelas);
@endphp
<tr>
<td style="width: 24px;">{{$no++}}</td>
<td style="width: 132px; text-align: center;">{{$bio->nis}}</td>
<td style="width: 123.906px; text-align: center;">{{$bio->nama}}</td>
@if($bio->jenis_kelamin === "Laki - Laki")
<td style="width: 19.0938px;">L</td>
@else
<td style="width: 19.0938px;">P</td>
@endif
<td style="width: 53px; text-align: center;">{{$k->tingkat_kelas}}{{$k->nama_kelas}}</td>
<td style="width: 66px;">{{$data->jenis}}</td>
<td style="width: 35px;">{{$data->point_awal}}</td>
<td style="width: 42px;">{{$data->point_tdk}}</td>
<td style="width: 61px;">{{$data->point_akhir}}</td>
<td style="width: 141px; text-align: center;">{{$data->penilai}}</td>
<td style="width: 109px;">{{$data->created_at}}</td>
</tr>

           
@endforeach
</tbody>
</table>