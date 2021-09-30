/*
var firstname= document.getElementById("firstname").value;
var lastname= document.getElementById("lastname").value;
var email= document.getElementById("email").value;
var phonenumber= document.getElementById("phonenumber").value;
var birthday= document.getElementById("birthday").value;
var nid= document.getElementById("nid").value;
var pic= document.getElementById("pic").value;
var cv= document.getElementById("cv").value;
var password_1= document.getElementById("password_1").value;
var password_2= document.getElementById("password_2").value;
*/

document.getElementById("firstname").addEventListener("change",FirstName);
document.getElementById("lastname").addEventListener("change",LastName);
document.getElementById("email").addEventListener("change",Email);
document.getElementById("phonenumber").addEventListener("change",Phonenumber);
document.getElementById("birthday").addEventListener("change",Birthday);
document.getElementById("nid").addEventListener("change",Nid);
document.getElementById("pic").addEventListener("change",Pic);
//document.getElementById("cv").addEventListener("change",CV);

document.getElementById("password_1").addEventListener("change",Password_1);
document.getElementById("password_2").addEventListener("change",Password_2);

/*
function Name(){
    var firstname= document.getElementById("firstname").value;
    var lastname= document.getElementById("lastname").value;
    console.log(firstname);
    console.log(lastname);
    
    if((firstname.length > 2 && firstname.match(/^[a-zA-Z-' ]*$/)) || (lastname.length > 2 || lastname.match(/^[a-zA-Z-' ]*$/))) {
        
        document.getElementById("myname").innerHTML="";
    }
    else {
    document.getElementById("myname").innerHTML="Firstname or last name cannot have white spaces and less than 2 characters";
    }
      
}
*/

function FirstName(){
    var firstname= document.getElementById("firstname").value;
    console.log(firstname);

    if((firstname.length > 2 && firstname.match(/^[a-zA-Z-' ]$/))) {

        document.getElementById("myfirstname").innerHTML="";
    }
    else {
    document.getElementById("myfirstname").innerHTML="Firstname must have atleast 3 characters";
    }

}
function LastName(){
    var lastname= document.getElementById("lastname").value;
    console.log(lastname);

    if((lastname.length > 2 && lastname.match(/^[a-zA-Z-' ]$/))) {

        document.getElementById("mylastname").innerHTML="";
    }
    else {
    document.getElementById("mylastname").innerHTML="Lastname must have atleast 3 characters";
    }

}

function Email(){
    var email= document.getElementById("email").value;
    console.log(email);
    if (email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
        document.getElementById("myemail").innerHTML="";
    }
    else{
        document.getElementById("myemail").innerHTML="Wrong email format";
    }
    
}


function Phonenumber()
{
    var phonenumber= document.getElementById("phonenumber").value;
    console.log(phonenumber);
    if(phonenumber.match(/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/)){
        document.getElementById("myphonenumber").innerHTML="";
    }
    else{
        document.getElementById("myphonenumber").innerHTML="Invalid contract number";
    }
}

function Birthday(){
    var birthday = document.getElementById('birthday').value;
    var today = new Date();
    var birthdayjs = new Date(birthday);
    if(today < birthdayjs) {
        document.getElementById("mybirthday").innerHTML = "Future date cannot be a birthdate";
        
        
    } else {
        document.getElementById("mybirthday").innerHTML = "";
    }
    console.log(birthdayjs);
    
}

function Nid(){
    var nid= document.getElementById("nid").value;
    console.log(nid);

    if(nid.match(/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/)){
        document.getElementById("mynid").innerHTML="";
    }
    else{
        document.getElementById("mynid").innerHTML="Wrong NID Number";
    }

    
}

function Pic(){
    var pic= document.getElementById("pic").value;

        var accept = ["jpg","jpeg","png","webp"];

        if(pic!='')
        {
            var img=pic.substring(pic.lastIndexOf('.')+1);
            var result=accept.includes(img);
            if(result==false)
            {
                document.getElementById("pp").innerHTML = "The file type is not allowed";

                console.log(img);
                return false;
            }
            else{
                document.getElementById("pp").innerHTML = " ";
                return false;

            }

        }

}
function Password_1(){
    var password= document.getElementById("password").value;
    console.log(password);

    if (password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/)){
        document.getElementById("mypassword_1").innerHTML="";
    }
    else{
        document.getElementById("mypassword_1").innerHTML="Password must contain minimum eight characters, at least one letter, one number and one special character";
    }

    
}

function Password_2(){
    var password_1= document.getElementById("password_1").value;
    var password_2= document.getElementById("password_2").value;
    console.log(password_2);

    if (password_1!=password_2){
        document.getElementById("mypassword_2").innerHTML="Both password must match";
    }
    else{
        document.getElementById("mypassword_2").innerHTML="";
    }

}
