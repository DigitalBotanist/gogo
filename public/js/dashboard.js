const dashboardTabOverlays = document.querySelectorAll('.dashboard__tab-overlay'); 
const dashboardProfile = document.querySelector('.dashboard__container')


// add event listener to all the tab buttons
dashboardTabOverlays.forEach((tab, index) => {
    tab.addEventListener('click', (event) => {
        showTab(event, index)
    });
})

// show the current dashboard tab and hide all other tabs 
function showTab(event, index) {
    // change tab color 
    const dashboardTabs = document.querySelectorAll('.dashboard__tab'); 
    dashboardTabs.forEach(tab => {
        tab.style.background = 'var(--secondary)'
    })
    event.target.parentNode.style.background = 'var(--secondary-700)'

    // show selected tab
    const dashbaordContainers = document.querySelectorAll('.dashboard__container'); 
    dashbaordContainers.forEach(container => {
        container.style.display = "none"; 
    })
    dashbaordContainers[index].style.display = 'block'
}