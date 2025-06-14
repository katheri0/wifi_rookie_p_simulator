<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="-1">
    <title>Internet hotspot - Log out</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/mine.js"></script>
    <script>
        function openLogin() {
            if (window.name !== 'hotspot_logout') return true;
            open('http://alsadie.ye/login', '_blank', '');
            window.close();
            return false;
        }
    </script>
</head>

<body>
<div class="ie-fixMinHeight">
    <div class="main">
        <div class="wrap animated fadeIn">
            <img src="img/logo.png" class="logo" alt="السعدي نت">
            <h1 class="logo-title">تم تسجيل خروجك بنجاح!</h1>
            <p class="info">شكرا لاستخدامك شبكتنا</p>
            <br>
            <form action="http://alsadie.ye/login" name="login" onSubmit="return openLogin()">
                <table>
                    <tr>
                        <td>عنوان الشبكة :</td>
                        <td>10.0.0.38</td>
                    </tr>
                    <tr>
                        <td>التحميل:</td>
                        <td>
                            <script type="text/javascript">
                                document.write(toArabicBytes("11864622"));
                            </script>
                        </td>
                    </tr>
                    <tr>
                        <td>الرفع:</td>
                        <td>
                            <script type="text/javascript">
                                document.write(toArabicBytes("298137469"));
                            </script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>التحميل المتبقي:</td>
                        <td>
                            <script type="text/javascript">
                                document.write(toArabicBytes("2083475745"));
                            </script>
                        </td>
                    </tr>
                    

                    <tr>
                        <td>الوقت المستهلك :</td>
                        <td>
                            <script type="text/javascript">
                                document.write(toArabicTime("20m58s"));
                            </script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>الوقت المتبقي :</td>
                        <td>
                            <script type="text/javascript">
                                document.write(toArabicTime("6d16h19m32s"));
                            </script>
                        </td>
                    </tr>
                    
                </table>


                <input type="submit" value="تسجيل الدخول">
            </form>
        </div>
    </div>
</div>

</body>
</html>
