<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DENR MIS TRAVEL ORDER REQUEST EMAIL</title>
</head>

<body style="
	margin: 0; 
	padding: 0; 
	background-image: url('https://img.wallpapic.com/i7061-415-09/medium/leaves-green-flowers-sunlight-wallpaper.jpg');
	background-repeat: no-repeat;
	background-position: center;
	background-size: cover;
	height: 100%;">
    <div style="
        text-align: center;
        background-image: linear-gradient(to right, #0035a9 , #4c991f);
        margin: 0;
        height: 100px;
        color: white;
        padding-top: 20px;">
        <div style="color: white; margin-left: 10px; margin-top: -10px; font-size: 15px; font-weight: bold;">
            <img style="display: inline-block; vertical-align: middle; padding: 0; margin: 0;" src="https://opms.emb.gov.ph/static/images/denr-emb-logo.gif" width="100px" height="100px" placeholder="No image found" title="logo">
            <span style="display: inline-block; vertical-align: middle;"><span style="font-size: 200%; text-decoration: underline;">DENR REGION V</span><br>REGIONAL ICT - RFSOATS</span>
            <img style="display: inline-block; vertical-align: middle; padding: 0; margin: 0;" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Bagong_Pilipinas_logo.png" width="100px" height="100px" placeholder="No image found" title="logo">
        </div>
    </div>
    <div style="
        margin: 0; 
        padding: 0; 
        background-image: url('https://opms.emb.gov.ph/static/images/denr-emb-logo.gif');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        height: 100%;">

        <div style="
		margin: 10px;
		padding: 10px;
		text-align: left;
		color: white;
		z-index: 2;
		background-color: rgba(0, 0, 0, 0.7); 
		border-radius: 10px;">
            <p style="font-size: 20px;color: white;">
                @php
                    // data array be access here
                    $dt = $data['body'][0];
                @endphp

                <br>
                Good day! There is an update on your request from the <a href="http://rfsoats.duckdns.org:9133/" target="_blank" style="color:#80aeff; text-decoration: none;">RFSOATS</a>.
                <br>
                with document tracking number <a href="http://rfsoats.duckdns.org:9133/client-dashboard-doc-tracking?dn={{ $dt['doc_no'] }}" style="color:#80aeff; text-decoration: none;">{{ $dt['doc_no'] }}
                    <br>
            </p>

            <p style="font-size: 20px;color: white;">
                {{ $dt['msg'] }}
            </p>

            <p style="font-size: 20px;color: white;">
                To check the order of payment, please visit this page: <a href="http://rfsoats.duckdns.org:9133/rfsoats/pdv?dn={{ $dt['doc_no'] }}" target="_blank" style="color:#80aeff">RFSOATS published document viewer</a>
            </p>

            <hr>
            <table style="border: solid 1px #fff; font-size: 20px;color: white; margin-left: auto; margin-right: auto;">
                <tbody>
                    <tr style="border: solid 0px; #fff">
                        <td style="border: solid 0px; #fff">Order of payment number:</td>
                        <td style="border: solid 0px; #fff">{{ $dt['or_no'] }}</td>
                    </tr>

                    <tr style="border: solid 0px; #fff">
                        <td style="border: solid 0px; #fff"><br></td>
                    </tr>

                    @if (isset($dt['cost_break_down']))
                        @foreach ($dt['cost_break_down'] as $ofpcb)
                            <tr style="border: solid 0px; #fff">
                                <td style="border: solid 0px; #fff">{{ $ofpcb['cost_breakdown'] }}: </td>
                                <td style="border: solid 0px; #fff">Php {{ $ofpcb['cost_breakdown_amount'] }}.00</td>
                            </tr>
                        @endforeach
                    @endif

                    <tr style="border-top: solid 1px; #fff">
                        <td style="border: solid 0px; #fff" colspan="2"><hr></td>
                    </tr>
                    <tr style="border-top: solid 1px; #fff">
                        <td style="border: solid 0px; #fff">Total amount to pay: </td>
                        <td style="border: solid 0px; #fff">Php {{ $dt['total_cost'] }}.00</td>
                    </tr>
                </tbody>
            </table>
            <hr>


            @if (isset($dt['additional_ofp']))

                <table style="border-bottom: solid 1px #fff; font-size: 20px;color: white;">
                    <tbody>
                        <tr style="border: solid 0px; #fff">
                            <td style="border: solid 0px; #fff">Additional Fee/s:</td>
                        </tr>
                    </tbody>
                </table>

                <table style="border: solid 1px #fff; font-size: 20px;color: white; margin-left: auto; margin-right: auto;">
                    <tbody>

                        {{-- region populate additional fee/s here --}}
                        @foreach ($dt['additional_ofp'] as $aofpcb)
                            <tr style="border: solid 0px; #fff">
                                <td style="border: solid 0px; #fff">
                                    <table style="border: solid 0px #fff; font-size: 20px;color: white;">
                                        <tbody>
                                            <tr style="border: solid 0px; #fff">
                                                <td style="border: solid 0px; #fff">Order of payment number:</td>
                                                <td style="border: solid 0px; #fff">{{ $aofpcb['or_no'] }}</td>
                                            </tr>

                                            <tr style="border-bottom: solid 1px; #fff">
                                                <td style="border: solid 0px; #fff">{{ $aofpcb['purpose'] }}: </td>
                                                <td style="border: solid 0px; #fff">Php {{ $aofpcb['pay_amount'] }}.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                </td>
                            </tr>
                        @endforeach
                        {{-- endregion populate additional fee/s here --}}

                    </tbody>
                </table>
                <hr>
            @endif

            <p style="font-size: 20px;color: white;">
                Please make sure to send your payment/s to the designated office where you submit your request, either through the office itself or to their Landbank account.
            </p>

            <p style="font-size: 20px;color: white;">
                Please send your payment in the official denr landbank account via <a href="https://www.landbank.com/" style="color:#80aeff; text-decoration: none;">landbank portal</a>.<br>
                Instruction manual for payment: <a href="http://rfsoats.duckdns.org:9133/assets/doc/payment_manual/LinkBiz.pdf" style="color:#80aeff; text-decoration: none;">Payment Step by Step Manual</a>
            </p>

            <p style="font-size: 20px;color: rgb(255, 255, 255); ">
                After paying your bill in landbank, please attach the screenshot image or pdf file copy of the receipt upon payment here: <a href="http://rfsoats.duckdns.org:9133/cli-dash-pymnt-rcpt-upld?dn={{ $dt['doc_no'] }}" style="color:#80aeff; text-decoration: none;">Attach Receipt Link</a>
            </p>

            <div style="text-align: center; color: white; font-size: 20px;">
                <span>
                    NOTE:
                    KINDLY BE ADVISED,
                    UNDER NO CIRCUMSTANCES SHOULD YOU DISCLOSE OR PERMIT ANYONE TO OBTAIN YOUR PRIVATE TOKEN.
                    DOING SO MAY RESULT IN UNAUTHORIZED ACCESS TO,
                    AND POTENTIAL COPYING OF,
                    YOUR INFORMATION ASSOCIATED WITH THE ACCESS CODE.
                </span>
            </div>
            <br><br>
        </div>
    </div>
</body>

</html>
