<?php

    $tembusan = '';
    $x = 0;
    foreach($_POST as $value => $item) {
        if($item === 'on') {
            $tembusan .= '-' . $value;
        }
    }
    
    // d($tembusan);

    if(empty($tembusan)) {
        view('surat/notadinas/create.view.php');
        exit();
    }
   
    $nota_dinas_records = [
        'tujuan' => $_POST['tujuan'],
        'tgl_surat' => $_POST['tgl_surat'],
        'user' => $_POST['user'],
        'perihal' => $_POST['perihal'],
        'surat_pdf' => file_get_contents(pdfSrc('nota_dinas/' . $_POST['surat_pdf'])),
        'tembusan' => $tembusan
    ];

    $nota_dinas = Database::db()->insert('nota_dinas', $nota_dinas_records);

    $last_id = Database::db()->get("SELECT * FROM nota_dinas ORDER BY id DESC LIMIT 1");

    $last_id = $last_id->results()[0]['id'];
    
    $rom = ['1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV', '5' => 'V', '6' => 'VI', 
            '7' => 'VII', '8' => 'VIII', '9' => 'IX', '10' => 'X', '11' => 'XI', '12' => 'XII'];

    $month = date("n", strtotime($_POST['tgl_surat']));

    if (array_key_exists($month, $rom)) {
        $month = $rom[$month];
    }

    $year = date("Y", strtotime($_POST['tgl_surat'])); 

    $nomor = "B/ND-{$last_id}/REN.3.2./{$month}/{$year}/Bidhumas";

    // d($nomor);

    $no_notadinas = Database::db()->update('nota_dinas', ['nomor_nota_dinas' => $nomor], $last_id);
    
    view('surat/notadinas/index.view.php');
   
