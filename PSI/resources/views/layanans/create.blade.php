<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Form Layanan</title>
        <script src="https://cdn.tailwindcss.com"></script> <!-- Ini wajib -->
    </head>
   
<body class="bg-gray-50 py-10">

    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-2xl p-8">
        <h2 class="text-3xl font-bold text-center text-blue-800 mb-8">Form Tambah Layanan</h2>

        <form action="{{ route('layanans.store') }}" method="POST" class="space-y-8">
            @csrf
            <input type="hidden" name="umkm_id" value="{{ $umkm->id }}">

            <!-- Section 1: Informasi UMKM -->
            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Informasi UMKM</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    @foreach ([
                        // 'Request' => $umkm->request,
                        'Nama' => $umkm->nama,
                        'Tanggal' => $umkm->tanggal,
                        'Email' => $umkm->email,
                        'Jenis Kelamin' => $umkm->jenis_kelamin,
                        'Negara' => $umkm->negara,
                        'Instansi' => $umkm->instansi,
                        'Provinsi' => $umkm->provinsi,
                        'Jenis Perusahaan' => $umkm->jenis_perusahaan,
                        'Kota' => $umkm->kota,
                        'Alamat' => $umkm->alamat,
                        'No Fax' => $umkm->no_fax
                    ] as $label => $value)
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">{{ $label }}</label>
                        <input type="text" value="{{ $value }}" readonly class="w-full px-3 py-2 border rounded-md bg-gray-100 text-gray-700" />
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Section 2: Form Layanan -->
            <div>
                <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Layanan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Jenis Layanan</label>
                        <select name="jenis_layanan" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" required>
                            <option value="" disabled selected hidden>Pilih Jenis Layanan</option>
                            <option value="permintaan informasi" {{ old('jenis_layanan') == 'permintaan informasi' ? 'selected' : '' }}>Permintaan Informasi</option>
                            <option value="pendampingan" {{ old('jenis_layanan') == 'pendampingan' ? 'selected' : '' }}>Pendampingan</option>
                            <option value="pengaduan" {{ old('jenis_layanan') == 'pengaduan' ? 'selected' : '' }}>Pengaduan</option>   
                        </select>
                        @error('jenis_layanan') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>                    

                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Petugas Layanan</label>
                        <input type="text" name="petugas_layanan" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" required />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block font-medium mb-1 text-gray-700">Isi Layanan</label>
                        <textarea name="isi_layanan" rows="4" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" required></textarea>
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Tanggal Layanan</label>
                        <input type="date" name="tanggal_layanan" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" required />
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Zoom</label>
                        <input type="text" name="zoom" class="w-full px-3 py-2 border rounded-md" />
                    </div>
                    <div>
                        <label class="block font-medium mb-1 text-gray-700">Whatsapp</label>
                        <input type="text" name="no_telpon" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200" required />
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-md transition duration-200">
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
