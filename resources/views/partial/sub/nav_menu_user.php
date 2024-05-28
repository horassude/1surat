<?php
    use Core\Session;
?>

<div id="menu-user" class="hidden bg-transparent fixed left-0 top-0 w-full h-full z-1 overflow-auto">
    <div class="absolute left-3/4 ml-0 z-10 mt-16 flex -translate-x-1/2 px-4">
        <div class="w-screen max-w-xs flex-auto overflow-hidden rounded-xl bg-blue-200 text-sm leading-6; shadow-lg ring-1 ring-gray-900/5">
            <div class="p-4">
                
                <!-- login -->
                <div class="group relative flex gap-x-6 rounded-lg p-1 hover:bg-gray-50">
                    <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img src="<?= image(ICON_LOGIN) ?>" alt="">
                    </div>
                    <div>
                        <a href="<?= !Session::exists('user') ? '/user/login' : '#' ?>" class="font-semibold text-gray-900">
                            Login
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-gray-600">You login first to acces more</p>
                    </div>
                </div>

                 <!-- seting -->
                <div class="group relative flex gap-x-6 rounded-lg p-1 hover:bg-gray-50">
                    <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img src="<?= image(ICON_SETTING) ?>" alt="">
                    </div>
                    <div>
                        <a href="<?= Session::exists('user') ? '/user/update' : '#' ?>" class="font-semibold text-gray-900">
                            Setting
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-gray-600">Complete your profile here</p>
                    </div>
                </div>

                 <!-- signup -->
                <div class="group relative flex gap-x-6 rounded-lg p-1 hover:bg-gray-50">
                    <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img src="<?= image(ICON_SIGNUP) ?>" alt="">
                    </div>
                    <div>
                        <button>
                            <a href="<?= !Session::exists('user') ? '/user/signup' : '#' ?>" class="font-semibold text-gray-900">
                                Signup
                                <span class="absolute inset-0"></span>
                            </a>
                        </button>
                        <p class="mt-1 text-gray-600">If you have not account, register please</p>
                    </div>
                </div>

                 <!-- logout -->
                <div class="group relative flex gap-x-6 rounded-lg p-1 hover:bg-gray-50">
                    <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                        <img src="<?= image(ICON_LOGOUT) ?>" alt="">
                    </div>
                    <div>
                        <a href="<?= Session::exists('user') ? '/user/logout' : '#' ?>" class="font-semibold text-gray-900">
                            Logout
                            <span class="absolute inset-0"></span>
                        </a>
                        <p class="mt-1 text-gray-600">Logout from applications</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>