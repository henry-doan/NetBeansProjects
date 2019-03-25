function popup() {
    alert("hello World");
}

function validate() {
    console.log("We are Validating");
    console.log(document.myForm.Name.value);
    var errorArray = new Array();
    if (document.myForm.Name.value == "") {
        document.myForm.Name.focus();
        errorArray.push("You need a name");
    }
    
    if (document.myForm.Email.value == "") {
        document.myForm.Email.focus();
        errorArray.push("You need a email");
    }
    
    emailFormat =  /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
    // match
//    if(!document.myForm.Email.value.match(emailFormat)) {
//       document.myForm.Email.focus();
//       errorArray.push("You need the email to be the right format of example: email@email.com "); 
//    }
    
    // exec
//    if(emailFormat.exec(document.myForm.Email.value) === null) {
//       document.myForm.Email.focus();
//       errorArray.push("You need the email to be the right format of example: email@email.com "); 
//    }

    // test 
    if(emailFormat.test(document.myForm.Email.value) === false) {
       document.myForm.Email.focus();
       errorArray.push("You need the email to be the right format of example: email@email.com "); 
    }
    
    if (document.myForm.Zip.value == "" || isNaN(document.myForm.Zip.value ) || document.myForm.Zip.value.length != 5) {
        document.myForm.Zip.focus();
        errorArray.push("You need a zip");
    }
    
    if (document.myForm.Country.value == "-1") {
        errorArray.push("You need a country");
    }
    
    if (errorArray.length > 0) {
        var errReport = document.getElementById("errlog");
        errString = "<ul>";
        for (i = 0; i < errorArray.length; i++) {
            errString = errString + "<li>" + errorArray[i] + "</li>";
        }
        errString = errString + "</ul>";
        errReport.innerHTML = errString;
        return false;
    }
    return(true);
}
