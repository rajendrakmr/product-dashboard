 <!-- plugins:js -->
 <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
  
 
  <script src="<?php echo asset('dash/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
 
  @stack('scripts')
  <!-- inject:js --> 
  <script src="<?php echo asset('dash/js/off-canvas.js') ?>"></script>
  <script src="<?php echo asset('dash/js/hoverable-collapse.js') ?>"></script>
  <script src="<?php echo asset('dash/js/template.js') ?>"></script>
  <script src="<?php echo asset('dash/js/settings.js') ?>"></script>
  <script src="<?php echo asset('dash/js/todolist.js') ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo asset('dash/js/dashboard.js') ?>"></script> 
  <!-- End custom js for this page-->
  @stack("dragscript")
</body> 
</html>