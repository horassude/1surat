function openFileDialog(file_input, image_preview) {
    document.getElementById(file_input).click()
    document.getElementById(file_input).addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            document.getElementById(image_preview).src = e.target.result;
            document.getElementById(image_preview).style.display = 'block';
        };
        reader.readAsDataURL(file);
    });
}

export { openFileDialog }


const file = {

    open: function(file_input, image_preview)
    {
        document.getElementById(file_input).click()
        document.getElementById(file_input).addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById(image_preview).src = e.target.result;
                document.getElementById(image_preview).style.display = 'block';
            };
            reader.readAsDataURL(file);
        });
    }
}