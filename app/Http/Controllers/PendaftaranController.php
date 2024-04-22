<?php

namespace App\Http\Controllers;

use App\Models\majors;
use App\Models\potential_students;
use App\Models\registers;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class PendaftaranController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    /**
     * index
     *
     * @return View
     */
    public function index(Request $request): View
    {

        if ($request->has('search')) {
            $potential_students = potential_students::where('nisn', 'LIKE', "%$request->search%")
                ->orWhere('nama_lengkap', 'LIKE', "%$request->search%")
                ->orWhere('nama_panggilan', 'LIKE', "%$request->search%")
                ->orWhere('alamat', 'LIKE', "%$request->search%")
                ->orWhere('agama', 'LIKE', "%$request->search%")
                ->orWhere('asal_smp', 'LIKE', "%$request->search%")
                ->orWhere('tempat', 'LIKE', "%$request->search%")
                ->orWhere('no_telp', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $potential_students = potential_students::latest()->paginate(10);
        }


        return view('pendaftaran.index', compact('potential_students'));
    }

    //
    /**
     * pendaftaran
     *
     * @return View
     */
    public function pendaftaran(Request $request): View
    {

        if ($request->has('search')) {
            $registers = registers::where('kd_jurusan', 'LIKE', "%$request->search%")
                ->orWhere('nisn', 'LIKE', "%$request->search%")
                ->orWhere('jumlah_pembiayaan', 'LIKE', "%$request->search%")
                ->orWhere('keterangan', 'LIKE', "%$request->search%")
                ->orWhere('nama_petugas', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $registers = registers::latest()->paginate(10);
        }


        return view('pendaftaran.pendaftaran', compact('registers'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $majors = majors::latest()->paginate(10);
        return view('pendaftaran.create', compact('majors'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            //casis
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'asal_smp' => 'required',
            'tempat' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',

            //pendaftaran
            'kd_jurusan' => 'required',
            'jumlah_pembiayaan' => 'required',
            'keterangan' => 'required',
        ]);

        //create
        potential_students::create([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'asal_smp' => $request->asal_smp,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
        ]);

        $today = date("Y/m/d");
        $user = Auth::user();

        registers::create([
            'tgl_pendaftaran' => $today,
            'kd_jurusan' => $request->kd_jurusan,
            'nisn' => $request->nisn,
            'jumlah_pembiayaan' => $request->jumlah_pembiayaan,
            'keterangan' => $request->keterangan,
            'nama_petugas' => $user->name,

        ]);

        //redirect to index
        return redirect()->route('pendaftaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get by ID
        $potentialStudent = potential_students::where('nisn', $id)->firstOrFail();
        $register = registers::where('nisn', $id)->firstOrFail();
        $jurusan = majors::where('kd_jurusan', $register->kd_jurusan)->value('nama_jurusan');
        $biaya = majors::where('kd_jurusan', $register->kd_jurusan)->value('total_biaya');
        $biaya = intval(str_replace('.', '', $biaya));
        $jumlah_pembiayaan = intval(str_replace('.', '', $register->jumlah_pembiayaan));
        $sisa_bayar = $biaya - $jumlah_pembiayaan;
        $sisa_bayar = number_format($sisa_bayar, 0, ',', '.');

        //render view with pendaftaran
        return view('pendaftaran.show', compact('potentialStudent', 'register', 'jurusan', 'sisa_bayar'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get major by ID
        $majors = majors::latest()->paginate(10);
        $potentialstudent = potential_students::where('nisn', $id)->firstOrFail();
        $register = registers::where('nisn', $id)->firstOrFail();


        //render view with major
        return view('pendaftaran.edit', compact('majors', 'potentialstudent', 'register'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            //casis
            'nisn' => 'required',
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'asal_smp' => 'required',
            'tempat' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',

            //pendaftaran
            'kd_jurusan' => 'required',
            'jumlah_pembiayaan' => 'required',
            'keterangan' => 'required',
        ]);

        //update

        $potential_students = potential_students::where('nisn', $id)->firstOrFail();

        $potential_students->update([
            'nisn' => $request->nisn,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'alamat' => $request->alamat,
            'agama' => $request->agama,
            'asal_smp' => $request->asal_smp,
            'tempat' => $request->tempat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
        ]);

        //get register by ID
        $registers = registers::where('nisn', $id)->firstOrFail();

        $registers->update([
            'kd_jurusan' => $request->kd_jurusan,
            'nisn' => $request->nisn,
            'jumlah_pembiayaan' => $request->jumlah_pembiayaan,
            'keterangan' => $request->keterangan,
        ]);
        //redirect to index
        return redirect()->route('major.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy(Request $request, $id): RedirectResponse
    {

        //delete 
        potential_students::where('nisn', $id)->delete();
        registers::where('nisn', $id)->delete();

        //redirect to index
        return redirect()->route('major.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
