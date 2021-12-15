<table cellspacing="0" border="0" cellpadding="0" align="center" width="595" bgcolor="white" style="border-collapse:separate;border-spacing:0;font-family:Helvetica,Arial,sans-serif;letter-spacing:0;table-layout:fixed">
    <tbody>
    <tr>
        <td style="border:1px solid #dddddd;border-radius:2px;font-family:Helvetica,Arial,sans-serif;font-size:16px;padding:40px 60px">



            <table width="100%" style="border-collapse:separate;border-spacing:0;table-layout:fixed">
                <tbody>
                <tr>
                    <td style="font-family:Helvetica,Arial,sans-serif;font-size:16px;padding:0;text-align:left" align="left">

                        <img src="{{ url('/images/logo.svg') }}" width="165" height="33" style="padding:15px 0 30px;text-align:left">

                    </td>
                </tr>
                </tbody>
            </table>



            <table width="100%" style="border-collapse:separate;border-spacing:0;table-layout:fixed">
                <tbody>
                <tr>
                    <td style="color:#525252;font-family:Helvetica,Arial,sans-serif;font-size:15px;line-height:22px;padding:0">

                        <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left">Dear Customer,</p>
                        @if ($isRegistration)
                            <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left">You have just created an account in countly.io.</p>
                        @else
                            <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left">You requested access to Your countly.io account.</p>
                        @endif

                        <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left">Click on "Log in to countly.io" to sign in to your account.</p>
                        <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left">If You didn't request any access, please ignore this email.</p>
                        <table align="center" style="border-collapse:collapse;border-spacing:0;margin:17px auto;table-layout:fixed;text-align:center!important"><tbody><tr><td style="background-color:#29AD62;border:1px none #dadada;border-radius:3px;font-family:Helvetica,Arial,sans-serif;font-size:16px;margin:0;padding:12px 35px;text-align:left;vertical-align:top" align="left" bgcolor="#29AD62" valign="top">
                            <a href="{{ $link }}" style="background-color:#29AD62;border:none;border-radius:3px;color:white;display:inline-block;font-size:14px;font-weight:bold;outline:none!important;padding:0px;text-decoration:none" target="_blank">
                                Log in to countly.io
                            </a>
                        </td></tr></tbody></table>
                        <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left">Regards,</p>
                        <p style="line-height:1.5;margin:0 0 17px;text-align:left!important" align="left"><b>countly.io</b><br>Team</p>

                    </td>
                </tr>
                </tbody>
            </table>

        </td>
    </tr>
    </tbody>
</table>