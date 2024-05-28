<?php

    view(HEAD);
    view(NAV);

?>


<!-- modal -->
<div id="user-logout" class="hidden; bg-transparent z-1 overflow-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white shadow-xl transition-all w-full max-w-xl">
                    <!-- header -->
                    <div class="py-3">
                        <h1 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Logout</h1>
                        <p class="text-sm text-gray-500"></p>
                    </div>
                    <form id="form-logout" action="/user/logout" method="POST">
                        <!-- content -->
                        <div class="bg-gray-300 p-10 sm:p-10 sm:pb-4;">
                            <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-red-100 
                            sm:mx-0; sm:h-20 sm:w-20">
                                <img src="<?= image(LOGO_POLRI) ?>">
                            </div>
                            <!-- <h1>Logout ?</h1> -->
                        </div>

                        <!-- button OK -->

                        <div class="bg-gray-50 px-4 py-3 justify-center space-x-10">
                            <input type="submit" name="button" value="Yes"
                                class="inline-flex w-full max-w-xl justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold 
                                    text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer">
                            <input type="submit" name="button" value="No" 
                                class="inline-flex w-full max-w-xl justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold 
                                    text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto cursor-pointer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>