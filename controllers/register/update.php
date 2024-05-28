<?php

    use Core\SuratMasuk;
    use Core\Register;
    use Core\Input;
    use Core\Session;
   
    if(!Input::files('error'))
    {
        Input::add('foto', file_get_contents(Input::files('tmp_name')));
    }
    
    Register::update(Input::post());

    view(REGISTER_VIEW);


?>

<script>
    window.history.back();
</script>