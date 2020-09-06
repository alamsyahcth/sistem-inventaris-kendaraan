<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Booking Mails</title>
</head>
<body>
  <h1>Kode Booking Anda <span style="color: #de2626">{{ $details['title'] }}</span></h1><hr>
  <h5>Nama : {{ $details['name'] }}</h5>
  <h5>No Handphone : {{ $details['phone'] }}</h5>
  <p>Berikan kode booking anda kepada bagian admin inventory, kode ini bersifat rahasia, jaga kode ini baik-baik</p>
  <p>Terima Kasih</p>
</body>
</html>