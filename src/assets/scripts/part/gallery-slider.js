import Swiper from 'swiper';
import { Navigation} from 'swiper/modules';

export default function gmpGallerySlider(){

  // init Swiper:
  let swiperLaptop = new Swiper('.swiper-gallery', {
    modules: [Navigation],
    slidesPerView: 4,
    loop: true,
    spaceBetween: 4,
    navigation: {
      nextEl: ".swiper-gallery-button-next",
      prevEl: ".swiper-gallery-button-prev",
    }
  });

}