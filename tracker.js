// Function to retrieve and parse a specific cookie by name
function getActivityCookie(name) {
    let nameEQ = name + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let cookieArray = decodedCookie.split(';');

    for(let i = 0; i < cookieArray.length; i++) {
        let c = cookieArray[i].trim();
        if (c.indexOf(nameEQ) == 0) {
            // Parse the JSON string back into a JS object
            return JSON.parse(c.substring(nameEQ.length, c.length));
        }
    }
    return null;
}

// Display the cookie data once the page has loaded
window.onload = function() {
    const activity = getActivityCookie("user_activity");

    if (activity) {
        document.getElementById('lastPage').textContent = activity.page;
        document.getElementById('visitTime').textContent = activity.time;
    } else {
        document.getElementById('lastPage').textContent = "No record found (first visit).";
        document.getElementById('visitTime').textContent = "N/A";
    }
};