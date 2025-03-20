let display = document.getElementById("calculation");
let currentInput = "";

document.querySelectorAll(".buttons button").forEach(button => {
    button.addEventListener("click", () => {
        let value = button.textContent;
        
        if (value === "C") {
            currentInput = "";
        } else if (value === "⌫") {
            currentInput = currentInput.slice(0, -1);
        } else if (value === "=") {
            try {
                currentInput = eval(currentInput);
            } catch {
                currentInput = "Error";
            }
        } else if (value === "√") {
            currentInput = Math.sqrt(currentInput);
        } else if (value === "x²") {
            currentInput = Math.pow(currentInput, 2);
        } else {
            currentInput += value;
        }

        display.value = currentInput;
    });
});
