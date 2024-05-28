<?php
    use Core\Database; 
?>

<!-- modal -->
<div id="contact" class="bg-transparent z-1 overflow-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    
    <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-center shadow-xl transition-all sm:my-8 sm:w-full 
                    sm:max-w-lg">
                    <!-- header -->
                    <div class="py-3">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">CONTACT US</h3>
                        <p class="text-sm text-gray-500">Together we are strong.</p>
                    </div>

                    <!-- content -->
                    <div class="bg-gray-300 px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start gap-x-5">
                            <div class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-20 
                                sm:w-20">
                                <img src="<?= imgSrc('logo/humas_polri.png') ?>">
                            </div>

                            <div class="mt-3; text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <div class="mt-2">
                                    <?php foreach (Database::db()->query("SELECT * FROM satker")->results() as $key => $satker) : ?>
                                        <p class="text-sm text-gray-500"><?= $satker['nama_satker'] ?></p>
                                    <? endforeach ?>
                                </div>
                            </div>
                            <div class="mt-3; text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <div class="mt-2">
                                    <?php foreach (Database::db()->query("SELECT * FROM user")->results() as $key => $user) : ?>
                                        <p class="text-sm text-gray-500"><?= $user['email'] ?></p>
                                    <? endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- button OK -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <!-- <button type="button" 
                            class="hidden inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold 
                                text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">
                            Deactivate
                        </button> -->
                        <button id="btnContactOK" type="button" onclick="hide_contact()"
                            class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 
                                shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">
                            OK
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php view('partial/footer.php'); ?>