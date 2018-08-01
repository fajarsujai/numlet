        <!--/.fluid-container-->
        <script src="<?php echo base_url(); ?>vendors/jquery-1.9.1.min.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>assets/scripts.js"></script>
        <script src="<?php echo base_url(); ?>vendors/datatables/js/jquery.dataTables.min.js"></script>
        <?php 

            if(isset($p_datatable))
            {
                $this->load->view($p_datatable);
            }

        ?>
    </body>

</html>