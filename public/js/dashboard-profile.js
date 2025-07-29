const profileEditBtn = document.getElementById("profile-edit-btn");
profileEditBtn.addEventListener("click", showDashboardProfileEdit);

const changePasswordBtn = document.getElementById("password-change-btn")
changePasswordBtn.addEventListener('click', showChangePassword)

function showDashboardProfileEdit() {
    const dashboardProfileEditPopup = document.getElementById("dashboard-profile-edit-popup");
    dashboardProfileEditPopup.style.display = 'block';
}

function showChangePassword() {
    const dashboardProfileChangePassword = document.getElementById("dashboard-profile-password-popup")
    dashboardProfileChangePassword.style.display = 'block';
}

const dashboardProfileChangePasswordForm = document.getElementById("profile-details-password-box")
dashboardProfileChangePasswordForm.addEventListener('submit', async (event) => {
    handleChangePassword(event);
})

const dashboardProfileEditForm = document.getElementById("profile-details-edit-box");
dashboardProfileEditForm.addEventListener('submit', async (event) => {
    handleProfileEdit(event);
})

async function handleProfileEdit(event) {
    event.preventDefault(); 
    let formData = new FormData(dashboardProfileEditForm);

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
                    dashboardProfileEditForm[key].classList.add(
                        "header-login__input--err"
                    );
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

async function handleChangePassword(event) {
    event.preventDefault(); 
    let formData = new FormData(dashboardProfileChangePasswordForm);

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
                    dashboardProfileEditForm[key].classList.add(
                        "header-login__input--err"
                    );
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