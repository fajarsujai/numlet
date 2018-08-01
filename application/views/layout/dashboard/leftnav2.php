<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3" id="sidebar">
            <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                <li class="<?php if($n_active =='home'){ echo 'active';     } ?>">
                    <a href="<?php echo base_url(); ?>home"><i class="icon-chevron-right"></i> Home</a>
                </li>
                <li class="<?php if($n_active =='arsip'){ echo 'active'; } ?>">
                    <a href="<?php echo base_url(); ?>home/arsip"><i class="icon-chevron-right"></i> Arsip</a>
                </li>
            </ul>
        </div>
