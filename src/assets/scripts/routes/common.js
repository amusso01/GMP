import smoothscroll from "smoothscroll-polyfill";
// import hamburger from "./../part/hamburger";
import Aos from "aos";
import MicroModal from 'micromodal';

import gmpHeroSliderBlock from "../part/hero-slider-block";

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
		// hamburger()

		// Hero Slider
		const blockHeroHome = document.querySelector('.swiper-hero-home')
		if (typeof(blockHeroHome) != 'undefined' && blockHeroHome != null){
			gmpHeroSliderBlock();		
		}
	
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
