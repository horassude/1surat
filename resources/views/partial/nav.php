<?php

    use Core\Session;
    use Core\Router;
    use Core\Database;
    use Core\User;
  
    // d(Session::get());

    if(Session::get('user')) {
        $admin_online = Session::get('user')['level']  === 'admin' ? true : false;
    } else {
        $admin_online = null;
    }

    if (Session::exists('user')) {
        $user = Database::query("SELECT * FROM " . USER_TABLE . " WHERE id = ?", [Session::get('user')['id']]);
    }

?>


<script>
    var host = 'home';
    var admin_online = "<?php echo $admin_online; ?>"
</script>


<div id="navbar" class="fixed; top-0 w-screen h-screen">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- <div><p class="text-gray-300">Date</p></div> -->
            <div class="flex h-16 items-center justify-between">
                <!-- main menu -->
                <div class="flex items-center">
                    <!-- MENU -->
                   
                    <div class="flex-shrink-0">
                        <a href="/" class=""><img class="h-10 w-10 rounded-full hover:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" alt="Your Company" src="<?= image(LOGO_POLRI) ?>">
                        </a>
                    </div>

                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">

                            <!-- SURAT BUTTON -->
                            <button id="btn-surat" <?= !Session::exists('user') ? "disabled" : null ?> type="button" class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-300 
                                hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-expanded="false">
                                <p id;="btnSurat" class="close text-gray-300">
                                    Surat
                                </p>
                                <svg class="text-gray-300 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 
                                            0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- DISPOSISI BUTTON -->
                            <button id="btn-disposisi">
                                <a href="<?= $admin_online ? "/disposisi" : "#" ?>" class="<?= $admin_online ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" ?> rounded-md px-3 py-2 text-sm font-medium">
                                    Disposisi
                                </a>
                            </button>

 
                            <!-- ABOUT BUTTON -->
                            <button id="btn-about" type="button" class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 hover:text-white text-gray-300 hover:bg-gray-700 rounded-md px-3 py-2 text-sm font-medium" aria-expanded="false"><a href="/about">About</a>
                            </button>
                            
                        </div>
                    </div>
                </div>

                <!-- USER BUTTON  -->
                <div class="ml-4 flex items-center md:ml-6;">
                    <div class="ml-5 flex items-center space-x-4 align-items-center">
                        <div class="flex items-center gap-x-3">
                            <button type="button" id="btn-user" class="flex gap-x-5 items-center">
                                <img id="img-user" class="rounded-full hover:ring-2 hover:ring-white <?= Session::exists('user') ? "w-10 h-10" : "w-6 h-6" ?>" src="<?= Session::exists('user') ? "data:image/jpeg;base64," . base64_encode($user->results()[0]['foto']) : image(ICON_PROFILE) ?>" />
                            </button>
                            <p class="text-white"><?= Session::exists('user') ? $user->results()[0]['username'] : null ?></p>
                            <?php if (Session::exists('message')) : ?>
                                <!-- <div class="mx-auto flex h-7 w-7 flex-shrink-0 items-center justify-center rounded-full bg-red-700 sm:mx-0 sm:h-7 sm:w-7">
                                    <p class="text-white"><?= Session::exists('message') ? Session::get('message') : null ?></p>
                                </div> -->
                            <?php endif ?>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </nav>


<?php 
    view(MENU_USER_VIEW);
    view(MENU_SURAT_VIEW);
    // view(ABOUT_VIEW); 
?>