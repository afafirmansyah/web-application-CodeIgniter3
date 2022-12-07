    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; PT. Yerry Primatama Hosindo [Engineering Division] <?= date('Y'); ?></span>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/bootstrap-datetimepicker.js"></script>
    <script src="<?= base_url('assets/'); ?>js/jquery-2.2.3.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

    <script>
        $('.custom-file-input').on('change', function() {
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
        });



        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');

            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });
        });
    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        // Otherwise, selectors are also supported
        flatpickr("input[type=datetime-local]", {});
    </script>

    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script> -->

    <script>
        $('document').ready(function() {
            setInterval(function() {
                getdata()
            }, 500)
        });

        function getdata() {
            $.ajax({
                url: "<?= base_url('dashboard/cleanlinessAutoload'); ?>",
                type: 'GET',
                success: function(respose) {
                    data = JSON.parse(respose);
                    //console.log(data);
                    $("#actual_cpl").text(data.actual_cpl);
                    $("#after_code_4um").text(data.after_code_4um);
                    $("#after_code_6um").text(data.after_code_6um);
                    $("#after_code_14um").text(data.after_code_14um);
                    $("#after_count_4um").text(data.after_count_4um);
                    $("#after_count_6um").text(data.after_count_6um);
                    $("#after_count_14um").text(data.after_count_14um);
                    $("#before_code_4um").text(data.before_code_4um);
                    $("#before_code_6um").text(data.before_code_6um);
                    $("#before_code_14um").text(data.before_code_14um);
                    $("#before_count_4um").text(data.before_count_4um);
                    $("#before_count_6um").text(data.before_count_6um);
                    $("#before_count_14um").text(data.before_count_14um);
                    $("#date").text(data.date);
                    $("#element_price").text(data.element_price);
                    $("#element_qty").text(data.element_qty);
                    $("#filter_brand").text(data.filter_brand);
                    $("#filter_housing1").text(data.filter_housing1);
                    $("#filter_housing2").text(data.filter_housing2);
                    $("#flowrate").text(data.flowrate);
                    $("#fuel_processed").text(data.fuel_processed);
                    $("#id").text(data.id);

                    var before_4um = data.before_code_4um * 4 + '%';
                    var before_6um = data.before_code_6um * 4 + '%';
                    var before_14um = data.before_code_14um * 4 + '%';
                    var after_4um = data.after_code_4um * 4 + '%';
                    var after_6um = data.after_code_6um * 4 + '%';
                    var after_14um = data.after_code_14um * 4 + '%';
                    var before_dpt = data.filter_housing1 * 4 + '%';

                    $("#before_dpt").css({
                        "width": before_dpt
                    });
                    $("#width_before_4um").css({
                        "width": before_4um
                    });
                    $("#width_before_6um").css({
                        "width": before_6um
                    });
                    $("#width_before_14um").css({
                        "width": before_14um
                    });
                    $("#width_after_4um").css({
                        "width": after_4um
                    });
                    $("#width_after_6um").css({
                        "width": after_6um
                    });
                    $("#width_after_14um").css({
                        "width": after_14um
                    });

                }
            });
        }
    </script>

    </body>

    </html>