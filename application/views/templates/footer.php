<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
	<div class="container-fluid">
		<p class="copyright">&copy; 2019 <strong>Yoga</p>
	</div>
</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>

<script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?= base_url('assets/');?>vendor/chartist/js/chartist.min.js"></script>
<script src="<?= base_url('assets/');?>scripts/klorofil-common.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/');?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="<?php echo base_url('assets/');?>plugins/toast/jquery.toast.min.js"></script>

<!--PLUGIN-->
<script src="<?php echo base_url('assets/');?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/daterangepicker/daterangepicker.js"></script>

<script>
  function printpage() 
  {
    var printButton = document.getElementById("buttonPrint");
    var sidebar = document.getElementById("sidebar-nav");
    var main = document.getElementById("main");
    var restorepage = document.body.innerHTML;

    printButton.style.visibility = 'hidden';
    sidebar.style.visibility = 'hidden';
    main.style.width = '720px';

    window.print()

    printButton.style.visibility = 'visible';
    sidebar.style.visibility = 'visible';
    document.body.innerHTML = restorepage;
  }
</script>

<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>

<script type="text/javascript">
  $(".alert-dismissable").fadeTo(6000, 500).slideUp(500, function() {
    $(this).alert('close');
  });
</script>

<script>
  var table = document.getElementById('example4');

  for(var i = 1; i < table.rows.length; i++)
  {
    table.rows[i].onclick = function()
    {
     document.getElementById("kd_pasien").value = this.cells[0].innerHTML;
   };
 }
</script>

<script>

  var table = document.getElementById('example5');

  for(var i = 1; i < table.rows.length; i++)
  {
    table.rows[i].onclick = function()
    {
     document.getElementById("kd_obat").value = this.cells[0].innerHTML;
     document.getElementById("qty").value = this.cells[2].innerHTML;
   };
 }

</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
    $("#example5").DataTable();
    $('#example6').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
    $('.datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    });
    $(".datepicker").datepicker("setDate", new Date());

    $('.datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".datepicker2").datepicker("setDate", new Date());

    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".datepicker3").datepicker("setDate", new Date());

    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".datepicker4").datepicker("setDate", new Date());

    $('.datepicker5').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    
    $(".timepicker").timepicker({
      showInputs: true
    });
  });
</script>

<?php if($this->session->flashdata('message')=='add'):?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Data Berhasil disimpan ke database.",
      showHideTransition: 'slide',
      icon: 'success',
      allowToastClose : false,
      hideAfter: 3000,
      position: 'top-right',
      bgColor: '#2c8f95'
    });
  </script>

  <?php elseif($this->session->flashdata('message')=='update'):?>
    <script type="text/javascript">
      $.toast({
        heading: 'Success',
        text: "Data Berhasil diupdate ke database.",
        showHideTransition: 'slide',
        icon: 'success',
        allowToastClose : false,
        hideAfter: 3000,
        position: 'top-right',
        bgColor: '#2c8f95'
      });
    </script>

    <?php elseif($this->session->flashdata('message')=='delete'):?>
      <script type="text/javascript">
        $.toast({
          heading: 'Success',
          text: "Data Berhasil dihapus dari database.",
          showHideTransition: 'slide',
          icon: 'success',
          allowToastClose : false,
          hideAfter: 3000,
          position: 'top-right',
          bgColor: '#2c8f95'
        });
      </script>

      <?php elseif($this->session->flashdata('message')=='selisih'):?>
        <script type="text/javascript">
          $.toast({
            heading: 'Info',
            text: "Ada Obat yang mendekati masa kadaluarsa, cek obat masuk !!!",
            showHideTransition: 'slide',
            icon: 'warning',
            hideAfter: 10000,
            position: 'top-right',
            bgColor: '#952c38'
          });
        </script>

        <?php elseif($this->session->flashdata('message')=='useraktif'):?>
          <script type="text/javascript">
            $.toast({
              heading: 'Success',
              text: "User diaktifkan",
              showHideTransition: 'slide',
              icon: 'success',
              allowToastClose : false,
              hideAfter: 3000,
              position: 'top-right',
              bgColor: '#2c8f95'
            });
          </script>

          <?php elseif($this->session->flashdata('message')=='usernonaktif'):?>
            <script type="text/javascript">
              $.toast({
                heading: 'Success',
                text: "User dinonaktifkan",
                showHideTransition: 'slide',
                icon: 'success',
                allowToastClose : false,
                hideAfter: 3000,
                position: 'top-right',
                bgColor: '#2c8f95'
              });
            </script>

          <?php elseif($this->session->flashdata('message')=='stok'):?>
            <script type="text/javascript">
              $.toast({
                heading: 'Warning',
                text: "Tidak boleh melebihi stok",
                showHideTransition: 'slide',
                icon: 'warning',
                allowToastClose : false,
                hideAfter: 3000,
                position: 'top-right',
                bgColor: '#2c8f95'
              });
            </script>

            <?php else:?>

            <?php endif;?>

          </body>

          </html>
