<?php

    view(HEAD);
    view(NAV);
    
?>

<main>

    <div class="mx-auto max-w-8xl py-8; sm:px-6; lg:px-8; fixed; bg-blue-200; overflow-auto">

        <div class="fixed; sm:pt-20; z-index-0; left-0">
            <img src="<?= image(BACKGROUND) ?>">
        </div>

    </div>

</main>


<?php view(FOOTER) ?>