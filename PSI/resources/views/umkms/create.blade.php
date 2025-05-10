@extends('layouts.app')

@section('content')
<div class="container bg-white p-4 rounded shadow" style="max-width: 700px;">
    <h2 class="text-center mb-4">Data UMKM</h2>

    {{-- Menampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('umkms.store') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-md-6">
            <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ old('nama') }}">
        </div>

        <div class="col-md-6">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="jenis_kelamin" class="form-control" placeholder="Jenis Kelamin" value="{{ old('jenis_kelamin') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="negara" class="form-control" placeholder="Negara" value="{{ old('negara') }}">
        </div>

        <div class="col-md-6">
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="instansi" class="form-control" placeholder="Instansi" value="{{ old('instansi') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" value="{{ old('provinsi') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="jenis_perusahaan" class="form-control" placeholder="Jenis Perusahaan" value="{{ old('jenis_perusahaan') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="kota" class="form-control" placeholder="Kota" value="{{ old('kota') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="{{ old('alamat') }}">
        </div>

        <div class="col-md-6">
            <input type="text" name="no_fax" class="form-control" placeholder="No Fax" value="{{ old('no_fax') }}">
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>
    </form>
</div>
@endsection
