const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(toggle => {
  toggle.addEventListener('click', () => {
    const span = toggle.querySelector('span'); // Get the span element inside the button
    toggle.parentNode.classList.toggle('active');

    // Check if the button is now active and update the span content accordingly
    if (toggle.parentNode.classList.contains('active')) {
      span.innerHTML = '&#8722;'; // Display minus sign "&#8722;"
    } else {
      span.innerHTML = '&#43;'; // Display plus sign "&#43;" when toggled off
    }
  });
});