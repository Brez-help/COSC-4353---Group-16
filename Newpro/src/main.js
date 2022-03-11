function setFormMessage(formElement, type, message) {
    const messageElement = formElement.querySelector(".form__message");

    messageElement.textContent = message;
    messageElement.classList.remove("form__message--success", "form__message--error");
    messageElement.classList.add(`form__message--${type}`);
}

function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

function validate() {
    var username = document.getElementById("explicit-block-txt").value;
    var password = document.getElementById("passwort").value;
    if (username="admin" && password == "admin") {
        window.location.href = 'fuelQuote.html';
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const loginForm = document.querySelector("#login");
    const createAccountForm = document.querySelector("#createAccount");

    document.querySelector("#linkCreateAccount").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.add("form--hidden");
        createAccountForm.classList.remove("form--hidden");
    });

    document.querySelector("#linkLogin").addEventListener("click", e => {
        e.preventDefault();
        loginForm.classList.remove("form--hidden");
        createAccountForm.classList.add("form--hidden");
    });

    document.getElementById("explicit-block-txt").onkeypress = function (e) {
        var chr = String.fromCharCode(e.which);
        if ("()/>{}[]+=_-,|.?!@#`\~$\'%:;^&*<\" ".indexOf(chr) >= 0)
            return false;
    };
    document.getElementById("signupUsername").onkeypress = function (e) {
        var chr = String.fromCharCode(e.which);
        if ("()/>{}[]+=_-,|.?!@#`\~$\'%:;^&*<\" ".indexOf(chr) >= 0)
            return false;
    };


    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "signupUsername" && e.target.value.length > 0 && e.target.value.length < 10) {
                setInputError(inputElement, "Username must be at least 10 characters in length");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});