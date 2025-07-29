const adminAddUserBtn = document.getElementById("admin-dashboard-add-user"); 
adminAddUserBtn.addEventListener('click', () => {
    showAddUserBox()
})

function showAddUserBox() {
    const addUserPopup = document.getElementById("admin-add-user");
    addUserPopup.style.display = 'block';
}

const adminUserAddForm = document.getElementById('admin-user-add-box'); 
adminUserAddForm.addEventListener('submit', async (event) => {
    handleAddUser(event)
})

async function handleAddUser(event) {
    event.preventDefault(); 
    let formData = new FormData(adminUserAddForm);

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
                    
                }
            }
            return;
        } else {
            // if response if ok header profile will be shown
            hidePopupBox()
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}


const deletebtns = document.querySelectorAll('.admin_manage_user_delete');
deletebtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        handleUserDelete(btn.dataset.id)
    })
})

async function handleUserDelete(id) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams({user_id : id, action : 'delete-user'}) // Serialize object to URLSearchParams
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

const editBtns = document.querySelectorAll('.admin_manage_user_edit');
editBtns.forEach(btn => {
    btn.addEventListener('click', async () => {
        handleUserEditBtn(btn.dataset.id)
    })
})

async function handleUserEditBtn(id) {
    try {
        const response = await fetch("", {
            method: "POST",
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded' // Change content type
              },
            body: new URLSearchParams({action: 'edit-user-popup', person_id: id}) // Serialize object to URLSearchParams
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
            const editUserPopup = document.getElementById("admin-edit-user");
            editUserPopup.style.display = 'block';
         
            const editUserBox = document.getElementById('admin-user-edit-box');
            editUserBox.innerHTML = await response.text()
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}

const userEditForm = document.getElementById("admin-user-edit-box");
userEditForm.addEventListener('submit', async (event) => {
    handleUserEdit(event);
})

async function handleUserEdit(event) {
    event.preventDefault(); 
    let formData = new FormData(userEditForm);

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
                    // todo 
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