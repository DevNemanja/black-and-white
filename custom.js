document.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.counter-number');

  if (counters.length === 0) {
    console.warn('No .counter-number elements found in the DOM.');
    return; // Exit early if no elements found
  }

  const startCounting = (counter) => {
    const target = parseInt(counter.textContent.trim(), 10); // Get the target number
    let current = 0; // Start from 0
    const duration = 2000; // Duration of the animation in ms
    const startTime = performance.now();

    const animate = (timestamp) => {
      const elapsed = timestamp - startTime;
      const progress = Math.min(elapsed / duration, 1); // Progress ratio (0 to 1)
      current = Math.floor(target * progress); // Calculate current value
      counter.textContent = current; // Update the counter element

      if (progress < 1) {
        requestAnimationFrame(animate); // Continue animation
      }
    };

    requestAnimationFrame(animate); // Start animation
  };

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const counter = entry.target;
          startCounting(counter);
          observer.unobserve(counter); // Stop observing once animation starts
        }
      });
    },
    { threshold: 0.5 }
  );

  counters.forEach((counter) => {
    observer.observe(counter);
  });
});
