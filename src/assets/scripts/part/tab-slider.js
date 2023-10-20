import Swiper from 'swiper';
import { Navigation, EffectFade } from 'swiper/modules';



import Chocolat from 'chocolat'

export default function gmptabSlider(){

  // init Swiper:
  let swiperTabs = new Swiper('.swiper-tab', {
    modules: [Navigation, EffectFade],
    effect: "fade",
    loop: true,
    speed:1100,
    fadeEffect: {
      crossFade: true
    },
    navigation: {
      nextEl: ".swiper-tab-button-next",
      prevEl: ".swiper-tab-button-prev",
    }
  });

  

  const set = document.querySelectorAll('.swiper-tab')
  for (let i = 0; i < set.length; i++) {
      const tab = set[i].querySelectorAll('.chocolat-image')
      Chocolat(tab, {
          allowZoom: false,
      })
  }
}