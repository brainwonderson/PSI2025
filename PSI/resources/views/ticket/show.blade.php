<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>

</head>
<body style="background: lightgray;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="text-center">Data Pengguna</h3>
                        <table class="table table-borderless mt-5">
                            <tbody>
                                <tr><th>Nama</th><td>{{ $ticket->nama }}</td></tr>
                                <tr><th>Jenis Kelamin</th><td>{{ $ticket->jenis_kelamin }}</td></tr>
                                <tr><th>Alamat</th><td>{{ $ticket->alamat }}</td></tr>
                                <tr><th>Email</th><td>{{ $ticket->email }}</td></tr>
                                <tr><th>Negara</th><td>{{ $ticket->negara }}</td></tr>
                                <tr><th>Provinsi</th><td>{{ $ticket->provinsi }}</td></tr>
                                <tr><th>Kota/Kab</th><td>{{ $ticket->kota }}</td></tr>
                                <tr><th>No. Telp</th><td>{{ $ticket->no_telp }}</td></tr>
                                <tr><th>No. Fax</th><td>{{ $ticket->no_fax ?? '-' }}</td></tr>
                                <tr><th>Pekerjaan</th><td>{{ $ticket->pekerjaan }}</td></tr>
                                <tr><th>Usia</th><td>{{ $ticket->usia }}</td></tr>
                                <tr><th>Layanan</th><td>{{ $ticket->layanan }}</td></tr>
                                <tr><th>Tanggal</th><td>{{ $ticket->tanggal }}</td></tr>
                                <tr><th>Petugas</th><td>{{ $ticket->petugas }}</td></tr>
                                <tr><th>Status</th><td>{{ $ticket->status }}</td></tr>
                                <tr><th>Survey</th><td>{{ $ticket->survey }}</td></tr>
                            </tbody>
                        </table>
                    </div>


                </div>
                <div class="d-flex justify-content-between mt-3">
                    <a href="/tickets" class="btn btn-secondary">Kembali</a>
                    <a href="#" class="btn btn-primary" onclick="downloadPDF()">Unduh</a>
                </div>
        </div>
    </div>
    <script>
        function downloadPDF() {
            const element = document.querySelector('.card');
            const opt = {
                margin:       0.5,
                filename:     'data_pengguna.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>
    
</body>
</html>
