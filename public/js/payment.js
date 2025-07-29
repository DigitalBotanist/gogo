const paymentCardForm = document.getElementById("payment-card-details");
if (paymentCardForm)
    paymentCardForm.addEventListener("submit", async (event) => {
        verifyPayment(event);
    });

// const headerProfileLogout = document.querySelector('.header__profile-logout');
// headerProfileLogout.addEventListener("click", )

// send a request to the server with login info and handle a reponse from the server
async function verifyPayment(event) {
    event.preventDefault();

    let formData = new FormData(paymentCardForm);

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
                    paymentCardForm[key].classList.add(
                        "header-login__input--err"
                    );
                }
            }
            return;
        } else {
            // if response if ok header profile will be shown
            window.location.replace('dashboard');
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}