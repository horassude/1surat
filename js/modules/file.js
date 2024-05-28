const file = {

    load: function(file_input, preview = null)
    {
        document.getElementById(file_input).click()
        document.getElementById(file_input).addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            if(preview !== null) {
                reader.onload = function (e) {
                    document.getElementById(preview).src = e.target.result;
                    document.getElementById(preview).style.display = 'block';
                };
            }

            reader.readAsDataURL(file);
        });
    },


    open: function(file_input) {
        file_input.click()
        file_input.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.readAsDataURL(file);
        })
    },

    size: function(idInput, idPreview) {
        var fileInput = document.getElementById(idInput);
        var preview = document.getElementById(idPreview);
        var file = fileInput.files[0];
        
        if (file) {
            if (file.size > 1 * 1024 * 1024) {
                alert("File size must be under 1 MB.")
                preview.src = '';
                fileInput.value = '';
            }
        }
    }
}


export { file }