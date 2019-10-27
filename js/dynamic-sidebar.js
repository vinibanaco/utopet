var globalWindow = window;
var window$1 = globalWindow;
var document$1 = globalWindow.document;

function affix() {
    var left = document$1.getElementById("sidebar");
    function update() {
        var spacing = 24;
        var viewportHeight = window$1.innerHeight;
        
        var bottom = Math.max(0, viewportHeight - footer.getBoundingClientRect().top) + spacing;
        
        if (left !== null && !left.hasAttribute("disable-affix")) {
            left.style.bottom = bottom + "px";
        }
    }
}