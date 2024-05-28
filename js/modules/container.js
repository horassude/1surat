const container = {
    show: function(c) { 
        document.getElementById(c).style.display = "block";
        window.onclick = function (event) {
            if (event.target === document.getElementById(c)) {
                document.getElementById(c).style.display = "none";
            }
        }
    }
}

export { container };