<?php

    use Core\Session;
    use Core\Input;

    view(HEAD);
    view(NAV);
    
?>


<main class="overflow-auto relative h-full w-full">
    <div id="register-create" class="mx-auto max-w-5xl sm:px-1 lg:px-1 mt-1 bg-rose-200; flex justify-center">
        <!-- container create register surat-->
        <div class="isolate w-screen h-screen">

            <!-- isolate attribute -->
            <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
                <div class="aspect-[1155/678]"></div>
            </div>

            <!-- title register surat masuk -->
            <div class="py-3 sm:px-6 lg:px-8 bg-stone-600 rounded-t-lg flex justify-center">
                <h1 class="font-medium semi-bold text-white">REGISTRASI SURAT MASUK</h1>
            </div>

            <div class="w-screen; h-screen">
                <!-- form -->
                <form id="form-register-create" class="bg-slate-300 p-5 border-2 border-gray-500 rounded-b-md" method="POST" enctype="multipart/form-data">
                    <div class="space-y-5">
                        <!-- <div class="border-b border-gray-900/10"> -->
                        <div class="sm:col-span-; space-y-3">

                            <!-- dropdown menu pengirim -->
                            <?php view(PENGIRIM_VIEW) ?>

                            <!-- perihal -->
                            <div class="sm:col-span-3;">
                                <textarea name="perihal" id="perihal" cols="30" spellcheck="false" rows="3" placeholder="perihal" class="block w-full rounded-md bg-transparent bg-none border-1 py-1.5 text-gray-900 shadow-sm ring-1 
                                p-3 ring-inset ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset 
                                focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['perihal'] ?? '' ?></textarea>
                                <!-- <p id="email-error" name="email-error" class="ml-1 text-rose-600 text-xs"><?= isset($email_error) ? $email_error : null ?></p> -->
                                <p id="perihal-error" class="ml-1 text-rose-600 text-xs"></p>
                            </div>

                            <div class="flex justify-between">
                                <!-- no_surat -->
                                <div>
                                    <label for="no_surat" class="block text-sm font-medium leading-6 text-gray-900">No. Surat</label>
                                    <div class="">
                                        <input type="text" name="no_surat" id="no_surat" value="<?= $_POST['no_surat'] ?? '' ?>" autocomplete="family-name" class="w-96 block rounded-md bg-transparent bg-none border-1 py-1.5 text-gray-900 shadow-sm ring-3 p-3 ring-inset ring-1 ring-gray-600 placeholder:text-gray-400 focus:ring-1 
                                        focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <p id="no-surat-error" class="ml-1 text-rose-600 text-xs"></p>
                                    </div>
                                </div>

                                <!-- jenis surat -->
                                <div>
                                    <label for="jenis_surat" class="block text-sm font-medium leading-6 text-gray-900">Jenis Surat</label>

                                    <select id="jenis-surat" name="jenis_surat" class="block rounded-md bg-transparent bg-none border-1 py-1.5 
                                            text-gray-900 shadow-sm ring-3 p-3 ring-inset ring-1 ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                        <?php foreach ($jenis_surat as $result => $value) : ?>
                                            <option value="<?= $value['jenis_surat'] ?>"><?= $value["jenis_surat_display"] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>

                                            
                                <!-- tanggal surat -->
                                <div>
                                    <label for="tgl-surat" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Surat</label>
                                    <div class="flex w-80;">
                                        <input id="tanggal-surat" readonly type="text" value="<?= isset($_POST['tgl_surat']) ? dateFormatID($_POST['tgl_surat']) : null ?>" class="block rounded-md bg-transparent bg-none border-1 pl-5 py-1.5 text-gray-900 shadow-sm ring-3 p-3 ring-inset ring-1 ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                        >
                                        <input id="pickup-tanggal-surat" name="tgl_surat" type="date" class="absolute ml-40 mt-1 w-5 bg-transparent"
                                        >
                                    </div>
                                    <p id="tanggal-surat-error" class="ml-1 text-rose-600 text-xs"></p>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->

                        <div class=" pb-3; bg-bl flex gap-x-10 justify-between">

                            <!-- penerima -->
                            <div class="sm:col-span-2 w-96;">
                                <label for="penerima" class="block text-sm font-medium leading-6 text-gray-900">Surat diterima oleh</label>
                                <div>
                                    <input id="penerima" name="penerima" readonly type="text" value="<?= Session::exists('user') ? Session::get('user')['username'] : '' ?>" class="block w-96 rounded-md bg-transparent bg-none border-none py-1.5 text-gray-900 shadow-sm p-3 ring-inset ring-1 ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <!-- value="<?= isset($_POST ['tgl_diterima']) ? dateFormatID($_POST ['tgl_diterima']) : null ?>" -->
                                       
                                       
                            <!-- tanggal diterima -->
                            <div class="w-80;">
                                <label for="tgl-surat" class="block text-sm font-medium leading-6 text-gray-900">Tanggal diterima</label>
                                <div class="flex w-96;">
                                    <input id="tanggal-diterima" readonly type="text" value="" 
                                    class="block w-76 rounded-md bg-transparent bg-none border-1 pl-5 py-1.5 text-gray-900 shadow-sm ring-3 p-3 ring-inset ring-1 ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    >
                                    <input id="pickup-tanggal-diterima" name="tgl_diterima" type="datetime-local" class="absolute ml-40 mt-1 w-5 bg-transparent"
                                    >
                                </div>
                                <p id="tanggal-diterima-error" class="ml-1 text-rose-600 text-xs"></p>
                            </div>
                        </div>

                        <!-- preview pdf -->
                        <div class="flex-cols items-center space-y-1 border-blue-900 border-1 h-80 bg-blue-100 rounded-md"> <embed id="preview-pdf" 
                            type='application/pdf' width="100%" height="100%" />
                            <p id="pdf-error" class="ml-1 text-rose-600 text-xs"></p>
                        </div>

                        <!-- button input pdf file -->
                        <div class="flex flex-rows justify-between">
                            <input hidden type="file" id="pdf-input" name="surat_pdf" accept="pdf/*" onchange;="getPdf('pdf-input', 'preview-pdf')" accept=".pdf,.doc,.docx,application/msword">
                            <button type="button" id="button-pdf" class="bg-blue-200 px-2.5 py-1.5 
                                text-sm font-semibold text-gray-900 mt-2 shadow-sm hover:bg-blue-300 rounded-md ring-gray-600">
                                Upload PDF
                            </button>
                        </div>

                    </div>

                    <!-- button save cancel -->
                    <div class="mt-5; flex items-center justify-end gap-x-6">
                        <button type="button" id="button-cancel" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold  shadow-sm hover:bg-indigo-500 focus-visible:outline 
                            focus-visible:outline-2 leading-6 text-gray-900">
                            <a href="/register" class="text-white">
                                Cancel
                            </a>
                        </button>
                        <button id="button-save" disabled type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 
                            focus-visible:outline focus-visible:outline-2 opacity-50 focus-visible:outline-offset-2 opacity-5 focus-visible:outline-indigo-600">
                            Save
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</main>