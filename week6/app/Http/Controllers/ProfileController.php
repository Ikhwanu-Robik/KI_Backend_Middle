<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getData()
    {
        $name = 'Ikhwanu Robik Saputra';
        $photo_url = 'images/profile-pic.png';
        $address = 'Rejosari, Jatisrono, Wonogiri, Jawa Tengah';
        $school = 'SMK N1 Jatiroto';
        $bio = 'Saya kerap dipanggil Iwan, dan telah memiliki minat pemrograman sejak SMP. Namun baru mulai serius belajar pemrograman saat masuk SMK karena memilih jurusan PPLG (Pemrograman Perangkat Lunak dan Gim). Saya masuk jurusan ini karena saya pikir akan membuat game, tapi ternyata membuat web jadi ya saya nikmati saja toh saya tidak bisa bikin game :).';

        return view('profile', compact(['name', 'photo_url', 'address', 'school', 'bio']));
    }
}
