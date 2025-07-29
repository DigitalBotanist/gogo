// popup box close icon click listener
const popupCloseBtns = document.querySelectorAll(".popup-box__close");
popupCloseBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        hidePopupBox()
    });
})

//popup box overlay click listener
const popupBoxOverlays = document.querySelectorAll(".popup-box__overlay"); 
popupBoxOverlays.forEach(overlay => {
    overlay.addEventListener('click', ()=> {
        hidePopupBox()
    })
})

// hide popup box
function hidePopupBox() {
    const popupBoxContainer = document.querySelectorAll(".popup-box-container");
    popupBoxContainer.forEach(box => {
        box.style.display = "none"
    })
}
