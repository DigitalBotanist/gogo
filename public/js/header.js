//header profile logo click listener
const headerProfileLogo = document.getElementById("header__profile-logo");
headerProfileLogo.addEventListener("click", showHeaderLogin);

//header login overlay click listener
const headerLoginOverlay = document.querySelector(".header-login__overlay");
headerLoginOverlay.addEventListener("click", hideHeaderLogin);

// show the header login box
function showHeaderLogin() {
    const headerLogin = document.querySelector(".header-login");
    headerLogin.style.display = "block";
}

// hide the header login box when the overlay  is being clicked
function hideHeaderLogin() {
    const headerLogin = document.querySelector(".header-login");
    headerLogin.style.display = "none";
}

// login form submit listener
const headerLoginForm = document.querySelector(".header-login__form");
if (headerLoginForm)
    headerLoginForm.addEventListener("submit", async (event) => {
        handleHeaderLogin(event);
    });

// const headerProfileLogout = document.querySelector('.header__profile-logout');
// headerProfileLogout.addEventListener("click", )

// send a request to the server with login info and handle a reponse from the server
async function handleHeaderLogin(event) {
    event.preventDefault();

    let formData = new FormData(headerLoginForm);

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
            // if response if ok header profile will be shown
            showHeaderProfile();
            hideHeaderLoginForm();
        }
    } catch (error) {
        // Handle network errors or other exceptions
        console.error("Error:", error);
    }
}

// async function headerLogout() {
//     const data = {'action' : 'logout'};

//     try {
//         const response = await fetch("", {
//             method: "POST",
//             body: data,
//         });
//     }
// }

// hide the header login box
function hideHeaderLoginForm() {
    headerLoginForm.style.display = "none";
}

// show the header profile box
function showHeaderProfile() {
    const headerProfile = document.querySelector(".header__profile");
    headerProfile.style.display = "flex";
}
