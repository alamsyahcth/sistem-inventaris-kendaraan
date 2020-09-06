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
    th{
      font-size: 10px;
    }
    .text-center{
      text-align: center;
    }
	</style>
</head>
<body>
	<section>
		<div class="container">
			<h1>Bukti Pengembalian Kendaraan</h1>
			<h4>
				<span class="number">Tanggal : </span> {{ $date }}
			</h4>
			<hr>
		</div>
	</section>
	<section class="info">
		<div class="container">
			<p>
				berdasarkan data booking kendaraan yang sedang dipinjam dari periode
			</p>
			<table width="100%">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Kode</th>
            <th class="text-center">Karyawan</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Jumlah Hari</th>
            <th class="text-center">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1 ?>
          @foreach($data as $d)
          <tr>
            <td class="text-center">{{ $i++ }}</td>
            <td class="text-center">{{ $d->order_books_id }}</td>
            <td class="text-center">{{ $d->employees_name }}</td>
            <td class="text-center">{{ $d->booking_date }}</td>
            <td class="text-center">{{ $d->booking_end }}</td>
            <td class="text-center">{{ $d->booking_date }}</td>
            <td class="text-center">{{ $d->status }}</td>
          </tr>
          @endforeach
        </tbody>
			</table>
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
					<td width="50%">Jakarta, {{ $date }}</td>
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