@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 text-gray-900 dark:text-white">Edit Data Jurusan</p>
<form action="{{ route('pendaftaran.update', $potentialstudent->nisn) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="kd_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
            <select id="kd_jurusan" name="kd_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($majors as $major)
                <option 
                @if($major->kd_jurusan == $register->kd_jurusan)
                selected value="{{ $major->kd_jurusan }}">{{ $major->nama_jurusan }}</option>
                @else
                value="{{ $major->kd_jurusan }}">{{ $major->nama_jurusan }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div>
            <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
            <input value="{{$potentialstudent->nisn}}" type="text" id="nisn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 0056254322" required name="nisn">
        </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-1">
        <div>
            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
            <input value="{{$potentialstudent->nama_lengkap}}" type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna Yogantara" required name="nama_lengkap">
        </div>
    </div>
    <div class="grid gap-6 mb-6 md:grid-cols-2">

        <div>
            <label for="panggilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Panggilan</label>
            <input value="{{$potentialstudent->nama_panggilan}}" type="text" id="panggilan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Krisna" required name="nama_panggilan">
        </div>
        <div>
            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
            <select id="agama" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @if($potentialstudent->agama == "Islam")
                <option selected value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                @elseif ($potentialstudent->agama == "Kristen")
                <option value="Islam">Islam</option>
                <option selected value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                @elseif ($potentialstudent->agama == "Katholik")
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option selected value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                @elseif ($potentialstudent->agama == "Hindu")
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option selected value="Hindu"></option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                @elseif ($potentialstudent->agama == "Buddha")
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option selected value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
                @elseif ($potentialstudent->agama == "Konghucu")
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katholik">Katholik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option selected value="Konghucu">Konghucu</option>
                @endif

            </select>
        </div>
        <div>
            <label for="SMP" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asal SMP</label>
            <input value="{{$potentialstudent->asal_smp}}" type="text" id="SMP" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : SMP 08 Bandung" required name="asal_smp">
        </div>
        <div>
            <label for="Telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telp/Wa</label>
            <input value="{{$potentialstudent->no_telp}}" type="text" id="Telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 0812345678" required name="no_telp">
        </div>
        <div>
            <label for="ttl" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat, Tanggal Lahir</label>
            <div class="flex">
                <input value="{{$potentialstudent->tempat}}" type="text" id="ttl" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : Bandung" required name="tempat">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input value="{{$potentialstudent->tanggal_lahir}}" name="tanggal_lahir" datepicker datepicker-format="yyyy/mm/dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
            </div>
        </div>
        <div>
            <label for="biaya" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Bayar</label>
            <input value="{{$register->jumlah_pembiayaan}}" type="text" id="biaya" oninput="formatRibuan(this)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contoh : 5.000.000" required name="jumlah_pembiayaan">
        </div>
        <div>
            <label for="Alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
            <textarea id="Alamat" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Rt002/016 kec.bojong gede kota bandung" name="alamat">{{$potentialstudent->alamat}}</textarea>
        </div>
        <div>
            <label for="Keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
            <textarea id="Keterangan" rows="4" class="block p-2.5 w-full text-sm  rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh : Jalur Raport" name="keterangan">{{$register->keterangan}}</textarea>
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