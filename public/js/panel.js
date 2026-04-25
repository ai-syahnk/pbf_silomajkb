// public/js/panel.js
document.addEventListener('DOMContentLoaded', function() {
    // Add interactive hover effects or logic here
    const navLinks = document.querySelectorAll('.nav-links li');
    
    // Example: Highlight active nav link on click (mostly for frontend demo purposes)
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Note: in a real application with page reloads, 
            // active state is set by backend router.
            // This is just a nice client-side addition.
            if(this.querySelector('a').getAttribute('href') === '#') {
                e.preventDefault();
                navLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            }
        });
    });
    
    // Add hover micro-animations to action buttons
    const buttons = document.querySelectorAll('.action-buttons .btn');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'translateY(-1px)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'translateY(0)';
        });
    });

});
