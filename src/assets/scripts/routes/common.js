import smoothscroll from "smoothscroll-polyfill";
// import hamburger from "./../part/hamburger";
import { Aos } from "aos";

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

		// Hamburger event listener
		hamburger()
	
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};