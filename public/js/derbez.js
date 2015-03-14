var ciudad = {
	posPleca: function (p, a, na, dx, dy) {
		var pleca = $(p);
		var xy = pleca.data('coords');
			xy = xy.split(',');
		var x = xy[0], y = xy[1];

		var px = utils.isPrecentOf(a, x);
		var py = utils.isPrecentOf(a, y);

		var nx = utils.isOfPercent(na, px);
		var ny = utils.isOfPercent(na, py);

		pleca.css({
			'left': (nx - dx) + 'px',
			'top': (ny - dy) + 'px'
		});
	},
	sizePleca: function (p, a, na) {
		var pleca = $(p);
		var xy = pleca.data('size');
			xy = xy.split(',');
		var x = xy[0], y = xy[1];

		var px = utils.isPrecentOf(a, x);
		var py = utils.isPrecentOf(a, y);

		var nx = utils.isOfPercent(na, px);
		var ny = utils.isOfPercent(na, py);

		pleca.css({
			'width': nx + 'px',
			'height': ny + 'px'
		});
	},
	diaNoche: function () {
		var date = new Date();
		var hora = date.getHours();
		if (hora > 18 || hora < 6) {
			$('#cielo').css('background-image', "url('img/ciudadcielo_noche.jpg')");
			$('#edificios_back').css('background-image', "url('ciudadedificios_noche.png')");
			$('#edificios_front').css('background-image', "url('img/ciudadfrente_noche.png')");
		}
	},
	translate: function (e, px, py) {
		$(e).css({
			'-webkit-transform': 'translate(' + px + 'px, ' + py + 'px)',
			'-moz-transform': 'translate(' + px + 'px, ' + py + 'px)',
			'-ms-transform': 'translate(' + px + 'px, ' + py + 'px)',
			'-o-transform': 'translatX(' + px + 'px, ' + py + 'px)',
			'transform': 'translate(' + px + 'px, ' + py + 'px)'
		});
	},
	resize: function () {
		var nav = $('#nav'),
			city = $('#paralax_ciudad, #primerplano, #plano2, #plano3, #plano4');
		var city_o_width = 4340,
			city_o_height = 1250;
		var city_n_height = $(window).height() - ((nav.height() / 4) * 3);
		var city_n_width = utils.proporcional(city_o_height, city_o_width, city_n_height);

		city.css({
			'height': city_n_height + 'px',
			'width': city_n_width + 'px'
		});
		$('#cielo').css({
			'height': (city_n_height * 1.08) + 'px',
			'width': (city_n_width * 1.08) + 'px',
			'margin-top': '-' + parseInt(city_n_height * 0.04) + 'px',
			'margin-left': '-' + parseInt(city_n_width * 0.04) + 'px'
		});
		for (x = 1; x < 13; x++) {
			ciudad.posPleca('#p' + x, city_o_height, city_n_height, 70, 43);
		}
		for (x = 1; x < 14; x++) {
			ciudad.sizePleca('#c' + x, city_o_height, city_n_height);
			ciudad.posPleca('#c' + x, city_o_height, city_n_height, 0, 0);
		}
	},
	mouseX: 0,
	events: function () {
		$('#plecas li').click(function () {
			var ref = $(this).data('ref');
			$('#overlive').fadeIn();
			$('#' + ref).show();
		});
		$('#overlive, .close').click(function () {
			$('#overlive').fadeOut();
			$('.popup').fadeOut();
		});

		if (!uA.iPad() && !uA.mobile()) {
			setInterval(function () {
				$(document).mousemove(function (e) { ciudad.mouseX = e.pageX - window.pageXOffset });

				windowX = $(window).width();
				w10percent = utils.isOfPercent(windowX, 10);

				if (ciudad.mouseX < w10percent) {
					newLeft = $(window).scrollLeft() - (w10percent / 10);
				} else if (ciudad.mouseX > (windowX - w10percent)) {
					newLeft = $(window).scrollLeft() + (w10percent / 10);
				}
				$('html,body').scrollLeft(newLeft);
			}, 1);

			$('#intro img').hover(function () {
				$('#inipleca').show();
			}, function () {
				$('#inipleca').fadeOut();
			});
		}

		$(window).scroll(function () {
			windowX = $('#paralax_ciudad').width();
			w10percent = utils.isOfPercent(windowX, 7);

			if (uA.iPad()) {
				if ($(window).scrollLeft() > w10percent) {
					$('#inipleca').fadeOut();
				} else {
					$('#inipleca').show();
				}
			}
		});

		var sounds = {
			'profetizo': new buzz.sound("sounds/profetizo", {
				formats: ["ogg", "mp3"]
			}),
			'peperoni': new buzz.sound("sounds/peperoni", {
				formats: ["ogg", "mp3"]
			}),
			'aaronabazolo': new buzz.sound("sounds/aaronabazolo", {
				formats: ["ogg", "mp3"]
			}),
			'julioesteban': new buzz.sound("sounds/julioesteban", {
				formats: ["ogg", "mp3"]
			}),
			'diablito': new buzz.sound("sounds/diablito", {
				formats: ["ogg", "mp3"]
			}),
			'hanz': new buzz.sound("sounds/hanz", {
				formats: ["ogg", "mp3"]
			}),
			'superportero': new buzz.sound("sounds/superportero", {
				formats: ["ogg", "mp3"]
			}),
			'nicolas': new buzz.sound("sounds/nicolas", {
				formats: ["ogg", "mp3"]
			}),
			'marilin': new buzz.sound("sounds/marilin", {
				formats: ["ogg", "mp3"]
			}),
			'armandohoyos': new buzz.sound("sounds/armandohoyos", {
				formats: ["ogg", "mp3"]
			}),
			'barnaby': new buzz.sound("sounds/barnaby", {
				formats: ["ogg", "mp3"]
			}),
			'eloygame': new buzz.sound("sounds/eloygame", {
				formats: ["ogg", "mp3"]
			}),
			'elonje': new buzz.sound("sounds/elonje", {
				formats: ["ogg", "mp3"]
			})
		};
		$('#personajes [data-ref]').click(function () {
			var perso = $(this).data('ref');
			sounds[perso].play();
		});
	},
	init: function () {
		ciudad.events();
		ciudad.diaNoche();
	}
};
var win = {
	resize: function () {
		ciudad.resize();
	},
	events: function () {
		$(window).resize(win.resize);
	},
	init: function () {
		win.resize();
		win.events();
	}
};
var derbez = {
	events: function () {

	},
	ready: function () {
		derbez.events();

		win.init();
		ciudad.init();

        var $scene = $('#paralax_ciudad').parallax();
        $scene.parallax('enable');
	},
	init: function () {
		$(document).ready(derbez.ready);
	}
}
derbez.init();