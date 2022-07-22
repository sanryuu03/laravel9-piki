<?php

namespace App\Http\Controllers;

use App\Models\MasterMenuNavbar;
use Illuminate\Support\Facades\View;
use App\Models\SubMenuNavbarKeuangan;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $navbarAnggota = false;
        $masterMenuNavbarKeuangan = MasterMenuNavbar::get();
        $subMenuNavbarKeuangan = SubMenuNavbarKeuangan::get();
        // dd($pendaftarBaru);
        View::share([
            "navbarAnggota" => $navbarAnggota,
            "masterMenuNavbarKeuangan" => $masterMenuNavbarKeuangan,
            "subMenuNavbarKeuangan" => $subMenuNavbarKeuangan,
        ]);

    }
}
