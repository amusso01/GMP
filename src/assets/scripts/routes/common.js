import smoothscroll from "smoothscroll-polyfill";
import hamburger from "./../part/hamburger";
import Aos from "aos";
import MicroModal from 'micromodal';

import gmpHeroSliderBlock from "../part/hero-slider-block";
import gmpGallerySlider from "../part/gallery-slider";
import gmptabSlider from "../part/tab-slider";
import languageDropdown from "../part/languageDropdown";


// https://github.com/aFarkas/lazysizes
import 'lazysizes';
import 'lazysizes/plugins/bgset/ls.bgset';
import 'lazysizes/plugins/parent-fit/ls.parent-fit';

export default {
	init() {
		// JavaScript to be fired on all pages

		// kick off the polyfill!
		smoothscroll.polyfill()

		Aos.init()
		MicroModal.init();

		// Hamburger event listener
		hamburger()
		// Language dropdown
		languageDropdown()

		// Hero Slider
		const blockHeroHome = document.querySelector('.swiper-hero-home')
		if (typeof(blockHeroHome) != 'undefined' && blockHeroHome != null){
			gmpHeroSliderBlock();		
		}
		// Gallery Slider
		const gallerySlider = document.querySelector('.swiper-gallery')
		if (typeof(gallerySlider) != 'undefined' && gallerySlider != null){
			gmpGallerySlider();		
		}
		// tab Slider
		const tabSlider = document.querySelector('.swiper-tab')
		if (typeof(tabSlider) != 'undefined' && tabSlider != null){
			gmptabSlider();		
		}
	
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired

		// MENU DROPDOWN
		const dropdown = document.querySelectorAll('.menu-item-has-children')
		dropdown.forEach(element => {
			element.addEventListener('mouseover' , ()=>{
				let innerMenu = element.querySelector('.sub-menu')

				innerMenu.classList.add('s-show')
			})

			element.addEventListener('mouseleave' , ()=>{
				let innerMenu = element.querySelector('.sub-menu')

				innerMenu.classList.remove('s-show')
			})
		});

	},
};
