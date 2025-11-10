// Formulaire de contact
document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');
    const formMessage = document.getElementById('formMessage');
    const submitBtn = contactForm?.querySelector('button[type="submit"]');
    
    if (!contactForm) return;
    
    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Désactiver le bouton
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Envoi en cours...';
        }
        
        // Récupérer les données
        const formData = new FormData(contactForm);
        
        try {
            const response = await fetch('/contact/submit', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            // Afficher le message
            if (formMessage) {
                formMessage.className = 'form-message';
                
                if (data.success) {
                    formMessage.classList.add('success');
                    formMessage.textContent = data.message;
                    contactForm.reset();
                } else {
                    formMessage.classList.add('error');
                    formMessage.textContent = data.errors ? data.errors.join(', ') : 'Une erreur est survenue';
                }
            }
        } catch (error) {
            console.error('Erreur:', error);
            if (formMessage) {
                formMessage.className = 'form-message error';
                formMessage.textContent = 'Erreur lors de l\'envoi du message. Veuillez réessayer.';
            }
        } finally {
            // Réactiver le bouton
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Envoyer le message';
            }
        }
    });
    
    // Validation en temps réel
    const inputs = contactForm.querySelectorAll('input, textarea');
    inputs.forEach(input => {
        input.addEventListener('blur', () => {
            validateField(input);
        });
    });
    
    function validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        
        if (field.hasAttribute('required') && !value) {
            isValid = false;
        }
        
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            isValid = emailRegex.test(value);
        }
        
        if (isValid) {
            field.style.borderColor = 'var(--accent)';
        } else {
            field.style.borderColor = '#ef4444';
        }
        
        return isValid;
    }
});

console.log('📧 Formulaire de contact chargé');
