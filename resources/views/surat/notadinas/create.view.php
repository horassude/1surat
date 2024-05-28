<?php
view('/partial/head.php');
view('/partial/nav.php');

?>

<div class="sm:px-6; lg:px-10; mt-8 px-8; bg-rose-200; w-screen; h-screen relative justify-center">
    <!-- container -->
    <div class="mx-auto bg-stone-300; max-w-4xl flexible; rounded-xl py-3 px-10 border border-gray-900">
        <form class="flex-cols-2 sm:col-span-3" method="POST" action="/surat/notadinas/save">
            <div class="space-y-12; flex-row">
                <div class="border-b border-purple-900 pb-3">
                    <h2 class="text-xl font-semibold leading-7 text-gray-900 flex justify-center border-b border-purple-900 pb-3">NOTA DINAS</h2>
                    <div class="mt-5 grid grid-cols-1 gap-x-6 gap-y-3 sm:grid-cols-9">

                        <!-- tujuan surat -->
                        <div class="sm:col-span-3">
                            <label for="tujuan" class="block text-sm font-medium leading-6 text-gray-900">Tujuan</label>
                            <div class="mt-2">
                                <?php
                                    $satker = Database::db()->get($params = [
                                        'column' => ['*'],
                                        'table' => 'satker',
                                        'condition' => NULL,
                                        'sort' => ['nama_satker', 'ASC']
                                    ]);
                                ?>

                                <select id="tujuan" name="tujuan" autocomplete="tujuan-name" required class="block w-full h-10 rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <!-- <option> </option> -->
                                    <?php foreach ($satker->results() as $result => $value) : ?>
                                        <?php if ($_POST['tujuan']) : ?>
                                            <option value="<?= $value['nama_satker'] ?>" <?= $_POST['tujuan'] === $value["nama_satker"] ? 'selected' : '' ?>><?= $value["nama_satker"] ?></option>
                                        <?php else : ?>
                                            <option value="<?= $value['nama_satker'] ?>"><?= $value["nama_satker"] ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <!-- tanggal surat -->
                        <div class="sm:col-span-3">
                            <label for="tgl_surat" class="block text-sm font-medium leading-6 text-gray-900">Tanggal</label>
                            <div class="mt-2">
                                <input type="date" name="tgl_surat" id="tgl_surat" autocomplete="tanggalsurat" value="<?= $_POST['tgl_surat'] ?? null ?>" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <!-- user -->
                        <div class="sm:col-span-3">
                            <label for="user" class="block text-sm font-medium leading-6 text-gray-900">Konseptor</label>
                            <div class="mt-2">
                                <input type="text" name="user" id="user" autocomplete="user" readonly value="<?= Session::get('user', 'username') ?>" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <!-- perihal -->
                        <div class="col-span-full">
                            <label for="perihal" class="block text-sm font-medium leading-6 text-gray-900">Perihal</label>
                            <div class="mt-2">
                                <input type="text" name="perihal" id="perihal" autocomplete="perihal" required value="<?= $_POST['perihal'] ?? null ?>" class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

                                <!-- <textarea id="perihal" name="perihal" rows="3" value="perihal here" required class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea> -->
                            </div>
                            <!-- <p class="mt-3 text-sm leading-6 text-gray-600">Write a few sentences about yourself.</p> -->
                        </div>

                        <!-- preview area -->
                        <div class="col-span-full">
                            <div class="mt-2 flex h-80 justify-center rounded-lg border border-dashed border-gray-900/25 flex-row items-center;">
                                <embed class="hover:hidden" id="preview_pdf" src="data:application/pdf;base64, <?= base64_encode($surat_pdf) ?>" type='application/pdf' width="100%" height="100%" title="" />

                                <!-- <?php if ($_POST['surat_pdf']) : ?>
                                    <embed class="hover:hidden;" id="preview_pdf" src="data:application/pdf;base64, <?= base64_encode(file_get_contents(pdfSrc($_POST['surat_pdf']))) ?>" type='application/pdf' width="100%" height="100%" title="" />
                                <?php else : ?>
                                    <embed class="hover:hidden" id="preview_pdf" src="data:application/pdf;base64, <?= base64_encode($surat_pdf) ?>" type='application/pdf' width="100%" height="100%" title="" />
                                <?php endif ?> -->
                            </div>
                        </div>

                        <!-- upload surat nota dinas -->
                        <div class="col-span-full">
                            <div class="mt-2 flex items-center gap-x-3">
                                <input hidden required type="file" name="surat_pdf" id="pdf_input" accept="pdf/*">
                                <button type="button" onclick="getPdf('pdf_input', 'preview_pdf')" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Upload Surat</button>
                            </div>
                        </div>




                    </div>
                </div>

                <!-- tembusan -->
                <div class="border-b border-purple-900 pb-3">
                    <div class="mt-3 space-y-5;">
                        <fieldset>
                            <legend class="text-sm font-semibold leading-6 text-gray-900">Tembusan</legend>
                            <div class="mt-5; grid grid-cols-1 gap-x-6; gap-y-3 sm:grid-cols-12">
                                <div class="sm:col-span-3">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="kapolda" name="kapolda" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="kapolda" class="font-medium text-gray-900">Kapolda Kepri</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="wakapolda" name="wakapolda" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="wakapolda" class="font-medium text-gray-900">Wakapolda Kepri</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="irwasda" name="irwasda" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="irwasda" class="font-medium text-gray-900">Irwasda Polda Kepri</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="karoops" name="karoops" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="karoops" class="font-medium text-gray-900">Karoops</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="karorena" name="karorena" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="karorena" class="font-medium text-gray-900">Karorena</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="kabidpropam" name="kabidpropam" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="kabidpropam" class="font-medium text-gray-900">Kabidpropam</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="dirreskrimum" name="dirreskrimum" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="dirreskrimum" class="font-medium text-gray-900">Dirreskrimum</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="dirreskrimsus" name="dirreskrimsus" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="dirreskrimsus" class="font-medium text-gray-900">Dirreskrimsus</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="dirresnarkoba" name="dirresnarkoba" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="dirresnarkoba" class="font-medium text-gray-900">Dirresnarkoba</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="sm:col-span-3">
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="dirreskrimum" name="dirreskrimum" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="dirreskrimum" class="font-medium text-gray-900">Dirreskrimum</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="dirreskrimsus" name="dirreskrimsus" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="dirreskrimsus" class="font-medium text-gray-900">Dirreskrimsus</label>
                                        </div>
                                    </div>
                                    <div class="relative flex gap-x-3">
                                        <div class="flex h-6 items-center">
                                            <input id="dirresnarkoba" name="dirresnarkoba" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                        </div>
                                        <div class="text-sm leading-6">
                                            <label for="dirresnarkoba" class="font-medium text-gray-900">Dirresnarkoba</label>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </fieldset>

                    </div>
                </div>
            </div>

            <div class="mt-3 flex items-center justify-end gap-x-6">
                <!-- <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button> -->
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900"><a href="/surat/notadinas">Cancel</a></button>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajukan ke Kabid</button>
            </div>
        </form>
    </div>

</div>


<script src="http://myapp.com/js/script.js"></script>