var firstname= document.getElementById("firstname").value;
var lastname= document.getElementById("lastname").value;
var email= document.getElementById("email").value;
var phone= document.getElementById("phone").value;
var password= document.getElementById("password").value;
var cassword= document.getElementById("cpassword").value;
var nid= document.getElementById("nid").value;
var address= document.getElementById("address").value;
var dob= document.getElementById("dob").value;
var starttime= document.getElementById("starttime").value;
var endtime= document.getElementById("endtime").value;
var pic= document.getElementById("pic").value;









document.getElementById("firstname").addEventListener("change",FirstName);
document.getElementById("lastname").addEventListener("change",LastName);
document.getElementById("email").addEventListener("change",Email);
document.getElementById("phone").addEventListener("change",Phone);
document.getElementById("password").addEventListener("change",Password);
document.getElementById("cpassword").addEventListener("change",ConfirmPassword);
document.getElementById("nid").addEventListener("change",Nid);
document.getElementById("dob").addEventListener("change",Dob);
document.getElementById("pic").addEventListener("change",Pic);
document.getElementById("endtime").addEventListener("change",EndTime);




function FirstName(){
    var firstname= document.getElementById("firstname").value;
    console.log(firstname);
    
    if((firstname.length > 2 && firstname.match(/^[a-zA-Z-' ]*$/))) {
        
        document.getElementById("myfirstname").innerHTML="";
    }
    else {
    document.getElementById("myfirstname").innerHTML="Firstname must have atleast 3 characters";
    }
      
}
function LastName(){
    var lastname= document.getElementById("lastname").value;
    console.log(lastname);
    
    if((lastname.length > 2 && lastname.match(/^[a-zA-Z-' ]*$/))) {
        
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
function Phone(){
    var phone= document.getElementById("phone").value;
    console.log(phone);

    if(phone.match(/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/))
    {
        document.getElementById("myphone").innerHTML="";
        
    }
    else{
        document.getElementById("myphone").innerHTML="Type correct phone number";
    }
  

    
}



function Password(){
    var password= document.getElementById("password").value;
    console.log(password);

    if (password.match(/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/)){
        document.getElementById("mypassword").innerHTML="";
    }
    else{
        document.getElementById("mypassword").innerHTML="Password must contain minimum eight characters, at least one letter, one number and one special character";
    }

    
}

function ConfirmPassword(){
    var password= document.getElementById("password").value;
    var cpassword= document.getElementById("cpassword").value;
    console.log(cpassword);

    if (password!=cpassword){
        document.getElementById("mycpassword").innerHTML="Both password must match";
    }
    else{
        document.getElementById("mycpassword").innerHTML="";
    }

}


function Nid(){
    var nid= document.getElementById("nid").value;
    console.log(nid);

    if (nid.match(/^([0-9]{10}|[0-9]{13})$/)){
        document.getElementById("mynid").innerHTML="";
    }
    else{
        document.getElementById("mynid").innerHTML="Wrong NID Number";
    }

    
}

function Dob(){
    var dob = document.getElementById('dob').value;
    var today = new Date();
    var dobjs = new Date(dob);
    if(today < dobjs) {
        document.getElementById("sdob").innerHTML = "Future date cannot be a birthdate";
        
        
    } else {
        document.getElementById("sdob").innerHTML = "";
    }
    console.log(dobjs);
    
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
function EndTime(){
    var starttime= document.getElementById("starttime").value;
    var endtime= document.getElementById("endtime").value;
    console.log(starttime);
   
    

  
    if (starttime<= endtime) 
    
    {
        document.getElementById("ent").innerHTML = "";
    }
    else{
        document.getElementById("ent").innerHTML = "End time must be bigger";
    }
    
}


// function SignUp(){
//     var sign_up= document.getElementById("sign_up").value;
//     console.log(sign_up);

//     if (username.length==0 || email.length==0 || contact_no.length==0 || pwd.length==0 || cpwd.length==0){
//         document.getElementById("mysignup").innerHTML="Please fill up all the fields to sign up";
//     }
//     else{
//         document.getElementById("mysignup").innerHTML="";
//     }
    
// }
