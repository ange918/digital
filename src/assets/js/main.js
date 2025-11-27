document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (menuToggle && navMenu) {
    menuToggle.addEventListener('click', function() {
      navMenu.classList.toggle('active');
      menuToggle.classList.toggle('active');
    });

    document.querySelectorAll('.nav-menu a').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('active');
        menuToggle.classList.remove('active');
      });
    });
  }

  const header = document.querySelector('header');
  if (header) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });
  }

  const fadeElements = document.querySelectorAll('.fade-in');
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const fadeObserver = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, observerOptions);

  fadeElements.forEach(element => {
    fadeObserver.observe(element);
  });

  const filterBtns = document.querySelectorAll('.filter-btn');
  const portfolioItems = document.querySelectorAll('.portfolio-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      const filter = this.getAttribute('data-filter');

      portfolioItems.forEach(item => {
        if (filter === 'all' || item.getAttribute('data-category') === filter) {
          item.style.display = 'block';
          setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'scale(1)';
          }, 10);
        } else {
          item.style.opacity = '0';
          item.style.transform = 'scale(0.8)';
          setTimeout(() => {
            item.style.display = 'none';
          }, 300);
        }
      });
    });
  });

  const forms = document.querySelectorAll('form[data-form-type]');
  forms.forEach(form => {
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formType = this.getAttribute('data-form-type');
      const formData = new FormData(this);
      const data = Object.fromEntries(formData);
      
      console.log('Form submitted:', formType, data);
      
      const confirmationMessage = document.querySelector('.confirmation-message');
      if (confirmationMessage) {
        confirmationMessage.classList.add('show');
        this.style.display = 'none';
        
        window.scrollTo({
          top: confirmationMessage.offsetTop - 100,
          behavior: 'smooth'
        });
      } else {
        alert('Merci pour votre message ! Nous vous contacterons bientôt.');
      }
      
      this.reset();
    });
  });

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const href = this.getAttribute('href');
      if (href !== '#') {
        e.preventDefault();
        const target = document.querySelector(href);
        if (target) {
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    });
  });

  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-menu a').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });

  initQuoteCalculators();
  initAudioPlayers();
});

function initQuoteCalculators() {
  const calculators = document.querySelectorAll('.quote-calculator');
  
  calculators.forEach(calculator => {
    const selects = calculator.querySelectorAll('select, input[type="range"]');
    const totalDisplay = calculator.querySelector('.total');
    
    if (!selects.length || !totalDisplay) return;
    
    function calculateTotal() {
      let total = 0;
      const calculatorType = calculator.getAttribute('data-calculator');
      
      selects.forEach(select => {
        const value = parseInt(select.value) || 0;
        total += value;
      });
      
      if (calculatorType === 'web') {
        const basePrice = 394000;
        total = basePrice + total;
      } else if (calculatorType === 'music') {
        const basePrice = 15000;
        total = basePrice + total;
      } else if (calculatorType === 'logo') {
        const basePrice = 6560;
        total = basePrice + total;
      }
      
      totalDisplay.textContent = total.toLocaleString('fr-FR') + ' XOF';
    }
    
    selects.forEach(select => {
      select.addEventListener('change', calculateTotal);
      select.addEventListener('input', calculateTotal);
    });
    
    calculateTotal();
  });
}

function initAudioPlayers() {
  const audioElements = document.querySelectorAll('audio');
  
  audioElements.forEach(audio => {
    audio.addEventListener('play', function() {
      audioElements.forEach(other => {
        if (other !== audio) {
          other.pause();
        }
      });
    });
  });
}

function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(() => {
    alert('Copié dans le presse-papiers !');
  });
}
