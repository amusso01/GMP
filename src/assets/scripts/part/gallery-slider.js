import Swiper from 'swiper';
import { Navigation} from 'swiper/modules';

import Chocolat from 'chocolat'

export default function gmpGallerySlider(){

  // init Swiper:
  let swiperLaptop = new Swiper('.swiper-gallery', {
    modules: [Navigation],
    slidesPerView: 2,
    loop: true,
    spaceBetween: 4,
    breakpoints: {
      768: {
        slidesPerView: 3,
      },
      920: {
        slidesPerView: 4,
      },
    },
    navigation: {
      nextEl: ".swiper-gallery-button-next",
      prevEl: ".swiper-gallery-button-prev",
    }
  });

  

  const set = document.querySelectorAll('.block-image-text')
  for (let i = 0; i < set.length; i++) {
      const gallery = set[i].querySelectorAll('.chocolat-image')
      Chocolat(gallery, {
          allowZoom: false,
      })
  }
}