<?php

    use Core\Database;
    use Core\Input;

    view(HEAD);
    view(NAV);

    $disposisi_kepada = $surat_masuk['disposisi_kepada'];
    $isi_disposisi = $surat_masuk['isi_disposisi'];
    $tgl_disposisi = $surat_masuk['tgl_disposisi'];
    
?>


<main>
    <div id="register-create" class="mx-auto max-w-8xl sm:px-1 lg:px-1 mt-4 bg-rose-200; flex justify-center">

        <!-- container disposisi -->
        <div class="mx-auto flex isolate bg-rose-300; border-2 border-stone-500 rounded-md">
            <div class="max-w-3xl w-screen">
                <!-- isolate attribute -->
                <div class="absolute inset-x-0 -z-10 sm:top-[-20rem]" aria-hidden="true">
                    <div class="aspect-[1155/678]"></div>
                </div>

                <!-- header -->
                <div class="py-3 sm:px-6 lg:px-8 bg-gray-400 rounded-tl-lg flex flex-row items-center gap-x-10 justify-center">
                    <h1 class="font-medium semi-bold text-gray-900">DISPOSISI</h1>
                </div>

                <div class="bg-gray-300 py-3 px-5 rounded-bl-md">

                    <div class="space-y-3">
                        <div class="border-b border-gray-900/10 pb-5">
                            <div class="sm:col-span-; space-y-3">
                                <div class="space-y-5">
                                    <!-- pengirim -->
                                    <div class="flex jutify-center">
                                        <p class="text-xl"><?= $surat_masuk['pengirim'] ?></p>
                                    </div>
                                    <input type="text" hidden name="surat_masuk_id" value="<?= $surat_masuk['id'] ?>">

                                    <!-- perihal -->
                                    <div class="sm:col-span-3;">
                                        <textarea cols="30" readonly rows="4" class="block w-full rounded-md border-2 bg-transparent py-1.5 text-gray-900 p-3 border-indigo-300"><?= $surat_masuk['perihal'] ?>
                                        </textarea>
                                    </div>

                                    <!-- no_surat dan tanggal surat -->
                                    <div class="flex flex-col">
                                        <label for="no_surat" class="block text-sm font-medium leading-6 text-gray-900">No. Surat</label>
                                        <div class="mt-">
                                            <input type="text" id="no_surat" value="<?= $surat_masuk['no_surat'] . ' tanggal ' . dateFormatID($surat_masuk['tgl_surat']) ?>" readonly class="block w-full bg-transparent p-3 rounded-md border-2 py-1.5 text-gray-900">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border-b border-gray-900/10 pb-5 bg-bl flex gap-x-10 justify-between">
                            <!-- penerima -->
                            <div class="w-96">
                                <label for="penerima" class="block text-sm font-medium leading-6 text-gray-900">Penerima surat</label>
                                <input id="penerima" readonly value="<?= $surat_masuk['penerima'] ?>" class="block w-full p-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 
                                        placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>

                            <!-- tanggal diterima -->
                            <div>
                                <label for="tgl_diterima" class="block text-sm font-medium leading-6 text-gray-900">Tanggal diterima</label>
                                <div class="flex">
                                    <input id="tgl_diterima" value="<?= date_time_Format_ID($surat_masuk['tgl_diterima']) ?>" readonly type="text" class="block w-full p-3 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset 
                                               ring-gray-300 placeholder:text-gray-400">
                                </div>
                            </div>
                        </div>

                        <!-- DISPOSISI -->
                        <div class="col-span-full border-b border-gray-900/10 pb-5">
                            <form id="form-disposisi" method="POST" action="/disposisi/create">
                                <input hidden type="text" name="disposisi_id" value="<?= $_GET['id'] ?>">
                                <!-- <label for="street-address" class="block text-xl text-center font-medium leading-6 text-gray-900">Kolom Disposisi</label> -->
                                <div class="sm:col-span-2 sm:col-start-1 space-y-3">

                                   
                                    <!-- kepada yth -->
                                    <div class="">
                                        <fieldset>
                                            <legend class="text-sm font-semibold leading-6 text-gray-900">Kepada Yth.</legend>
                                            <div class="mt- space-y-6 flex gap-x-10 items-center">
                                                <div class="flex gap-x-10 mt-2">
                                                    <div class="flex gap-x-3">
                                                        <div class="flex h-6 items-center">
                                                            <input id="kasubbagrenmin" name="Kasubbagrenmin" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                        </div>
                                                        <div class="text-sm leading-6">
                                                            <label for="kasubbagrenmin" class="font-medium text-gray-900">Kasubbagrenmin</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-x-3">
                                                        <div class="flex h-6 items-center">
                                                            <input id="kasubbidpenmas" name="Kasubbidpenmas" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                        </div>
                                                        <div class="text-sm leading-6">
                                                            <label for="kasubbidpenmas" class="font-medium text-gray-900">Kasubbid Penmas</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-x-3">
                                                        <div class="flex h-6 items-center">
                                                            <input id="kasubbidpid" name="Kasubbidpid" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                        </div>
                                                        <div class="text-sm leading-6">
                                                            <label for="kasubbidpid" class="font-medium text-gray-900">Kasubbid PID</label>
                                                        </div>
                                                    </div>
                                                    <div class="flex gap-x-3">
                                                        <div class="flex h-6 items-center">
                                                            <input id="kasubbidmulmed" name="Kasubbidmulmed" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                                        </div>
                                                        <div class="text-sm leading-6">
                                                            <label for="kasubbidmulmed" class="font-medium text-gray-900">Kasubbid Mulmed</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p id="disposisi-error" class="ml-1 text-rose-600 text-xs"></p>
                                        </fieldset>
                                    </div>

                                    <!-- isi disposisi -->
                                    <div class="mt-2">
                                        <textarea name="isi_disposisi" id="isi-disposisi" rows="7" placeholder="isi disposisi anda" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= $_POST['isi_disposisi'] ?? '' ?></textarea>
                                        <!-- value="<?= $_POST['isi_disposisi'] ?? '' ?>"  -->
                                        <p id="isi-disposisi-error" class="ml-1 text-rose-600 text-xs"></p>
                                    </div>

                                    <!-- tanggal disposisi -->
                                    <div class="w-60 bg-rose-200;">
                                        <label for="tgl_disposisi" class="block text-sm font-medium leading-6 text-gray-900">Tanggal disposisi</label>
                                        
                                        <div class="flex w-80">
                                            <input id="tgl-disposisi" type="text" class="block w-60 rounded-md bg-transparent bg-none border-1 pl-5 py-1.5 text-gray-900 shadow-sm ring-3 p-3 ring-inset 
                                        ring-1 ring-gray-600 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-indigo-600 sm:text-sm 
                                        sm:leading-6">

                                            <input id="tanggal-pickup" name="tgl_disposisi" type="datetime-local" class="absolute mx-52 mt-1 right-1/4; w-5 bg-transparent">
                                        </div>
                                        <p id="tanggal-disposisi-error" class="ml-1 text-rose-600 text-xs"></p>
                                    </div>
                                </div>
                                <!-- button kirim / cancel  -->
                                <div class="mt-3 flex items-center justify-end gap-x-6">
                                    <button type="button" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="/disposisi">Cancel</a></button>
                                    <button id="btn-save" disabled type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 opacity-30 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2  focus-visible:outline-indigo-600">Kirim</button>
                                </div>
                            </form>
                        </div>
                        <!-- end kepada yth -->
                    </div>

                </div>
            </div>

            <!-- Preview -->
            <div class="max-w-5xl h-screen; w-screen pb-1 bg-gray-300 rounded-br-md">
                <div class="py-3 sm:px-6 lg:px-8 bg-gray-400 rounded-tr-lg flex flex-row items-center gap-x-10 justify-center">
                    <h1 class="font-medium semi-bold text-gray-900">Preview</h1>
                </div>
                <div class="flex bg-rose-200 items-center">
                    <embed class="hover:hidden;" src="data:application/pdf;base64, <?= base64_encode($surat_masuk['surat_pdf']) ?>" type='application/pdf' width="100%" height="750px" title="" />
                </div>
            </div>
        </div>

    </div>
</main>

<script>
    const e = document.querySelector('form');
    const disposisi_kepada = e.querySelectorAll('input[type="checkbox"]')
    const isiDisposisi = e.querySelector('textarea')
    const tglDisposisi = e.querySelector('#tgl-disposisi')

    setChecked()
    setIsiDisposisi()
    setTglDisposisi()

    function setChecked() {
        var d = "<?php echo $disposisi_kepada ?>"
        d = d.split('-')
        d.shift();
       
        disposisi_kepada.forEach(function(dis) {
            d.forEach(function(d1) {
                if(d1 === dis.name) {
                    dis.checked = true
                }
            })
        })
    }

    function setIsiDisposisi() {
        var isi_disposisi = "<?php echo $isi_disposisi ?>"
        isiDisposisi.value = isi_disposisi
    }

    function setTglDisposisi() {
        var tgl_disposisi = "<?php echo $tgl_disposisi ?>"
        tglDisposisi.value = tgl_disposisi
    }
    

</script>