<!DOCTYPE html>
<html>
<head>
	<title>Print Laporan</title>
</head>
<body>
	<div class="form-group">
		<p align = "center"><b>Laporan Pegawai</b></p>
		<table class="static" align="center" rules="all" border="1px" style="width: 95%">
		<tr>
			<th>nip</th>
			<th>nama</th>
			<th>alamat</th>
			<th>posisi jabatan</th>
		</tr>
	
	@foreach ($ewos as $i)
		<tr>
			<td>{{$i->nip}}</td>
			<td>{{$i->nama}}</td>
			<td>{{$i->alamat}}</td>
			<td>{{$i->posisijabatan}}</td>



		</tr>

	@endforeach
</table>
</div>
</body>
</html>