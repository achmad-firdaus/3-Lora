/*!

=========================================================
* Argon Dashboard - v1.2.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2020 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/



//
// Layout
//

'use strict';

var Layout = (function () {

	function pinSidenav() {
		$('.sidenav-toggler').addClass('active');
		$('.sidenav-toggler').data('action', 'sidenav-unpin');
		$('body').removeClass('g-sidenav-hidden').addClass('g-sidenav-show g-sidenav-pinned');
		$('body').append('<div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target=' + $('#sidenav-main').data('target') + ' />');

		// Store the sidenav state in a cookie session
		Cookies.set('sidenav-state', 'pinned');
	}

	function unpinSidenav() {
		$('.sidenav-toggler').removeClass('active');
		$('.sidenav-toggler').data('action', 'sidenav-pin');
		$('body').removeClass('g-sidenav-pinned').addClass('g-sidenav-hidden');
		$('body').find('.backdrop').remove();

		// Store the sidenav state in a cookie session
		Cookies.set('sidenav-state', 'unpinned');
	}

	// Set sidenav state from cookie

	var $sidenavState = Cookies.get('sidenav-state') ? Cookies.get('sidenav-state') : 'pinned';

	if ($(window).width() > 1200) {
		if ($sidenavState == 'pinned') {
			pinSidenav()
		}

		if (Cookies.get('sidenav-state') == 'unpinned') {
			unpinSidenav()
		}

		$(window).resize(function () {
			if ($('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
				$('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
			}
		})
	}

	if ($(window).width() < 1200) {
		$('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
		$('body').removeClass('g-sidenav-show');
		$(window).resize(function () {
			if ($('body').hasClass('g-sidenav-show') && !$('body').hasClass('g-sidenav-pinned')) {
				$('body').removeClass('g-sidenav-show').addClass('g-sidenav-hidden');
			}
		})
	}



	$("body").on("click", "[data-action]", function (e) {

		e.preventDefault();

		var $this = $(this);
		var action = $this.data('action');
		var target = $this.data('target');


		// Manage actions

		switch (action) {
			case 'sidenav-pin':
				pinSidenav();
				break;

			case 'sidenav-unpin':
				unpinSidenav();
				break;

			case 'search-show':
				target = $this.data('target');
				$('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-showing');

				setTimeout(function () {
					$('body').removeClass('g-navbar-search-showing').addClass('g-navbar-search-show');
				}, 150);

				setTimeout(function () {
					$('body').addClass('g-navbar-search-shown');
				}, 300)
				break;

			case 'search-close':
				target = $this.data('target');
				$('body').removeClass('g-navbar-search-shown');

				setTimeout(function () {
					$('body').removeClass('g-navbar-search-show').addClass('g-navbar-search-hiding');
				}, 150);

				setTimeout(function () {
					$('body').removeClass('g-navbar-search-hiding').addClass('g-navbar-search-hidden');
				}, 300);

				setTimeout(function () {
					$('body').removeClass('g-navbar-search-hidden');
				}, 500);
				break;
		}
	})


	// Add sidenav modifier classes on mouse events

	$('.sidenav').on('mouseenter', function () {
		if (!$('body').hasClass('g-sidenav-pinned')) {
			$('body').removeClass('g-sidenav-hide').removeClass('g-sidenav-hidden').addClass('g-sidenav-show');
		}
	})

	$('.sidenav').on('mouseleave', function () {
		if (!$('body').hasClass('g-sidenav-pinned')) {
			$('body').removeClass('g-sidenav-show').addClass('g-sidenav-hide');

			setTimeout(function () {
				$('body').removeClass('g-sidenav-hide').addClass('g-sidenav-hidden');
			}, 300);
		}
	})


	// Make the body full screen size if it has not enough content inside
	$(window).on('load resize', function () {
		if ($('body').height() < 800) {
			$('body').css('min-height', '100vh');
			$('#footer-main').addClass('footer-auto-bottom')
		}
	})

})();

//
// Charts
//

'use strict';

var Charts = (function () {

	// Variable

	var $toggle = $('[data-toggle="chart"]');
	var mode = 'light'; //(themeMode) ? themeMode : 'light';
	var fonts = {
		base: 'Open Sans'
	}

	// Colors
	var colors = {
		gray: {
			100: '#f6f9fc',
			200: '#e9ecef',
			300: '#dee2e6',
			400: '#ced4da',
			500: '#adb5bd',
			600: '#8898aa',
			700: '#525f7f',
			800: '#32325d',
			900: '#212529'
		},
		theme: {
			'default': '#172b4d',
			'primary': '#5e72e4',
			'secondary': '#f4f5f7',
			'info': '#11cdef',
			'success': '#2dce89',
			'danger': '#f5365c',
			'warning': '#fb6340'
		},
		black: '#12263F',
		white: '#FFFFFF',
		transparent: 'transparent',
	};


	// Methods

	// Chart.js global options
	function chartOptions() {

		// Options
		var options = {
			defaults: {
				global: {
					responsive: true,
					maintainAspectRatio: false,
					defaultColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontColor: (mode == 'dark') ? colors.gray[700] : colors.gray[600],
					defaultFontFamily: fonts.base,
					defaultFontSize: 13,
					layout: {
						padding: 0
					},
					legend: {
						display: false,
						position: 'bottom',
						labels: {
							usePointStyle: true,
							padding: 16
						}
					},
					elements: {
						point: {
							radius: 0,
							backgroundColor: colors.theme['primary']
						},
						line: {
							tension: .4,
							borderWidth: 4,
							borderColor: colors.theme['primary'],
							backgroundColor: colors.transparent,
							borderCapStyle: 'rounded'
						},
						rectangle: {
							backgroundColor: colors.theme['warning']
						},
						arc: {
							backgroundColor: colors.theme['primary'],
							borderColor: (mode == 'dark') ? colors.gray[800] : colors.white,
							borderWidth: 4
						}
					},
					tooltips: {
						enabled: true,
						mode: 'index',
						intersect: false,
					}
				},
				doughnut: {
					cutoutPercentage: 83,
					legendCallback: function (chart) {
						var data = chart.data;
						var content = '';

						data.labels.forEach(function (label, index) {
							var bgColor = data.datasets[0].backgroundColor[index];

							content += '<span class="chart-legend-item">';
							content += '<i class="chart-legend-indicator" style="background-color: ' + bgColor + '"></i>';
							content += label;
							content += '</span>';
						});

						return content;
					}
				}
			}
		}

		// yAxes
		Chart.scaleService.updateScaleDefaults('linear', {
			gridLines: {
				borderDash: [2],
				borderDashOffset: [2],
				color: (mode == 'dark') ? colors.gray[900] : colors.gray[300],
				drawBorder: false,
				drawTicks: false,
				drawOnChartArea: true,
				zeroLineWidth: 0,
				zeroLineColor: 'rgba(0,0,0,0)',
				zeroLineBorderDash: [2],
				zeroLineBorderDashOffset: [2]
			},
			ticks: {
				beginAtZero: true,
				padding: 10,
				callback: function (value) {
					if (!(value % 10)) {
						return value
					}
				}
			}
		});

		// xAxes
		Chart.scaleService.updateScaleDefaults('category', {
			gridLines: {
				drawBorder: false,
				drawOnChartArea: false,
				drawTicks: false
			},
			ticks: {
				padding: 20
			},
			maxBarThickness: 10
		});

		return options;

	}

	// Parse global options
	function parseOptions(parent, options) {
		for (var item in options) {
			if (typeof options[item] !== 'object') {
				parent[item] = options[item];
			} else {
				parseOptions(parent[item], options[item]);
			}
		}
	}

	// Push options
	function pushOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function (data) {
					parent[item].push(data);
				});
			} else {
				pushOptions(parent[item], options[item]);
			}
		}
	}

	// Pop options
	function popOptions(parent, options) {
		for (var item in options) {
			if (Array.isArray(options[item])) {
				options[item].forEach(function (data) {
					parent[item].pop();
				});
			} else {
				popOptions(parent[item], options[item]);
			}
		}
	}

	// Toggle options
	function toggleOptions(elem) {
		var options = elem.data('add');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		if (elem.is(':checked')) {

			// Add options
			pushOptions($chart, options);

			// Update chart
			$chart.update();
		} else {

			// Remove options
			popOptions($chart, options);

			// Update chart
			$chart.update();
		}
	}

	// Update options
	function updateOptions(elem) {
		var options = elem.data('update');
		var $target = $(elem.data('target'));
		var $chart = $target.data('chart');

		// Parse options
		parseOptions($chart, options);

		// Toggle ticks
		toggleTicks(elem, $chart);

		// Update chart
		$chart.update();
	}

	// Toggle ticks
	function toggleTicks(elem, $chart) {

		if (elem.data('prefix') !== undefined || elem.data('prefix') !== undefined) {
			var prefix = elem.data('prefix') ? elem.data('prefix') : '';
			var suffix = elem.data('suffix') ? elem.data('suffix') : '';

			// Update ticks
			$chart.options.scales.yAxes[0].ticks.callback = function (value) {
				if (!(value % 10)) {
					return prefix + value + suffix;
				}
			}

			// Update tooltips
			$chart.options.tooltips.callbacks.label = function (item, data) {
				var label = data.datasets[item.datasetIndex].label || '';
				var yLabel = item.yLabel;
				var content = '';

				if (data.datasets.length > 1) {
					content += '<span class="popover-body-label mr-auto">' + label + '</span>';
				}

				content += '<span class="popover-body-value">' + prefix + yLabel + suffix + '</span>';
				return content;
			}

		}
	}


	// Events

	// Parse global options
	if (window.Chart) {
		parseOptions(Chart, chartOptions());
	}

	// Toggle options
	$toggle.on({
		'change': function () {
			var $this = $(this);

			if ($this.is('[data-add]')) {
				toggleOptions($this);
			}
		},
		'click': function () {
			var $this = $(this);

			if ($this.is('[data-update]')) {
				updateOptions($this);
			}
		}
	});


	// Return

	return {
		colors: colors,
		fonts: fonts,
		mode: mode
	};

})();

//
// Icon code copy/paste
//

'use strict';

var CopyIcon = (function () {

	// Variables

	var $element = '.btn-icon-clipboard',
		$btn = $($element);


	// Methods

	function init($this) {
		$this.tooltip().on('mouseleave', function () {
			// Explicitly hide tooltip, since after clicking it remains
			// focused (as it's a button), so tooltip would otherwise
			// remain visible until focus is moved away
			$this.tooltip('hide');
		});

		var clipboard = new ClipboardJS($element);

		clipboard.on('success', function (e) {
			$(e.trigger)
				.attr('title', 'Copied!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'Copy to clipboard')
				.tooltip('_fixTitle')

			e.clearSelection()
		});
	}


	// Events
	if ($btn.length) {
		init($btn);
	}

})();

//
// Navbar
//

'use strict';

var Navbar = (function () {

	// Variables

	var $nav = $('.navbar-nav, .navbar-nav .nav');
	var $collapse = $('.navbar .collapse');
	var $dropdown = $('.navbar .dropdown');

	// Methods

	function accordion($this) {
		$this.closest($nav).find($collapse).not($this).collapse('hide');
	}

	function closeDropdown($this) {
		var $dropdownMenu = $this.find('.dropdown-menu');

		$dropdownMenu.addClass('close');

		setTimeout(function () {
			$dropdownMenu.removeClass('close');
		}, 200);
	}


	// Events

	$collapse.on({
		'show.bs.collapse': function () {
			accordion($(this));
		}
	})

	$dropdown.on({
		'hide.bs.dropdown': function () {
			closeDropdown($(this));
		}
	})

})();


//
// Navbar collapse
//


var NavbarCollapse = (function () {

	// Variables

	var $nav = $('.navbar-nav'),
		$collapse = $('.navbar .navbar-custom-collapse');


	// Methods

	function hideNavbarCollapse($this) {
		$this.addClass('collapsing-out');
	}

	function hiddenNavbarCollapse($this) {
		$this.removeClass('collapsing-out');
	}


	// Events

	if ($collapse.length) {
		$collapse.on({
			'hide.bs.collapse': function () {
				hideNavbarCollapse($collapse);
			}
		})

		$collapse.on({
			'hidden.bs.collapse': function () {
				hiddenNavbarCollapse($collapse);
			}
		})
	}

	var navbar_menu_visible = 0;

	$(".sidenav-toggler").click(function () {
		if (navbar_menu_visible == 1) {
			$('body').removeClass('nav-open');
			navbar_menu_visible = 0;
			$('.bodyClick').remove();

		} else {

			var div = '<div class="bodyClick"></div>';
			$(div).appendTo('body').click(function () {
				$('body').removeClass('nav-open');
				navbar_menu_visible = 0;
				$('.bodyClick').remove();

			});

			$('body').addClass('nav-open');
			navbar_menu_visible = 1;

		}

	});

})();

//
// Popover
//

'use strict';

var Popover = (function () {

	// Variables

	var $popover = $('[data-toggle="popover"]'),
		$popoverClass = '';


	// Methods

	function init($this) {
		if ($this.data('color')) {
			$popoverClass = 'popover-' + $this.data('color');
		}

		var options = {
			trigger: 'focus',
			template: '<div class="popover ' + $popoverClass + '" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		};

		$this.popover(options);
	}


	// Events

	if ($popover.length) {
		$popover.each(function () {
			init($(this));
		});
	}

})();

//
// Scroll to (anchor links)
//

'use strict';

var ScrollTo = (function () {

	//
	// Variables
	//

	var $scrollTo = $('.scroll-me, [data-scroll-to], .toc-entry a');


	//
	// Methods
	//

	function scrollTo($this) {
		var $el = $this.attr('href');
		var offset = $this.data('scroll-to-offset') ? $this.data('scroll-to-offset') : 0;
		var options = {
			scrollTop: $($el).offset().top - offset
		};

		// Animate scroll to the selected section
		$('html, body').stop(true, true).animate(options, 600);

		event.preventDefault();
	}


	//
	// Events
	//

	if ($scrollTo.length) {
		$scrollTo.on('click', function (event) {
			scrollTo($(this));
		});
	}

})();

//
// Tooltip
//

'use strict';

var Tooltip = (function () {

	// Variables

	var $tooltip = $('[data-toggle="tooltip"]');


	// Methods

	function init() {
		$tooltip.tooltip();
	}


	// Events

	if ($tooltip.length) {
		init();
	}

})();

//
// Form control
//

'use strict';

var FormControl = (function () {

	// Variables

	var $input = $('.form-control');


	// Methods

	function init($this) {
		$this.on('focus blur', function (e) {
			$(this).parents('.form-group').toggleClass('focused', (e.type === 'focus'));
		}).trigger('blur');
	}


	// Events

	if ($input.length) {
		init($input);
	}

})();

//
// Google maps
//

var $map = $('#map-default'),
	map,
	lat,
	lng,
	color = "#5e72e4";

function initMap() {

	map = document.getElementById('map-default');
	lat = map.getAttribute('data-lat');
	lng = map.getAttribute('data-lng');

	var myLatlng = new google.maps.LatLng(lat, lng);
	var mapOptions = {
		zoom: 12,
		scrollwheel: false,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
	}

	map = new google.maps.Map(map, mapOptions);

	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		animation: google.maps.Animation.DROP,
		title: 'Hello World!'
	});

	var contentString = '<div class="info-window-content"><h2>Argon Dashboard</h2>' +
		'<p>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</p></div>';

	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});

	google.maps.event.addListener(marker, 'click', function () {
		infowindow.open(map, marker);
	});
}

if ($map.length) {
	google.maps.event.addDomListener(window, 'load', initMap);
}

/*
	Module Name: POST EVERY TIME UPDATE
*/
var baseUrl =  window.location.href;
var PostEveryUpdate = (function () {

	//
	// Variables
	//


	//
	// Methods
	//

	function initUpdate() {
		setInterval(function () {
			$.ajax({
				type: 'post',
				// url: baseUrl +'/Dashboard/getEveryTime',
				url: baseUrl +'/getEveryTime',
				success: function (e) {
					let  obj = JSON.parse(e);
					// console.log(obj);
					$('#node1_power').text(obj.node1_power.value);
					$('#node2_power').text(obj.node2_power.value);

					$('#node1_current').text(obj.node1_current.value);
					$('#node1_energy').text(obj.node1_energy.value);
					$('#node1_pf').text(obj.node1_pf.value);
					$('#node1_voltage').text(obj.node1_voltage.value);
					$('#node2_current').text(obj.node2_current.value);
					$('#node2_energy').text(obj.node2_energy.value);
					$('#node2_pf').text(obj.node2_pf.value);
					$('#node2_voltage').text(obj.node2_voltage.value);
				}
			});
			
		}, 4000)

	}


	// Init chart
	initUpdate(PostEveryUpdate);

})();

