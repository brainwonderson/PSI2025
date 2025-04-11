<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Data Tickets</h3>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('tickets.create') }}" class="btn btn-md btn-success mb-3">Tambah Tiket</a>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Negara</th>
                                        <th>Provinsi</th>
                                        <th>Kota/Kab</th>
                                        <th>No. Telp</th>
                                        <th>No. Fax</th>
                                        <th>Pekerjaan</th>
                                        <th>Usia</th>
                                        <th>Layanan</th>
                                        <th>Tanggal</th>
                                        <th>Petugas</th>
                                        <th>Status</th>
                                        <th>Survey</th>
                                        <th scope="col" style="width: 20%">ACTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tickets as $ticket)
                                        <tr>
                                            <td>{{ $ticket->nama }}</td>
                                            <td>{{ $ticket->jenis_kelamin }}</td>
                                            <td>{{ $ticket->alamat }}</td>
                                            <td>{{ $ticket->email }}</td>
                                            <td>{{ $ticket->negara }}</td>
                                            <td>{{ $ticket->provinsi }}</td>
                                            <td>{{ $ticket->kota }}</td>
                                            <td>{{ $ticket->no_telp }}</td>
                                            <td>{{ $ticket->no_fax ?? '-' }}</td>
                                            <td>{{ $ticket->pekerjaan }}</td>
                                            <td>{{ $ticket->usia }}</td>
                                            <td>{{ $ticket->layanan }}</td>
                                            <td>{{ $ticket->tanggal }}</td>
                                            <td>{{ $ticket->petugas }}</td>
                                            <td>{{ $ticket->status }}</td>
                                            <td>{{ $ticket->survey }}</td>
                                            <td>
                                                <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-dark btn-sm">SHOW</a>
                                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-primary btn-sm">EDIT</a>
                                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">HAPUS</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="17" class="text-center text-danger">
                                                Data Tiket belum tersedia.
                                            </td>
                                        </tr>
                                    @endforelse    
                                </tbody>
                            </table>
                        </div> <!-- /.table-responsive -->

                    </div>
                </div> <!-- /.card -->
            </div>
        </div>
    </div>

</body>
</html>
