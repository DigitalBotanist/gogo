// add car button listener
const carAddBtn = document.querySelector('.manage_car_addbutton')
carAddBtn.addEventListener('click', showAddCarPopup)

// show popup to add a new car  
function showAddCarPopup() {
    const dashboardProfileEditPopup = document.getElementById("admin-add-car");
    dashboardProfileEditPopup.style.display = 'block';
}

// check if the add car form is submitted  
const addCarForm = document.getElementById("admin-car-add-box");
addCarForm.addEventListener('submit', async (event) => {
    handleAddCar(event);
})

// handle when the add car form is submitted
async function handleAddCar(event) {
    event.preventDefault(); 
    let formData = new FormData(addCarForm);
    
    // try requesting server
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

// trigger when the car edit button is clicked 
const carEditBtns = document.querySelectorAll('.manage_car_edit_btn');
carEditBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        handleEditCarBtn(btn.dataset.id)
    })
})

// handle car edit form and send request to server with car details 
async function handleEditCarBtn(id) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams({action: 'edit-car-popup', car_id: id}) // Serialize object to URLSearchParams
        });

        if (!response.ok) {
            const errors = await response.json();
            // Handle error
            if (errors) {
                // todo: handle errors
            }
            return;
        } else {
            // show popup for edit 
            const editUserPopup = document.getElementById("admin-edit-car");
            editUserPopup.style.display = 'block';
         
            const editUserBox = document.getElementById('admin-car-edit-box');
            editUserBox.innerHTML = await response.text()
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}

// check if the add car form is submitted  
const editCarForm = document.getElementById("admin-car-edit-box");
editCarForm.addEventListener('submit', async (event) => {
    handleEditCar(event);
})

// handle when the add car form is submitted
async function handleEditCar(event) {
    event.preventDefault(); 
    let formData = new FormData(editCarForm);
    
    // try requesting server
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