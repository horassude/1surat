<main>
    <div class="mx-auto w-screen h-screen fixed sm:px-5 bg-blue-200">
        <embed class="hover:hidden;" 
            src="data:application/pdf;base64, <?= base64_encode($pdf) ?>" 
            type='application/pdf' 
            width="100%" 
            height="100%" 
            title="" 
        />
    </div>
</main>