'use strict';


//
// Bars chart
//

/*
	Module Name: Chart Total NODE 1 - NODE 2
*/
var BarsChart = (function () {

	//
	// Variables
	//

	var $chart = $('#chart-bars');

	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var ordersChart = new Chart($chart, {
			type: 'bar',
			options: {
				scales: {
					yAxes: [{
						ticks: {
							callback: function (value) {
								if (!(value % 10)) {
									return 'Rp.' + value + '';
								}
							}
						}
					}]
				}
			},
			data: {
				labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [
					{
						label: 'Node 1',
						data: [
							25, 20, 30, 22, 17, 29, 22, 30, 21, 30, 20, 12
						],
						backgroundColor: '#ffa800'
					},
					{
						label: 'Node 2',
						data: [
							25, 20, 30, 22, 17, 29, 17, 29, 22, 30, 20, 24
						]
					},
				]
			}
		});

		// Save to jQuery object
		// $chart.data('chart', ordersChart);

		setInterval(function () {
			var N1M1;
			var N1M2;
			var N1M3;
			var N1M4;
			var N1M5;
			var N1M6;
			var N1M7;
			var N1M8;
			var N1M9;
			var N1M10;
			var N1M11;
			var N1M12;
			//N2
			var N2M12;
			var N2M1;
			var N2M2;
			var N2M3;
			var N2M4;
			var N2M5;
			var N2M6;
			var N2M7;
			var N2M8;
			var N2M9;
			var N2M10;
			var N2M11;
			var N2M12;
			$.ajax({
				type: 'post',
				// url: baseUrl +'/Dashboard/getEveryTime',
				url: baseUrl +'/getEveryTime',
				success: function (e) {
					let  obj = JSON.parse(e);
					N1M1 = obj.N1M1;
					N1M2 = obj.N1M2;
					N1M3 = obj.N1M3;
					N1M4 = obj.N1M4;
					N1M5 = obj.N1M5;
					N1M6 = obj.N1M6;
					N1M7 = obj.N1M7;
					N1M8 = obj.N1M8;
					N1M9 = obj.N1M9;
					N1M10 = obj.N1M10;
					N1M11 = obj.N1M11;
					N1M12 = obj.N1M12;
					//N2
					N2M1 = obj.N2M1;
					N2M2 = obj.N2M2;
					N2M3 = obj.N2M3;
					N2M4 = obj.N2M4;
					N2M5 = obj.N2M5;
					N2M6 = obj.N2M6;
					N2M7 = obj.N2M7;
					N2M8 = obj.N2M8;
					N2M9 = obj.N2M9;
					N2M10 = obj.N2M10;
					N2M11 = obj.N2M11;
					N2M12 = obj.N2M12;
					// console.log(obj);
					ordersChart.data.datasets[0].data = [N1M1 , N1M2, N1M3, N1M4, N1M5, N1M6, N1M7, N1M8, N1M9, N1M10, N1M11, N1M12]
					// ordersChart.data.datasets[1].data = [N1M1 , N1M2, N1M3, N1M4, N1M5, N1M6, N1M7, N1M8, N1M9, N1M10, N1M11, N1M12]
					ordersChart.data.datasets[1].data = [N2M1 , N2M2, N2M3, N2M4, N2M5, N2M6, N2M7, N2M8, N2M9, N2M10, N2M11, N2M12]
					ordersChart.update();
				}
			});
		}, 4000)

	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();

'use strict';

//
// Bars chart
//

/*
	Module Name: Chart Total Earthquake
*/
var BarsChart2 = (function () {

	//
	// Variables
	//

	var $chart = $('#chart-bars2');

	//
	// Methods
	//

	// Init chart
	function initChart($chart) {

		// Create chart
		var ordersChart = new Chart($chart, {
			type: 'bar',
			options: {
				scales: {
					yAxes: [{
						ticks: {
							callback: function (value) {
								if (!(value % 10)) {
									return value + '';
								}
							}
						}
					}]
				}
			},
			data: {
				labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
				datasets: [
					{
						label: 'Node 1',
						data: [
							10, 25, 27, 20, 15, 17, 30
						],
						backgroundColor: '#12a2f0'
					},
					{
						label: 'Node 2',
						data: [
							25, 20, 30, 22, 17, 29, 22
						],
						backgroundColor: '#8A2EE6'
					}
				]
			}
		});

		setInterval(function () {
			var Mon1;
			var Tue1;
			var Wed1;
			var Thu1;
			var Fri1;
			var Sat1;
			var Sun1;
			var Mon2;
			var Tue2;
			var Wed2;
			var Thu2;
			var Fri2;
			var Sat2;
			var Sun2;
			$.ajax({
				type: 'post',
				// url: baseUrl +'/Dashboard/getEveryTime',
				url: baseUrl +'/getEveryTime',
				success: function (e) {
					// node1_earthquake_Mon
					// node1_earthquake_Tue
					// node1_earthquake_Wed
					// node1_earthquake_Thu
					// node1_earthquake_Fri
					// node1_earthquake_Sat
					// node1_earthquake_Sun
					let  obj = JSON.parse(e);
					Mon1 = obj.node1_earthquake_Mon.valueh;
					Tue1 = obj.node1_earthquake_Tue.valueh;
					Wed1 = obj.node1_earthquake_Wed.valueh;
					Thu1 = obj.node1_earthquake_Thu.valueh;
					Fri1 = obj.node1_earthquake_Fri.valueh;
					Sat1 = obj.node1_earthquake_Sat.valueh;
					Sun1 = obj.node1_earthquake_Sun.valueh;

					Mon2 = obj.node2_earthquake_Mon.valueh;
					Tue2 = obj.node2_earthquake_Tue.valueh;
					Wed2 = obj.node2_earthquake_Wed.valueh;
					Thu2 = obj.node2_earthquake_Thu.valueh;
					Fri2 = obj.node2_earthquake_Fri.valueh;
					Sat2 = obj.node2_earthquake_Sat.valueh;
					Sun2 = obj.node2_earthquake_Sun.valueh;
					// console.log(Sat1);
					ordersChart.data.datasets[0].data = [Mon1 , Tue1, Wed1 , Thu1, Fri1, Sat1 , Sun1]
					ordersChart.data.datasets[1].data = [Mon2 , Tue2, Wed2 , Thu2, Fri2, Sat2 , Sun2]
					// ordersChart.data.datasets[1].data = [0 , 0, 0 , 0, 0, 0 , 0, 0, 0 , 0, 1, 0 , 0 ]
					ordersChart.update();
				}
			});
		}, 4000)

		// Save to jQuery object
		// console.log($chart.data.datasets);
		// $chart.data('chart', ordersChart);
	}


	// Init chart
	if ($chart.length) {
		initChart($chart);
	}

})();

'use strict';

//
// Sales chart
//

/*
	Module Name: Chart Total Bill
*/

var SalesChart = (function () {

	// Variables

	var $chart = $('#chart-sales-dark');


	// Methods

	function init($chart) {

		var salesChart = new Chart($chart, {
			type: 'line',
			options: {
				scales: {
					yAxes: [{
						gridLines: {
							lineWidth: 1,
							color: Charts.colors.gray[900],
							zeroLineColor: Charts.colors.gray[900]
						},
						ticks: {
							callback: function (value) {
								if (!(value % 10)) {
									return 'Rp.' + value + '';
								}
							}
						}
					}]
				},
				tooltips: {
					callbacks: {
						label: function (item, data) {
							var label = data.datasets[item.datasetIndex].label || '';
							var yLabel = item.yLabel;
							var content = '';

							if (data.datasets.length > 1) {
								content += '<span class="popover-body-label mr-auto">' + label + '</span>';
							}

							content += '<span class="popover-body-value">$' + yLabel + 'k</span>';
							return content;
						}
					}
				}
			},
			data: {
				labels: ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				datasets: [{
					label: 'Performance',
					data: [10, 20, 10, 30, 15, 40, 20, 60, 60]
				}]
			}
		});

		// Save to jQuery object

		$chart.data('chart', salesChart);

	};


	// Events

	if ($chart.length) {
		init($chart);
	}

})();

//
// Bootstrap Datepicker
//

'use strict';

/*
	Module Name: Validate Modal Setting Dropdown Profile
*/

var ValidateModalProfile = (function () {

	// Variables

	var $ValidateModalProfile = $('#ButtonValidateProfile');


	// Methods

	function init($ValidateModalProfile) {
		window.addEventListener('load', function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener('submit', function (event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
						console.log('Start Validate');
					} else {
						console.log('end Validate');
					}
					form.classList.add('was-validated');
				}, false);
			});
			// },
			// false;
			// }

		});
	}
	init($ValidateModalProfile);
})();
//
// Bootstrap Datepicker
//

