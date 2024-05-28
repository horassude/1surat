<?php

view('/partial/head.php');
view('/partial/nav.php');

$nota_dinas = Database::db()->get($params = [
                'column' => ['*'],
                'table' => 'nota_dinas',
                'condition' => null,
                'sort' => ['tgl_surat', 'DESC']
            ])->results();

?>


<div class="mx-auto sm:px-1 lg:px-10; mt-1 bg-rose-200; flex justify-center relative h-screen">

    <!-- container surat masuk -->
    <div class="isolate mx-auto max-w-8xl bg-blue-200; w-full h-screen">
        <!-- isolate attribute -->
        <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
            <div class="aspect-[1155/678]"></div>
        </div>

        <!-- sub menu -->
        <div class="flex flex-row p-2 px-5 items-center gap-x-10 justify-between bg-gray-400 rounded-t-lg">
            <div class="flex flex-row gap-x-5">
                <div class="">
                    <a class="text-gray-900 hover:text-white" href="/">Back..</a>
                </div>
                <div>
                    <a class="text-gray-900 hover:text-white" href="/surat/notadinas/create">New</a>
                </div>
            </div>
            <div>
                <h1 class="text-base font-bold">NOTA DINAS</h1>
            </div>
            <div class="relative rounded-md shadow-sm">
                <input type="search" name="search" id="search" class="form-input block w-96 rounded-md border-0 py-1.5 pl-3 pr-2 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Search here">
            </div>
        </div>

        <!-- scroll -->
        <div class="h-5/6 w-full overflow-auto border-2 border-gray-500 rounded-b-lg items-center z-0">
            <?php if ($nota_dinas) : ?>
                <ul role="list" class="divide-y divide-gray-400">
                    <?php $x = 0 ?>
                    <?php foreach ($nota_dinas as $items => $item) : ?>
                        <li class="flex justify-start gap-x-5 px-3 py-3 bg-blue-100 hover:bg-blue-200">
                            <form action="/surat/notadinas/update" method="post" class="flex gap-x-5 h-17 h-96; w-full">

                                <!-- button save -->
                                <div class="hidden; shrink-0 flex-row items-center w-10 space-y-3; mt-3">
                                    <button type="submit" class="pl-1"><img src="<?= imgSrc('icon/save-file-32.png') ?>" class="w-6 h-6"></button>
                                </div>

                                <!-- tujuan -->
                                <div class="flex-col w-40">
                                    <?php  $satker = Database::db()->get($params = [
                                                        'column' => ['*'],
                                                        'table' => 'satker',
                                                        'condition' => null,
                                                        'sort' => ['nama_satker', 'ASC']
                                                    ])->results(); 
                                    ?>
                                   
                                    <select id="tujuanSelect" name="tujuan" autocomplete="tujuan-name" required class="block border-none font-semibold bg-transparent w-36 rounded-md border-0 py-1.5; px-2 text-gray-900 shadow-sm ring-1; ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                        <?php foreach ($satker as $result => $value) : ?>
                                            <?php if ($item['tujuan']) : ?>
                                                <option value="<?= $value['nama_satker'] ?>" <?= $item['tujuan'] === $value["nama_satker"] ? 'selected' : '' ?>><?= $value["nama_satker"] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $value['nama_satker'] ?>"><?= $value["nama_satker"] ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
                                    <!-- <a href="#"><img src="<?= imgSrc('icon/menu-vertical-32.png') ?>" class="w-5 h-5"></a> -->
                                </div>

                                <!-- no & tanggal surat -->
                                <div class="hidden shrink-0 sm:flex sm:flex-col max-w-sm; w-72">
                                    <input type="text" hidden name="id" value="<?= $item['id'] ?>">
                                    <input type="text" spellcheck="false" name="perihal" class="text-wrap mt-1; px-2 border-none rounded-md truncate text-sm leading-6 text-gray-900 bg-transparent" value="<?= $item['nomor_nota_dinas'] ?>">
                                    <input type="date" name="tgl_surat" class="mt-1 truncate; border-none rounded-md px-2 w-32 text-sm leading-6 text-gray-900 bg-transparent" value="<?= $item['tgl_surat'] ?>">
                                </div>

                                <!-- perihal -->
                                <div class="hidden shrink-0 sm:flex sm:flex-col w-1/3 bg-rose-100;">
                                    <!-- <input type="text" class="text-sm leading-6 text-gray-900" value="<?= $item['perihal'] ?>"> -->
                                    <textarea name="perihal" spellcheck="false" cols="30" class="text-sm rounded-md border-none bg-transparent px-2 leading-6 text-gray-900" rows="3"><?= $item['perihal'] ?></textarea>
                                </div>

                                <?php
                                if (isset($item['tembusan'])) {
                                    $parse = explode('-', $item['tembusan']);
                                    unset($parse[0]);

                                    $x = 1;
                                    $_tembusan = '';
                                    foreach ($parse as $items) {
                                        $_tembusan .= $x . '. ' . $items . ' ';
                                        $x++;
                                    }
                                } else {
                                    $_tembusan = '-';
                                }
                                ?>

                                <!-- tembusan -->
                                <!-- <div class="hidden shrink-0 sm:flex sm:flex-col w-72 wrap-text">
                                    <textarea name="tembusan" class="text-sm rounded-md border-none h-full pt-0 px-2 leading-6; bg-transparent text-gray-900" cols="30" rows="3"><?= 'Tembusan: ' . $_tembusan ?></textarea>
                                </div> -->

                                <!-- approve -->
                                <div class="hidden shrink-0 sm:flex sm:flex-col w-78; wrap-text">
                                    <fieldset>
                                        <div class="grid grid-cols-1sm:grid-cols-1">
                                            <div class="relative flex gap-x-5 sm:grid-cols-2">
                                                <div class="text-sm leading-6 w-3/4">
                                                    <label class="text-sm text-gray-900">Konseptor</label>
                                                </div>
                                                <div class="flex h-6; items-center">
                                                    <input checked disabled type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-5">
                                                <div class="text-sm leading-6 w-3/4">
                                                    <label class="text-sm text-gray-900">Kasubbagrenmin</label>
                                                </div>
                                                <div class="flex h-6; items-center">
                                                    <input disabled type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-5">
                                                <div class="text-sm leading-6 w-3/4">
                                                    <label class="text-sm text-gray-900">Kasubbidpenmas</label>
                                                </div>
                                                <div class="flex h-6; items-center">
                                                    <input type="checkbox" disabled class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                            </div>
                                            <div class="relative flex gap-x-5">
                                                <div class="text-sm leading-6 w-3/4">
                                                    <label class="text-sm text-gray-900">Kabidhumas</label>
                                                </div>
                                                <div class="flex h-6; items-center">
                                                    <input type="checkbox" disabled class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <!-- surat pdf -->
                                <div class="hidden shrink-0 sm:flex sm:flex-row w-80 flex-col justify-center">
                                    <div class="px-5 w-96 flex-col">
                                        <!-- <button type="button" onclick="getPdf('pdf_input', 'pdfViewer')" class="rounded-md absolute bg-white z-20 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button> -->
                                        <input type="file" name="surat_pdf" value="filepdf" id="pdf_input" accept="pdf/*" class="">
                                        <a href="/surat/notadinas/preview?id=<?= $item['id'] ?>" target="_blank"><img src="<?= imgSrc('icon/icon-pdf.png') ?>" class="mt-3 w-7 h-7 pl-1"></a>
                                    </div>
                                    <!-- <embed class="rounded-t-md" id="pdfViewer" src="data:application/pdf;base64, <?= isset($_POST['surat_pdf']) ? base64_encode($_POST['surat_pdf']) : base64_encode($item['surat_pdf']) ?>" type='application/pdf' width="100%" height="100%" title="" /> -->
                                </div>
                            </form>
                        </li>
                        <?php $x++ ?>
                    <?php endforeach ?>
                </ul>
            <?php else : ?>
                <p class="p-10">No data</p>
            <?php endif ?>
        </div>
    </div>
    <!-- end of container surat masuk -->
