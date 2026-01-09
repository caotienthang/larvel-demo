document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.cancel-form').forEach((form) => {
    form.addEventListener('submit', (e) => {
      if (!confirm('Are you sure you want to cancel this order?')) {
        e.preventDefault();
      }
    });
  });
});
window.togglePhoneEdit = function togglePhoneEdit() {
  const display = document.getElementById('phone-display');
  const form = document.getElementById('phone-form');

  if (!display || !form) return;

  const isHidden = getComputedStyle(form).display === 'none';
  form.style.display = isHidden ? 'flex' : 'none';
  display.style.display = isHidden ? 'none' : 'inline';
};
