document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.querySelector(".navbar.fixed-top");
    window.addEventListener("scroll", function() {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
        
    });
});
