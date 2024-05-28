<?php

    use Core\Database;
   
    $disposisi = Database::query("SELECT * FROM surat_masuk WHERE id = ?", ['id' => $_GET['id']]);
    
    view('disposisi/preview.view.php', ['pdf' => $disposisi->results()[0]['surat_pdf']]);

?>