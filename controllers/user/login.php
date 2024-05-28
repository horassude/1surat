<?php
    
    use Core\User;
    use Core\Session;
    use Core\Input;
    use Core\App;

    $user = App::resolve(User::class);
   
    Session::set('link', false);

    if (!Input::post()) {

        view(USER_LOGIN_VIEW);

    } else {
        
        $user::login();
        
        $data = ['surat_masuk' => Core\Database::query("SELECT * FROM " . SURAT_MASUK_TABLE . " ORDER BY tgl_diterima DESC")->results()];
        
        $level = $user::$user['level'];
        
        switch ($level) {
            case 'admin':
                Session::set('receiver', 'chandra');
                view(DISPOSISI_VIEW, $data);
                break;
            case 'operator':
                view(REGISTER_VIEW, $data);
                break;
            default:
                break;
        }
        Session::set('link', $level);
    }

    $level = Session::get('link');

?>

<a id="register-link" href="/register"></a>
<a id="disposisi-link" href="/disposisi"></a>


<script>
    var level = "<?php echo $level; ?>"
    var linkID = []
    linkID['admin'] = '#disposisi-link'
    linkID['operator'] = '#register-link'

    if(level) {
        document.addEventListener('DOMContentLoaded', (event) => {
            const link = document.querySelector(linkID[level]);
            if(link) {
                window.location.href = link.href;
            }
        });
    }
</script>