// ========== HAMBURGER MENU TOGGLE ==========
const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.nav-menu');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
        hamburger.classList.toggle('active');
        
        // Animate hamburger
        const spans = hamburger.querySelectorAll('span');
        spans.forEach((span, index) => {
            if (navMenu.classList.contains('active')) {
                if (index === 0) span.style.transform = 'rotate(45deg) translate(10px, 10px)';
                if (index === 1) span.style.opacity = '0';
                if (index === 2) span.style.transform = 'rotate(-45deg) translate(7px, -7px)';
            } else {
                span.style.transform = '';
                span.style.opacity = '1';
            }
        });
    });
}

// ========== NAVBAR LINK ACTIVE STATE ==========
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        navLinks.forEach(l => l.classList.remove('active'));
        link.classList.add('active');
        
        if (navMenu) {
            navMenu.classList.remove('active');
            if (hamburger) {
                hamburger.classList.remove('active');
                const spans = hamburger.querySelectorAll('span');
                spans.forEach(span => {
                    span.style.transform = '';
                    span.style.opacity = '1';
                });
            }
        }
    });
});

// ========== SMOOTH SCROLL ACTIVE LINK ==========
window.addEventListener('scroll', () => {
    let current = '';
    
    const sections = document.querySelectorAll('section');
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;
        
        if (scrollY >= (sectionTop - 200)) {
            current = section.getAttribute('id');
        }
    });

    navLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
            link.classList.add('active');
        }
    });
});

// ========== INTERACTIVE CONTACT FORM ==========
const kontakForm = document.getElementById('kontakForm');

if (kontakForm) {
    kontakForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const inputs = this.querySelectorAll('input, textarea');
        let isValid = true;
        
        inputs.forEach(input => {
            if (input.value.trim() === '') {
                isValid = false;
                input.style.borderColor = '#e74c3c';
                showNotification(`${input.previousElementSibling.textContent} harus diisi!`, 'error');
            } else {
                input.style.borderColor = '#ddd';
            }
        });
        
        if (isValid) {
            // Show loading state
            const btn = this.querySelector('.btn');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner" style="animation: rotate 1s linear infinite;"></i> Mengirim...';
            btn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-check"></i> Pesan Terkirim!';
                btn.style.backgroundColor = '#27ae60';
                
                showNotification('Pesan Anda berhasil dikirim! Kami akan segera merespons.', 'success');
                
                setTimeout(() => {
                    this.reset();
                    btn.innerHTML = originalText;
                    btn.style.backgroundColor = '';
                    btn.disabled = false;
                }, 2000);
            }, 1500);
        }
    });
}

// ========== NOTIFICATION SYSTEM ==========
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        padding: 15px 20px;
        border-radius: 5px;
        font-weight: 500;
        z-index: 9999;
        animation: slideInDown 0.5s ease;
        background-color: ${type === 'success' ? '#d4edda' : '#f8d7da'};
        color: ${type === 'success' ? '#155724' : '#721c24'};
        border: 1px solid ${type === 'success' ? '#c3e6cb' : '#f5c6cb'};
        max-width: 400px;
    `;
    
    notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        ${message}
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideInDown 0.5s ease reverse';
        setTimeout(() => notification.remove(), 500);
    }, 3000);
}

// ========== FORM INPUT REAL-TIME VALIDATION ==========
const formInputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], textarea, select');

formInputs.forEach(input => {
    input.addEventListener('focus', function() {
        this.style.borderColor = '#ff6b35';
    });
    
    input.addEventListener('blur', function() {
        validateInput(this);
    });
    
    input.addEventListener('input', function() {
        validateInput(this);
    });
});

function validateInput(input) {
    let isValid = true;
    
    if (input.required && input.value.trim() === '') {
        isValid = false;
    } else if (input.type === 'email' && input.value.trim() !== '') {
        isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value);
    } else if (input.type === 'tel' && input.value.trim() !== '') {
        isValid = /^[0-9\-\+\(\)\s]{7,}$/.test(input.value);
    }
    
    input.style.borderColor = isValid ? '#ddd' : '#e74c3c';
    return isValid;
}

// ========== CARD HOVER EFFECTS ==========
const cards = document.querySelectorAll('.layanan-card, .stat-item');

cards.forEach(card => {
    card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-10px) scale(1.02)';
    });
    
    card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0) scale(1)';
    });
});

// ========== INTERSECTION OBSERVER FOR ANIMATIONS ==========
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -100px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
            
            // Add stagger effect for cards
            if (entry.target.classList.contains('layanan-card')) {
                const cards = document.querySelectorAll('.layanan-card');
                cards.forEach((card, cardIndex) => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.animation = `fadeInUp 0.8s ease forwards`;
                    card.style.animationDelay = `${cardIndex * 0.1}s`;
                });
            }
        }
    });
}, observerOptions);

// Observe elements
const animatedElements = document.querySelectorAll('.layanan-card, .stat-item, .info-item, .form-group');
animatedElements.forEach(element => {
    observer.observe(element);
});

// ========== SCROLL PROGRESS BAR ==========
function createProgressBar() {
    const progressBar = document.createElement('div');
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff6b35 0%, #f7931e 100%);
        z-index: 999;
        transition: width 0.1s ease;
    `;
    document.body.appendChild(progressBar);
    
    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    });
}

createProgressBar();

// ========== COUNTER ANIMATION ==========
function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target + '+';
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current) + '+';
        }
    }, 16);
}

// ========== SERVICE CARD INTERACTIVE ==========
document.querySelectorAll('.layanan-card').forEach(card => {
    card.addEventListener('click', function() {
        const service = this.getAttribute('data-service');
        const serviceName = this.querySelector('h3').textContent;
        
        showNotification(`Anda tertarik dengan layanan: ${serviceName}`, 'success');
        
        // Redirect to laporan page with service parameter
        setTimeout(() => {
            window.location.href = `laporan.php?service=${service}`;
        }, 1500);
    });
});

// ========== MOBILE RESPONSIVE MENU CLOSE ==========
document.addEventListener('click', (e) => {
    const navbar = document.querySelector('.navbar');
    if (navbar && !e.target.closest('.navbar')) {
        if (navMenu) {
            navMenu.classList.remove('active');
            if (hamburger) {
                hamburger.classList.remove('active');
                const spans = hamburger.querySelectorAll('span');
                spans.forEach(span => {
                    span.style.transform = '';
                    span.style.opacity = '1';
                });
            }
        }
    }
});

// ========== PREVENT DEFAULT ON ANCHOR LINKS ==========
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const href = this.getAttribute('href');
        if (href === '#') {
            e.preventDefault();
        }
    });
});

// ========== LOADING ANIMATION ==========
window.addEventListener('load', () => {
    document.body.style.opacity = '1';
});

// ========== CONSOLE GREETING ==========
console.log('%c🛠️ Layanan Kerusakan Fasilitas', 'color: #1e3a5f; font-size: 20px; font-weight: bold;');
console.log('%c✨ Website interaktif untuk perbaikan fasilitas Anda', 'color: #ff6b35; font-size: 12px;');
console.log('%c📱 Responsive design untuk semua perangkat', 'color: #27ae60; font-size: 12px;');
console.log('%c💡 Teknologi modern untuk pengalaman terbaik', 'color: #f39c12; font-size: 12px;');
