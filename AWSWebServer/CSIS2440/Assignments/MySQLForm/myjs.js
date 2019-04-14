function popup() {
    alert("js connected");
}

function validate() {
    // test code
//    console.log("Validating");
//    console.log(document.myForm.fname.value);
//    console.log(document.myForm.lname.value);
    
    var msgArray = new Array();
    
    // validation for no inputs
    if (document.myForm.fname.value === "") {
        document.myForm.fname.focus();
        msgArray.push("You need a first name");
    }
    
    if (document.myForm.lname.value === "") {
        document.myForm.lname.focus();
        msgArray.push("You need a last name");
    }
    
    
    // regex formats
    letterFormat = /^[a-zA-Z]+$/;
    
    // validations for letters for names
    if(!document.myForm.fname.value.match(letterFormat)) {
       document.myForm.fname.focus();
       msgArray.push("You need the first name to be only letters"); 
    }
    
    if(!document.myForm.lname.value.match(letterFormat)) {
       document.myForm.lname.focus();
       msgArray.push("You need the last name to be only letters"); 
    }
    
    // display messages in array
    if (msgArray.length > 0) {
        msgString = "";
        for (i = 0; i < msgArray.length; i++) {
            msgString = msgString + "• " + msgArray[i] + "\n";
        }
        alert(msgString);
        return false;
    }
    return(true);
}

function validateFullForm() {
    
    var msgArray = new Array();
    
    // validation for no inputs
    if (document.myForm.fname.value === "") {
        document.myForm.fname.focus();
        msgArray.push("You need a first name");
    }
    
    if (document.myForm.lname.value === "") {
        document.myForm.lname.focus();
        msgArray.push("You need a last name");
    }
    
    if (document.myForm.phone.value === "") {
        document.myForm.phone.focus();
        msgArray.push("You need a phone number");
    }
    
    if (document.myForm.address.value === "") {
        document.myForm.address.focus();
        msgArray.push("You need a address");
    }
    
    if (document.myForm.city.value === "") {
        document.myForm.city.focus();
        msgArray.push("You need a city");
    }
    
    if (document.myForm.zip.value === "") {
        document.myForm.zip.focus();
        msgArray.push("You need a zip code");
    }
    
    if (document.myForm.myusername.value === "") {
        document.myForm.myusername.focus();
        msgArray.push("You need a Username");
    }
    
    if (document.myForm.mypassword.value === "") {
        document.myForm.mypassword.focus();
        msgArray.push("You need a Password");
    }
    
    // regex formats
    letterFormat = /^[a-zA-Z]+$/;
    numberFormat = /^[0-9]+$/;
    
    // validations for letters for names
    if(!document.myForm.fname.value.match(letterFormat)) {
       document.myForm.fname.focus();
       msgArray.push("You need the first name to be only letters"); 
    }
    
    if(!document.myForm.lname.value.match(letterFormat)) {
       document.myForm.lname.focus();
       msgArray.push("You need the last name to be only letters"); 
    }
    
    // validation for numbers for the phone
    if(!document.myForm.phone.value.match(numberFormat)) {
       document.myForm.phone.focus();
       msgArray.push("You need the phone to be only numbers"); 
    }
    
    // display messages in array
    if (msgArray.length > 0) {
        msgString = "You need to fill out the form completely: \n";
        for (i = 0; i < msgArray.length; i++) {
            msgString = msgString + "• " + msgArray[i] + "\n";
        }
        msgString = msgString + "• Change the default vaules for birthday or state or sex or relationship \n";
        alert(msgString);
        return false;
    }
    return(true);
}