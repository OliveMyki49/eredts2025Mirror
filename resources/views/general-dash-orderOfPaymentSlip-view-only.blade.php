<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_css_bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" />
    <link id="pagestyle" href="{{ asset('assets/css/datatables.min.css') }}" rel="stylesheet" />
    <link id="pagestyle9" href="{{ asset('assets/css/codePenMagicToolTip.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" /> --}}

    <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>

    {{-- convert html to canvas to image --}}
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
    <style>
        div {
            font-family: "Times New Roman", Times, serif;
            font-size: 24px;
        }

        input {
            color: black;
        }

        .invoice-box {
            /* background: linear-gradient(rgba(255,255,255,.9), rgba(255,255,255,.9)), url("Panarayon Old Logo.png"); */
            background-repeat: no-repeat;
            background-position: 45% 50%;
            background-size: 80% 80%;
            max-width: 100%;
            margin-block-end: auto;
            margin-top: 0;
            /* margin: none; */
            /* padding: 30px; */
            /*border: 1px solid #eee;*/
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
            font-size: 9px;
            line-height: 24px;
            font-family: Tahoma, Times, serif;
            padding-top: 3em;
            padding-right: 3em;
            padding-left: 3em;
        }

        .invoice-box::before {}

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        /* .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            } */

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        /* print */
        @media print {

            .invoice-box {
                height: 100%;
            }

            thead {
                padding-top: 150px;
            }

            body,
            table,
            tr,
            td {
                margin: 0;
                padding: 0;
            }

            .button_appear {
                visibility: hidden;
            }

            /* Show only the printable element */
            #printable {
                visibility: visible;
                margin-top: 0;
                padding: 0;
            }

            @page {
                /* Chrome sets own margins, we change these printer settings */
                margin: 0mm 7mm 7mm 7mm;
                /* margin: 0; */
            }

            footer {
                visibility: hidden;
            }

            /* Set color to exact color */
            body {
                -webkit-print-color-adjust: exact;
                zoom: 50%;
            }
        }
    </style>

    <script src="/assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.2_dist_js_bootstrap.bundle.min.js"></script>

    {{-- region print function --}}
    <script type="text/javascript">
        //print function
        /* var delayInMilliseconds = 500; //0.5 second
                setTimeout(function() {
                    window.print();
                }, delayInMilliseconds);
        
                $(document).ready(function() { //csrf prevent cross platform injection
                    window.addEventListener('afterprint', function() {
                        // close print tab if exit
                        setTimeout(function() {
                            window.close();
                        }, 500);
                    });
                }); */
    </script>
    {{-- endregion print function --}}
</head>

