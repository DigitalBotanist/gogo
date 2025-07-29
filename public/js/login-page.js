const loginPageForm = document.getElementById('login-page__form');
console.log(loginPageForm)
if (loginPageForm)
    loginPageForm.addEventListener("submit", async (event) => {
        handleLogin(event);
    });


async function handleLogin(event) {
    event.preventDefault();
    
    let formData = new FormData(loginPageForm);

    // sending login info to the server
    try {
        const response = await fetch("", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            const errors = await response.json();
            // Handle error
            if (errors) {
                for (let key in errors) {
                    loginPageForm[key].classList.add(
                        "login-page__input--err"
                    );
                }
            }
            return;
        } else {
            window.location.replace("home")
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}


