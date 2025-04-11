<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="text-center">Edit Tiket</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $ticket->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="Laki-laki" {{ $ticket->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $ticket->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $ticket->alamat }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $ticket->email }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Negara</label>
                                <input type="text" name="negara" class="form-control" value="{{ $ticket->negara }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Provinsi</label>
                                <input type="text" name="provinsi" class="form-control" value="{{ $ticket->provinsi }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kota</label>
                                <input type="text" name="kota" class="form-control" value="{{ $ticket->kota }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. Telp</label>
                                <input type="text" name="no_telp" class="form-control" value="{{ $ticket->no_telp }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No. Fax</label>
                                <input type="tel" name="no_fax" class="form-control" value="{{ $ticket->no_fax }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control" value="{{ $ticket->pekerjaan }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Usia</label>
                                <input type="number" name="usia" class="form-control" value="{{ $ticket->usia }}">
                            </div>


                            <div class="mb-3">
                                <label class="form-label">Layanan</label>
                                <input type="text" name="layanan" class="form-control" value="{{ $ticket->layanan }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ $ticket->tanggal }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Petugas</label>
                                <input type="text" name="petugas" class="form-control" value="{{ $ticket->petugas }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="Buka" {{ $ticket->status == 'Buka' ? 'selected' : '' }}>Buka</option>
                                    <option value="Selesai" {{ $ticket->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Survey</label>
                                <input type="text" name="survey" class="form-control" value="{{ $ticket->survey }}">
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div> <!-- /.card -->
            </div>
        </div>
    </div>

</body>
</html>
