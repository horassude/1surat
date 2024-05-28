<?php

    view(HEAD);
    view(NAV);

?>


<div id="disposisi" class="mx-auto max-w-8xl sm:px-1 lg:px-1 mt-1 bg-rose-200; flex justify-center">

    <div class="isolate bg-rose-200; h-screen w-screen ">

        <!-- isolate attribute -->
        <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
            <div class="aspect-[1155/678]"></div>
        </div>

        <!-- menu -->
        <div class="px-4 flex flex-row p-3 items-center gap-x-10 justify-between bg-gray-400 rounded-t-lg">
            <div>
                <a class="text-gray-900 hover:text-blue-700" href="/">Back..</a>
            </div>
            <div>
                <p class="font-bold text-xl text-gray-900">DISPOSISI</p>
            </div>
            <div>
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    </div>
                    <input type="search" name="search" id="search" class="form-input block w-96 rounded-md border-0 py-1.5 pl-3 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search here">
                </div>
            </div>
        </div>
        <!-- end of menu -->

        <!-- scroll -->
        <div class="h-5/6 overflow-auto border-2 border-gray-500 rounded-b-lg items-center">
            <ul role="list" class="divide-y divide-gray-400 ">
                <?php if ($surat_masuk != null) : ?>
                    <?php $i = 0 ?>
                    <?php foreach ($surat_masuk as $ite_ms => $item) :  ?>
                        <li class="flex py-2 bg-blue-100 hover:bg-blue-200">

                            <form id="form-surat-masuk" action;="/disposisi/create" method="POST" class="flex gap-x-5 px-3 h-25">
                                <input hidden type="text" name="surat_masuk_id" value="<?= $item['id'] ?>">

                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-start w-60 bg-rose-200;">
                                    <!-- Pengirim -->
                                    <p class="text-md font-bold leading-5 text-gray-900"><?= $item['pengirim'] ?></p>
                                    <!-- Nomor surat -->
                                    <p class="mt-1 truncate text-sm leading-5 text-gray-900"><?= $item['no_surat']; ?></p>
                                    <!-- Tanggal surat -->
                                    <p class="mt-1 truncate text-sm leading-5 text-gray-900"><?= dateFormatID($item['tgl_surat']) ?></p>
                                </div>

                                <!-- perihal -->
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-start w-96">
                                    <p class="text-sm leading-6 text-gray-900"><?= $item['perihal'] ?></p>
                                </div>

                                <!-- button PDF -->
                                <div class="hidden shrink-0 sm:flex sm:flex-row; opacity-60; hover:opacity-1">
                                    <a class="rounded-md flex justify-center" target="_blank" href="/preview?id=<?= $item['id'] . '&table=surat_masuk' ?>">
                                        <img src="<?= image(ICON_PDF) ?>" class="round-xl w-8 h-8">
                                    </a>
                                </div>

                                <!-- disposisi -->
                                <?php if (isset($item['disposisi_kepada'])) : ?>
                                    <?php
                                    $checklist = explode('-', $item['disposisi_kepada']);
                                    unset($checklist[0]);
                                    $checklist = array_flip($checklist);
                                    ?>

                                    <!-- disposisi kepada -->

                                    <input type="hidden" id="disposisi_kepada" name;="disposisi_kepada">

                                    <div class="hidden shrink-0 sm:flex gap-x-10 flex-col w-96">
                                        <div class="flex w-96">
                                            <textarea name="isi_disposisi" id="isi_disposisi" readonly cols="30" rows="4" placeholder="isi disposisi anda" class="block w-96 rounded-md border-1 px-2 text-gray-900 shadow-sm ring-1 bg-transparent
                                                ring-inset ring-gray-400 placeholder:text-gray-400 focus:ring-1 focus:ring-inset 
                                                focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $item['isi_disposisi'] ?></textarea>
                                        </div>

                                        <div class="flex items-center justify-between bg-blue-200; w-96">
                                            <p class="mt-1 text-xs leading-5 text-gray-900 w-96"><?= 'Disposisi tanggal : ' . date_time_Format_ID($item['tgl_disposisi']) ?>
                                            </p>

                                            <!-- button edit -->
                                            <button type="button" class="p-1">
                                            <a href="/disposisi/create?id=<?= $item['id'] ?>"><img src="<?= image(ICON_MORE) ?>" alt="More information"></a>
                                            </button>
                                           
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <button type="button" class="rounded-md bg-blue-700 px-2.5 py-1.5 text-sm font-semibold text-white  shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-blue-900 h-10">
                                        <a href="/disposisi/create?id=<?= $item['id'] ?>">Create Disposisi</a>
                                    </button>
                                <?php endif ?>
                            </form>

                        </li>
                        <?php $i++ ?>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
        </div>
        <!-- // end of scroll -->
    </div>

</div>