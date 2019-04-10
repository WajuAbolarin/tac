import autosize from "autosize";

const inputs = document.querySelectorAll("textarea");
const counts = document.querySelectorAll(".count");

autosize(inputs);

inputs.forEach(input => {
    setInitialValue(input.nextElementSibling);
    input.addEventListener("input", handleInputChange);
});

function setInitialValue(count) {
    count.textContent = count.previousElementSibling.getAttribute("maxlength");
}

function handleInputChange({ target }) {
    const countEl = target.nextElementSibling;
    const maxLength = target.getAttribute("maxlength");
    let textCount = target.value.length;
    countEl.textContent = `${textCount}/${maxLength}`;
}
