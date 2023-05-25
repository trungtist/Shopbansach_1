<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Shop</title>
    <link rel="icon" href="{{ asset('assets/admin/images/manager.png') }}" type="image/png" />
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    @yield('css')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('admin.blocks.siderbar')
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('admin.blocks.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const MAX_LENGTH_NAME = 200;
        const MAX_LENGTH_NAME_CUS = 50;
        const MAX_LENGTH_NUMBER = 9;
        const MAX_LENGTH_PASS = 32;
        const MAX_LENGTH_EMAIL = 55;
        const email =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        const pw = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;

        function short_url(full_url, remove_str, concat_str = '') {
            if (full_url.includes(remove_str)) {
                return full_url.substring(0, full_url.indexOf(remove_str)) + concat_str;
            }
            return full_url
        }

        $(function() {
            var current_page_URL = location.href;
            current_page_URL = short_url(current_page_URL, '/index')
            current_page_URL = short_url(current_page_URL, '?')
            current_page_URL = short_url(current_page_URL, '#')
            current_page_URL = short_url(current_page_URL, '/edit', '/manage')
            current_page_URL = short_url(current_page_URL, '/delete', '/manage')
            current_page_URL = short_url(current_page_URL, '/create', '/manage')
            current_page_URL = short_url(current_page_URL, '/detail', '/manage')
            $("a").each(function() {
                if ($(this).attr("href") !== "#") {
                    var target_URL = $(this).prop("href");
                    if (target_URL == current_page_URL) {
                        $(this).parents('.nav-item').last().addClass('active');
                        if ($(this).parents('.sub-menu').length) {
                            $(this).closest('.collapse').addClass('show');
                            $(this).addClass('active');
                        }
                        $(this).parents('.nav-item').last().addClass('active');
                    }
                } else {
                    //$(this).parents('.nav-item').last().addClass('active');
                }
            });
        });
    </script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
    <!-- @* sweetalert *@ -->
    <script src="{{ asset('assets/admin/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/datatables-demo.js') }}"></script>
    @yield('js')
</body>

</html>
