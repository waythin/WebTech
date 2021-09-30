function fetchMenu(callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(this.status === 200 && this.readyState === 4) {
            const str = JSON.parse(this.responseText);
            callback(str);
        }
    }
    xhttp.open('GET', 'http://localhost/webtechProject/controllers/API/users/getMenu.php', true)
    xhttp.send();
}