<?php
   
    use Core\Database;
  
    $table = $_GET['table'];
    $id = $_GET['id'];

    $pdf = Database::query("SELECT surat_pdf FROM {$table} WHERE id = ?", [$id])->results()[0]['surat_pdf'];

    view('preview/index.view.php', ['pdf' => $pdf]);

?>