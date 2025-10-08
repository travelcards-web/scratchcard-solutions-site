
// Setup environment variables
var ss_app = {};
ss_app['body'] = document.getElementById('body');
ss_app['except_1'] = document.getElementById('menu-side-bar');
ss_app['except_2'] = document.getElementById('menu-items');

// Setup environment functions
ss_app['toggleMenu'] = function(element) {
	arr = element.className.split(" ");
	arrIndex = arr.indexOf('open');

	if (arrIndex == -1) {
		element.className += " " + 'open';
	} else {
		arr.splice(arrIndex, 1);
		// console.log(arr);
		element.className = arr;
	}
}

ss_app['closeMenu'] = function(ev) {
	// console.log(ev);
	arr = ss_app['except_1'].className.split(" ");
	arrIndex = arr.indexOf('open');

	if (arrIndex != -1) {
		arr.splice(arrIndex, 1);
		ss_app['except_1'].className = arr;
	}
}

ss_app['preventPropagation'] = function(ev) {
	// console.log(ev);
	ev.stopPropagation();
}

ss_app['cancelMenuListeners'] = function() {
	ss_app.body.removeEventListener("click", ss_app.closeMenu, false);
	ss_app.except_1.removeEventListener("click", ss_app.preventPropagation, false);
	ss_app.except_2.removeEventListener("click", ss_app.preventPropagation, false);
}

// Setup environment match media
if (window.matchMedia("(max-width: 650px)").matches) {
	ss_app.body.addEventListener("click", ss_app.closeMenu, false);
	ss_app.except_1.addEventListener("click", ss_app.preventPropagation, false);
	ss_app.except_2.addEventListener("click", ss_app.preventPropagation, false);
}
