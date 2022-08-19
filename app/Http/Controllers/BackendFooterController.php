<?php

namespace App\Http\Controllers;

use App\Models\BackendFooter;
use Illuminate\Http\Request;

class BackendFooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backendFooter = BackendFooter::latest()->get();
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/backendFooter', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('backend footer'),
            "creator" => $user,
            "backendFooter" => $backendFooter,
            "action" => 'add',
            "namaUser" => $namaUser,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->action == "add") {
            // return request();
            $data = $request->except('_token');

            BackendFooter::create($data);
            return redirect()->route('backendFooter.index')->with('success', 'informasi Berhasil Dilakukan, Terima Kasih !');
        }
        if ($request->action == "edit") {
            // return $request->id;
            $data = $request->except('_token', 'action');

            BackendFooter::where('id', $request->id)->update($data);
            return redirect()->route('backendFooter.index')->with('success', 'informasi telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BackendFooter  $backendFooter
     * @return \Illuminate\Http\Response
     */
    public function show(BackendFooter $backendFooter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendFooter  $backendFooter
     * @return \Illuminate\Http\Response
     */
    public function edit(BackendFooter $backendFooter)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/formBackendFooter', [
            "title" => "PIKI - SUMUT",
            "menu" => ucwords('backend edit footer'),
            "creator" => $user,
            "backendFooter" => $backendFooter,
            "action" => 'edit',
            "namaUser" => $namaUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendFooter  $backendFooter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendFooter $backendFooter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendFooter  $backendFooter
     * @return \Illuminate\Http\Response
     */
    public function destroy(BackendFooter $backendFooter)
    {
        $data = ['deleted_by' => auth()->user()->name];
        BackendFooter::where('id', $backendFooter->id)
        ->update($data);
        $backendFooter->id;
        $backendFooter->delete();
        return redirect()->back()->with('success', 'footer telah dihapus');
    }
}
