<?php

    view(HEAD);
    view(NAV);

?>


<main class="grid w-screen max-w-3xl; min-h-auto place-items-center bg-stone-200 px-6 py-24 sm:py-32 lg:px-8 rounded-md">
    <div class="text-center">
        <p class="text-base font-semibold text-indigo-600">401</p>
        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Database failed</h1>
        <p class="mt-6 text-base leading-7 text-gray-600"><?= $error ?></p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="/surat/register" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm 
                hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 
                focus-visible:outline-indigo-600">
                Go back
            </a>
           
        </div>
    </div>
</main>