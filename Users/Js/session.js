var context;
window.addEventListener('load', init, false);
function init() {
    try {
        // Fix up for prefixing
        window.AudioContext = window.AudioContext||window.webkitAudioContext;
        context = new AudioContext();
    }
    catch(e) {
        alert('Web Audio API is not supported in this browser');
    }
}
    
    
var objDiv = document.getElementById("chats");
objDiv.scrollTop = objDiv.scrollHeight;

let scrollUpdate = () => {
    
    var element = document.getElementById("chats");
    element.scrollTop = element.scrollHeight;

}
