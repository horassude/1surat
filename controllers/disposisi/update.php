<?php
   
    use Core\Disposisi;
    use Core\Register;
    use Core\Input;

    // Register::update(Input::post());
    Disposisi::create(Input::post());
    // $disposisi = new Disposisi($_POST, DISPOSISI_VIEW, $_FILES);
    
    // $disposisi->update();

    view(DISPOSISI_VIEW);

?>