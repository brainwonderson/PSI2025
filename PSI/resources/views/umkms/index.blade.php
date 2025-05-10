@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h4 class="text-center fw-bold mb-4">Data UMKM</h4>

    {{-- Tombol Add UMKM --}}
    <div class="mb-3 text-end">
        <a href="{{ route('umkms.create') }}" class="btn btn-success btn-sm">+ Add UMKM</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Instansi</th>
                    <th>Jenis Perusahaan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($umkms as $index => $umkm)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $umkm->nama }}</td>
                        <td>{{ $umkm->instansi }}</td>
                        <td>{{ $umkm->jenis_perusahaan }}</td>
                        <td>
                            @php
                                $statusClass = [
                                    'open' => 'success',
                                    'verifikasi' => 'info',
                                    'cancel' => 'danger',
                                    'close' => 'secondary'
                                ][$umkm->status] ?? 'dark';
                            @endphp
                            <span class="badge bg-{{ $statusClass }}">
                                {{ ucfirst($umkm->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex flex-wrap gap-1">
                               <a href="{{ route('umkms.layanans.create', ['umkm' => $umkm->id]) }}" class="btn btn-primary btn-sm">Lanjut</a>
                                <a href="{{ route('umkms.edit', $umkm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('umkms.updateStatus', ['id' => $umkm->id, 'status' => 'cancel']) }}" class="btn btn-danger btn-sm">Cancel</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Data UMKM belum tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-3">
        {{ $umkms->links() }}
    </div>
</div>
@endsection
