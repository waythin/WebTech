function checkIfUserExists(email, callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(this.status === 200 && this.readyState === 4) {
            const str = JSON.parse(this.responseText);
            if(str !== null) {
                callback(true);
            }
            callback(false);
        }
    }
    xhttp.open('GET', 'http://localhost/webtechProject/controllers/API/users/getUser.php?email='+email, true)
    xhttp.send();
}