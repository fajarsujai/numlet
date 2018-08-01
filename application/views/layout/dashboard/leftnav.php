<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="<?php if($n_active =='dashboard'){ echo 'active';     } ?>">
                    <a href="<?php echo base_url(); ?>dashboard"><i class="icon-chevron-right"></i> Dashboard</a>
                </li>
                <li class="<?php if($n_active =='mastersurat'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url(); ?>dashboard/mastersurat"><i class="icon-chevron-right"></i> Master Surat</a>
                </li>
                <li class="<?php if($n_active =='masteruser'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url(); ?>dashboard/masteruser"><i class="icon-chevron-right"></i> Master User</a>
                </li>
            </ul>
        </div>
