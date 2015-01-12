<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width">

    <title>{{ $title }}</title>
</head>

<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none">
    <table width='100%'>
        <tr>
            <td></td>
        </tr>

        <tbody>
            <tr>
                <td align="center" style="background-color: #2A374E">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td class="w640" height="10" width="640"></td>
                            </tr>

                            <tr>
                                <td align="center" class="w640" height="20" width="640">
                                    <a href="{{ URL::route('home.email', $hash) }}" style="color:#ffffff; font-size:12px"><span style="color:#ffffff; font-size:12px">Voir le contenu de ce mail en ligne</span></a>
                                </td>
                            </tr>

                            <tr>
                                <td class="w640" height="10" width="640"></td>
                            </tr>

                            <tr class="pagetoplogo">
                                <td class="w640" width="640">
                                    <table border="0" cellpadding="0" cellspacing="0" class="w640" style="background-color: #F2F0F0" width="640">
                                        <tbody>
                                            <tr>
                                                <td class="w30" width="30"></td>

                                                <td align="left" class="w580" valign="middle" width="580">
                                                    <div class="pagetoplogo-content" style="text-align: center"><img alt="Eternal War One" class="w580" height="175" src="http://www.ewo-le-monde.com/images/site/logo.png" style="padding: 10px;text-decoration: none; color:#476688; font-size:30px" width="254"></div>
                                                </td>

                                                <td class="w30" width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="w640" height="1" style="background-color: #D7D6D6" width="640"></td>
                            </tr>

                            <tr class="content">
                                <td class="w640" style="background-color: #FFFFFF" width="640">
                                    <table border="0" cellpadding="0" cellspacing="0" class="w640" width="640">
                                        <tbody>
                                            <tr>
                                                <td class="w30" width="30"></td>

                                                <td class="w580" width="580">
                                                    <table border="0" cellpadding="0" cellspacing="0" class="w580" width="580">
                                                        <tbody>
                                                            <tr>
                                                                <td class="w580" width="580">
                                                                    <h2 style="color:#0E7693; font-size:22px; padding-top:12px">{{ $title }}</h2>

                                                                    <div class="article-content" style="text-align: left">
                                                                        <table>
                                                                            <tr>
                                                                                <td align='center'>
                                                                                {{ $content }}
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="w580" height="1" style="background-color: #C7C5C5" width="580"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>

                                                <td class="w30" width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="w640" height="15" style="background-color: #FFFFFF" width="640"></td>
                            </tr>

                            <tr class="pagebottom">
                                <td class="w640" width="640">
                                    <table border="0" cellpadding="0" cellspacing="0" class="w640" style="background-color: #C7C7C7" width="640">
                                        <tbody>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>

                                            <tr>
                                                <td class="w30" width="30"></td>

                                                <td class="w580" valign="top" width="580">
                                                    <p class="pagebottom-content-left" style="text-align: right"><a href="http://www.ewo-le-monde.com" style="color:#255D5C"><span style="color:#255D5C">Eternal War One</span></a></p>
                                                </td>

                                                <td class="w30" width="30"></td>
                                            </tr>

                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td class="w640" height="60" width="640"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>