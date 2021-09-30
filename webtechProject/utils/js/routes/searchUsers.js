document.getElementById('userSearchForm').addEventListener('change', searchUser)

function toggleDetails(email)
{
    document.querySelectorAll('.user').forEach(user => {
        if(user.id != email) {
            console.log(document.getElementById(email+"details"))
            document.getElementById(user.id+"details").style.display = 'none';
        } else {
            //console.log(document.getElementById(user.id+"details"))
            document.getElementById(user.id+"details").style.display = 'block';
        }
    })
}

function searchUser(e)
{
    console.log(e.target.value)
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if(this.status === 200 && this.readyState === 4) {
            const str = JSON.parse(this.responseText);
            console.log(str);
            document.getElementById('search-result').innerHTML = '';
            let roles = {
                admin : '',
                manager : '',
                rider: '',
                customer: ''
            }
            str.forEach(user => {
                roles.admin = '';
                roles.manager = '';
                roles.rider = '';
                roles.customer = '';
                roles[user.role] = 'selected'
                document.getElementById('search-result').innerHTML += `
                <div class="user" id="${user.email}" onclick="toggleDetails('${user.email}')">
                    <p><span>${user.lastname}</span> | <span>${user.email}</span></p>
                    <div class="details" id="${user.email}details">
                        <h3>${user.firstname} ${user.lastname}</h3>
                        <p>${user.email}</p>
                        <p>${user.role}</p>
                        <form action="" method="POST">
                            <select name="designation" id="designation">
                                <option value="admin" ${roles.admin}>Admin</option>
                                <option value="manager" ${roles.manager}>Manager</option>
                                <option value="rider" ${roles.rider}>Rider</option>
                                <option value="buyer" ${roles.customer}>Customer</option>
                            </select>
                        </form>
                    </div>
                </div>
                `
            });
            
            
        }
    }
    xhttp.open('GET', 'http://localhost/webtechProject/controllers/API/users/searchUsers.php?email='+e.target.value, true)
    xhttp.send();
}
