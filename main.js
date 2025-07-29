
  function scrollTestimonials(direction) {
    const container = document.getElementById('testimonial-scroll');
    const scrollAmount = 350;
    container.scrollBy({
      left: direction === 'left' ? -scrollAmount : scrollAmount,
      behavior: 'smooth'
    });
  }
