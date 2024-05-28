<main>
    <div class="mx-auto w-screen h-screen fixed sm:px-5 bg-blue-200">
        <div class="w-full h-full bg-rose-200 flex-col">
            <div class="w-full bg-gray-200; p-3">
                <a href="/surat">Close</a>
            </div>
            <div class="w-full bg-blue-200 h-full">
                <?php echo "<embed src='data:application/pdf;base64," . base64_encode($pdf) . "' type='application/pdf' width='100%' height='100%'/>"; ?>
            </div>
        </div>
    </div>
</main>