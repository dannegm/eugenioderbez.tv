var _ = 'bWFpbHRvOmNvbnRhY3RvQGV1Z2VuaW9kZXJiZXoudHY=xxxDRBZxxxaHR0cDovL2FtYm11bHRpbWVkaWEuY29tLm14xxxDRBZxxxQXVnIDE0LCAyMDE0IDA2OjAwOjAwxxxDRBZxxxMzgsMzgsNDAsNDAsMzcsMzksMzcsMzksNjYsNjU=xxxDRBZxxxQXVnIDE4LCAyMDE0IDE0OjAwOjAw'.split(_b.d('eHh4RFJCWnh4eA=='));
var uA = {
	userAgent: window.navigator.userAgent,
	iPad: function () {
		if (uA.userAgent.match(/iPad/gi)) return true;
		return false;
	},
	mobile: function () {
		if (uA.userAgent.match(/iPhone|iPod|Android|mobile/gi)) return true;
		return false;
	}
}
var utils = {
	round: function(n) { return Math.round(n * 100) / 100; },
	isOfPercent: function (e, p) { return (e / 100) * p; },
	isPrecentOf: function (e, ex) { return (ex / e) * 100; },
	is100pOf: function (e, p) { return (e * 100) / p; },
	proporcional: function (l1, l2, nl) { return utils.round((l2 / l1) * nl); },
};
var nav = {
	originalPos: function () {
		var thisli = $('#menu li .active');
		var hoverli = $('#hoverlimenu');

		hoverli.css({
			'left': thisli.position().left,
			'width': thisli.width()
		});
	},
	hoverPos: function () {
		var thisli = $(this);
		var hoverli = $('#hoverlimenu');

		hoverli.css({
			'left': thisli.position().left,
			'width': thisli.width()
		});
	},
	events: function () {
		$('#menu li').hover(nav.hoverPos, nav.originalPos);

		$('.iconMenu').click(function () {
			if ( $('#menu').css('display') == "none" ) {
				$('#menu').show();
			} else {
				$('#menu').hide();
			}
		});
	},
	init: function () {
		nav.originalPos();
		nav.events();

		var waitToPos = setTimeout(nav.originalPos, 5 * 1000);
	}
}
var index = {
	events: function () {
		var t = [], n = _b.d(_[3]);
		$(document).keydown(function(i) { t.push(i.keyCode), t.toString().indexOf(n) >= 0 && ($(document).unbind("keydown", arguments.callee), window.location.href = _b.d(_[1])) });
		$('.ad-square').click(function () {
			window.open('mailto:ventas@eugenioderbez.tv');
		});
	},
	ready: function () {
		index.events();
		nav.init();
	},
	init: function () {
		$(document).ready(index.ready);
	}
}
index.init();