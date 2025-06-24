<!DOCTYPE html>
<html lang="en">
@extends('layout.master')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('assets/js/jquery.3.2.1.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {

            $('#registration').dataTable({
                paging: true,
                fixedHeader: {
                    header: true
                },
                lengthChange: true,
                responsive: true,
                "pageLength": 10,
                dom: 'Bfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],

                buttons: [
                    'pageLength',
                    {
                        extend: 'excel',
                        text: 'Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i>'
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF <i class="fa fa-file-excel-o" aria-hidden="true"></i>'
                    },
                    {
                        extend: 'copy',
                        text: 'COPY <i class="fa fa-clipboard" aria-hidden="true"></i>'
                    },
                    'colvis'
                ],
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('.loadpanel').click(function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let id = $(this).attr('data-id');
                let tinid = $(this).attr('data-tinno');
                let empname = $(this).attr('data-id');

                var url = '{{ url('edit-register/{tinid}') }}';

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        empno: tinid
                    },
                    dataType: 'json',
                    success: function(result) {
                        console.log(result);
                        $('#registerModal').modal('show');
                        $("#registerModalLabel").html('Approve Registration');
                        $("#fname").val(result.data[0].fname);
                        $("#mname").val(result.data[0].mname);
                        $("#sname").val(result.data[0].sname);
                        $("#email").val(result.data[0].email);
                        $("#password").val(result.data[0].password);
                        $("#tin_no").val(result.data[0].tin_no);
                        $("#roles").val(result.data[0].roles);
                        $("#position").val(result.data[0].position);
                        $("#is_admin").val(result.data[0].is_admin);
                        $("#is_approve").val(result.data[0].is_approve);
                    },
                    error: function(error) {
                        alert(error);
                        console.log(error)
                    }
                });
            });

        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#approveSave").click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var data = $('.btn-approve').serialize();
                var url = '{{ url('update-register') }}';


                $.ajax({
                    url: url,
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        if (response.success) {
                            alert(response.message)
                            $('#registerModal').modal("hide");
                            location.reload();
                        } else {
                            alert("Error")
                        }
                    },
                    error: function(xhr, status, error) {
                        //alert("Duplicate entry not allowed!!!")
                        alert(error);
                    }
                });
            });
        });
    </script>
</head>



