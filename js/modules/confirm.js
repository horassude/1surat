
const confirm = (messages) => {
    // Create the modal
    var modal = document.createElement("div");
    modal.className = "bg-transparent fixed left-0 top-0 w-full h-full z-1 overflow-auto"
    document.body.appendChild(modal);

    // Create modal content
    var modalContent = document.createElement("div");
    modalContent.className = "mx-auto max-w-sm sm:px-2 lg:p-2 mt-20 bg-gray-200 flex flex-col rounded-md space-y-3";
    modal.appendChild(modalContent);

    // Create box1
    var box1 = document.createElement("div");
    box1.className = "w-full flex justify-end bg-rose-200;";
    modalContent.appendChild(box1);

    // Create close button inside box1
    var closeBtn = document.createElement("span");
    closeBtn.className = "hover:bg-gray-200 cursor-pointer text-base";
    closeBtn.innerHTML = "&times;";
    box1.appendChild(closeBtn);

    // Create box2
    var box2 = document.createElement("div");
    box2.className = "w-full flex justify-center bg-rose-300;";
    modalContent.appendChild(box2);

    // Create image inside box2
    var img = document.createElement("img");
    img.className = "w-10 h-10 rounded";
    img.src = "http://myapp.com/public/images/logo/humas_polri_small.png";
    img.alt = "Your Image";
    box2.appendChild(img);


    // Create box3
    var box3 = document.createElement("div");
    box3.className = "w-full flex justify-center";
    modalContent.appendChild(box3);

    // Create content inside box3
    var modalText = document.createElement("p");
    modalText.className = "text-xl"
    modalText.textContent = messages;
    box3.appendChild(modalText);

    // Get the button that opens the modal
    // var btn = document.getElementById("btn-surat");

    // When the user clicks the button, open the modal
    // btn.onclick = function () {
    //     modal.style.display = "block";
    // }

    // When the user clicks on <span> (x), close the modal
    closeBtn.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function (event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
}

export { confirm };