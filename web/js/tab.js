!function(i){i.fn.tabJs=function(){return this.each(function(){function n(i){var n=f.find(".tab-wrap");n.removeClass("tab-wrap-left tab-wrap-middle tab-wrap-right"),n.addClass("tab-wrap-"+i)}function t(i){var n="tab-link-active";f.find(".tab-link-active").removeClass(n),f.find(".link-"+i).addClass(n)}function a(i){f.find(".tab-content").height(f.find("#tab-"+i).height())}var f=i(this),l="left";a(l),f.find(".link-left").click(function(){var i="left";n(i),t(i),a(i),l=i}),f.find(".link-middle").click(function(){var i="middle";n(i),t(i),a(i),l=i}),f.find(".link-right").click(function(){var i="right";n(i),t(i),a(i),l=i})}),this}}(jQuery);