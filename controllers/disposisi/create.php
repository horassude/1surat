<?php

    use Core\App;
    use Core\Database;
    use Core\Disposisi;
    use Core\Input;
    use Core\Session;

    $disposisi = App::resolve(Disposisi::class);

    Session::set('back', false);
    
    if(!Input::post()) {

        $surat = Database::query("SELECT * FROM " . SURAT_MASUK_TABLE . " WHERE id = ?", [Input::get('id')])->results()[0];
        view(DISPOSISI_CREATE_VIEW, ['surat_masuk' => $surat]);
    
    } else {

        Session::set('back', true);
        $disposisi::create(Input::post());
        view(DISPOSISI_VIEW, ['surat_masuk' => $surat]);
        
    }

    $back = Session::get('back');

?>

<a id="back-link" href="/disposisi"></a>

<script>

    const back = "<?php echo $back; ?>"
 
</script>