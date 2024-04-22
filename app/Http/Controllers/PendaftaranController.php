<?php

namespace App\Http\Controllers;

use App\Models\majors;
use App\Models\potential_students;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $potential_students = potential_students::where('kd_jurusan', 'LIKE', "%$request->search%")
                ->orWhere('nama_jurusan', 'LIKE', "%$request->search%")
                ->orWhere('visi', 'LIKE', "%$request->search%")
                ->orWhere('misi', 'LIKE', "%$request->search%")
                ->orWhere('total_biaya', 'LIKE', "%$request->search%")
                ->paginate(10);
        } else {
            $potential_students = potential_students::latest()->paginate(10);
        }


        return view('pendaftaran.index', compact('potential_students'));
    }
    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('majors.create');
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
            'kd_jurusan' => 'required',
            'nama_jurusan' => 'required',
            'link_group' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'total_biaya' => 'required',
        ]);

        //create
        majors::create([
            'kd_jurusan' => $request->kd_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
            'link_group' => $request->link_group,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'total_biaya' => $request->total_biaya,
        ]);

        //redirect to index
        return redirect()->route('major.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get majors by ID
        $majors = majors::findOrFail($id);

        //render view with majors
        return view('majors.show', compact('majors'));
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
        $major = majors::findOrFail($id);

        //render view with major
        return view('majors.edit', compact('major'));
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
            'kd_jurusan' => 'required',
            'nama_jurusan' => 'required',
            'link_group' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'total_biaya' => 'required',
        ]);

        //get majors by ID
        $majors = majors::findOrFail($id);

        //update majors 
        $majors->update([
            'kd_jurusan' => $request->kd_jurusan,
            'nama_jurusan' => $request->nama_jurusan,
            'link_group' => $request->link_group,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'total_biaya' => $request->total_biaya,
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

        //get majors by ID
        $major = majors::findOrFail($id);

        //delete major
        $major->delete();

        //redirect to index
        return redirect()->route('major.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
