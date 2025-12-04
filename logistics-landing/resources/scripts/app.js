import domReady from '@roots/sage/client/dom-ready';
import Swiper from 'swiper/bundle';

/**
 * Application entrypoint
 */
domReady(async () => {
  // Initialize tabs functionality
  initTabs();
  
  // Initialize sliders
  initSliders();
});

/**
 * Tabs functionality
 */
function initTabs() {
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');
  
  tabButtons.forEach((tab) => {
    tab.addEventListener('click', () => handleTabClick(tab));
  });
  
  // Handle dropdown tab selection
  const tabSelect = document.querySelector('.is-mobile');
  if (tabSelect) {
    tabSelect.addEventListener('change', (event) => {
      const targetId = event.target.value;
      const targetTab = document.querySelector(`[content-id="${targetId}"]`);
      if (targetTab) {
        handleTabClick(targetTab);
      }
    });
  }
  
  function handleTabClick(activeTab) {
    // Remove active class from all tabs and contents
    tabButtons.forEach(tab => tab.classList.remove('active'));
    tabContents.forEach(content => content.classList.remove('show'));
    
    // Add active class to clicked tab
    activeTab.classList.add('active');
    
    // Show corresponding content
    const contentId = activeTab.getAttribute('content-id');
    const targetContent = document.getElementById(contentId);
    if (targetContent) {
      targetContent.classList.add('show');
    }
  }
}

/**
 * Initialize all sliders
 */
function initSliders() {
  // Benefits slider
  const benefitsSlider = document.querySelector('.swiper');
  if (benefitsSlider) {
    new Swiper(benefitsSlider, {
      direction: 'horizontal',
      loop: true,
      autoHeight: true,
      spaceBetween: 10,
      slidesPerView: "auto",
    });
  }

  // Vehicle park slider
  const parkSlider = document.querySelector('.swiper-park');
  if (parkSlider) {
    new Swiper(parkSlider, {
      direction: 'horizontal',
      loop: true,
      autoHeight: true,
      spaceBetween: 10,
      centeredSlides: true,
      centeredSlidesBounds: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }
}

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
