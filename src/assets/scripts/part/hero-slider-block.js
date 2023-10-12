import Swiper from 'swiper';
import { Navigation, EffectFade, Autoplay} from 'swiper/modules';

export default function gmpHeroSliderBlock(){

  // init Swiper:
  let swiperLaptop = new Swiper('.swiper-hero-home', {
    modules: [Navigation, EffectFade, Autoplay],
    effect: "fade",
    loop: true,
    speed:1100,
    fadeEffect: {
      crossFade: true
    },
    autoplay: {
      delay: 4000,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    }
  });

}