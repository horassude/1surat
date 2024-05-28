<?php

    use Core\Input;
    use Core\Register;
    
    Register::delete();

    view(REGISTER_VIEW);
 
?>


<script>
    window.history.back();
</script>