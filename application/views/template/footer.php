<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> <?= "Helpdesk IT" ?>
    </div>
    <strong>Copyright &copy; <?= date('Y'); ?> <?= "UP3 Pematangsiantar" ?>.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Logout Modal-->

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content mt-5">
            <div class="bg-warning modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <h1> <i class="fas fa-lg fa-question-circle text-danger"></i></h1>
                </div>
                <div class="mb-2 text-center">
                    Apakah anda ingin keluar dari user ini?
                </div>
                <div class="mb-2 text-center">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-sm btn-warning" href="<?= base_url('akses/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>