<div class="span9" id="content">
	<div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Data Surat</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
              		<table id="example" class="table-responsive-sm table table-sm display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Pengaju</th>
                                <th>Perihal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal hide fade " id="detail_surat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Detail Surat</h3>
    </div>
    <div class="modal-body">
        <table class="table">
            <tr>
                <td>No. Surat</td>
                <td><div id="no_surat"></div></td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td><div id="perihal"></div></td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td><div id="tujuan"></div></td>
            </tr>
            <tr>
                <td>Penerima</td>
                <td><div id="penerima"></div></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><div id="alamat"></div></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><div id="status"></div></td>
            </tr>
            <tr>
                <td>Waktu di buat</td>
                <td><div id="waktu"></div></td>
            </tr>

        </table>
    </div>
</div>