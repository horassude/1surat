<?php
    // $_POST['surat_pdf'] = file_get_contents(pdfSrc('nota_dinas/' . $_POST['surat_pdf']));

    // dd($_POST);

    $nota_dinas_update = [
        'tujuan' => $_POST['tujuan'],
        'tgl_surat' => $_POST['tgl_surat'],
        'perihal' => $_POST['perihal'],
        'tembusan' => $_POST['tembusan']
    ];

    if($_POST['surat_pdf']) {
        $nota_dinas_update['surat_pdf'] = file_get_contents(pdfSrc('nota_dinas/' . $_POST['surat_pdf']));
        // $nota_dinas_update['surat_pdf'] =  $_POST['surat_pdf'];
    }
    
//    d($nota_dinas_update);

    $nota_dinas = Database::db()->update('nota_dinas', $nota_dinas_update, $_POST['id']);

    // d($nota_dinas->count());

    if($nota_dinas->count()) {
        echo 'update successfully';
        
    } else {
        echo 'upadate failed';
    }

    view('surat/notadinas/index.view.php');
    exit();
?>