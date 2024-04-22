@extends('layouts.app')

@section('content')
<p class="text-5xl mb-3 dark:text-white">Detail Calon Siswa</p>
<table class="text-xl w-full mb-5">
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">No Pendaftaran</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $register->id }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Tanggal Pendaftaran</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $register->tgl_pendaftaran }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">NISN</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $potentialStudent->nisn }}</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Nama Lengkap</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $potentialStudent->nama_lengkap }} ({{ $potentialStudent->nama_panggilan }})</p>
        </td>
    </tr>
    <tr>
        <td class="w-3/12">
            <p class="dark:text-white">Tempat, Tanggal Lahir</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td class="w-8/12">
            <p class="dark:text-white">{{ $potentialStudent->tempat }}, {{ $potentialStudent->tanggal_lahir }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Jurusan</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $jurusan }} ({{ $register->kd_jurusan }})</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Agama</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $potentialStudent->agama }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Alamat</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $potentialStudent->alamat }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">Asal SMP</p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $potentialStudent->asal_smp }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">
                No Telepon/Wa
            </p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $potentialStudent->no_telp }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">
                Jumlah Pembayaran
            </p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">Rp. {{ $register->jumlah_pembiayaan }} (Sisa Rp.{{$sisa_bayar}})</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">
                Keterangan
            </p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $register->keterangan }}</p>
        </td>
    </tr>
    <tr>
        <td>
            <p class="dark:text-white">
                Nama Petugas
            </p>
        </td>
        <td>
            <p class="dark:text-white">
                :
            </p>
        </td>
        <td>
            <p class="dark:text-white">{{ $register->nama_petugas }}</p>
        </td>
    </tr>
</table>
<hr>
@endsection