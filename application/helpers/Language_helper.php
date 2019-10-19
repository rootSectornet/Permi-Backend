<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * Method Tanggal
    * Untuk Menkonversi Tanggal Agar Mudah Dibaca User
    * 2019-08-22 Menjadi 22 Agustus 2019
    **/
    function tanggal($var = '')
    {
        $tgl = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $pecah = explode("-", $var);
        return $pecah[2]." ".$tgl[$pecah[1] - 1]." ".$pecah[0];
    }


    /**
    * Method umur
    * Untuk Menghitung Umur
    * Lahir 2019-08-22 Menjadi 5 hari
    **/

    function umur($param = ''){
        $birthday = $param;
        $biday = new DateTime($birthday);
        $today = new DateTime();

        $diff = $today->diff($biday);
        return  $diff->y ." Tahun ";
    }

    /**
    * Method IDR
    * Untuk Mengubah nilai integer menjadi mata uang rupiah
    * 10000 Menjadi 10.000,00
    **/

    function IDR($amount){
        $angka_format = number_format($amount,2,",",".");
        return $angka_format;
    }


    /**
    * Method getAccess
    * Untuk Mengambil Access User saat login ke aplikasi
    **/

    function getAccess($string){
    }

    /**
    * Method GetLanguage
    * Untuk Mengambil Bahasa.
    **/    

    function GetLanguage($key = null){
        $data =  (array)json_decode(file_get_contents(base_url().'assets/Language/English.json'));
        return $key == null ? $data : $data[$key];
    }