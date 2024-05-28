<?php

    function dateFormat($date, $mode = ID) {
        dd($date);
        d(gettype($date));
    }

    function dateFormatID($data)
    {
        $date = explode('-', $data);
       
        $tgl = $date[2];
        $bln = $date[1];
        $thn = $date[0];

        $dateID = $tgl . '-' . $bln . '-' . $thn;

        return $dateID;
    }


    function date_time_Format_ID($date_time) {
        $date_time = DateTime::createFromFormat("Y-m-d H:i:s", $date_time);
    
        $date = $date_time->format("d-m-Y");
        $time = $date_time->format("H:i");

        return $date . '  at  ' . $time . ' wib';
    }


    function dateFormatEN($date)
{
        $date = explode('-', $date);
        $tgl = $date[0];
        $bln = $date[1];
        $thn = $date[2];
        return $thn . '-' . $bln . '-' . $tgl;
    }


    function datetimeEN($date_time)
    {    
        $date_time = DateTime::createFromFormat("Y-m-d H:i:s", $date_time);
        
        $date = $date_time->format("Y-m-d");
        $time = $date_time->format("H:i:s");

        return $date . '  at  ' . $time ;
    }


    function countDay($lastday)
    {   
        $datetime = new DateTime($lastday);
        // $datetime->format('Y');
        // d($datetime);

        // $today = date('Y-m-d');
        // dd($today);
        // $days = (strtotime($today) - strtotime($lastday)) / (60 * 60 * 24);
        // $days = (strtotime($today) - strtotime($datetime)) / (60 * 60 * 24);
        // d($days);
        // return $days;
    }

?>