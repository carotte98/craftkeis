document.querySelector("#pswd").addEventListener("keyup", function() {
    const pwdValue = this.value;
  
    const toggleClass = (elementId, className, condition) => {
      const element = document.querySelector(elementId);
      if (condition) {
        element.classList.remove("invalid");
        element.classList.add(className);
      } else {
        element.classList.remove(className);
        element.classList.add("invalid");
      }
    };
  
    toggleClass("#number", "valid", /\d/.test(pwdValue));
    toggleClass("#capital", "valid", /[A-Z]/.test(pwdValue));
    toggleClass("#letter", "valid", /[a-z]/.test(pwdValue));
    toggleClass("#length", "valid", pwdValue.length >= 6);
    toggleClass("#symbol", "valid", /[!@#$%^&*(),.?":{}|<>]/.test(pwdValue));
  });
  
  document.querySelector("#pswd").addEventListener("focus", function() {
    document.querySelector("#pswd_info").style.display = "block";
  });
  
  document.querySelector("#pswd").addEventListener("blur", function() {
    document.querySelector("#pswd_info").style.display = "none";
  });
  