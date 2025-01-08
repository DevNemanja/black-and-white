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

document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.swiper', {
    loop: true, // Enable looping
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    slidesPerView: 5, // Display 5 slides per page
    spaceBetween: 10, // Space between slides
    centeredSlides: true, // Align slides to the start
    autoplay: {
      delay: 3000, // Auto-slide every 3 seconds
    },
    breakpoints: {
      // Adjust slides per view for smaller screens
      1280: {
        slidesPerView: 5,
      },
      768: {
        slidesPerView: 3, // Show 3 slides for tablets
      },
      480: {
        slidesPerView: 1, // Show 1 slide for small screens
      },
    },
  });
});

document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.about-us-slider', {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    loop: true, // Enables infinite loop
    autoplay: {
      delay: 3000, // Delay between slides
    },
  });
});

document.addEventListener('DOMContentLoaded', () => {
  // Main Swiper (shows one image at a time)
  const mainSwiper = new Swiper('.single-product-swiper', {
      direction: 'vertical',
      loop: true,
      slidesPerView: 1, // Show one slide at a time
  });

  // Pagination Swiper (shows up to 10 images)
  const paginationSwiper = new Swiper('.single-product-swiper-pagination', {
      direction: 'vertical',
      slidesPerView: 10, // Show up to 10 slides
      spaceBetween: 10, // Optional: spacing between slides
      slideToClickedSlide: true, // Enable clicking slides to control the Swiper
  });

  // Synchronize the two Swipers
  paginationSwiper.on('click', (swiper) => {
      mainSwiper.slideTo(swiper.clickedIndex); // Change main Swiper to match clicked slide in pagination Swiper
  });

  mainSwiper.on('slideChange', () => {
    const activeIndex = mainSwiper.realIndex;

    // Remove custom-active class from all slides in pagination
    paginationSwiper.slides.forEach((slide) => slide.classList.remove('custom-active'));

    // Add custom-active class to the currently active slide in pagination
    paginationSwiper.slides[activeIndex]?.classList.add('custom-active');  });
});

