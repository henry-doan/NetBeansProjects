function popup() {
    alert("hello World");
}

function validate() {
    console.log("We are Validating");
    console.log(document.myForm.Name.value);
    var errorArray = new Array();
    if (document.myForm.Name.value == "") {
//        alert("Please provide your name!");
        document.myForm.Name.focus();
//        document.getElementById("Name").classList.add("error");
//        return false;
        errorArray.push("You need a name");
    }
    
    if (document.myForm.Email.value == "") {
//        alert("Please provide your email!");
//        document.getElementById("Email").classList.add("error");
        document.myForm.Email.focus();
        errorArray.push("You need a email");
//        return false;
    }
    
    if (document.myForm.Zip.value == "" || isNaN(document.myForm.Zip.value ) || document.myForm.Zip.value.length != 5) {
//        alert("Please provide a zip in the format #####.");
//        document.getElementById("Zip").classList.add("error");
        document.myForm.Zip.focus();
        errorArray.push("You need a zip");

//        return false;
    }
    
    if (document.myForm.Country.value == "-1") {
//        alert("Please provide your country!");
//        document.getElementById("Country").classList.add("error");
        errorArray.push("You need a country");

//        return false;
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
