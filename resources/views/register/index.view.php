<?php

    use Core\Session;
    use Core\Database;

    view(HEAD);
    view(NAV);

    if(Session::get('user')['level'] === 'operator') {
        $surat_masuk = Database::query("SELECT * FROM surat_masuk WHERE penerima = ? ORDER BY tgl_diterima DESC", [Session::get('user')['username']]);
    } else {
        $surat_masuk = Database::query("SELECT * FROM surat_masuk ORDER BY tgl_diterima DESC");
    }

?>


<main>
    <div id="register-view" class="mx-auto max-w-8xl sm:px-1 lg:px-1 mt-1 bg-rose-200; flex justify-center">

        <!-- container surat masuk -->
        <div class="isolate bg-rose-200; w-screen h-screen pb-4">

            <!-- isolate attribute -->
            <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
                <div class="aspect-[1155/678]"></div>
            </div>

            <!-- sub menu -->
            <div class="flex flex-row p-2 px-5 items-center gap-x-10 justify-between bg-gray-400 rounded-t-lg">
                <div class="flex flex-row gap-x-5">
                    <div>
                        <a class="text-gray-900 hover:text-white" href="/">Back..</a>
                    </div>
                    <div>
                        <!-- new register -->
                        <!-- <a class="text-gray-900 hover:text-white" href="/register/create">New</a> -->
                        <button class="text-gray-900 hover:text-white" type="button"><a href="/register/create">New</a></button>
                    </div>
                </div>
                <div>
                    <h1 class="text-base font-bold">REGISTRASI SURAT MASUK</h1>
                </div>
                <div>
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        </div>
                        <input type="search" name="search" id="search" class="form-input block w-96 rounded-md border-0 py-1.5 pl-3 pr-2 text-gray-900 
                                ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm 
                                sm:leading-6" placeholder="Search here">
                    </div>
                </div>
            </div>

            <!-- scroll -->
            <div class="h-5/6 overflow-auto border-2 border-gray-500 rounded-b-lg items-center">

               

                <ul role="list" class="divide-y divide-gray-400">

                    <?php if($surat_masuk->count()) : ?>
                       
                        <?php foreach ($surat_masuk->results() as $key => $surat) : ?>
                            <li id="li">
                              
                                <form id="form-register-view" action="/register/update" method="POST" class="flex justify-start gap-x-7 px-3 bg-blue-100 hover:bg-blue-200; py-2 h-40;" enctype="multipart/form-data">

                                    <!-- button update - delete -->
                                    <div class="hover:bg-stone-200; bg-rose-200; h-11; rounded-md; shrink-0 mt-6 sm:flex sm:flex-col gap-y-5">

                                        <button id="button-update" type="submit" style="opacity: 0.3;" disabled id="button-update"><img name="img-update" class="rounded-sm w-5 h-5" src="<?= image(ICON_SAVE) ?>"/>
                                        </button>

                                        <button type="button">
                                        <a id="link-delete" href="/register/delete?id=<?= $surat['id'] ?>"><img name="img-delete" class="rounded-sm w-5 h-5 opacity-30 hover:opacity-90" src="<?= image(ICON_DELETE) ?>" /></a>
                                        </button>

                                    </div>

                                    <?php $satker = Database::query("SELECT * FROM satker ORDER BY level ASC")->results() ?>
                                    
                                    <div class="hidden shrink-0 sm:flex sm:flex-col w-60">
                                        <input hidden type="text" name="id" value="<?=$surat['id']?>">
                                        
                                        <!-- pengirim -->
                                        <select id="pengirim" name="pengirim" autocomplete="tujuan-name" required class="myInput block border-none 
                                            bg-transparent rounded-md border-0 px-1 py-1.5 text-gray-900 shadow-sm ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600; sm:max-w-xs font-semibold text-base font-semibold sm:leading-6 space-y-2">
                                                
                                            <?php foreach ($satker as $result => $value) : ?>
                                                <?php if ($surat['pengirim']) : ?>
                                                    <option class="text-base text-gray-700" value="<?= $value['pejabat'] ?>" <?= $surat['pengirim'] === $value["pejabat"] ? 'selected' : '' ?>><?= $value["pejabat"] ?>
                                                    </option>
                                                <?php else : ?>
                                                    <option class="text-gray-700" value="<?= $value['pejabat'] ?>">
                                                        <?= $value["pejabat"] ?>
                                                    </option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>

                                        <!-- nomor surat -->
                                        <input id="nomor-surat" type="text" spellcheck="false" name="no_surat" class="px-2 border-none rounded-md py-1 text-sm text-black-900 bg-transparent" value="<?= $surat['no_surat'] ?>"
                                        >

                                        <!-- tanggal surat -->
                                        <div class="flex justify-between">
                                            <input id="tanggal-surat" readonly type="text" 
                                                class="block w-60; rounded-md bg-transparent bg-none border-1 text-sm pl-2 text-gray-900 shadow-sm ring-inset ring-gray-600
                                                 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600" value="<?= dateFormatID ($surat['tgl_surat']) ?>"
                                               
                                            >
                                            <input id="pickup-tanggal-surat" name="tgl_surat" type="date" class="block w-5 bg-transparent" value="<?= $surat['tgl_surat'] ?>"
                                            >
                                        </div>
                                    </div>

                                    <!-- button preview & change pdf -->
                                    <div class="items-center justify-center w-12 bg-rose-200; space-y-3 flex-col shrink-0 sm:flex sm:flex-col">
                                        
                                        <!-- button preview pdf  -->
                                        <button id="button-preview" type="button" class="hover:bg-blue-300 py-1 rounded-md">
                                            <a href="/preview?id=<?= $surat['id'] . '&table=surat_masuk' ?>" target="_blank" class="w-20">
                                                <img src="<?= image(ICON_PDF) ?>" class="w-8 h-8 rounded-md">
                                            </a>
                                        </button>

                                        <input id="input-pdf" hidden type="file" name="input-pdf" id="input-pdf" accept=".pdf,.doc,.docx,
                                            application/msword"
                                        >

                                        <!-- button upload pdf -->
                                        <button type="button" id="button-get-pdf" 
                                            class="hover:bg-blue-300 p-1 rounded-md">
                                            <img src="<?= image(ICON_OPEN) ?>" class="w-5 h-5">
                                        </button>
                                    </div>


                                    <!-- perihal -->
                                    <div class="hidden shrink-0 sm:flex sm:flex-col w-1/4 wrap-text">
                                        <textarea name="perihal" id="perihal" cols="30" rows="3" spellcheck="false" placeholder="perihal" class="w-full px-1.5 text-sm placeholder:text-gray-500 border-1 py-1.5 rounded-md border-none bg-transparent"><?= $surat['perihal'] ?></textarea>
                                    </div>

                                    <div class="hidden shrink-0 sm:flex sm:flex-col w-60">
                                        <!-- no registrasi -->
                                        <input id="nomor-registrasi" type="text" readonly class="wrap-text py-1 px-2 border-none rounded-md text-sm text-gray-900 bg-transparent" value="<?= $surat['no_registrasi'] ?>">
                                             
                                        <!-- penerima -->
                                        <input id="penerima" type="text" readonly class="wrap-text py-1 px-2 border-none rounded-md text-sm text-gray-900 bg-transparent" value="<?= $surat['penerima'] ?>">
                                            
                                        <!-- tanggal surat diterima -->
                                        <div class="flex">
                                            <input id="tgl_diterima" readonly type="text" class="block; w-60 rounded-md; bg-transparent bg-none border-1; text-sm pl-2 text-gray-900 shadow-sm ring-inset; ring-gray-600; placeholder:text-gray-400 focus:ring-1; focus:ring-inset; focus:ring-indigo-600;" value="<?= date_time_Format_ID($surat['tgl_diterima']) ?>">
                                               
                                            <input id="pickup-tanggal-diterima" name="tgl_diterima" type="datetime-local" class="w-5 bg-transparent" value="<?= $surat['tgl_diterima'] ?>">
                                        </div>
                                    </div>

                                    <?php
                                    if (isset($surat['disposisi_kepada'])) {
                                        $parse = explode('-', $surat['disposisi_kepada']);
                                        unset($parse[0]);

                                        $x = 1;
                                        $disp = '';
                                        foreach ($parse as $surats) {
                                            $disp .= $x . '. ' . $surats . ' ';
                                            $x++;
                                        }
                                    } else {
                                        $disp = 'belum disposisi';
                                    }
                                    ?>

                                    <!-- disposisi -->
                                    <div class="hidden shrink-0 sm:flex sm:flex-col w-1/4 bg-rose-200;">
                                        <p class="text-sm font-semibold leading-6 text-gray-900"><?= $disp ?></p>
                                        <p class="italic text-sm leading-6 text-gray-900"><?= isset($surat['isi_disposisi']) ? $surat['isi_disposisi'] : '' ?></p>
                                        <p class="mt-1 text-xs leading-5 text-gray-500"><?= $surat['tgl_disposisi'] ? 'Disposisi tanggal : ' . date_time_Format_ID($surat['tgl_disposisi']) : '' ?> </p>
                                    </div>
                                </form>
                                <!-- <?php $x++ ?> -->
                            </li>
                        <?php endforeach ?>
                    <?php else : ?>
                        <p class="p-10">No data</p>
                    <?php endif ?>
                </ul>
            </div>
        </div>
        <!-- end of container surat masuk -->

    </div>

</main>

<?php view(CONFIRM_VIEW) ?>

<?php view(FOOTER); ?>