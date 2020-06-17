</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
   <div class="pull-right hidden-xs">
      <b>Template By <a href="https://adminlte.io">AdminLTE </a></b>
   </div>
   <strong>&copy; <?= date('Y') ?> Made With <b>❤</b> by <a href="#">Choi_Anam</a> | </strong> Information System
</footer>
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>assets/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/admin/dist/js/demo.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/admin/plugins/toastr/toastr.min.js"></script>
<!-- page script -->
<script>
   $(function() {
      $('#example1').DataTable()
      $('#example2').DataTable({
         'paging': true,
         'lengthChange': false,
         'searching': false,
         'ordering': true,
         'info': true,
         'autoWidth': false
      })
      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
         checkboxClass: 'icheckbox_minimal-blue',
         radioClass: 'iradio_minimal-blue'
      })
      //Date picker
      $('#datepicker').datepicker({
         autoclose: true,
         format: 'yyyy/mm/dd',
      })
      //Initialize Select2 Elements
      $('.select2').select2()
   })
</script>
</body>

</html>