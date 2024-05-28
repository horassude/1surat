<?php

    // d($_GET);

    $id = $_GET['id'];

    $preview_pdf = Database::db()->get('SELECT surat_pdf FROM nota_dinas WHERE id = ?', ['id' =>$_GET['id']]);

    // d($preview_pdf->results()[0]['surat_pdf']);

    $preview = $preview_pdf->results()[0]['surat_pdf'];

    view('surat/notadinas/preview.view.php', ['surat_pdf' => $preview]);