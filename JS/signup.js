let nameerr = false;
function validateUsername(uname){

   let namepattern = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
   
   if(!uname.value.match(namepattern)){
        nameerr = true;
        uname.style.borderBottom = "3px solid rgb(234, 75, 75)";    
   }
   if(uname.value.match(namepattern)){
    nameerr = false;
    uname.style.borderBottom = "3px solid green";    
    }
}

let mobileerr = false;
function validateMobileNum(mobile){

    let mobilepattern = /^[0-9]{10}$/;
   
    if(!mobile.value.match(mobilepattern)){
        mobileerr = true;
        mobile.style.borderBottom = "3px solid rgb(234, 75, 75)";    
    }
    if(mobile.value.match(mobilepattern)){
        mobileerr = false;
        mobile.style.borderBottom = "3px solid green";    
    }
 }

 let  emailerr = false;
 function validateEmail(semail){
      let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if(!semail.value.match(validRegex)){
        semail.placeholder = "Please Enter valid Email";
        semail.style.borderBottom = "3px solid rgb(234, 75, 75)";       
        emailerr = true;
      }
      if(semail.value.match(validRegex)){
        semail.placeholder = "Please Enter valid Email";
        semail.style.borderBottom = "3px solid green";       
        emailerr = false;
      }
 }

 let passerr = false;
 function validatePassword(spass){

   let pass =  new String (document.getElementById("spass").value);

   if(pass.length < 8 || pass.length > 13){
    passerr = true;
    document.getElementById("spass").style.borderBottom = "3px solid rgb(234, 75, 75)";  
   }
   if(pass.length  >=8 && pass.length <= 13){
    passerr = false;
    document.getElementById("spass").style.borderBottom = "3px solid green";  
   }
 }

 function samePassword(passC){
        if(document.getElementById("spass").value != document.getElementById("passC").value){
            passC.style.borderBottom = "3px solid rgb(234, 75, 75)"; 
            passerr = true; 
        }
        if(document.getElementById("spass").value === document.getElementById("passC").value){
            console.log("password same");
            passC.style.borderBottom = "3px solid green"; 
            passerr=false;
        }
 }

 function formfilled(){
    if(
        document.getElementById("uname").value == "" ||
        document.getElementById("spass").value == "" ||
        document.getElementById("passC").value == "" ||
        document.getElementById("email").value == ""
    ){
        document.getElementById("formwarn").innerHTML=
           "<div class='alert alert-danger alert-dismissible fade show '  role='alert'><strong> <i class='bi bi-exclamation-triangle-fill'></i> Error!</strong> Please fill all mandatory fields<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        return false;
    }
    return true;
 }

 function allvalid(){
    if(passerr || emailerr || mobileerr || nameerr)
    {
           document.getElementById("formwarn").innerHTML=
           "<div class='alert alert-danger alert-dismissible fade show '  role='alert'><strong> <i class='bi bi-exclamation-triangle-fill'></i> Error!</strong> Please fix errors..<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
           return false;
   }
   return true;
 }
function validateSignupForm(form){
    let fill = formfilled();
    let valid = allvalid();
   
    if(fill && valid)
    return true;
return false;
}

document.getElementById("back2").addEventListener("click",()=>{
    window.history.back();
  })