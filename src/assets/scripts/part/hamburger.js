export default function hamburger() {
	const burger = document.getElementById("hamburger");
	const mainMenu = document.getElementById("menu_main");
	const htmlElement = document.querySelector("html");
	const infoBar = document.querySelector(".mobile-info-bar");
	burger.addEventListener("click", function (e) {
		mainMenu.classList.toggle("show");

		burger.classList.toggle("active");
		burger.classList.toggle("not-active");
		
		infoBar.classList.toggle("show");

		// prevent content scrolling
		htmlElement.classList.toggle("noscroll");
	});
}
