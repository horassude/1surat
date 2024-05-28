const element =
{
    onInput: function(e, callback) {e.addEventListener("input", function() {callback()})},
    onChange: function(e, callback) {e.addEventListener("change", function() {callback()})},
    onClick: function(e, callback) {e.addEventListener("click", function() {callback()})}
}


export { element }