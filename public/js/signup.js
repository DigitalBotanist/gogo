const signupPageForm = document.getElementById("signup-page-form")
signupPageForm.addEventListener("submit", async (event) => {
    handleSignup(event);
})

async function handleSignup(event) {
    event.preventDefault()
    let formData = new FormData(signupPageForm);

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
                    headerLoginForm[key].classList.add(
                        "header-login__input--err"
                    );
                }
            }
            return;
        } else {
            window.location.replace('home');
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    } 
}