<body class="g-sidenav-show  bg-gray-200" oncontextmenu="return false;">

    {{-- {{ dd($doc_info) }} --}}


    @if ($ofp != null)
        <div class="text-center my-3">
            <button class="btn btn-outline-primary btn-print-order-of-payment">Print </button>
        </div>

        <div class="alert alert-info alert-dismissible fade show my-2 mx-4 ofp_already_exists" data-bs-dismiss="alert" role="alert">
            <strong>This order of payment is view only</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            $(function() {
                setTimeout(function() {
                    $('.ofp_already_exists').remove();
                }, 5000);
            });
        </script>

        <div class="container_content" id="container_content">
            <div class="invoice-box invoice-box-original">
                <form id="ofp_form">
                    <input type="hidden" id="doc_id" name="doc_id" value="{{ $doc_info->id }}" disabled>
                    <input type="hidden" id="creator_id" name="creator_id" value="{{ $ofp != null ? $ofp->creator_id : $creator_id }}" disabled>

                    {{-- Start of table --}}
                    <table id="printable" class="m-0 p-0" cellpadding="0" cellspacing="0">
                        <tbody class="border border-dark border-3">
                            <tr class="top m-0 p-0">
                                <td class="m-0 p-0" colspan="2">
                                    <br>
                                    <div class="text-center" style="position: relative">
                                        <div class="d-flex justify-content-end" style="position: absolute; top: -15px; left:10%;">
                                            <img src="{{ asset('assets/img/denrlogoplain.webp') }}" class="navbar-brand-img h-2 v-2" alt="main_logo" width="120px" height="120px">
                                        </div>
                                        <p style="margin-block-start: 0px;">
                                            <span class="fs-4">Republic of the Philippines</span>
                                            @if ($user_office->header_office_title != null)
                                                <br><span class="fs-4">DEPARTMENT OF ENVIRONMENT AND NATURAL RESOURCES</span>
                                            @endif
                                            <br>
                                            @php
                                                $header_title = $user_office->header_office_title;
                                                if ($ofp != null) {
                                                    $header_title = $ofp->header_title;
                                                }

                                                if ($header_title == null) {
                                                    $header_title = 'DEPARTMENT OF ENVIRONMENT AND NATURAL RESOUCES';
                                                }
                                            @endphp
                                            <span class="fs-4 header_title"><b>{{ $header_title }}</b></span>
                                            @if ($ofp != null)
                                                @if ($ofp->header_address != null)
                                                    <br><span class="fs-4 header_address">{{ $ofp->header_address }}</span>
                                                @endif
                                            @else
                                                @if ($user_office->office_address != null)
                                                    <br><span class="fs-4 header_address">{{ $user_office->office_address }}</span>
                                                @endif
                                            @endif

                                            <br>

                                            {{-- office title and adddress --}}
                                            <input type="hidden" name="header_title" value="{{ $user_office->header_office_title }}" disabled>
                                            <input type="hidden" name="header_address" value="{{ $user_office->office_address }}" disabled>
                                        </p>
                                    </div>
                                </td>
                            </tr>

                            {{-- Start of CERTIFICATION --}}
                            <tr>
                                <td colspan="2">
                                    <div class="text-center">
                                        <span class="h4"><b>ORDER OF PAYMENT</b></span><br>
                                    </div>
                                </td>
                            </tr>
                            {{-- End of CERTIFICATION --}}

                            {{-- region header --}}
                            <tr class="information p-2">
                                <td class="px-5 pb-4" colspan="2">
                                    <div class="row m-0 justify-content-end">
                                        <div class="col-1 text-start fw-bold">
                                            No.:
                                        </div>
                                        <div class="col-2 border-bottom border-dark text-center">
                                            <input type="text" class="border-0 fs-12 bg-transparent text-center" id="or_no" name="or_no" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="" value="{{ $ofp != null ? $ofp->or_no : '' }}" disabled>
                                        </div>
                                    </div>
                                    <div class="row m-0 justify-content-end">
                                        <div class="col-1 text-start fw-bold">
                                            Date:
                                        </div>
                                        <div class="col-2 text-start border-bottom border-dark" style="position: relative">
                                            <div style="position: absolute; bottom: 0; left: 50%;">
                                                <input type="date" id="or_no_dated" name="or_no_dated" class="border-0 fs-12 bg-transparent text-center" style="opacity: 0; z-index: 999; width: 20px;" value="{{ $ofp != null ? $ofp->or_no_dated : '' }}" disabled>
                                            </div>
                                            <div class="or_no_dated text-center">
                                                {{-- input date --}}
                                                @if ($ofp != null)
                                                    @if ($ofp->or_no_dated != null)
                                                        {{ date('F d, Y', strtotime($ofp->or_no_dated)) }}
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-0">
                                        <div class="col text-start fw-bold">
                                            The Collecting Officer
                                        </div>
                                    </div>
                                    <div class="row m-0">
                                        <div class="col text-start fw-bold">
                                            Cash Unit
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-3">
                                        <div class="col-6 fw-bold">
                                            Please Issue Official Receipt in favor of
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-3 justify-content-center">
                                        <div class="col-8 border-bottom border-dark text-center fw-bold">
                                            @php
                                                $client_fname = $doc_info->client_fname;
                                                $client_mname = $doc_info->client_mname[0] . '.';
                                                $client_sname = $doc_info->client_sname;
                                                $client_suffix = $doc_info->client_suffix != null ? $doc_info->client_suffix : '';
                                                $client_fullname = $client_fname . ' ' . $client_mname . ' ' . $client_sname . ' ' . $client_suffix;
                                            @endphp
                                            {{ $client_fullname }}
                                        </div>
                                        <div class="col-12 text-center">
                                            (Name)
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-3 justify-content-center">
                                        <div class="col-8 border-bottom border-dark text-center fw-bold">
                                            {{ $doc_info->client_address }}
                                        </div>
                                        <div class="col-12 text-center">
                                            (Address)
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-2">
                                        <div class="col-7 fw-bold">
                                            &nbsp;
                                        </div>
                                        <div class="col-2 fw-bold">
                                            <input type="text" class="border-0 fs-12 bg-transparent fw-bold text-start" oninput="this.style.width = ((this.value.length * 10) + 5) + 'px';" placeholder="" value="Payment for:" disabled>
                                        </div>
                                        <div class="col-1">
                                            &nbsp;
                                        </div>
                                        <div class="col-2 show_add_cost_break_down_item">
                                            &nbsp;
                                        </div>
                                    </div>
                                    <div class="cost_break_down">
                                        {{-- populate cost breakdown here --}}

                                        @foreach ($ofp_cost_breakdown as $ofpCB)
                                            <div class="row m-0 mt-2 cost_break_down_item_container">
                                                <div class="col-7 fw-bold">
                                                    &nbsp;
                                                </div>
                                                <div class="col-2 border-bottom border-dark text-start">
                                                    <input type="text" class="border-0 fs-12 bg-transparent text-start cost_break_down_item_name" name="cost_break_down_item_name[]" oninput="this.style.width = ((this.value.length * 10) + 5) + 'px';" placeholder="Item Name" value="{{ $ofpCB->cost_breakdown }}" disabled>
                                                </div>
                                                <div class="col-1 text-end">
                                                    -
                                                </div>
                                                <div class="col-2 border-bottom border-dark text-center" style="position: relative">
                                                    <button class="btn btn-outline-danger btn-sm border border-0 text-white btn-remove-breakdown" style="position: absolute; right:0;">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                    <div class="d-flex flex-row">
                                                        <div>PHP </div>
                                                        <div><input type="number" class="border-0 fs-12 bg-transparent cost_break_down_item" name="cost_break_down_item[]" oninput="this.style.width = ((this.value.length * 25) + 10) + 'px';" placeholder="Input Amount" value="{{ $ofpCB->cost_breakdown_amount . '.00' }}" disabled></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="row m-0 mt-2">
                                        <div class="col-3 fw-bold">
                                            in the amount of :
                                        </div>
                                        <div class="col-7 border-bottom border-dark text-center pay_amount_in_text">
                                            <span class="text-danger">-- Enter amount --</span>
                                        </div>
                                        <div class="col-2 border-bottom border-dark text-center">
                                            <div class="d-flex flex-row">
                                                <div>PHP </div>
                                                <div>
                                                    <input type="text" id="pay_amount" name="pay_amount" class="border-0 fs-12 bg-transparent" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="Input Amount" value="{{ $ofp != null ? $ofp->pay_amount . '.00' : '' }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-2">
                                        <div class="col-3 fw-bold">
                                            for the payment of :
                                        </div>
                                        <div class="col-9 border-bottom border-dark text-center">
                                            <input type="text" id="payment_for" name="payment_for" class="border-0 fs-12 bg-transparent text-center" oninput="this.style.width = ((this.value.length * 10) + 5) + 'px';" placeholder="Payment for . . ." value="{{ $doc_info->req_type_full }}" disabled>
                                        </div>
                                        <div class="col-3">
                                            {{-- white space --}}
                                        </div>
                                        <div class="col-9 text-center">
                                            (purpose)
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-3">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-6 fw-bold">
                                                    Per Bill No.
                                                </div>
                                                <div class="col-5 border-bottom border-dark text-center">
                                                    <input type="text" id="per_bill_no" name="per_bill_no" class="border-0 fs-12 bg-transparent text-center" value="{{ $ofp->per_bill_no }}" oninput="this.style.width = ((this.value.length * 10) + 5) + 'px';" disabled>
                                                </div>
                                                <div class="col-1">
                                                    {{-- white space --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-2">
                                                    {{-- white space --}}
                                                </div>
                                                <div class="col-3 fw-bold">
                                                    Dated
                                                </div>
                                                <div class="col-7 border-bottom border-dark text-center" style="position: relative">
                                                    <div style="position: absolute; bottom: 0; left: 50%;">
                                                        <input type="date" id="per_bill_no_dated" name="per_bill_no_dated" class="border-0 fs-12 bg-transparent text-center" value="{{ $ofp->per_bill_no_dated }}" style="opacity: 0; z-index: 999; width: 20px;" disabled>
                                                    </div>
                                                    <div class="per_bill_no_dated text-center">
                                                        {{-- input date --}}
                                                        @if ($ofp != null)
                                                            @if ($ofp->per_bill_no_dated != null)
                                                                {{ date('F d, Y', strtotime($ofp->per_bill_no_dated)) }}
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-4">
                                        <div class="col-6 fw-bold">
                                            Please deposit the collection under the Bank Account:
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-4">
                                        <div class="col-3">
                                            <div class="row">
                                                <div class="col-12 fw-bold text-center">
                                                    No.
                                                </div>
                                                <div class="col-12 border-bottom border-dark text-center">
                                                    3402-2674-95
                                                </div>
                                                <div class="col-12 border-bottom border-dark text-center">
                                                    &nbsp;
                                                    {{-- underline --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            {{-- white space --}}
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12 fw-bold text-center">
                                                    Name of Bank
                                                </div>
                                                <div class="col-12 border-bottom border-dark text-center">
                                                    LBP - LEGAZPI BRANCH
                                                </div>
                                                <div class="col-12 border-bottom border-dark text-center">
                                                    &nbsp;
                                                    {{-- underline --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            {{-- white space --}}
                                        </div>
                                        <div class="col-3 border-bottom border-dark text-center">
                                            <div class="row">
                                                <div class="col-12 fw-bold text-center">
                                                    Amount
                                                </div>
                                                <div class="col-12 border-bottom border-dark text-center">
                                                    <input type="text" id="pay_amount_total" name="pay_amount_total" class="border-0 fs-12 bg-transparent text-center" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="Input Amount" value="{{ $ofp != null ? $ofp->pay_amount . '.00' : '' }}" disabled>
                                                </div>
                                                <div class="col-12 border-bottom border-dark text-center">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row m-0 mt-3">
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12 mb-4 fw-bold">
                                                    Prepared By:
                                                </div>
                                                <div class="col-12 fw-bold">
                                                    @php
                                                        $fname = $user_profile->fname;
                                                        $mname = $user_profile->mname;
                                                        $sname = $user_profile->sname;
                                                        $suffix = $user_profile->suffix;
                                                        $fullname = $fname . ' ' . $mname . ' ' . $sname . ' ' . $suffix;

                                                        $position = $user_profile->position;
                                                    @endphp
                                                    <input type="text" id="clerk_fullname" name="clerk_fullname" class="border-0 fs-12 bg-transparent text-start fw-bold" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="FULLNAME OF CLERK" value="{{ $ofp != null ? $ofp->clerk_fullname : $fullname }}" disabled>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" id="prepared_by_position" name="prepared_by_position" class="border-0 fs-12 bg-transparent text-start" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="Position Here" value="{{ $ofp != null ? $ofp->prepared_by_position : $position }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-12 mb-4 fw-bold">
                                                    <textarea class="fw-bold border border-0" name="approving_remarks" rows="1" style="width: 100%; resize: none;" oninput="this.rows = this.value.split('\n').length;">Approved</textarea>
                                                </div>
                                                <div class="col-12 fw-bold">
                                                    <input type="text" id="approving_fullname" name="approving_fullname" class="border-0 fs-12 bg-transparent text-start fw-bold" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="FULLNAME OF APPROVING" value="{{ $ofp != null ? $ofp->approving_fullname : '' }}" disabled>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" id="approving_position" name="approving_position" class="border-0 fs-12 bg-transparent text-start" oninput="this.style.width = ((this.value.length * 25) + 5) + 'px';" placeholder="Position Here" value="{{ $ofp != null ? $ofp->approving_position : '' }}" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col-3 mb-4 fw-bold text-end">
                                                    Total
                                                </div>
                                                <div class="col-9 p-0">
                                                    <div class="border-bottom border-dark text-center grand_total_payment">
                                                        {{ $ofp != null ? $ofp->pay_amount . '.00' : '' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            {{-- endregion header --}}
                        </tbody>

                        <tbody>
                            <tr>
                                <td>
                                    {{-- body print here --}}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    {{-- End of table --}}
                </form>
            </div>

            <div class="invoice-box cont2">

            </div>
        </div>

        <div class="text-center my-3">
            <button class="btn btn-outline-primary btn-print-order-of-payment">Print </button>
        </div>

        {{-- <button class="btn btn-outline-primary converttoimg">
        convert to image
    </button> --}}
        {{-- <img id="outputImage" src="" width="100%" height="100%"> --}}

        {{-- region cost breakdown --}}
        <script>
            // Convert numbers to words
            // copyright 25th July 2006, by Stephen Chapman http://javascript.about.com
            // permission to use this Javascript on your web page is granted
            // provided that all of the code (including this copyright notice) is
            // used exactly as shown (you can change the numbering system if you wish)

            // American Numbering System
            let th = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];
            // uncomment this line for English Number System
            // let th = ['','thousand','million', 'milliard','billion'];

            let dg = ['Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
            let tn = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
            let tw = ['Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];

            function toWords(s) {
                s = s.toString();
                s = s.replace(/[\, ]/g, '');
                if (s != parseFloat(s)) {
                    $('#pay_amount').val('');
                    return 'not a number';
                }
                let x = s.indexOf('.');
                if (x == -1) {
                    x = s.length;
                };
                if (x > 15) {
                    return 'too big';
                };
                let n = s.split('');
                let str = '';
                let sk = 0;
                for (let i = 0; i < x; i++) {
                    if ((x - i) % 3 == 2) {
                        if (n[i] == '1') {
                            str += tn[Number(n[i + 1])] + ' ';
                            i++;
                            sk = 1;
                        } else if (n[i] != 0) {
                            str += tw[n[i] - 2] + ' ';
                            sk = 1;
                        }
                    } else if (n[i] != 0) {
                        str += dg[n[i]] + ' ';
                        if ((x - i) % 3 == 0) {
                            str += 'Hundred '
                        };
                        sk = 1;
                    }
                    if ((x - i) % 3 == 1) {
                        if (sk) {
                            str += th[(x - i - 1) / 3] + ' ';
                        };
                        sk = 0;
                    }
                }
                if (x != s.length) {
                    /* NOTE: Point Zeros are ignored can be reactivated when needed */
                    /* let y = s.length;
                    str += 'point ';
                    for (let i = x + 1; i < y; i++) {
                        str += dg[n[i]] + ' ';
                    } */
                }

                return str; // Add a return statement to return the result.
            }

            function generate_total_to_text() {
                let amount = $('#pay_amount').val();
                var no_to_words = toWords(amount);
                $('.pay_amount_in_text').empty().append(no_to_words);

                $(this).val(amount + '.00');
                $('#pay_amount_total').val('PHP ' + amount + '.00');
                $('.grand_total_payment').empty().append('PHP ' + amount + '.00');
                if ($('.pay_amount_in_text').text() == 'not a number') {
                    $('.pay_amount_in_text').addClass('btn-danger');
                    $(this).val('');
                } else {
                    $('.pay_amount_in_text').removeClass('btn-danger');
                    $('.pay_amount_in_text').append('Pesos');
                }
            }

            $(function() {
                // generate to text uput amount of payment
                $('#pay_amount').change(function() {
                    generate_total_to_text();
                    $('#pay_amount').val($('#pay_amount').val() + '.00')
                });

                // show add cost breakdown button
                $(document).on('mouseenter', '.show_add_cost_break_down_item', function() {
                    $(this).find(".btn_add_cost_break_down_item").show();
                }).on('mouseleave', 'div', function() {
                    $(this).find(".btn_add_cost_break_down_item").hide();
                });

                //remove breakdown item
                $('.cost_break_down').on('click', '.btn-remove-breakdown', function() {
                    $(this).closest('div.cost_break_down_item_container').remove();
                });

                //count breakdown
                $('.cost_break_down').on('change', '.cost_break_down_item', function() {
                    count_breakdown()
                    $(this).val($(this).val() + '.00');
                });

                function count_breakdown() {
                    let total_breakdown_amout = 0;
                    $('.cost_break_down .cost_break_down_item_container .cost_break_down_item').each(function() {
                        let value = parseFloat($(this).val()) || 0;
                        total_breakdown_amout += value;
                    });

                    $('#pay_amount').val(total_breakdown_amout);
                    generate_total_to_text();
                    $('#pay_amount').val($('#pay_amount').val() + '.00');
                }
            });
        </script>
        {{-- endregion cost breakdown --}}

        <script>
            generate_total_to_text();
        </script>

        {{-- region create html to img code --}}
        {{-- <script>
        $(function() {
            $('.converttoimg').click(function() {
                // Get the div and the image element
                const contentDiv = document.getElementById("printable");
                const outputImage = document.getElementById("outputImage");

                // Use html2canvas to convert the div to an image
                html2canvas(contentDiv).then(function(canvas) {
                    // Convert the canvas to a data URL
                    const imageDataUrl = canvas.toDataURL("image/png");

                    // Set the data URL as the source for the img element
                    // outputImage.src = imageDataUrl;

                    // bypass link open error
                    debugBase64(imageDataUrl);

                    function debugBase64(base64URL) {
                        var win = window.open();

                        win.document.write('<div>' +
                            '<img src="' + base64URL + '" style="border:0; width:100%; height:40%;" />' +
                            '<hr style="border-top: dotted 5px;" />' +
                            '<img src="' + base64URL + '" style="border:0; width:100%; height:40%;" />' +
                            '</div>');

                        // Wait for a short delay before triggering the print
                        setTimeout(function() {
                            win.print();
                        }, 500); // You can adjust the delay (in milliseconds) as needed
                    }
                });
            });
        });
    </script> --}}
        {{-- endregion create html to img code --}}

        {{-- region convert date to text month format --}}
        <script>
            $(document).ready(function() {
                $('#or_no_dated').change(function() {
                    // Get the selected date value
                    var selectedDate = $(this).val();

                    // Convert the date to the desired format
                    var formattedDate = new Date(selectedDate).toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });

                    // Output the formatted date
                    // console.log("Input in the date tag:", selectedDate);
                    $('.or_no_dated').text(formattedDate);
                });
                $('#per_bill_no_dated').change(function() {
                    // Get the selected date value
                    var selectedDate = $(this).val();

                    // Convert the date to the desired format
                    var formattedDate = new Date(selectedDate).toLocaleDateString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric'
                    });

                    // Output the formatted date
                    // console.log("Input in the date tag:", selectedDate);
                    $('.per_bill_no_dated').text(formattedDate);
                });
            });
        </script>
        {{-- endregion convert date to text month format --}}

        {{-- region print function --}}
        <script>
            $(function() {
                // save and print
                $('.btn-print-order-of-payment').click(function(e) {
                    e.preventDefault();
                    print_item();
                });

                function print_item() {
                    var formCopy1 = $('#ofp_form').clone(); // create a copy of the form content
                    var formCopy2 = $('#ofp_form').clone(); // create a copy of the form content

                    $('.btn-print-order-of-payment').hide();
                    $('.btn-save-order-of-payment').hide();
                    $('.invoice-box-original').hide();

                    $('.cont2').append(formCopy1);
                    $('.cont2').append('<hr style="border-top: dotted 5px;" />');
                    $('.cont2').append(formCopy2);
                    window.print();

                    $('.cont2').empty();
                    $('.btn-print-order-of-payment').show();
                    $('.btn-save-order-of-payment').show();
                    $('.invoice-box-original').show();
                }

                $('form').on('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission behavior
                });
            });
        </script>
        {{-- endregion print function --}}

        {{-- region queries --}}
        <script>
            $(function() {
                //... code here
            });
        </script>
        {{-- endregion queries --}}
    @else
        <div style="
            text-align: center; 
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%); 
            font: small-caps bold 24px/1 sans-serif;
            height: 100%;
            padding-top: 20%;
        ">
            <span>
                <h2>♡</h2>
                <h2>
                    ☕︎ <º))))>
                        < </h2>
                            <h2>Denr RFSOATS: No order of payment is created yet</h2>
            </span>
        </div>
    @endif
</body>
