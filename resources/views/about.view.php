<?php
    
    use Core\Database;
    use Core\User;

    view(HEAD);
    view(NAV);

?>


<div id="about" class="hidden; bg-transparent z-1 overflow-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-center shadow-xl transition-all sm:my-8 sm:w-full 
                    sm:max-w-3xl">
                    <!-- header -->
                    <div class="py-3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">About Us</h3>
                        <p class="text-sm text-gray-500">Together we are strong.</p>
                    </div>

                    <!-- content -->
                    <div class="bg-gray-300 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start gap-x-10">
                            <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-18 
                                sm:w-20">
                                <img src="<?= image(LOGO_POLRI) ?>">
                            </div>
                           
                            <ul role="list" class="divide-y divide-gray-100">

                                <?php foreach(Database::query("SELECT * FROM " . USER_TABLE)->results() as $key_user => $user) : ?>

                                    <li class="flex justify-between gap-x-20 py-3">
                                        <div class="flex min-w-0 gap-x-4">
                                            <img id="previewImage" alt="Preview Image" class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                                src="data:image/jpeg;base64,<?= base64_encode($user['foto'])?>"
                                            >
                                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-start w-40 bg-rose-200;">
                                                <p class="text-sm font-semibold leading-6 text-gray-900"><?= $user['first_name'] ?></p>
                                                <p class="truncate text-xs leading-5 text-gray-500"><?= $user['email'] ?></p>
                                            </div>
                                        </div>

                                        <?php  
                                            $user_online = User::isOnline($user['id']) 
                                        ?>
                                           
                                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end w-40 bg-rose-200;">
                                            <?php if($user_online) : ?>
                                                <p class="text-sm leading-6 text-gray-900"><?= $user['level'] ?></p>
                                                <div class="mt-1 flex items-center gap-x-1.5">
                                                    <div class="flex-none rounded-full bg-emerald-500/20 p-1">
                                                        <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                                                    </div>
                                                    <p class="text-xs leading-5 text-gray-500">Online</p>
                                                </div>
                                            <?php else : ?>
                                                <p class="text-sm leading-6 text-gray-900"><?= $user['level'] ?></p>
                                                <p class="mt-1 text-xs leading-5 text-gray-500">Offline <time datetime="2023-01-23T13:23Z"><?= $user_online?></time></p>
                                            <?php endif ?>
                                        </div>
                                    </li>
                                <?php endforeach ?>
                              
                            </ul>

                        </div>
                    </div>

                    <!-- button OK -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button id="btn-ok" type="button"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 
                            shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            <a href="/">OK</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>