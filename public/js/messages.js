// handle new message
const sendNewMsgBtn = document.querySelector('.messages-page__send-message'); 
sendNewMsgBtn.addEventListener('click', showNewMsgBox);


function showNewMsgBox() {
    const dashboardProfileEditPopup = document.getElementById("send-new-message-popup");
    dashboardProfileEditPopup.style.display = 'block';
}

const newMsgForm = document.getElementById("new-message-box");
newMsgForm.addEventListener('submit', async (event) => {
    handleNewMsg(event);
})

async function handleNewMsg(event) {
    event.preventDefault(); 
    let formData = new FormData(newMsgForm);

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
                    // todo: handle errors
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


// handle delete 
const deleteBtns = document.querySelectorAll(".messages__card-delete"); 
deleteBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        handleMsgDelete(btn.dataset.id)
    })
})

async function handleMsgDelete(id) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams({message_id : id, action : 'delete-message'}) // Serialize object to URLSearchParams
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
            window.location.replace('messages')
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}