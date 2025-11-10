// Menu Hamburger
document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    const navOverlay = document.querySelector('.nav-overlay');
    const body = document.body;
    
    // Toggle menu
    function toggleMenu() {
        hamburger?.classList.toggle('active');
        navLinks?.classList.toggle('active');
        navOverlay?.classList.toggle('active');
        body.style.overflow = navLinks?.classList.contains('active') ? 'hidden' : '';
    }
    
    // Ouvrir/fermer au clic sur hamburger
    hamburger?.addEventListener('click', toggleMenu);
    
    // Fermer au clic sur overlay
    navOverlay?.addEventListener('click', toggleMenu);
    
    // Fermer au clic sur un lien
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                toggleMenu();
            }
        });
    });
    
    // Fermer au redimensionnement (si écran devient grand)
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && navLinks?.classList.contains('active')) {
            toggleMenu();
        }
    });
});

console.log('🍔 Menu hamburger chargé');
