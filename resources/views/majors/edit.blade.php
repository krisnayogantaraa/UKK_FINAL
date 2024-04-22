@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 text-gray-900 dark:text-white">Edit Data Pendaftar</p>
<form action="{{ route('major.update', $major->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="kd_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kd Jurusan</label>
            <input value="{{ $major->kd_jurusan }}" type="text" id="kd_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh: RPL" required name="kd_jurusan">
        </div>
        <div>
            <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jurusan</label>
            <input value="{{ $major->nama_jurusan }}" type="text" id="Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Rekayasa Perangkat Lunak" required name="nama_jurusan">
        </div>
        <div>
            <label for="link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Group</label>
            <input value="{{ $major->link_group }}" type="text" id="link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : http://rpl.com" required name="link_group">
        </div>
        <div>
            <label for="biaya" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Total Biaya</label>
            <input value="{{ $major->total_biaya }}" type="text" id="biaya" oninput="formatRibuan(this)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 5.000.000" required name="total_biaya">
        </div>
        <div>
            <label for="visi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi</label>
            <textarea id="visi" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : " name="visi"> {{ $major->visi }}</textarea>
        </div>
        <div>
            <label for="misi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Misi</label>
            <textarea id="misi" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : " name="misi"> {{ $major->misi }}</textarea>
        </div>
    </div>
    <button type="submit" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
    <button type="reset" class="text-white  focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-yellow-400 focus:ring-yellow-300  ">Reset</button>
</form>
</div>
<script>
    function formatRibuan(input) {
        // Menghapus semua karakter selain angka
        var value = input.value.replace(/\D/g, '');
        // Menambahkan titik setiap 3 digit dari belakang
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        // Menyimpan nilai yang sudah diformat ke input
        input.value = value;
    }
</script>
@endsection