
function setInputError(inputElement, message) {
    inputElement.classList.add("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = message;
}

function clearInputError(inputElement) {
    inputElement.classList.remove("form__input--error");
    inputElement.parentElement.querySelector(".form__input-error-message").textContent = "";
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".form__input").forEach(inputElement => {
        inputElement.addEventListener("blur", e => {
            if (e.target.id === "uid" && e.target.value.length > 0 && e.target.value.length < 3) {
                setInputError(inputElement, "Login musí obsahovať aspoň 3 znaky!");
            }
            if ((e.target.id === "pwd" || e.target.id === "pwdrepeat") && e.target.value.length > 0 && e.target.value.length < 5) {
                setInputError(inputElement, "Heslo musí obsahovať aspoň 5 znakov!");
            }
        });

        inputElement.addEventListener("input", e => {
            clearInputError(inputElement);
        });
    });
});



