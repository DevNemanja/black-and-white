document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".counter-number");

  if (counters.length === 0) {
    console.warn("No .counter-number elements found in the DOM.");
    return; // Exit early if no elements found
  }

  const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3); // Easing function

  const startCounting = (counter) => {
    const target = parseInt(counter.textContent.trim(), 10); // Get the target number
    let current = 0; // Start from 0
    const duration = 2000; // Duration of the animation in ms
    const startTime = performance.now();

    const animate = (timestamp) => {
      const elapsed = timestamp - startTime;
      const progress = Math.min(elapsed / duration, 1); // Progress ratio (0 to 1)
      const easedProgress = easeOutCubic(progress); // Apply easing function
      current = Math.floor(target * easedProgress); // Calculate current value
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

document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".embroidery-swiper", {
    loop: true, // Enable looping
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    spaceBetween: 10, // Space between slides
    centeredSlides: true, // Align slides to the start
    autoplay: {
      delay: 3000, // Auto-slide every 3 seconds
    },
    breakpoints: {
      1280: {
        slidesPerView: 5,
      },
      768: {
        slidesPerView: 3, // Show 3 slides for tablets
      },
    },
  });
});

document.addEventListener("DOMContentLoaded", () => {
  new Swiper(".about-us-slider", {
    slidesPerView: 1,
    spaceBetween: 10,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    loop: true, // Enables infinite loop
    autoplay: {
      delay: 7000, // Delay between slides
    },
    speed: 1000,
  });
});

document.addEventListener("DOMContentLoaded", () => {
  var hamburger = document.querySelector(".hamburger");
  var nav = document.querySelector(".navigation");

  hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("is-active");
    nav.classList.toggle("is-active");
  });
});

// Selektuj sve slike
const images = document.querySelectorAll(
  ".single-product-main-image .swiper-slide img"
);

images.forEach((img) => {
  img.addEventListener("mousemove", (e) => {
    const rect = img.getBoundingClientRect();
    const x = e.clientX - rect.left; // pozicija miša u slici
    const y = e.clientY - rect.top;

    const originX = (x / rect.width) * 100; // u procentima
    const originY = (y / rect.height) * 100;

    img.style.transformOrigin = `${originX}% ${originY}%`;
    img.style.transform = "scale(1.2)";
  });

  img.addEventListener("mouseleave", () => {
    img.style.transformOrigin = "center center";
    img.style.transform = "scale(1)";
  });
});

document.addEventListener("DOMContentLoaded", () => {
  // const thumbSwiper = new Swiper(".single-product-swiper-pagination", {
  //   spaceBetween: 10,
  //   slidesPerView: 3,
  //   breakpoints: {
  //     768: {
  //       slidesPerView: 5,
  //     },
  //   },
  // });
  // const mainSwiper = new Swiper(".single-product-swiper", {
  //   spaceBetween: 10,
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev",
  //   },
  //   thumbs: {
  //     swiper: thumbSwiper,
  //   },
  // });
});
