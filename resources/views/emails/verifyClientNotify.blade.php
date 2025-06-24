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
                Good day! you have successfully signed up in the <a href="http://rfsoats.duckdns.org:9133/" target="_blank" style="color:beige">REGIONAL FRONTLINE SERVICES ONLINE APPLICATION AND TRACKING SYSTEM</a>
                <br>
            </p>
            <p style="font-size: 20px;color: white;">
                To use the request form,
                please copy this code
                <span style="font-weight: bold; cursor: pointer;">
                    {{ $dt['access_token'] }}
                </span>
                and go to the <a href="http://rfsoats.duckdns.org:9133/client-dashboard?active_sidebar=client_dashboard&email={{ $dt['email'] }}&fn={{ $dt['fname'] }}" target="_blank" style="color:beige">RFSOATS Client Request Page</a>
                <br>
            </p>
            <div style="text-align: center; color: white; font-size: 20px;">
                <span>
                    NOTE:
                    KINDLY BE ADVISED,
                    UNDER NO CIRCUMSTANCES SHOULD YOU DISCLOSE OR PERMIT ANYONE TO OBTAIN YOUR PRIVATE TOKEN.
                    DOING SO MAY RESULT IN UNAUTHORIZED ACCESS TO,
                    AND POTENTIAL COPYING OF,
                    YOUR INFORMATION ASSOCIATED WITH THIS ACCESS CODE.
                </span>
            </div>
            <br><br>
        </div>
    </div>
</body>

</html>
