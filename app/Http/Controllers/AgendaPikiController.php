<?php

namespace App\Http\Controllers;

use App\Models\AgendaPiki;
use Illuminate\Http\Request;

class AgendaPikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = AgendaPiki::take(7)->get();
        return view('admin/landingpageagenda', [
            "title" => "PIKI - Sangrid",
            "menu" => "Agenda",
            "creator" => "San",
            "agenda" => $agenda,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function show(AgendaPiki $agendaPiki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function edit(AgendaPiki $agendaPiki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AgendaPiki $agendaPiki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AgendaPiki  $agendaPiki
     * @return \Illuminate\Http\Response
     */
    public function destroy(AgendaPiki $agendaPiki)
    {
        //
    }
}
