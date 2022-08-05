<?php

namespace App\Http\Controllers;

use App\Models\BackendFaq;
use Illuminate\Http\Request;

class BackendFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $backendFaq = BackendFaq::get();
        $user = auth()->user()->id;
        return view('admin/backendFaq', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('backend faq'),
            "creator" => $user,
            "backendFaq" => $backendFaq,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        return view('admin/backendFormFaq', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('backend faq'),
            "creator" => $user,
            "namaUser" => $namaUser,
            "action" => 'add',
        ]);
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

            BackendFaq::create($data);
            return redirect()->route('faq.index')->with('success', 'Faq Berhasil Ditambah');
        }
        if ($request->action == "edit") {
            // return $request->id;
            // return $request;

            $data = $request->except('_token', 'action');
            // return $data;
            BackendFaq::where('id', $request->id)->update($data);
            return redirect()->route('faq.index')->with('success', 'Faq telah diedit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BackendFaq  $backendFaq
     * @return \Illuminate\Http\Response
     */
    public function show(BackendFaq $backendFaq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BackendFaq  $backendFaq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user()->id;
        $namaUser = auth()->user()->name;
        // return BackendFaq::find($id);
        return view('admin/backendFormFaq', [
            "title" => "PIKI - Sangrid",
            "menu" => ucwords('backend faq'),
            "creator" => $user,
            "namaUser" => $namaUser,
            "backendFaq" => BackendFaq::find($id),
            "action" => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BackendFaq  $backendFaq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BackendFaq $backendFaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BackendFaq  $backendFaq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ['deleted_by' => auth()->user()->name];
        BackendFaq::where('id', $id)
        ->update($data);
        $backendFaq = BackendFaq::find($id);
        $backendFaq->delete();
        return redirect()->back()->with('success', 'Program telah dihapus');
    }
}