'use strict';

/*
	Module Name: Validate Logon form
*/

var ValidateModalLogon = (function () {

	// Variables

	var $ValidateModalLogon = $('#ButtonValidateLogon');

	console.log("VALIDATE LOGON");
	// Methods

	function init($ValidateModalLogon) {
		window.addEventListener('load', function () {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function (form) {
				form.addEventListener('submit', function (event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
						console.log('Start Validate');
					} else {
						console.log('end Validate');
					}
					form.classList.add('was-validated');
				}, false);
			});
			// },
			// false;
			// }

		});
	}
	init($ValidateModalLogon);
})();
//
// Bootstrap Datepicker
//

'use strict';

/*
	Module Name: Validate Logon form
*/

var SweetAlert = (function () {

	// Methods

	function init() {
		const flashdataSuccess = $('.flash-data').attr('data-flashdataSuccess');
		const flashdataWarning = $('.flash-data').attr('data-flashdataWarning');
		if (flashdataSuccess) {
			Swal.fire('Success', flashdataSuccess, 'success');
		}
		if (flashdataWarning) {
			Swal.fire('Warning', flashdataWarning, 'warning');
		}
	}
	init(SweetAlert);
})();
//
// Bootstrap Datepicker
//

'use strict';


var Datepicker = (function () {

	// Variables

	var $datepicker = $('.datepicker');


	// Methods

	function init($this) {
		var options = {
			disableTouchKeyboard: true,
			autoclose: false
		};

		$this.datepicker(options);
	}


	// Events

	if ($datepicker.length) {
		$datepicker.each(function () {
			init($(this));
		});
	}

})();

