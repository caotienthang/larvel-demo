/**
 * Netflix-style Cancel Order Modal
 * Auto-init on DOMContentLoaded
 * Just import this file, no function call needed.
 */

(function () {
  function init() {
    const overlay = document.getElementById('cancelOverlay');
    if (!overlay) return; // Page không có modal thì bỏ qua

    const form = overlay.querySelector('#cancelForm');
    const confirmBtn = overlay.querySelector('#confirmCancelBtn');
    const orderIdInput = overlay.querySelector('#cancelOrderId');
    const closeBtns = overlay.querySelectorAll('[data-close-cancel]');

    let lastTrigger = null;

    function openModal(action, orderId) {
      if (!form) return;

      form.action = action;
      if (orderIdInput) orderIdInput.value = orderId || '';

      if (confirmBtn) {
        confirmBtn.disabled = false;
        confirmBtn.textContent = 'Yes, Cancel';
      }

      overlay.classList.add('is-open');
      overlay.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';

      confirmBtn?.focus();
    }

    function closeModal() {
      overlay.classList.remove('is-open');
      overlay.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';

      if (lastTrigger) {
        lastTrigger.focus();
        lastTrigger = null;
      }
    }

    // ===== Open modal (event delegation) =====
    document.addEventListener('click', (e) => {
      const btn = e.target.closest('[data-open-cancel]');
      if (!btn) return;

      lastTrigger = btn;

      openModal(
        btn.getAttribute('data-cancel-action'),
        btn.getAttribute('data-order-id')
      );
    });

    // ===== Close buttons =====
    closeBtns.forEach(btn => {
      btn.addEventListener('click', closeModal);
    });

    // ===== Click overlay to close =====
    overlay.addEventListener('click', (e) => {
      if (e.target === overlay) closeModal();
    });

    // ===== ESC to close =====
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && overlay.classList.contains('is-open')) {
        closeModal();
      }
    });

    // ===== Submit handling =====
    if (form) {
      form.addEventListener('submit', () => {
        if (confirmBtn) {
          confirmBtn.disabled = true;
          confirmBtn.textContent = 'Canceling…';
        }

        closeBtns.forEach(b => (b.disabled = true));
      });
    }
  }

  // Auto init
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
