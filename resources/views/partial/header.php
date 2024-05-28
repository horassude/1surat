    <header class="bg-stone-500 shadow flexible; fixed; w-screen">
        <div class="mx-auto max-w-7xl px-4 py-3 sm:px-6; lg:px-8;">
            <p class="text-2xl font-bold tracking-tight text-gray-900">
                <?php if($heading === 'surat') : ?>
                    <div class="flex gap-x-3 font-medium">
                        <div><a href="/surat/masuk" class="text-gray-700 hover:text-blue-700 hover:font-semibold">Surat Masuk</a></div>
                        <div>|</div>
                        <div><a href="#" class="text-gray-700 hover:text-blue-700 hover:font-semibold">Nota Dinas</a></div>
                        <div>|</div>
                        <div><a href="#" class="text-gray-700 hover:text-blue-700 hover:font-semibold">Sprint</a></div>
                        <div>|</div>
                        <div><a href="#" class="text-gray-700 hover:text-blue-700 hover:font-semibold">Telegram</a></div>
                    </div>
                <?php else : ?>
                    <p><?= $heading; ?></p>
                <?php endif ?>
            </p>
        </div>
    </header>
</div>      <!-- close div from nav.html -->