@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Daftar Siswa</p>
<a href="{{ route('pendaftaran.create') }}">
    <button type="button" class="focus:outline-none text-white font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 bg-green-600 hover:bg-green-700 focus:ring-green-800 w-56">Pendaftaran Baru</button>
</a>

<div>
    <form class="w-56 ml-auto" action="/pendaftaran" method="get">
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
                    NISN
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    Agama
                </th>
                <th scope="col" class="px-6 py-3">
                    Asal SMP
                </th>
                <th scope="col" class="px-6 py-3">
                    TTL
                </th>
                <th scope="col" class="px-6 py-3">
                    No Telp
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($potential_students as $potential_student)
            <tr class=" odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $potential_student->nisn }}</td>
                <td class="px-6 py-4">{{ $potential_student->nama_lengkap }} ({{ $potential_student->nama_panggilan }})</td>
                <td class="px-6 py-4">{{ $potential_student->alamat }}</td>
                <td class="px-6 py-4">{{ $potential_student->agama }}</td>
                <td class="px-6 py-4">{{ $potential_student->asal_smp}}</td>
                <td class="px-6 py-4">{{ $potential_student->tempat}}, {{ $potential_student->tanggal_lahir }}</td>
                <td class="px-6 py-4">{{ $potential_student->no_telp}}</td>
                <td class="px-6 py-4">
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pendaftaran.destroy', $potential_student->nisn) }}" method="POST">
                        <a href="{{ route('pendaftaran.show', $potential_student->nisn) }}"
                            >
                            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4  font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:ring-yellow-900 w-44">Show</button>
                        </a>
                        <a href="{{ route('pendaftaran.edit', $potential_student->nisn) }}">
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
    {{$potential_students->links()}}
</div>
@endsection