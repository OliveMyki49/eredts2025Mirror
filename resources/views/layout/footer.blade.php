    <script>
        // JavaScript function to scroll to top
        function scrollToTop() {
            window.scrollTo(0, 0);
        }
    </script>


    @php
        $curr_url = $_SERVER['REQUEST_URI']; //get current url
    @endphp

{{-- apply special padding for client dahsboard only --}}
    @if (
        $curr_url == '' ||
            $curr_url == '/client-dashboard-home?active_sidebar=client-dashboard-home' ||
            $curr_url == '/client-dashboard?active_sidebar=client_dashboard' ||
            $curr_url ==
                '/client-dashboard-doc-tracking
        ')
        <style>
            @media screen and (min-width: 768px) {
                .padding-x-15 {
                    padding-left: 15% !important;
                    padding-right: 15% !important;
                }
            }
        </style>
    @endif

    <footer class="footer py-2 padding-x-15">

        <div class="container-fluid footer_theme">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4 p-2 ps-4">
                    <div class="copyright text-center text-sm text-lg-start">
                        ©
                        {{ date('Y') }},
                        made with <i class="fa fa-heart"></i> by
                        <a href="/" class="font-weight-bold badge bg-primary" target="_parent">DENR RICT RO V</a>
                    </div>
                </div>
                <div class="col-lg-6 mb-lg-0 mb-4 p-2 pe-4 btn-go-to-top-container">
                    <div class="copyright text-center text-sm text-lg-end">
                        <button class="btn btn-primary btn-sm border-0 fs-6 btn-go-to-top-page" onclick="scrollToTop()"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Go to top</button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