</div>

<!-- area pdf -->
<div id="pdfArea" class="hidden ml-16 w-3/4 h-fit pt-5 px-5 fixed top-20 left-1/2 -translate-x-1/2 border-2; border-lime-700; bg-rose-300 rounded-xl">
    <!-- preview area -->

    <embed class="hover:hidden; h-96 bg-rose-300" id="preview_pdf" src="data:application/pdf;base64, <?= base64_encode($item['surat_pdf']) ?>" type='application/pdf' width="100%" height="100%" title="" />

    <!-- <?php if ($item['surat_pdf']) : ?>
        <embed class="hover:hidden; h-96" id="preview_pdf" src="data:application/pdf;base64, <?= base64_encode(file_get_contents(pdfSrc($item['surat_pdf']))) ?>" type='application/pdf' width="100%" height="100%" title="" />
    <?php else : ?>
        <embed class="hover:hidden; h-96" id="preview_pdf" src="data:application/pdf;base64, <?= base64_encode($surat_pdf) ?>" type='application/pdf' width="100%" height="100%" title="" />
    <?php endif ?> -->

    <!-- button upload surat nota dinas -->
    <div class="h-12">
        <div class="mt-2 flex items-center gap-x-3">
            <input hidden required type="file" name="surat_pdf" id="pdf_input" accept="pdf/*">
            <button type="button" onclick="getPdf('pdf_input', 'preview_pdf')" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Change</button>
        </div>
    </div>
</div>

<script src="http://myapp.com/js/script.js"></script>