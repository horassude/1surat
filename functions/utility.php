<?php

    function image($path)
    {
        return HTTP . HOST . '/public/images/' . $path;
    }

    function pickPdf($filePDF)
    {
        return HTTP . HOST . '/assets/surat_masuk/' . $filePDF;
    }

    function no_register($no, $date) {
        $rome = [
            '1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV', '5' => 'V', '6' => 'VI',
            '7' => 'VII', '8' => 'VIII', '9' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII'
        ];
        $month = date("n", strtotime($date));
        if (array_key_exists($month, $rome)) {
            $month = $rome[$month];
        }
        $year = date("Y", strtotime($date));
        $nomor = "REG-{$no}/{$month}/{$year}/Bidhumas";
        return $nomor;
    }

    function view($path, $data = []) {
        extract($data);
        require_once BASE_DIR . 'resources/views/' . $path;
    }

?>