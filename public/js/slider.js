document.addEventListener('DOMContentLoaded', function() {
  let index = 0;
  const slides = document.querySelectorAll('.slider img');
  const totalSlides = slides.length;
  const nextButton = document.querySelector('.next');
  const prevButton = document.querySelector('.prev');

  function showSlide(i) {
      slides.forEach(slide => slide.style.display = 'none');
      slides[i].style.display = 'block';
  }

  nextButton.addEventListener('click', () => {
      index = (index + 1) % totalSlides;
      showSlide(index);
  });

  prevButton.addEventListener('click', () => {
      index = (index - 1 + totalSlides) % totalSlides;
      showSlide(index);
  });

  showSlide(index);
});
