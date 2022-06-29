<?php

namespace App\Console\Commands;

use App\Models\TempAnggota;
use Illuminate\Console\Command;

class CronJobTes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:perpindahanTempKeAnggota';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'memindahkan data dari table temp anggota ke table anggota pada jam 00.00';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // $tempUser = TempAnggota::where('users_id', 17)->latest()->first();
        // $tempUser = TempAnggota::latest()->first();
        $tempUser = TempAnggota::get();
        // $tempu = $tempUser->users_id;
        // for ($i = 0; $i < count($tempUser); $i++) {
        //     # code...
        //     $userid = $tempUser[$i]->users_id;
        //     $tempu = $tempUser[$i]->users_id;
        //     $tempus = TempAnggota::where('users_id', $tempu)->latest()->get();
        //     // $tempus = TempAnggota::where('users_id', $tempu)->latest()->firstOrFail()->toArray();
        //     $hitungUserId = count($tempus);
        //     // print_r($tempus);
        //     // echo $hitungUserId . "\n";
        //     // print_r("ini users id ke ".json_decode($tempu). "\n");
        //     // print_r("ini users id ke ".$tempu. "\n");
        //     // print_r(json_decode($tempus));
        //     // dd($tempus);


        //     if ($userid == $tempu)
        //     {
        //         echo "OK \n" ;
        //         echo "ini userid ".$userid . "\n";
        //         echo "ini tempu ".$tempu . "\n";
        //     }
        //     if ($userid === $tempu) {
        //         $tempuse = TempAnggota::where('users_id', $userid)->latest()->firstOrFail();
        //         // $tempuse = TempAnggota::where('users_id', $tempu)->latest()->get();
        //         print_r(json_decode($tempuse));
        //     }
        // }

        // foreach($tempUser as $tempu) {
        //     $userid = $tempu->users_id;
        //     $hitungUserId = count($userid);
        //     echo $hitungUserId;
        //     $tempus = TempAnggota::where('users_id', $userid)->latest()->firstOrFail();
        //     echo 'user id ' . $userid. "\n";
        //     print('data user id ' . $tempus. "\n");
        // }
        // $arrTemp = ['Apel', 'Jeruk'];
        // array_push($arrTemp, 'Nanas');
        // array_push($arrTemp, 'Nanas');
        // array_push($arrTemp, 'Nanas');
        // print_r($arrTemp) ;
        // $clear_array = array_unique($arrTemp);
        // print_r($clear_array);
        // echo "============ \n";
        $arrUserId = [];
        foreach($tempUser as $tempu) {
            $userid = $tempu->users_id;
            array_push($arrUserId, $userid);
        }
        print_r($userid);
        echo "\n";
        $clear_array_arrUserId = array_unique($arrUserId);
        print_r($clear_array_arrUserId);
        for ($i=0; $i < count($clear_array_arrUserId) ; $i++) {
            echo $arrUserId[$i];
            echo "\n";
            $tempus = TempAnggota::where('users_id', $arrUserId[$i])->latest()->firstOrFail();
            // print_r(json_decode($tempus));
            // echo $tempus;
            // print_r(json_decode('data user id ' . $tempus. "\n"));
            // echo "\n";
        }
        // foreach($tempUser as $tempu) {
        //     $userid = $tempu->users_id;
        //     $tempu = $tempu->users_id;
        //         if ($userid == $tempu)
        //         {
        //             echo "ini userid ".$userid . "\n";
        //             echo "ini tempu ".$tempu . "\n";
        //             echo "OK \n" ;
        //         }
        // }
        // echo count($tempUser). "\n";
        // print_r(json_decode($tempUser));
    }
}
