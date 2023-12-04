function isEmpty(str) {
    return !str.trim().length;
}

function prihlasitSa() {
    const usernameInput = document.getElementById("loginPmeno");
    const passwordInput = document.getElementById("loginHeslo");
    const loginForm = document.getElementById("loginForm");
    const loginJsError = document.getElementById("loginJsError");
    const loginPhpError = document.getElementById("loginPhpError");
    if ((isEmpty(usernameInput.value) || usernameInput.value == "" || usernameInput.value == null) || (isEmpty(passwordInput.value) || passwordInput.value == "" || passwordInput.value == null)) {
        if (loginJsError != null && loginPhpError == null){
            if (!loginJsError.classList.contains("show")) {
                loginJsError.classList.add("show");
            }
        } else {
            loginPhpError.textContent = "Prosím zadajte vaše údaje!";
        }

    } else {
        if (loginJsError != null && loginPhpError == null){
            if (!loginJsError.classList.contains("show")) {
                loginJsError.classList.remove("show");
            }
        }
        loginForm.submit();
    }
}