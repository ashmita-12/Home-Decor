document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function (event) {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let subject = document.getElementById("subject").value.trim();
        let message = document.getElementById("message").value.trim();

        if (name === "" || email === "" || subject === "" || message === "") {
            alert("All fields are required!");
            event.preventDefault();
        } else if (!validateEmail(email)) {
            alert("Please enter a valid email address!");
            event.preventDefault();
        }
    });

    function validateEmail(email) {
        let re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
});

/*----------for toggling the hamburger menu----------*/


document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navCenter = document.querySelector('.nav-center');
    
    console.log("Elements loaded:", { hamburger, navCenter }); // Should show elements
    
    hamburger.addEventListener('click', function() {
        console.log("Button clicked!"); // Should appear when clicking
        
        navCenter.classList.toggle('active');
        this.classList.toggle('active');
        
        console.log("Current classes:", navCenter.className); // Should show 'active'
    });
});