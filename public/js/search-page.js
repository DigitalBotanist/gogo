
//handle search page filtering 



const transmissionSelect = document.getElementById("transmission-select")
const eventSelect = document.getElementById("event-select")
const priceSelect = document.getElementById("price-select")

transmissionSelect.addEventListener("change", () => {
    const message = {action : 'search-filter', type: 'transmission', value : transmissionSelect.value}
    handlefilterChange(message)
})

eventSelect.addEventListener('change', async () => {
    const message = {action : 'search-filter', type: 'event', value : eventSelect.value}
    handlefilterChange(message)
})

priceSelect.addEventListener('change', async () => {
    const message = {action : 'search-filter', type: 'price', value : priceSelect.value}
    handlefilterChange(message)
})


async function handlefilterChange(message) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams(message) // Serialize object to URLSearchParams
        });

        if (!response.ok) {
            const errors = await response.json();
            // Handle error
            if (errors) {
                // todo: handle errors
            }
            return;
        } else {
            const searchCardContainer = document.querySelector(".search-page__card-container");
            searchCardContainer.innerHTML = await response.text()
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}