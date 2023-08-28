document.querySelector("#pswd").addEventListener("keyup", function() {
    const pwdValue = this.value;
  
    const toggleClass = (elementId, className, condition) => {
      const element = document.querySelector(elementId);
      if (condition) {
        element.classList.remove("text-red-500");
        element.classList.add(className);
      } else {
        element.classList.remove(className);
        element.classList.add("text-red-500");
      }
    };
  
    toggleClass("#number", "text-green-500", /\d/.test(pwdValue));
    toggleClass("#capital", "text-green-500", /[A-Z]/.test(pwdValue));
    toggleClass("#letter", "text-green-500", /[a-z]/.test(pwdValue));
    toggleClass("#length", "text-green-500", pwdValue.length >= 6);
  });
  
  document.querySelector("form#signUp").addEventListener("submit", function(event) {
    // event.preventDefault();
  
    const pwdValue = document.querySelector("#pswd").value;
    const pwdConfirmValue = document.querySelector("#pswdConfirm").value;
  
    const capitalValid = /[A-Z]/.test(pwdValue);
    const letterValid = /[a-z]/.test(pwdValue);
    const digitValid = /\d/.test(pwdValue);
    const lengthValid = pwdValue.length >= 8;
    const matchingPWD = pwdValue === pwdConfirmValue;
  
    const allIsGood = capitalValid && letterValid && digitValid && lengthValid && matchingPWD;
  
    if (allIsGood) {
      this.innerHTML = "<h2 class='text-center text-green-500'>You are registered correctly</h2>";
    } else {
      alert("Something's wrong my friend");
    }
  });
  
  document.querySelector("#pswd").addEventListener("focus", function() {
    document.querySelector("#pswd_info").style.display = "block";
  });
  
  document.querySelector("#pswd").addEventListener("blur", function() {
    document.querySelector("#pswd_info").style.display = "none";
  });
  