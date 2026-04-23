// JKB Landing Page Scripts
document.addEventListener('DOMContentLoaded', function() {
    console.log('JKB Landing Page Loaded');

    // Simple scroll effect for navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.style.boxShadow = '0 2px 10px rgba(0,0,0,0.3)';
        } else {
            navbar.style.boxShadow = 'none';
        }
    });

    // Handle button click
    const btnDaftar = document.querySelector('.btn-daftar');
    if (btnDaftar) {
        btnDaftar.addEventListener('click', function() {
            alert('Terima kasih! Silakan lakukan pendaftaran.');
        });
    }

    // Handle active nav-link
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
