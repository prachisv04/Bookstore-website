document.getElementById("email").addEventListener("keyup", () => {
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (!email.value.match(validRegex)) {
      email.placeholder = "Please Enter valid Email";
      email.style.borderBottom = "2px solid rgb(234, 75, 75)";
      isfalse = true;
    }
    if (email.value.match(validRegex)) {
      email.style.borderBottom = "2px solid green";
    }
  });

  document.getElementById("pass").addEventListener("keyup", () => {
    let pass = new String(document.getElementById("pass").value);
    if (pass.length < 8 || pass.length > 13) {
      passerr = true;
      document.getElementById("pass").style.borderBottom = "2px solid rgb(234, 75, 75)";
    }
    if (pass.length >= 8 && pass.length <= 13) {
      passerr = false;
      document.getElementById("pass").style.borderBottom = "2px solid green";
    }
    });
  
  function validateLoginForm(form) {

    // console.log(form);
    let isfalse = false;
    let email = document.getElementById("email");
    let pass = document.getElementById("pass");
    if (email.value == "") {
      email.placeholder = "please enter Email";
      email.style.borderBottom = "2px solid rgb(234, 75, 75)";
      isfalse = true;
    }

    if (pass.value == "") {
      document.getElementById("pass").placeholder = " please enter Password";
      document.getElementById("pass").style.borderBottom = "2px solid rgb(234, 75, 75)";
      isfalse = true;
    }
    if (isfalse)
      return false;
    return true;
  }
  
  document.getElementById("back").addEventListener("click",()=>{
    window.history.back();
  })
