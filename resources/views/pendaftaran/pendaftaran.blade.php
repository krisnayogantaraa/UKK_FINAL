@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Daftar Pendaftaran</p>
<a href="{{ route('pendaftaran.create') }}">
    <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-56">Pendaftaran Baru</button>
</a>

<div>
    <form class="w-56 ml-auto" action="/datapendaftaran" method="get">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari" />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
</div>

<div class="relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700  uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 w-16">
                    No Pendaftaran
                </th>
                <th scope="col" class="px-6 py-3">
                    NISN
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pendaftaran
                </th>
                <th scope="col" class="px-6 py-3">
                    KD Jurusan
                </th>
                <th scope="col" class="px-6 py-3">
                    Jumlah Pembayaran
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($registers as $register)
            <tr class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $register->id }}</td>
                <td class="px-6 py-4">{{ $register->nisn }}</td>
                <td class="px-6 py-4">{{ $register->tgl_pendaftaran }}</td>
                <td class="px-6 py-4">{{ $register->kd_jurusan }}</td>
                <td class="px-6 py-4">{{ $register->jumlah_pembiayaan}}</td>
                <td class="px-6 py-4">{{ $register->keterangan}}</td>
                <td class="px-6 py-4">{{ $register->nama_petugas}}</td>
                <td class="px-6 py-4">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pendaftaran.destroy', $register->nisn) }}" method="POST">
                        <a href="{{ route('pendaftaran.show', $register->nisn) }}">
                            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900 w-44">Show</button>
                        </a>
                        <a href="{{ route('pendaftaran.edit', $register->nisn) }}">
                            <button type="button" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800 w-44">Edit</button>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="focus:outline-none text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900 w-44">HAPUS</button>
                    </form>
                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Barang belum Tersedia.
            </div>
            @endforelse
        </tbody>
    </table>
    {{$registers->links()}}
</div>
@endsection