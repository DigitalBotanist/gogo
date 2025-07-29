// calculate total price when dates change



const vehiclePickupDate = document.getElementById("vehicle__pickup-date")
vehiclePickupDate.addEventListener('change', (event) => {
    handleDateChange()
})

const vehicleReturnDate = document.getElementById("vehicle__return-date")
vehicleReturnDate.addEventListener('change', (event) => {
    console.log(event.target.value)
    handleDateChange()
})

function handleDateChange() {
    if (!(vehiclePickupDate.value && vehicleReturnDate.value)) {
        return
    } 
    const pickupDate = new Date(vehiclePickupDate.value)
    const returnDate = new Date(vehicleReturnDate.value) 

    // Calculate the difference in milliseconds between the two dates
    const timeDifference = returnDate.getTime() - pickupDate.getTime();

    // Convert milliseconds to days
    const daysDifference = timeDifference / (1000 * 3600 * 24);

    changeTotal(daysDifference) 

}

function changeTotal(days) {
    const pricePerDay = document.getElementById('vehicle__price-per-day').textContent;
    const totalPrice = document.getElementById('vehicle__total-price')

    totalPrice.textContent = pricePerDay * days;
}