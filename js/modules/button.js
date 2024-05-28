const button =

{
    onClick: function(btn, callback) {btn.addEventListener("click", function() {callback()})},
    
    enable: function(btn) {btn.disabled = false; btn.style.opacity = 1;}
}

export { button }