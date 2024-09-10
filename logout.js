window.addEventListener('unload', function (event) {
    // This event ensures that the request is sent even if the browser is closed immediately
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'logout.php', true);
    xhr.send();
});