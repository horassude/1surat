import { modal } from './modal.js';
// modal('Hello world');
// console.log('Hello');

function errorMessage(messages = null) {
    modal(messages);
}





// show - hide area
function show_hide(area) {
    // alert('OK');
    var elementsToShow = document.getElementById(area);

    if (elementsToShow.style.display === "none") {
        elementsToShow.style.display = "block";
    } else {
        elementsToShow.style.display = "none";
    }
}


// Open modal
function openModal(myModalId, btnId) {
    // Get the modal

    var modal = document.getElementById(myModalId);

    // Get the button that opens the modal
    var btn = document.getElementById(btnId);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}


function setSelectedValue(selectId, value) {
    var selectElement = document.getElementById(selectId);
    selectElement.value = value;
}


function getPdf(pdf_input, preview_pdf) {
    // Trigger click event on the file input
    document.getElementById(pdf_input).click();
    // document.getElementById(pdf_input);

    // Function to handle file input change event
    document.getElementById(pdf_input).addEventListener('change', function (event) {
        var file = event.target.files[0];
        // alert(file.size);
        var reader = new FileReader();

        reader.onload = function (e) {
            // Update the preview image source
            document.getElementById(preview_pdf).src = e.target.result;
          
        };

        // Read the selected file as a data URL
        reader.readAsDataURL(file);
    });
}

function getFileSize(idInput) {
    
    var fileInput = document.getElementById(idInput);
    var preview = document.getElementById('preview_pdf');
    var file = fileInput.files[0];
    
    if (file) {
        if (file.size > 1 * 1024 * 1024) {
            alert("File size must be under 1 MB.")
            preview.src = '';
            fileInput.value = '';
        }
    }
}


function show_disposisi(id, value) {

    var elementsToShow = document.getElementById(id);

    document.getElementById('pengirimId').value = value;

    if (elementsToShow.style.display === "none") {
        // disposisiId.value = value;
        elementsToShow.style.display = "block";
    } else {
        elementsToShow.style.display = "none";
    }

}


function setDateToId(input, target) {

    var date = new Date(document.getElementById(input).value);

    var day = ('0' + date.getDate()).slice(-2); // Get two-digit day
    var month = ('0' + (date.getMonth() + 1)).slice(-2); // Get two-digit month
    var year = date.getFullYear(); // Get full year
    var formattedDate = day + '-' + month + '-' + year;

    document.getElementById(target).value = formattedDate;
}