<body class="g-sidenav-show  bg-gray-200">
    @section('sidebar')
        @parent
        @include('layout.menu')
    @endsection
    @section('content')
        <table id="registration" class="table table-striped table-bordered dataTable " cellspacing="0" width="100%" role="grid" aria-describedby="personal_info" style="width: 100%;">
            <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" style="width: 20px;">No</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: auto;">FirstName</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: auto;">MiddleName</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: auto;">LastName</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: auto;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: auto;">Tin Number</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" aria-sort="descending" style="width: auto">Roles</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: auto;">Is_Admin</th>
                    <th class="sorting" tabindex="0" aria-controls="employees" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 100px;">Is_Approve</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th rowspan="1" colspan="1">No</th>
                    <th rowspan="1" colspan="1">FirstName</th>
                    <th rowspan="1" colspan="1">MiddleName</th>
                    <th rowspan="1" colspan="1">SurName</th>
                    <th rowspan="1" colspan="1">Email</th>
                    <th rowspan="1" colspan="1">Tin Number</th>
                    <th rowspan="1" colspan="1">Roles</th>
                    <th rowspan="1" colspan="1">Is_Admin</th>
                    <th rowspan="1" colspan="1">Is_Approve</th>
                </tr>
            </tfoot>
            <tbody>

                {{ csrf_field() }}
                @foreach ($register as $register)
                    <tr class="text-small">
                        <td>{{ $register->id }}</td>
                        <td><a href="javascript:void(0)" data-id="{{ $register->fname }}" data-tinno="{{ $register->tin_no }}" class="loadpanel">{{ $register->fname }}</a></td>
                        <td><a href="javascript:void(0)" data-id="{{ $register->mname }}" data-tinno="{{ $register->tin_no }}" class="loadpanel">{{ $register->mname }}</a></td>
                        <td><a href="javascript:void(0)" data-id="{{ $register->sname }}" data-tinno="{{ $register->tin_no }}" class="loadpanel">{{ $register->sname }}</a></td>
                        <td>{{ $register->email }}</td>
                        <td>{{ $register->tin_no }}</td>
                        <td>{{ $register->roles }}</td>
                        <td>{{ $register->is_admin }}</td>
                        <td>{{ $register->is_approve }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
    </main>
    <div class="modal  fade  " role="dialog" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deductModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success ">
                    <h5 class="modal-title" id="registerModalLabel">Approve Registration</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form id="formRegister" control="form-control" class="form-group btn-approve" action="" method="POST" role="form" class="text-start">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="empno" id="empno" class="form__input_entry" value="" readonly>

                            <div class="col">
                                <label>FirstName</label>
                                <input type="text" name="fname" id="fname" class="form__input_entry" placeholder="" readonly>
                            </div>
                            <div class="col">
                                <label>MiddleName</label>
                                <input type="text" name="mname" id="mname" class="form__input_entry" placeholder="" readonly>
                            </div>
                            <div class="col">
                                <label>SurName</label>
                                <input type="text" name="sname" id="sname" class="form__input_entry" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <label>Email Address</label>
                                <input type="text" name=" email" id="email" class="form__input_entry" placeholder="" readonly>
                            </div>
                            <div class="col">
                                <label>Tin Number</label>
                                <input type="text" name="tin_no" id="tin_no" class="form__input_entry" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Is_Aprrove</label>
                                <input type="text" name="is_approve" id="is_approve" class="form__input_entry" placeholder="" readonly>
                            </div>

                            <div class="col">
                                <label>Is_Admin</label>
                                <input type="text" name="is_admin" id="is_admin" class="form__input_entry" placeholder="" readonly>
                            </div>
                            <div class="col">
                                <label>Roles</label>
                                <select name="roles" id="roles" class="form__input_entry" required>
                                    <option disabled>Select </option>
                                    <option value="Administrator">Administrator </option>
                                    <option value="Employee">Employee </option>
                                    <option value="Operator">Operator </option>
                                    <option value="Guest">Guest </option>
                                    <option value="Encoder">Encoder </option>
                                    <option value="Clerk">Clerk </option>
                                    <option value="Chief Personnel">Chief Personnel</option>
                                    <option value="Chief Admin">Chief Admin</option>
                                    <option value="Chief Planning">Chief Planning</option>
                                    <option value="Chief Finance">Chief Finance</option>
                                    <option value="Chief Procurement">Chief Procurement</option>
                                    <option value="Chief GSU">Chief GSU</option>
                                    <option value="Chief IT">Chief IT</option>
                                    <option value="Head">Unit Head </option>
                                    <option value="Exec Director">Exec Director </option>
                                    <option value="Technical Director">Technical Director </option>
                                    <option value="Management Director ">Management Director </option>

                                </select>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form__input_entry" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Position</label>
                                <select name="position" id="position" class="form__input_entry" required>
                                    <option selected disabled>Select </option>
                                    <option value="Admin Aide">Admin Aide </option>
                                    <option value="Admin Assistant">Admin Assistant </option>
                                    <option value="Bookeeper">Bookeeper </option>
                                    <option value="Accountant">Accountant </option>
                                    <option value="IT Operator">IT Operator </option>
                                    <option value="Computer Operator">Computer Operator </option>
                                    <option value="Computer Programmer">Computer Programmer </option>
                                    <option value="ISA I">ISA I </option>
                                    <option value="ISA II">ISA II </option>
                                    <option value="ISA II">ISA III </option>
                                    <option value="Statistician I">Statistician I </option>
                                    <option value="Statistician II">Statistician II </option>
                                    <option value="Project Evaluation Officer I">Proj. Evaluation Officer I </option>
                                    <option value="Project Evaluation Officer II">Proj. Evaluation Officer II </option>
                                    <option value="Division Chief">Division Chief </option>
                                    <option value="Unit Head">Unit Head </option>
                                    <option value="ARD">ARD</option>
                                    <option value="RED">RED</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-success" id="approveSave">Approve</button>
                                <button class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
