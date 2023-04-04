 <!-- Jquery -->
 <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
 <!-- Bootstrap-->
 <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
 <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
 <!-- Chart JS -->
 <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
 <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

 <script src="{{ asset('assets/chart/dist/chart.js') }}"></script>
 <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js') }}"></script> -->
 <!-- Owl Carousel -->
 <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
 <!-- jQuery Circle Progress -->
 <script src="{{ asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
 <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
 <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
 <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
 <!-- Base Js File -->
 <script src="{{ asset('assets/js/base.js') }}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

 <script>
   const ctx = document.getElementById('myChart');

   new Chart(ctx, {
     type: 'pie',
     data: {
       labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
       datasets: [{
         label: '# of Votes',
         data: [12, 19, 3, 5, 2, 3],
         borderWidth: 1
       }]
     }
   });
 </script>

 @stack('myscript')