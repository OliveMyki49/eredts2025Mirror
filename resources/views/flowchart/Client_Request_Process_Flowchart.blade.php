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
            font-size: 20px;
            padding: 10px 5px;
            top: 0;
            right: 0;
            width: 100%;
            height: 700px;
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
        <div class="col-md-6 border border-secondary rounded d-flex justify-content-center overflow-auto" style="height: 700px; resize: horizontal;">
            <svg style="
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            display: block;
            min-width: 535px;
            min-height: 969px;
            background-image: none;
            background-color: transparent;
          ">
                <defs>
                    <filter id="dropShadow">
                        <feGaussianBlur in="SourceAlpha" stdDeviation="1.7" result="blur"></feGaussianBlur>
                        <feOffset in="blur" dx="3" dy="3" result="offsetBlur"></feOffset>
                        <feFlood flood-color="#3D4574" flood-opacity="0.4" result="offsetColor"></feFlood>
                        <feComposite in="offsetColor" in2="offsetBlur" operator="in" result="offsetBlur"></feComposite>
                        <feBlend in="SourceGraphic" in2="offsetBlur"></feBlend>
                    </filter>
                </defs>
                <g transformOrigin="0 0" transform="scale(1,1)translate(-142,2)">
                    <g></g>
                    <g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 414 120 L 414 140 L 414 130 L 414 143.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 120 L 414 140 L 414 130 L 414 143.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 148.88 L 410.5 141.88 L 414 143.63 L 417.5 141.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <ellipse cx="414" cy="100" rx="33" ry="20" fill="#d5e8d4" stroke="#82b366" pointer-events="all"></ellipse>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 64px;
                        height: 1px;
                        padding-top: 100px;
                        margin-left: 382px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process1" aria-expanded="true" aria-controls="process1">
                                                    Start
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <rect x="236" y="20" width="356" height="30" fill="none" stroke="white" pointer-events="stroke" visibility="hidden" stroke-width="9"></rect>
                            <rect x="236" y="20" width="356" height="30" fill="none" stroke="none" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 354px;
                        height: 1px;
                        padding-top: 35px;
                        margin-left: 237px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <b>
                                                    <font style="font-size: 24px">Client Request Process Flowchart</font>
                                                </b>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 414 210 L 414 230 L 414 220 L 414 233.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 210 L 414 230 L 414 220 L 414 233.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 238.88 L 410.5 231.88 L 414 233.63 L 417.5 231.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <rect x="346" y="150" width="136" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 134px;
                        height: 1px;
                        padding-top: 180px;
                        margin-left: 347px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a data-bs-toggle="collapse" data-bs-target="#process2" aria-expanded="true" aria-controls="process2">
                                                    Choose permit / certification to request
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 472 295 L 533.63 295" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 472 295 L 533.63 295" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 538.88 295 L 531.88 298.5 L 533.63 295 L 531.88 291.5 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 1px;
                        height: 1px;
                        padding-top: 295px;
                        margin-left: 506px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div
                                                style="
                            display: inline-block;
                            font-size: 11px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            font-weight: bold;
                            background-color: rgb(255, 255, 255);
                            white-space: nowrap;
                          ">
                                                NO
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 356 295 L 213 295 L 213 343.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 356 295 L 213 295 L 213 343.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 213 348.88 L 209.5 341.88 L 213 343.63 L 216.5 341.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g style="visibility: hidden"></g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 1px;
                        height: 1px;
                        padding-top: 296px;
                        margin-left: 311px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 11px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            background-color: rgb(255, 255, 255);
                            white-space: nowrap;
                          ">
                                                <b>YES</b>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 385 267.5 L 406.74 246.88 Q 414 240 421.26 246.88 L 464.74 288.12 Q 472 295 464.74 301.88 L 421.26 343.12 Q 414 350 406.74 343.12 L 363.26 301.88 Q 356 295 363.26 288.12 Z" fill="#fff2cc" stroke="#d6b656" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 114px;
                        height: 1px;
                        padding-top: 295px;
                        margin-left: 357px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a data-bs-toggle="collapse" data-bs-target="#process3" aria-expanded="true" aria-controls="process3">
                                                    Already applied before?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 600 325 L 600 373.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 600 325 L 600 373.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 600 378.88 L 596.5 371.88 L 600 373.63 L 603.5 371.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <rect x="540" y="265" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 118px;
                        height: 1px;
                        padding-top: 295px;
                        margin-left: 541px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process4a" aria-expanded="true" aria-controls="process4a">
                                                    Input client information
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 276 410 L 300 410 L 347.63 410" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 276 410 L 300 410 L 347.63 410" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 352.88 410 L 345.88 413.5 L 347.63 410 L 345.88 406.5 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 1px;
                        height: 1px;
                        padding-top: 410px;
                        margin-left: 310px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 11px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            background-color: rgb(255, 255, 255);
                            white-space: nowrap;
                          ">
                                                <b>YES</b>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 213 470 L 213 500 L 347.63 500" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 213 470 L 213 500 L 347.63 500" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 352.88 500 L 345.88 503.5 L 347.63 500 L 345.88 496.5 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 1px;
                        height: 1px;
                        padding-top: 500px;
                        margin-left: 310px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); background-color: rgb(255, 255, 255); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 11px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            background-color: rgb(255, 255, 255);
                            white-space: nowrap;
                          ">
                                                <b>NO</b>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 181.5 380 L 205.76 356.9 Q 213 350 220.24 356.9 L 268.76 403.1 Q 276 410 268.76 416.9 L 220.24 463.1 Q 213 470 205.76 463.1 L 157.24 416.9 Q 150 410 157.24 403.1 Z" fill="#fff2cc" stroke="#d6b656" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 124px;
                        height: 1px;
                        padding-top: 410px;
                        margin-left: 151px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a data-bs-toggle="collapse" data-bs-target="#process4b" aria-expanded="true" aria-controls="process4b">
                                                    Forgot the access code?
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 600 440 L 600 500 L 480.37 500" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 600 440 L 600 500 L 480.37 500" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 475.12 500 L 482.12 496.5 L 480.37 500 L 482.12 503.5 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <rect x="540" y="380" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 118px;
                        height: 1px;
                        padding-top: 410px;
                        margin-left: 541px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a data-bs-toggle="collapse" data-bs-target="#process5" aria-expanded="true" aria-controls="process5">
                                                    Get access code in email
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <path d="M 474 410 L 533.63 410" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 474 410 L 533.63 410" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 538.88 410 L 531.88 413.5 L 533.63 410 L 531.88 406.5 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible">
                            <rect x="354" y="380" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 118px;
                        height: 1px;
                        padding-top: 410px;
                        margin-left: 355px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a data-bs-toggle="collapse" data-bs-target="#process4c" aria-expanded="true" aria-controls="process4c">
                                                    Resend code to email
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <path d="M 414 530 L 414 550 L 414 534.5 L 414 548.13" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 530 L 414 550 L 414 534.5 L 414 548.13" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 553.38 L 410.5 546.38 L 414 548.13 L 417.5 546.38 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <rect x="354" y="470" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left">
                                    <div style="
                        display: flex;
                        align-items: unsafe center;
                        justify-content: unsafe center;
                        width: 118px;
                        height: 1px;
                        padding-top: 500px;
                        margin-left: 355px;
                      ">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="
                          box-sizing: border-box;
                          font-size: 0px;
                          text-align: center;
                        ">
                                            <div style="
                            display: inline-block;
                            font-size: 12px;
                            font-family: Helvetica;
                            color: rgb(0, 0, 0);
                            line-height: 1.2;
                            pointer-events: all;
                            white-space: normal;
                            overflow-wrap: normal;
                          ">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process6" aria-expanded="true" aria-controls="process6">
                                                    Verify client information
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <path d="M 414 700 L 414 720 L 414 710 L 414 723.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 700 L 414 720 L 414 710 L 414 723.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 728.88 L 410.5 721.88 L 414 723.63 L 417.5 721.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <rect x="354" y="640" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left;">
                                    <div style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 118px; height: 1px; padding-top: 670px; margin-left: 355px;">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="box-sizing: border-box; font-size: 0px; text-align: center;">
                                            <div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: rgb(0, 0, 0); line-height: 1.2; pointer-events: all; white-space: normal; overflow-wrap: normal;">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process8" aria-expanded="true" aria-controls="process8">
                                                    Input document information
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <path d="M 414 790 L 414 810 L 414 800 L 414 813.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 790 L 414 810 L 414 800 L 414 813.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 818.88 L 410.5 811.88 L 414 813.63 L 417.5 811.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <rect x="354" y="730" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left;">
                                    <div style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 118px; height: 1px; padding-top: 760px; margin-left: 355px;">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="box-sizing: border-box; font-size: 0px; text-align: center;">
                                            <div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: rgb(0, 0, 0); line-height: 1.2; pointer-events: all; white-space: normal; overflow-wrap: normal;">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process9">
                                                    Choose what office to send the request
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <path d="M 414 880 L 414 900 L 414 890 L 414 903.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 880 L 414 900 L 414 890 L 414 903.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 908.88 L 410.5 901.88 L 414 903.63 L 417.5 901.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <rect x="354" y="820" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left;">
                                    <div style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 118px; height: 1px; padding-top: 850px; margin-left: 355px;">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="box-sizing: border-box; font-size: 0px; text-align: center;">
                                            <div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: rgb(0, 0, 0); line-height: 1.2; pointer-events: all; white-space: normal; overflow-wrap: normal;">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process10" aria-expanded="true" aria-controls="process10">
                                                    Agree to certification and data privacy concent
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <ellipse cx="414" cy="930" rx="33" ry="20" fill="#d5e8d4" stroke="#82b366" pointer-events="all"></ellipse>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left;">
                                    <div style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 64px; height: 1px; padding-top: 930px; margin-left: 382px;">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="box-sizing: border-box; font-size: 0px; text-align: center;">
                                            <div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: rgb(0, 0, 0); line-height: 1.2; pointer-events: all; white-space: normal; overflow-wrap: normal;">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process11" aria-expanded="true" aria-controls="process11">
                                                    End
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <path d="M 414 614.5 L 414 634.5 L 414 620 L 414 633.63" fill="none" stroke="white" stroke-miterlimit="10" pointer-events="stroke" visibility="hidden" stroke-width="9"></path>
                            <path d="M 414 614.5 L 414 634.5 L 414 620 L 414 633.63" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="stroke"></path>
                            <path d="M 414 638.88 L 410.5 631.88 L 414 633.63 L 417.5 631.88 Z" fill="rgb(0, 0, 0)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"></path>
                        </g>
                        <g transform="translate(0.5,0.5)" style="visibility: visible;">
                            <rect x="354" y="554.5" width="120" height="60" rx="9" ry="9" fill="#dae8fc" stroke="#6c8ebf" pointer-events="all"></rect>
                        </g>
                        <g style="">
                            <g>
                                <foreignObject pointer-events="none" width="100%" height="100%" style="overflow: visible; text-align: left;">
                                    <div style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 118px; height: 1px; padding-top: 585px; margin-left: 355px;">
                                        <div data-drawio-colors="color: rgb(0, 0, 0); " style="box-sizing: border-box; font-size: 0px; text-align: center;">
                                            <div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: rgb(0, 0, 0); line-height: 1.2; pointer-events: all; white-space: normal; overflow-wrap: normal;">
                                                <a class="colps_items" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process9">
                                                    Upload client id
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </foreignObject>
                            </g>
                        </g>
                    </g>
                    <g></g>
                    <g></g>
                </g>
            </svg>
        </div>
        <div class="col-md accordion" id="processInfo">
            <!-- region processes -->
            <!-- region accordian -->

            {{-- STEP 1 --}}
            <div class="accordion-item border-0">
                <div id="process1" class="accordion-collapse collapse show" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 1:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Start</span> by visiting the landing
                            page of the
                            <a href="http://58.69.249.98:9133/client-dashboard-home?active_sidebar=client-dashboard-home" target="_blank">RFSOATS</a>
                            then navigate to the services below and choose
                            <a href="http://58.69.249.98:9133/client-dashboard?active_sidebar=client_dashboard" target="_blank">create request</a>
                            <img class="pt-2" src="../../assets/img/flowchart/p1.jpeg" style="width: 100%; height: 100%" alt="" />
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
                        <h5>Step 2:</h5>
                        <hr>
                        <p>
                            On the client request page
                            <span class="fw-bold">choose request type</span>
                            by setting:
                        <ol>
                            <li>document classification</li>
                            <li>request type</li>
                        </ol>
                        <img class="pt-2" src="../../assets/img/flowchart/p2.jpeg" style="width: 100%; height: 60%" alt="" />
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
                        <h5>Step 3:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">If the client haven't applied in the system</span>
                            they must proceed to the client information.
                            <img class="py-2" src="../../assets/img/flowchart/p3_1.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br />
                            but if they already applied before, client can now continue to
                            use the access code
                            <img class="pt-2" src="../../assets/img/flowchart/p3_2.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process2" aria-expanded="true" aria-controls="process2">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4b" aria-expanded="true" aria-controls="process4a">Next (I have already registered)</button>
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4b" aria-expanded="true" aria-controls="process4b">Next (I did not register yet)</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 4.b --}}
            <div class="accordion-item border-0">
                <div id="process4b" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 4.b:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Forgot the access code?</span><br />
                            Click the link "Haven't received an email yet?"
                            <img class="py-2" src="../../assets/img/flowchart/p4_1.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br />

                            or continue to use the access code if you already have it
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

            {{-- STEP 5 --}}
            <div class="accordion-item border-0">
                <div id="process4c" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 4.c:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Resend to email</span><br />
                            Click the link "Haven't received an email yet?"
                            <img class="py-2" src="../../assets/img/flowchart/p4_1.jpeg" style="width: 100%; height: 50%" alt="" />
                            <br />
                            enter the email and click "Resend code"
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

            {{-- STEP 6 --}}
            <div class="accordion-item border-0">
                <div id="process5" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 5:</h5>
                        <hr>
                        <p>
                            check your email box or spam to get access code
                            <img class="py-2" src="../../assets/img/flowchart/p4_3.jpeg" style="width: 100%; height: 90%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4c" aria-expanded="true" aria-controls="process4c">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4a" aria-expanded="true" aria-controls="process4a">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 4.a --}}
            <div class="accordion-item border-0">
                <div id="process4a" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 4.a:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Input client information</span>
                            <br />
                        <ol>
                            <li>First Name</li>
                            <li>Middle Initial (MI)</li>
                            <li>SurName</li>
                            <li>Suffix</li>
                            <li>Sex</li>
                            <li>Email</li>
                            <li>Contact Number</li>
                            <li>Address</li>
                        </ol>

                        then click "Sign up"
                        <img class="py-2" src="../../assets/img/flowchart/p7.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process5" aria-expanded="true" aria-controls="process5">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process6" aria-expanded="true" aria-controls="process6">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 8 --}}
            <div class="accordion-item border-0">
                <div id="process6" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 6:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Verify client information</span><br />
                            To verify client information, click the "Use code" button. <br>
                            <img class="py-2" src="../../assets/img/flowchart/p3_2.jpeg" style="width: 100%; height: 400px" alt="" />
                            once the use access code form appear, input the following information needed:

                        <ol>
                            <li>Client name</li>
                            <li>Email</li>
                            <li>Access code</li>
                        </ol>

                        then click "Submit"
                        <img class="py-2" src="../../assets/img/flowchart/p8.jpeg" style="width: 100%; height: 50%" alt="" />
                        <br>
                        If client information is verified the system will display the verified client data where they can update it
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process4a" aria-expanded="true" aria-controls="process4a">Previous</button>
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
                        <h5>Step 7:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Upload client id</span><br />
                            Update all necessary information once validated and upload valid ID. <br>
                            List of valid IDs:

                        <ol>
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

                        then click "Save Changes"
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

            {{-- STEP 10 --}}
            <div class="accordion-item border-0">
                <div id="process8" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 8:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Input document information</span><br />
                            Choose the applicant type:
                        <ol>
                            <li>Government Agency</li>
                            <li>Business</li>
                            <li>Citizen</li>
                        </ol>
                        if you input government agency or business as application type you have to enter the business name
                        <br>
                        after that input all documents and information required for your request

                        <img class="py-2" src="../../assets/img/flowchart/p10.jpeg" style="width: 100%; height: 50%" alt="" />
                        </p>
                        <div class="fw-bold border border-warning rounded text-warning p-3">Note: Required documents and information may vary depending on what is being requested</div><br />
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process9">Previous</button>
                            </div>
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process9">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STEP 11 --}}
            <div class="accordion-item border-0">
                <div id="process9" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 9:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Choose what office to send the request</span><br />

                            <img class="py-2" src="../../assets/img/flowchart/p11.jpeg" style="width: 100%; height: 100%" alt="" />
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

            {{-- STEP 12 --}}
            <div class="accordion-item border-0">
                <div id="process10" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <h5>Step 10:</h5>
                        <hr>
                        <p>
                            <span class="fw-bold">Agree to certification and data privacy concent</span><br />

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

            {{-- FINAL STEP --}}
            <div class="accordion-item border-0">
                <div id="process11" class="accordion-collapse collapse" data-bs-parent="#processInfo">
                    <div class="card card-body colps-info text-start overflow-auto">
                        <p>
                            <span class="fw-bold">Once everything is done click the "Submit request" button</span><br />

                            <img class="py-2" src="../../assets/img/flowchart/pFinal.jpeg" style="width: 100%; height: 100%" alt="" />

                        <div class="fw-bold border border-warning rounded text-warning p-3">
                            Note: The system will alert the client once an information or document is not provided or missed
                        </div>
                        <br />
                        </p>
                        <div class="row" style="position: fixed; left: 0;bottom: 0; width: 100%;">
                            <div class="col-md p-2 d-grid gap-2">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#process9" aria-expanded="true" aria-controls="process10">Previous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- endregion accordian -->
            <!-- endregion processes -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
