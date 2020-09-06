<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Bukti Pengembalian</title>
	<style>
		*{
			font-family: 'Nunito', sans-serif;
		}
		body{
			padding-left: 50px;
			padding-right: 50px;
		}
		.container{
			margin-left: 20px;
			margin-right: 20px;
		}
		.number{
			color: #686868;
			font-weight: 400;
		}
		.number-group{
			margin-right: 30px;
			margin-left: 30px
		}
		.identity{
			padding-top: 30px;
			margin-left: 40px;
			justify-content: center;
		}
		tr td{
			font-size: 10px;
		}
		.text-bold{
			font-weight: bold;
		}
		p{
			font-size: 12px;
			line-height: 14px;
		}
		.text-fine{
			color: #416ee8;
		}
		.text-trouble{
			color: #d11a32;
		}
	</style>
</head>
<body>
	<section>
		<div class="container">
			<h1>Bukti Pengembalian Kendaraan</h1>
			<h4>
				<span class="number-group"><span class="number">No : </span> {{ $data->book_finish_code }}</span>
				<span class="number">Tanggal : </span> {{ $data->date }}
			</h4>
			<hr>
		</div>
	</section>
	<section class="indentity">
		<table width="100%">
			<tr>
				<td width="16%" style="padding-left: 20px;">
					Nama
				</td>
				<td width="2%">
					:
				</td>
				<td width="32%">
					<span class="text-bold">{{ $data->employees_name }}</span>
				</td>
				<td width="16%">
					NIK
				</td>
				<td width="2%">
					:
				</td>
				<td width="32%">
					<span class="text-bold">{{ $data->nik }}</span>
				</td>
			</tr>
			<tr>
				<td width="16%" style="padding-left: 20px;">
					Email
				</td>
				<td width="2%">
					:
				</td>
				<td width="32%">
					<span class="text-bold">{{ $data->email }}</span>
				</td>
				<td width="10%">
					No Handphone
				</td>
				<td width="2%">
					:
				</td>
				<td width="38%">
					<span class="text-bold">{{ $data->email }}</span>
				</td>
			</tr>
		</table>
		<div class="container">
			<hr>
		</div>
	</section>
	<section class="info">
		<div class="container">
			<p>
				berdasarkan data order no <span class="text-bold">{{ $data->book_code }}</span>, peminjam yang bernama <span class="text-bold">{{ $data->employees_name }}</span> telah mengembalikan kendaraan kantor dengan detail kendaraan sebagai berikut :
			</p>
			<table width="50%">
				<tr>
					<td width="30%" style="vertical-align: 0">ID Kendaraan</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->vechiles_id }}</span></td>
				</tr>
				<tr>
					<td width="30%" style="vertical-align: 0">Nama Kendaraan</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->vechiles_name }}</span></td>
				</tr>
				<tr>
					<td width="30%" style="vertical-align: 0">Nomor Polisi</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->police_number }}</span></td>
				</tr>
			</table>
			<p>
				Berikut Detail peminjamannya :
			</p>
				<table width="50%">
				<tr>
					<td width="30%" style="vertical-align: 0">Tanggal Pinjam</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->booking_date }}</span></td>
				</tr>
				<tr>
					<td width="30%" style="vertical-align: 0">Tanggal Kembali</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->booking_end }}</span></td>
				</tr>
				<tr>
					<td width="30%" style="vertical-align: 0">Keperluan</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->reason }}</span></td>
				</tr>
				<tr>
					<td width="30%" style="vertical-align: 0">Kondisi Barang</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%">@if($data->broken_status == 'fine' || $data->broken_status == '') <span class="text-bold text-fine"> Kondisi Normal </span> @else <span class="text-bold text-trouble"> Ada Trouble</span> @endif</span></td>
				</tr>
				<tr>
					<td width="30%" style="vertical-align: 0">Kerusakan</td>
					<td width="5%" style="vertical-align: 0">:</td>
					<td width="65%"><span class="text-bold">{{ $data->broken_description }}</span></td>
				</tr>
			</table>
			<hr>
		</div>
	</section>
	<section>
		<div class="container">
			<p>
				Bukti pengembalian ini adalah dokumen sah, dan dapat dijadikan alat bukti hukum
			</p>
			<table style="text-align: center;" width="100%">
				<tr>
					<td width="50%"></td>
					<td width="50%">Jakarta, {{ $data->date }}</td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%">Hormat Kami</td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%"></td>
				</tr>
				<tr>
					<td width="50%"></td>
					<td width="50%">( Ardi Panca )</td>
				</tr>
			</table>
		</div>
	</section>
</body>
</html>