const itens = document.querySelectorAll('.js-timeline-item');
const dates = document.querySelectorAll('.js-timeline-date');
const btnNext = document.querySelector('.js-timeline-next');
const btnPrev = document.querySelector('.js-timeline-prev');

if (itens.length && dates.length && btnNext && btnPrev) {
  let currentIndex = 0;

  function updateTimeline(newIndex) {
    if (newIndex < 0 || newIndex >= itens.length) return;

    itens.forEach((item, i) => {
      item.classList.toggle('is-visible', i === newIndex);
    });

    dates.forEach((date, i) => {
      date.classList.toggle('active', i === newIndex);
    });

    currentIndex = newIndex;
  }

  btnNext.addEventListener('click', () => updateTimeline(currentIndex + 1));
  btnPrev.addEventListener('click', () => updateTimeline(currentIndex - 1));

  dates.forEach((date, index) => {
    date.addEventListener('click', () => updateTimeline(index));
  });
}
