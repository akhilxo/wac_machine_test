</div>
<!-- End of Main Content -->
 <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                     
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Alertify -->
    
    <script src="<?php echo base_url(); ?>assets/js/alertify.min.js"></script>

        <!-- Set default position -->
        <script>

        alertify.set('notifier','position', 'top-center');

        <?php
        if($this->session->flashdata('noti'))
        {

        $flashdata = $this->session->flashdata('noti');

        ?>

        <?php

        if($flashdata['type']=="success")
        {
        ?>

        alertify.success('<?php echo $flashdata['msg']; ?>');

        <?php
        }
        ?>


        <?php

        if($flashdata['type']=="error")
        {
        ?>

        alertify.error('<?php echo $flashdata['msg']; ?>');

        <?php
        }
        ?>

        

        <?php
        
        }

        ?>



        </script>

        

    <!---->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Datatable -->
    <script src="<?php echo base_url(); ?>assets/js/datatables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>



    <!-- Datatables  -->

    <script>
    $(document).ready(function () {
    $('#dataTable').DataTable({
        "scrollX": true,
        "autoWidth": true
    });
});
    </script>

    <!-- ### -->


</body>

</html>