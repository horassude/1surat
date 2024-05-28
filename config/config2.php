<?php
    #DATABASE
    define('DB_CONNECTION',         'mysql');
    define('DB_HOST',               'localhost');
    define('DB_PORT',               '3306');
    define('DB_DATABASE',           'myapp');
    define('DB_CHARSET',            'utf8mb4');
    define('DB_USERNAME',           'root');
    define('DB_PASSWORD',           'root');

    #TABLE
    define('USER_TABLE',            'users');
    define('DISPOSISI_TABLE',       'surat_masuk');
    define('INOUT_TABLE',           'login_logout');
    define('MESSAGES_TABLE',        'messages');
    define('NOTADNAS_TABLE',        'nota_dinas');
    define('SATKER_TABLE',          'satker');
    define('JENISSURAT_TABLE',      'jenis_surat');
    define('LOGIN_TABLE',           'login');
    define('SURAT_MASUK_TABLE',     'surat_masuk');


    #USER FIELDS
    define('ID',                    'id');
    define('USERNAME',              'username');
    define('EMAIL',                 'email');
    define('PASSWORD',              'password');
    define('FIRST_NAME',            'first_name');
    define('LAST_NAME',             'last_name');
    define('FOTO',                  'foto');
    define('PHONE_NUMBER',          'phone_number');
    define('LEVEL',                 'level');
    define('DATE_REGISTER',         'date_register');
    define('ACTIVATED',             'activated');

    define('JENIS_SURAT',           'jenis_surat');
    define('JENIS_SURAT_DISPLAY',   'jenis_surat_display');
    define('ALIAS',                 'alias');

    define('USER_ID',               'user_id');
    define('LOGIN_DATE_TIME',       'login_date_time');
    define('LOGOUT_DATE_TIME',      'logout_date_time');

    define('USER_RULES',            'rules/user.php');
    define('USER_SIGNIN_RULES',      'rules/user_login_rule.php');
    define('USER_SIGNUP_RULES',     'rules/user_signup_rule.php');

    define('LOGO_POLRI',            'logo/humas_polri_small.png');

    #ICON
    define('ICON_LOGOUT',           'icon/user-logout-32.png');
    define('ICON_SAVE',             'icon/save.svg');
    define('ICON_EDIT',             'icon/edit.png');
    define('ICON_MORE',             'icon/more-24.png');
    define('ICON_OPEN',             'icon/open.svg');
    define('ICON_PDF',              'icon/pdf-32.png');
    define('ICON_PROFILE',          'icon/user-profile-32.png');
    define('ICON_LOGIN',            'icon/user-login-32.png');
    define('ICON_SETTING',          'icon/user-settings-32.png');
    define('ICON_SIGNUP',           'icon/user-signup-32.png');
    define('ICON_USER_AVATAR',      'icon/avatar-white-50.png');
    define('ICON_DELETE',           'icon/delete-30.png');
    define('BACKGROUND',            'background/bg1.jpg');

    define('DISPOSISI_UPDATE_RULE', 'rules/disposisi.update.rule.php');

    define('USER_LOGIN_RULE',       'rules/user_login_rule.php');

    #VIEW
    define('INDEX_VIEW',            'index.view.php');
    define('ABOUT_VIEW',            'about.view.php');
    define('MENU_USER_VIEW',        'partial/sub/nav_menu_user.php');
    define('MENU_SURAT_VIEW',       'partial/sub/nav_menu_surat.php');

    #VIEW USER
    define('USER_LOGIN_VIEW',       'user/login.view.php');
    define('USER_SETTING_VIEW',     'user/setting.view.php');
    define('USER_SIGNUP_VIEW',      'user/signup.view.php');
    define('USER_LOGOUT_VIEW',      'user/logout.view.php');

    define('HEAD',                  'partial/head.php');
    define('NAV',                   'partial/nav.php');
    define('FOOTER',                'partial/footer.php');

    #VIEW_REGISTER
    define('REGISTER_VIEW',         '/register/index.view.php');
    define('REGISTER_CREATE',       'register/create.view.php');
    define('PENGIRIM_VIEW',         'register/pengirim.view.php');

    #DISPOSISI
    define('DISPOSISI_CREATE_VIEW', 'disposisi/create.view.php');
    define('DISPOSISI_VIEW',        'disposisi/index.view.php');

    define('CONFIRM_VIEW',          'confirmation/confirm.view.php');

    #ERROR
    define('ERROR_402',             'errors/402.php');
    define('ERROR_405',             'errors/405.php');

   

?>