function emailValid(){
    var email = document.getElementById("exampleFormControlInput1");
    var emailVal = email.value;
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var go = re.test(String(emailVal).toLowerCase());
    if(go){
        email.style.border = "green 1px solid";
    }
    else{
        email.style.border = "red 1px solid";
    }
}