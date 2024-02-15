<!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <script>
    $(document).ready(function () {
        $('.navbar-toggler').on('click', function () {
            $('html, body').toggleClass('nav-open');

            var $toggle = $('.navbar-toggler');
            if ($('html').hasClass('nav-open')) {
                $toggle.addClass('toggled');
            } else {
                $toggle.removeClass('toggled');
            }
        });

        // Close the dropdown when clicking outside
        $(document).on('click', function (e) {
            var container = $(".navbar-collapse");
            if (!container.is(e.target) && container.has(e.target).length === 0 && $('.navbar-toggler').is(':visible')) {
                container.removeClass('show');
                $('.navbar-toggler').addClass('collapsed');
            }
        });
    });
</script>