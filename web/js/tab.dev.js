(function($) {
	// Author: Antoine Demailly
	$.fn.tabJs=function() {

		this.each(function(){
			
			var element = $(this);

			var tabLast = 'left';
			tabHeight(tabLast);

			element.find('.link-left').click(function() {
				var l = 'left';
				tab(l);
				tabLink(l);
				tabHeight(l);

				tabLast = l;
			});

			element.find('.link-middle').click(function() {
				var m = 'middle';
				tab(m);
				tabLink(m);
				tabHeight(m);

				tabLast = m;
			});

			element.find('.link-right').click(function() {
				var r = 'right';
				tab(r);
				tabLink(r);
				tabHeight(r);

				tabLast = r;
			});



			function tab(pos) {
				var wrap = element.find('.tab-wrap');

				wrap.removeClass('tab-wrap-left tab-wrap-middle tab-wrap-right');
				wrap.addClass('tab-wrap-' + pos);
			}

			function tabLink(pos) {
				var activeLink = 'tab-link-active';

				element.find('.tab-link-active').removeClass(activeLink);
				element.find('.link-' + pos).addClass(activeLink);
			}

			function tabHeight(pos) {
				element.find('.tab-content').height(element.find('#tab-' + pos).height());
			}

			function swipeLeft() {
				if (tabLast == 'middle') {
					var r = 'right';
					tab(r);
					tabLink(r);
					tabHeight(r);

					tabLast = r;
				} else if (tabLast == 'left') {
					var m = 'middle';
					tab(m);
					tabLink(m);
					tabHeight(m);

					tabLast = m;
				}
				
			}

			function swipeRight() {
				if (tabLast == 'right') {
					var m = 'middle';
					tab(m);
					tabLink(m);
					tabHeight(m);

					tabLast = m;
				} else if (tabLast == 'middle') {
					var l = 'left';
					tab(l);
					tabLink(l);
					tabHeight(l);

					tabLast = l;
				}
			}
			
		});
		return this;
	};
})(jQuery);