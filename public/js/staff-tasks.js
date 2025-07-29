
//handle rental verification 



const verifyRentalForms = document.querySelectorAll(".verify-rental-form");
verifyRentalForms.forEach(form => {
form.addEventListener('submit', async (event) => {
    handleVerifyRental(form, event);
})
})

async function handleVerifyRental(form, event) {
    event.preventDefault(); 
    let formData = new FormData(form);

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
                    // todo : error handle
                }
            }
            return;
        } else {
            alert("Successful")
            hidePopupBox()
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}