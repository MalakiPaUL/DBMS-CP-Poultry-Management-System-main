(function($) {
  'use strict';
  $(function() {
    var $sidebar = $('.sidebar-offcanvas');
    var $backdrop = $('.sidebar-backdrop');

    function openSidebar() {
      $sidebar.addClass('active');
      $backdrop.addClass('active');
      $('body').addClass('sidebar-open');
    }

    function closeSidebar() {
      $sidebar.removeClass('active');
      $backdrop.removeClass('active');
      $('body').removeClass('sidebar-open');
    }

    $('[data-toggle="offcanvas"]').on("click", function(e) {
      e.preventDefault();
      if ($sidebar.hasClass('active')) {
        closeSidebar();
      } else {
        openSidebar();
      }
    });

    $backdrop.on("click", function() {
      closeSidebar();
    });

    // Close sidebar when a nav link is clicked on mobile
    $sidebar.find('.nav-link').on("click", function() {
      if ($(window).width() <= 991.98) {
        closeSidebar();
      }
    });
  });
})(jQuery);
