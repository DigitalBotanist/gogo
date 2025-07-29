//handle drive accept
const driverTaskAcceptBtns = document.querySelectorAll('.driver-tasks__accept');
driverTaskAcceptBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        handleDriveAccept(btn.dataset.id);
    })
})

async function handleDriveAccept(id) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams({rental_id : id, action : 'drive-accept'}) // Serialize object to URLSearchParams
        });

        if (!response.ok) {
            const errors = await response.json();
            // Handle error
            if (errors) {
                // todo: handle errors
            }
            return;
        } else {
            alert("Successful")
            hidePopupBox()
            window.location.replace('dashboard')
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}


//handle drive reject 
const driverTaskRejectBtns = document.querySelectorAll('.driver-tasks__reject');
driverTaskRejectBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        handleDriveReject(btn.dataset.id);
    })
})

async function handleDriveReject(id) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams({rental_id : id, action : 'drive-reject'}) // Serialize object to URLSearchParams
        });

        if (!response.ok) {
            const errors = await response.json();
            // Handle error
            if (errors) {
                // todo: handle errors
            }
            return;
        } else {
            alert("Successful")
            hidePopupBox()
            window.location.replace('dashboard')
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}