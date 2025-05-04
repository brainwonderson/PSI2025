<!DOCTYPE html>
<html>
<head>
    <title>Data UMKM</title>
    <style>
        body {
            background-color: #bdbdbd;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 20px;
        }

        input, select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            width: 100%;
        }

        .full-width {
            grid-column: span 2;
        }

        .button-container {
            text-align: right;
            grid-column: span 2;
        }

        button {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            font-size: 0.9em;
            grid-column: span 2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Data UMKM</h2>

    <form action="{{ route('umkms.store') }}" method="POST">
        @csrf

        <input type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">

        <input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin" value="{{ old('jenis_kelamin') }}">
        <input type="text" name="negara" placeholder="Negara" value="{{ old('negara') }}">

        <input type="date" name="tanggal"placeholder="Tanggal" value="{{ old('tanggal') }}">

        <input type="text" name="instansi" placeholder="Instansi" value="{{ old('instansi') }}">
        <input type="text" name="provinsi" placeholder="Provinsi" value="{{ old('provinsi') }}">

        <input type="text" name="jenis_perusahaan" placeholder="Jenis Perusahaan" value="{{ old('jenis_perusahaan') }}">
        <input type="text" name="kota" placeholder="Kota" value="{{ old('kota') }}">

        <input type="text" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
        <input type="text" name="no_fax" placeholder="No Fax" value="{{ old('no_fax') }}">

        {{-- <input type="date" name="tanggal" placeholder="Tanggal" value="{{ old('tanggal') }}"> --}}

        <div class="button-container">
            <button type="submit">Simpan</button>
        </div>
    </form>
</div>

</body>
</html>
