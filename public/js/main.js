'use strict';

(function() {
  // Set today's date
  const todayEl = document.getElementById('todayDate');
  if (todayEl) {
    const now = new Date();
    const opts = { year: 'numeric', month: 'long', day: 'numeric' };
    todayEl.textContent = now.toLocaleDateString('en-US', opts);
  }

  // Mobile menu toggle (desktop hamburger -> offcanvas)
  const menuToggle = document.getElementById('menuToggle');
  const mobileMenuToggle = document.getElementById('mobileMenuToggle');
  const offcanvas = document.getElementById('offcanvas');
  const offcanvasClose = document.getElementById('offcanvasClose');
  const offcanvasOverlay = document.getElementById('offcanvasOverlay');

  function openOffcanvas() {
    if (!offcanvas) return;
    offcanvas.classList.add('is-open');
    offcanvas.setAttribute('aria-hidden', 'false');
    if (offcanvasOverlay) offcanvasOverlay.classList.add('is-visible');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
    if (mobileMenuToggle) mobileMenuToggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }

  function closeOffcanvas() {
    if (!offcanvas) return;
    offcanvas.classList.remove('is-open');
    offcanvas.setAttribute('aria-hidden', 'true');
    if (offcanvasOverlay) offcanvasOverlay.classList.remove('is-visible');
    if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
    if (mobileMenuToggle) mobileMenuToggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  if (menuToggle) menuToggle.addEventListener('click', openOffcanvas);
  if (mobileMenuToggle) mobileMenuToggle.addEventListener('click', openOffcanvas);
  if (offcanvasClose) offcanvasClose.addEventListener('click', closeOffcanvas);
  if (offcanvasOverlay) offcanvasOverlay.addEventListener('click', closeOffcanvas);

  // Close on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeOffcanvas();
  });

})();
