<?php

    use Core\Database;
    use Core\App;
    use Core\Satker;
    
    $satker = App::resolve(Satker::class);

    $pejabat = $satker->get(null, null, 'ORDER BY level ASC');
    $x = 0;

?>

<div id="pengirim" class="w-96">
    <label for="button_pengirim" id="listbox-label" class="block text-sm font-medium leading-6 text-gray-900">Dari</label>
    <div class="relative mt-2;">
        <button id="button-pengirim" type="button" 
            class="relative w-full cursor-default rounded-md bg-transparent; py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm 
                ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-1; focus:ring-indigo-500; sm:text-sm sm:leading-6 border-2 
                border-gray-500" 
                aria-haspopup="listbox" 
                aria-expanded="true" 
                aria-labelledby="listbox-label">

            <?php $logo_default =  $satker->get(['logo'], [['pejabat', '=', 'Kapolda']]); ?>

            <span class="flex items-center">
                <img id="img-satker" src="data:image/jpeg;base64,<?= base64_encode($logo_default) ?>" alt="" 
                    class="h-6 w-6 flex-shrink-0 rounded-full bg-transparent">
                <input type="text" id="input-pengirim" name="pengirim" value="Kapolda" readonly required
                    class="ml-5 text-gray-900 text-md font-semibold focus:outline-none cursor-pointer select-none bg-transparent">
                <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                    <svg class="h-5 w-5 text-gray-800" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                    </svg>
                </span>
            </span>
        </button>
    </div>

    <!-- modal -->
    <div id="item-pengirim" class="hidden bg-transparent px-4 fixed left-1/4 top-0 w-full h-full z-1 overflow-auto">
        <ul class="fixed; z-10 mx-96; my-52 max-h-96 w-96 overflow-auto rounded-md bg-gray-200 py-1 text-base shadow-lg ring-1 
                ring-black ring-opacity-1 focus:outline-none sm:text-sm"
             tabindex="-1" role="listbox" 
             aria-labelledby="listbox-label" 
             aria-activedescendant="listbox-option-3">
            <?php foreach ($pejabat as $result => $value) : ?>
                <li id="<?= $value['pejabat'] ?>" class="text-gray-900 relative cursor-default select-none py-1 pl-3 pr-9 
                    hover:bg-indigo-400 hover:text-white flex items-center" role="option">
                    <div class="flex items-center">
                        <img src="data:image/jpeg;base64,<?= base64_encode($value['logo']) ?>" class="h-5 w-5 flex-shrink-0 rounded-full">
                        <label class="font-normal ml-3 block truncate"><?= $value['pejabat'] ?></label>
                        <span id="selected" class="hidden text-indigo-600 absolute inset-y-0 right-0 mt-1 pr-4 border-1 
                            border-indigo-900 bg-blue-200;">
                            <svg class="h-5 w-5 justify-end" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </div>
                </li>
            <?php $x++;
            endforeach ?>
        </ul>
    </div>
</div>


<script>
    const e = document.getElementById('pengirim')
    const buttonPengirim = e.querySelector('#button-pengirim')
    const item = e.querySelector("#item-pengirim");
    const li = e.querySelectorAll('li')

    buttonPengirim.addEventListener("click", function(event) {
        item.style.display = "block";
        event.stopPropagation()
    })

    li.forEach(function(item){
        item.addEventListener('click', function() {
            e.querySelector('#input-pengirim').value = item.id
            e.querySelector('#img-satker').src = item.querySelector('img').src
            li.forEach(function(item){
                item.querySelector('#selected').style.display = "none";
            })
            item.querySelector('#selected').style.display = "block";
        })
    })

    window.onclick = function(event) {
        if (event.target === item) {
            item.style.display = "none";
        }
    }

</script>