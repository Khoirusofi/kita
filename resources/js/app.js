import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/*=============== SHOW SCROLL UP ===============*/
function scrollUp() {
    const scrollUp = document.getElementById("scroll-up");
    if (window.scrollY >= 400) {
      scrollUp.classList.remove("opacity-0", "pointer-events-none");
      scrollUp.classList.add("opacity-80");
    } else {
      scrollUp.classList.add("opacity-0", "pointer-events-none");
      scrollUp.classList.remove("opacity-80");
    }
  }

  window.addEventListener("scroll", scrollUp);

  /*=============== ANIMATION SCROLL ===============*/
  document.getElementById("scroll-up").addEventListener("click", function(event) {
    event.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });


  /*=============== HOVER ANIMATION ===============*/
  document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.carousel-item');
    let currentIndex = 0;

    function showNextItem() {
        items[currentIndex].classList.remove('opacity-100');
        items[currentIndex].classList.add('opacity-0');

        currentIndex = (currentIndex + 1) % items.length;

        items[currentIndex].classList.remove('opacity-0');
        items[currentIndex].classList.add('opacity-100');
    }

    // Initialize first item
    items[currentIndex].classList.remove('opacity-0');
    items[currentIndex].classList.add('opacity-100');

    setInterval(showNextItem, 3000); // Change image every 3 seconds
  });

  function countUpFromTime(countFrom, id) {
    const targetDate = new Date(countFrom).getTime();
    const container = document.getElementById(id);

    function updateTimer() {
        const now = new Date().getTime();
        const timeDifference = now - targetDate;

        if (timeDifference < 0) {
            container.querySelector('#years').textContent = "00";
            container.querySelector('#days').textContent = "00";
            container.querySelector('#hours').textContent = "00";
            container.querySelector('#minutes').textContent = "00";
            // container.querySelector('#seconds').textContent = "00";
            return;
        }

        const secondsInADay = 24 * 60 * 60 * 1000;
        const secondsInAnHour = 60 * 60 * 1000;
        const secondsInAMinute = 60 * 1000;

        const totalDays = Math.floor(timeDifference / secondsInADay);
        const years = Math.floor(totalDays / 365);
        const days = totalDays % 365;
        const hours = Math.floor((timeDifference % secondsInADay) / secondsInAnHour);
        const minutes = Math.floor((timeDifference % secondsInAnHour) / secondsInAMinute);
        // const seconds = Math.floor((timeDifference % secondsInAMinute) / 1000);

        container.querySelector('#years').textContent = String(years).padStart(2, '0');
        container.querySelector('#days').textContent = String(days).padStart(2, '0');
        container.querySelector('#hours').textContent = String(hours).padStart(2, '0');
        container.querySelector('#minutes').textContent = String(minutes).padStart(2, '0');
        // container.querySelector('#seconds').textContent = String(seconds).padStart(2, '0');
    }

    updateTimer();
    setInterval(updateTimer, 1000);
  }

  document.addEventListener("DOMContentLoaded", function() {
    countUpFromTime("Jan 29, 2022 23:49:00", 'countup1');
  });

  // Ensure this script runs after the DOM has fully loaded
  document.addEventListener("DOMContentLoaded", function() {
    let container = document.querySelector(".greeting");
    let timeNow = new Date().getHours();
    let greeting =
      timeNow >= 5 && timeNow < 12
        ? "Selamat Pagi Sayangku! 🌞<br> Semangat terus yaa dan jangan lupa bersyukur ❤️"
        : timeNow >= 12 && timeNow < 15
          ? "Selamat Siang Sayangku! ☀️<br> Jangan lupa tersenyum sayang ❤️"
          : timeNow >= 15 && timeNow < 18
            ? "Selamat Sore Sayangku! 🌅<br> Kamu hebat hari ini sayang ❤️"
            : "Selamat Malam Sayangku! 🌙<br> Terima kasih telah menjadi salah satu bintang terpenting di langitku ❤️<br> Selamat istirahat sayang ";
    container.innerHTML = `<h1 class="text-md sm:text-md font-semibold leading-8 text-gray-900 mb-2">${greeting}</h1>`;
  });


