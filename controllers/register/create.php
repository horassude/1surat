<?php
    
    use Core\Database;
    use Core\Input;
    use Core\Register;
    use Core\Session;

    Session::set('link', false);

    if(!Input::post()) {
       
        view(REGISTER_CREATE, [JENISSURAT_TABLE => Database::query("SELECT * FROM jenis_surat ORDER BY jenis_surat ASC")->results()]);

    } else {
        
        Session::set('link', true);
        Register::create();
        view(REGISTER_VIEW);

    }
    
    $link = Session::get('link');
?>


<a id="back-link" href="/register"></a>

<script>
    var link = "<?php echo $link; ?>"
</script>