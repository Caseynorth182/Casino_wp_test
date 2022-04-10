$(document).ready(function () {

	/* --------------------------- //LINK SWIPER HERO --------------------------- */
	const swiper = new Swiper('.swiper', {
		// Optional parameters
		direction: 'horizontal',
		loop: true,
		effect: 'fade',
		autoplay: {
			delay: 2000
		},

		// If we need pagination
		pagination: {
			el: '.swiper-pagination',
		},

		// Navigation arrows
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},

		// And if we need scrollbar
		scrollbar: {
			el: '.swiper-scrollbar',
		},
	});



	/* ----------------------------- //LINK PArralax ---------------------------- */
	$('.parallax-container').parallax({
		naturalWidth: 100,
		naturalHeight: 400
	});

	/* ---------------------------- //LINK PARTICLES ---------------------------- */
	particlesJS.load('particles-js', `${WP.url}js/particles.json`, () => {
		console.log(66666666666);
	});

	/* ----------------------------- //LINK COUNTER ----------------------------- */
	console.log(WP.home);
	if (WP.home == '1') {
		const time = 1000; // ms
		const step = 1;

		function outNum(num, elem) {
			let l = document.querySelector('#' + elem);
			n = 555555;
			let t = Math.round(time / (num / step));
			let interval = setInterval(() => {
				n = n + step;
				if (n == num) {
					clearInterval(interval);
				}
				l.innerHTML = n;
			},
				t);
		}

		outNum(999999, 'out-1');
	}

	/* ------------------------ //LINK CUSTOM TABS GAMES ------------------------ */
	let games_arr = document.querySelectorAll('.games__items');
	let games_top_text_block = document.querySelector('.game_top_text');
	let games_top_image = document.querySelector('.games__top_bg-image')

	function gamesTabs() {
		let current_game = games_arr[0];
		games_top_text_block.textContent = current_game.querySelector('p').innerHTML;
		games_top_image.src = current_game.querySelector('.game_image').src
		current_game.classList.add('active')
		games_arr.forEach(item => {
			item.addEventListener('click', (e) => {
				removwActiveClass();
				item.classList.add('active')

				games_top_image.src = item.querySelector('.game_image').src;
				games_top_text_block.textContent = item.querySelector('p').innerHTML
			})
		})
	}
	function removwActiveClass() {
		games_arr.forEach(item => item.classList.remove('active'))
	}
	gamesTabs();



});


