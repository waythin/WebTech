let fname = document.getElementById('fname').value;
let lname = document.getElementById('lname').value;
let email = document.getElementById('email').value;
let pwd = document.getElementById('pwd').value;
let cpwd = document.getElementById('cpwd').value; 
let dob = document.getElementById('dob').value;  

function checkRegex(rule, str) {
    var patt = new RegExp(rule);
    return patt.test(str);
}

document.getElementById('fname').addEventListener('change', () => {
    fname = document.getElementById('fname').value;
    
    if(fname.length < 2 || !checkRegex('^[a-zA-Z].*',fname)) {
        document.querySelector('.fname .error').innerHTML = `
        The name must contain more than 1 character & cannot start with number 
        `
    } else {
        document.querySelector('.fname .error').innerHTML = '';
    }
})
document.getElementById('lname').addEventListener('change', () => {
    lname = document.getElementById('lname').value;

    if(fname.length < 2) {
        document.querySelector('.lname .error').innerHTML = `
        First letter have to be letter
        `
    } else {
        document.querySelector('.lname .error').innerHTML = '';
    }
})
document.getElementById('email').addEventListener('change', () => {
    email = document.getElementById('email').value;
    
    checkIfUserExists(email, (val) => {
        if(val) {
            document.querySelector('.email .error').innerHTML = `
            Email is already taken! 
            `
        }
    })
    if(!checkRegex('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$',email)) {
        document.querySelector('.email .error').innerHTML = `
        Looks like wrong email format! 
        `
    } else {
        document.querySelector('.email .error').innerHTML = '';
    }    
})
document.getElementById('pwd').addEventListener('change', () => {
    pwd = document.getElementById('pwd').value;

    if(!checkRegex('^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$',pwd)) {
        document.querySelector('.pwd .error').innerHTML = `
        Password must contain minimum eight characters, at least one letter, one number and one special character 
        `
    } else {
        document.querySelector('.pwd .error').innerHTML = '';
    }
})
document.getElementById('cpwd').addEventListener('change', () => {
    cpwd = document.getElementById('cpwd').value;

    if(pwd !== cpwd) {
        document.querySelector('.cpwd .error').innerHTML = `
        Both password must match 
        `
    } else {
        document.querySelector('.cpwd .error').innerHTML = '';
    }
})
document.getElementById('dob').addEventListener('change', () => {
    
    dob = document.getElementById('dob').value;
    let today = new Date();
    let dobjs = new Date(dob);
    if(today < dobjs) {
        document.querySelector('.dob .error').innerHTML = `
        Future date cannot be a birthdate
        `
    } else {
        document.querySelector('.dob .error').innerHTML = '';
    }
    console.log(dobjs);
})