//
// Form control
//

'use strict';

var noUiSlider = (function () {

	// Variables

	// var $sliderContainer = $('.input-slider-container'),
	// 		$slider = $('.input-slider'),
	// 		$sliderId = $slider.attr('id'),
	// 		$sliderMinValue = $slider.data('range-value-min');
	// 		$sliderMaxValue = $slider.data('range-value-max');;


	// // Methods
	//
	// function init($this) {
	// 	$this.on('focus blur', function(e) {
	//       $this.parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
	//   }).trigger('blur');
	// }
	//
	//
	// // Events
	//
	// if ($input.length) {
	// 	init($input);
	// }



	if ($(".input-slider-container")[0]) {
		$('.input-slider-container').each(function () {

			var slider = $(this).find('.input-slider');
			var sliderId = slider.attr('id');
			var minValue = slider.data('range-value-min');
			var maxValue = slider.data('range-value-max');

			var sliderValue = $(this).find('.range-slider-value');
			var sliderValueId = sliderValue.attr('id');
			var startValue = sliderValue.data('range-value-low');

			var c = document.getElementById(sliderId),
				d = document.getElementById(sliderValueId);

			noUiSlider.create(c, {
				start: [parseInt(startValue)],
				connect: [true, false],
				//step: 1000,
				range: {
					'min': [parseInt(minValue)],
					'max': [parseInt(maxValue)]
				}
			});

			c.noUiSlider.on('update', function (a, b) {
				d.textContent = a[b];
			});
		})
	}

	if ($("#input-slider-range")[0]) {
		var c = document.getElementById("input-slider-range"),
			d = document.getElementById("input-slider-range-value-low"),
			e = document.getElementById("input-slider-range-value-high"),
			f = [d, e];

		noUiSlider.create(c, {
			start: [parseInt(d.getAttribute('data-range-value-low')), parseInt(e.getAttribute('data-range-value-high'))],
			connect: !0,
			range: {
				min: parseInt(c.getAttribute('data-range-value-min')),
				max: parseInt(c.getAttribute('data-range-value-max'))
			}
		}), c.noUiSlider.on("update", function (a, b) {
			f[b].textContent = a[b]
		})
	}

})();

//
// Scrollbar
//

'use strict';

var Scrollbar = (function () {

	// Variables

	var $scrollbar = $('.scrollbar-inner');


	// Methods

	function init() {
		$scrollbar.scrollbar().scrollLock()
	}


	// Events

	if ($scrollbar.length) {
		init();
	}

})();
