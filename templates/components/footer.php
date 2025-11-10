<footer>
    <div class="container">
        <div class="footer-content">
            <!-- About Section -->
            <div class="footer-section footer-about">
                <div class="footer-logo">edemClaudeK<span class="footer-logo-span">.</span></div>
                <p>
                    Développeur web passionné créant des expériences digitales modernes et performantes. 
                    Transformons ensemble vos idées en réalité.
                </p>
                <div class="footer-social">
                    <a href="https://github.com/edemclaude" target="_blank" class="social-icon" title="GitHub" aria-label="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="social-icon" title="LinkedIn" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://twitter.com" target="_blank" class="social-icon" title="Twitter" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://dribbble.com" target="_blank" class="social-icon" title="Dribbble" aria-label="Dribbble">
                        <i class="fab fa-dribbble"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div class="footer-section">
                <h3>Liens rapides</h3>
                <ul class="footer-links">
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/about">À propos</a></li>
                    <li><a href="/services">Services</a></li>
                    <li><a href="/portfolio">Portfolio</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div class="footer-section">
                <h3>Services</h3>
                <ul class="footer-links">
                    <li><a href="/services#web">Développement Web</a></li>
                    <li><a href="/services#design">UI/UX Design</a></li>
                    <li><a href="/services#mobile">Applications Mobiles</a></li>
                    <li><a href="/services#seo">Optimisation SEO</a></li>
                    <li><a href="/services#maintenance">Maintenance</a></li>
                </ul>
            </div>
            
            <!-- Newsletter & Contact -->
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Restez informé de mes derniers projets et articles</p>
                <form class="newsletter-form" id="newsletterForm">
                    <input 
                        type="email" 
                        name="email" 
                        placeholder="Votre email" 
                        class="newsletter-input"
                        required
                    >
                    <button type="submit" class="newsletter-btn">S'abonner</button>
                    <div id="newsletterMessage" class="newsletter-message"></div>
                </form>
                
                <div class="footer-contact" style="margin-top: var(--spacing-md);">
                    <a href="mailto:edemclaudek@gmail.com" class="footer-contact-item">
                        <span class="icon"><i class="fas fa-envelope"></i></span>
                        <span>edemclaudek@gmail.com</span>
                    </a>
                    <a href="tel:+221778433293" class="footer-contact-item">
                        <span class="icon"><i class="fas fa-phone"></i></span>
                        <span>+221 77 84 33 293</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> Edem Claude KUMAZA. Tous droits réservés.</p>
            <ul class="footer-bottom-links">
                <li><a href="#privacy">Confidentialité</a></li>
                <li><a href="#terms">Conditions</a></li>
                <li><a href="#sitemap">Plan du site</a></li>
            </ul>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top" id="backToTop" aria-label="Retour en haut">
    <i class="fas fa-arrow-up"></i>
</button>

<script>
// Newsletter form
document.getElementById('newsletterForm')?.addEventListener('submit', async (e) => {
    e.preventDefault();
    const form = e.target;
    const email = form.email.value;
    const message = document.getElementById('newsletterMessage');
    const btn = form.querySelector('button');
    
    btn.disabled = true;
    btn.textContent = 'Envoi...';
    
    // Simulation - remplacer par votre logique
    setTimeout(() => {
        message.className = 'newsletter-message success';
        message.textContent = 'Merci ! Vous êtes inscrit à la newsletter.';
        form.reset();
        btn.disabled = false;
        btn.textContent = 'S\'abonner';
        
        setTimeout(() => {
            message.className = 'newsletter-message';
        }, 5000);
    }, 1000);
});

// Back to top button
const backToTop = document.getElementById('backToTop');
window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
        backToTop?.classList.add('visible');
    } else {
        backToTop?.classList.remove('visible');
    }
});

backToTop?.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
</script>
