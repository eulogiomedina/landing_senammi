const navToggle = document.querySelector('[data-nav-toggle]');
const nav = document.querySelector('[data-nav]');
const header = document.querySelector('[data-header]');

if (navToggle && nav) {
    navToggle.addEventListener('click', () => {
        const isOpen = nav.classList.toggle('is-open');
        navToggle.setAttribute('aria-expanded', String(isOpen));
    });

    nav.addEventListener('click', (event) => {
        if (event.target instanceof HTMLAnchorElement) {
            nav.classList.remove('is-open');
            navToggle.setAttribute('aria-expanded', 'false');
        }
    });
}

if (header) {
    window.addEventListener('scroll', () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
    });
}

const navLinks = Array.from(document.querySelectorAll('.site-nav a[href^="#"]'));
const navSections = navLinks
    .map((link) => document.querySelector(link.getAttribute('href')))
    .filter(Boolean);

const setActiveNav = (sectionId) => {
    navLinks.forEach((link) => {
        link.classList.toggle('is-active', link.getAttribute('href') === `#${sectionId}`);
    });
};

if ('IntersectionObserver' in window && navSections.length > 0) {
    const navObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                setActiveNav(entry.target.id);
            }
        });
    }, {
        rootMargin: '-38% 0px -48% 0px',
        threshold: 0,
    });

    navSections.forEach((section) => navObserver.observe(section));
    setActiveNav(navSections[0].id);
}

const revealItems = document.querySelectorAll('[data-reveal]');

if ('IntersectionObserver' in window) {
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.18 });

    revealItems.forEach((item) => revealObserver.observe(item));
} else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
}

document.querySelectorAll('[data-slider]').forEach((slider) => {
    const track = slider.querySelector('[data-slider-track]');
    const previous = slider.querySelector('[data-slider-prev]');
    const next = slider.querySelector('[data-slider-next]');
    const autoplayDelay = Number(slider.getAttribute('data-slider-autoplay') || 0);
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let autoplayTimer = null;

    if (!track || !previous || !next) {
        return;
    }

    const scrollByCard = (direction) => {
        const firstCard = track.firstElementChild;
        const cardWidth = firstCard ? firstCard.getBoundingClientRect().width : 320;
        track.scrollBy({
            left: direction * (cardWidth + 18),
            behavior: 'smooth',
        });
    };

    const scrollNext = () => {
        const isAtEnd = track.scrollLeft + track.clientWidth >= track.scrollWidth - 4;

        if (isAtEnd) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
            return;
        }

        scrollByCard(1);
    };

    previous.addEventListener('click', () => scrollByCard(-1));
    next.addEventListener('click', scrollNext);

    if (autoplayDelay > 0 && !reduceMotion) {
        const startAutoplay = () => {
            if (autoplayTimer) {
                return;
            }

            autoplayTimer = window.setInterval(scrollNext, autoplayDelay);
        };
        const stopAutoplay = () => {
            window.clearInterval(autoplayTimer);
            autoplayTimer = null;
        };

        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
        slider.addEventListener('focusin', stopAutoplay);
        slider.addEventListener('focusout', startAutoplay);
        startAutoplay();
    }
});
