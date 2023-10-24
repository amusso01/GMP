export default function languageDropdown() {
	const selector = document.querySelector('.language-menu .pll-parent-menu-item > a');
	const subMenu = document.querySelector('.language-menu .pll-parent-menu-item .sub-menu');
	const subMenuCurrentLang = document.querySelector('.language-menu .pll-parent-menu-item .sub-menu .current-lang');

	selector.addEventListener("click", function (e) {
		
		e.stopImmediatePropagation()
		e.stopPropagation()
		subMenu.classList.toggle('active');
	});

	subMenuCurrentLang.addEventListener('click', function(ev){
		ev.preventDefault();
		subMenu.classList.toggle('active');
	})
}
