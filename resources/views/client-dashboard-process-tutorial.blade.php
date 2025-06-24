<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logoAlone.webp">
    <link rel="icon" href="../assets/img/logoAlone.webp" type="image/x-icon">
    <link rel="icon" type="image/png" href="../assets/img/logoAlone.webp">
    <title>Client Request Process</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <style>
        a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            cursor: pointer;
        }

        a:hover {
            color: rgb(30, 30, 238);
        }

        .colps-info a {
            color: aquamarine;
            text-decoration: none;
        }

        /* hide info */
        .colps-info {
            position: relative;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
            top: 0;
            right: 0;
            width: 100%;
            /* height: 700px; */
            z-index: 99999;
        }
    </style>

    <!-- scrollbar design -->
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md accordion" id="processInfo">
            <!-- region processes -->
            <!-- region accordian -->

            {{-- STEP 1 --}}
            <div class="accordion-item border-0">
                <div id="process1" class="accordion-collapse collapse show" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 1:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Start</span> by visiting the landing
                            page of the
                            <a href="/client-dashboard-home?active_sidebar=client-dashboard-home" target="_blank">RFSOATS</a>
                            then navigate to the services below and choose
                            <a href="/client-dashboard?active_sidebar=client_dashboard" target="_blank">create request</a>
                            <br>
                            <img class="pt-2" src="../../assets/img/flowchart/p1.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process2" aria-expanded="true" aria-controls="process2">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 2 --}}
            <div class="accordion-item border-0">
                <div id="process2" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 2:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            On the client request page
                            <span class="fw-bold">choose request type</span>
                            by setting:
                        <ol style="font-size: 20px;">
                            <li>document classification</li>
                            <li>request type</li>
                        </ol>
                        <br>
                        <img class="pt-2" src="../../assets/img/flowchart/p2.jpeg" style="width: 100%; height: 30%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process1" aria-expanded="true" aria-controls="process1">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process3" aria-expanded="true" aria-controls="process3">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 3 --}}
            <div class="accordion-item border-0">
                <div id="process3" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 3:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">If the client haven't applied in the system</span>
                            they must proceed to the client information.
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p3_1.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br />
                            but if they already applied before, client can now continue to
                            use the access code
                            <br>
                            <img class="pt-2" src="../../assets/img/flowchart/p3_2.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process2" aria-expanded="true" aria-controls="process2">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4b" aria-expanded="true" aria-controls="process4b">Next (I have already registered)</button>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4a" aria-expanded="true" aria-controls="process4a">Next (I did not register yet)</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 4.b --}}
            <div class="accordion-item border-0">
                <div id="process4b" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 4.b:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Forgot the access code?</span><br />
                            Click the link "Haven't received an email yet?"
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p4_1.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br />

                            or continue to use the access code if you already have it
                            <br>
                            <img class="pt-2" src="../../assets/img/flowchart/p3_2.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process3" aria-expanded="true" aria-controls="process3">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4c" aria-expanded="true" aria-controls="process4c">Next (I forgot my access code)</button>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process5" aria-expanded="true" aria-controls="process5">Next (Continue)</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 4.c --}}
            <div class="accordion-item border-0">
                <div id="process4c" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 4.c</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Resend to email</span><br />
                            Click the link "Haven't received an email yet?"
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p4_1.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br />
                            enter the email and click "Resend code"
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p4_2.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4b" aria-expanded="true" aria-controls="process4b">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process5" aria-expanded="true" aria-controls="process5">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 5 --}}
            <div class="accordion-item border-0">
                <div id="process5" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 5:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            check your email box or spam to get access code
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p4_3.jpeg" style="width: 100%; height: 45%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4c" aria-expanded="true" aria-controls="process4c">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process6" aria-expanded="true" aria-controls="process6">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 4.a --}}
            <div class="accordion-item border-0">
                <div id="process4a" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 4.a:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Input client information</span>
                            <br />
                        </p>
                        <ol style="font-size: 20px;">
                            <li>First Name</li>
                            <li>Middle Initial (MI)</li>
                            <li>SurName</li>
                            <li>Suffix</li>
                            <li>Sex</li>
                            <li>Email</li>
                            <li>Contact Number</li>
                            <li>Address</li>
                        </ol>

                        <p style="font-size: 20px;">
                            then click "Sign up"
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p7.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process3" aria-expanded="true" aria-controls="process3">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process5" aria-expanded="true" aria-controls="proces5">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 6 --}}
            <div class="accordion-item border-0">
                <div id="process6" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 6:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Verify client information</span><br />
                            To verify client information, click the "Use code" button. <br>
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p3_2.jpeg" style="width: 100%; height: 100%" alt="" />
                            <br>
                            once the use access code form appear, input the following information needed:
                        </p>
                        <ol style="font-size: 20px;">
                            <li>Client name</li>
                            <li>Email</li>
                            <li>Access code</li>
                        </ol>

                        <p style="font-size: 20px;">
                            then click "Submit"
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p8.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br>
                            If client information is verified the system will display the verified client data where they can update it
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4a" aria-expanded="true" aria-controls="process4a">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process7" aria-expanded="true" aria-controls="process7">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 7 --}}
            <div class="accordion-item border-0">
                <div id="process7" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 7:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Upload client id</span><br />
                            Update all necessary information once validated and upload valid ID. <br>
                        </p>

                        <p class="d-inline-flex gap-1">
                            <a data-bs-toggle="collapse" href="#showValidIds" role="button" aria-expanded="false" aria-controls="showValidIds">
                                Show valid IDs . . .
                            </a>
                        </p>
                        <div class="collapse" id="showValidIds">
                            <div class="card card-body" style="background-color: rgb(107 105 105); border-radius: 5px;">
                                <ol style="font-size: 20px;">
                                    <li>Philippine Passport</li>
                                    <li>Driver's License issued by the Land Transportation Office (LTO)</li>
                                    <li>Unified Multi-Purpose ID (UMID) issued by the Social Security System (SSS)</li>
                                    <li>Professional Regulation Commission (PRC) ID</li>
                                    <li>Voter's ID issued by the Commission on Elections (COMELEC)</li>
                                    <li>Postal ID issued by the Philippine Postal Corporation (PHLPost)</li>
                                    <li>National Bureau of Investigation (NBI) Clearance</li>
                                    <li>Police Clearance</li>
                                    <li>Government Service Insurance System (GSIS) ID</li>
                                    <li>Senior Citizen ID</li>
                                    <li>Overseas Workers Welfare Administration (OWWA) ID</li>
                                    <li>OFW ID Card</li>
                                    <li>PhilHealth ID</li>
                                    <li>Department of Social Welfare and Development (DSWD) ID</li>
                                    <li>Barangay Certification with a photo and signature</li>
                                </ol>
                            </div>
                        </div>

                        <p style="font-size: 20px;">
                            then click "Save Changes"
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p9.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process6" aria-expanded="true" aria-controls="process6">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process8" aria-expanded="true" aria-controls="process8">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 8 --}}
            <div class="accordion-item border-0">
                <div id="process8" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 8:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Input document information</span><br />
                            Choose the applicant type:
                        </p>
                        <ol style="font-size: 20px;">
                            <li>Government Agency</li>
                            <li>Business</li>
                            <li>Citizen</li>
                        </ol>

                        <p style="font-size: 20px;">
                            if you input government agency or business as application type you have to enter the business name
                            <br>
                            after that input all documents and information required for your request
                            <br>
                        </p>
                        <div class="fw-bold border border-warning rounded text-warning p-3">Note: Required documents and information may vary depending on what is being requested</div><br />
                        <img class="py-2" src="../../assets/img/flowchart/p10.jpeg" style="width: 100%; height: 50%" alt="" />

                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process7" aria-expanded="true" aria-controls="process7">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process9">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 9 --}}
            <div class="accordion-item border-0">
                <div id="process9" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 9:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Choose what office to send the request</span><br />

                            <img class="py-2" src="../../assets/img/flowchart/p11.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process8" aria-expanded="true" aria-controls="process8">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process10" aria-expanded="true" aria-controls="process10">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 10 --}}
            <div class="accordion-item border-0">
                <div id="process10" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 10:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p style="font-size: 20px;">
                            <span class="fw-bold">Agree to certification and data privacy concent</span><br />
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/p12.jpeg" style="width: 100%; height: 100%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process9">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process11" aria-expanded="true" aria-controls="process11">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FINAL 11 --}}
            <div class="accordion-item border-0">
                <div id="process11" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <div class="row" style="position: fixed; left: 0;top: 0; width: 150%; background-color: rgb(107 105 105);">
                            <div class="pt-4 px-4">
                                <h5>Step 11:</h5>
                                <hr>
                            </div>
                        </div>
                        <div style="height: 100px;">
                            &nbsp;
                        </div>
                        <p>
                            <span class="fw-bold">Once everything is done click the "Submit request" button</span><br />
                            <br>
                            <img class="py-2" src="../../assets/img/flowchart/pFinal.jpeg" style="width: 100%; height: 100%" alt="" />

                        <div class="fw-bold border border-warning rounded text-warning p-3">
                            Note: The system will alert the client once an information or document is not provided or missed
                        </div>
                        <br />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md-6 p-2 d-grid gap-2">
                                <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#process1" aria-expanded="true" aria-controls="process1">Go back to start</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process10" aria-expanded="true" aria-controls="process10">Previous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="height: 150px;">
                &nbsp;
            </div>

            <!-- endregion accordian -->
            <!-- endregion processes -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
