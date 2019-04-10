function popup() {
    alert("js connected");
}

function validate() {
    // test code
    console.log("Validating");
    console.log(document.myForm.First.value);
    console.log(document.myForm.Last.value);
    console.log(document.myForm.Phone.value);

    
    var msgArray = new Array();
    
    // validation for no inputs
    if (document.myForm.First.value === "") {
        document.myForm.First.focus();
        msgArray.push("You need a first name");
    }
    
    if (document.myForm.Last.value === "") {
        document.myForm.Last.focus();
        msgArray.push("You need a last name");
    }
    
    if (document.myForm.Phone.value === "") {
        document.myForm.Phone.focus();
        msgArray.push("You need a phone number");
    }
    
    // regex formats
    letterFormat = /^[a-zA-Z]+$/;
    numberFormat = /^[0-9]+$/;
    
    // validations for letters for names
    if(!document.myForm.First.value.match(letterFormat)) {
       document.myForm.First.focus();
       msgArray.push("You need the first name to be only letters"); 
    }
    
    if(!document.myForm.Last.value.match(letterFormat)) {
       document.myForm.Last.focus();
       msgArray.push("You need the last name to be only letters"); 
    }
    
    // validation for numbers for the phone
    if(!document.myForm.Phone.value.match(numberFormat)) {
       document.myForm.Phone.focus();
       msgArray.push("You need the phone to be only numbers"); 
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