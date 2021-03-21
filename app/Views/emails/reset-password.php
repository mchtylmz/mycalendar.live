<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head></head>
<body>
    <style></style>
    <spacer size="16"></spacer>
    <container>
        <row class="header" style="background:#6C6C6C">
            <columns>
                <spacer size="16"></spacer>
            </columns>
        </row>
        <row>
            <columns>
                <spacer size="32"></spacer>
                <spacer size="16"></spacer>
                <h1 class="text-center" style="color:#01252F;font-family:Lato,sans-serif;font-size:30pt;text-align:center">Parolamı Unuttum?</h1>
                <spacer size="16"></spacer>
                <p class="textcenter" style="font-family:Lato,sans-serif;text-align:center"><?php echo $fullname; ?></p>
                <p class="textcenter" style="font-family:Lato,sans-serif;text-align:center">Parolanızı sıfırlamak için aşağıdaki bağlantıya tıklayın.</p>
                <a href="<?= site_url(route_to('auth.resetpassword', $reset_token)) ?>">
                    <button class="large expand" href="#" style="font-family:Lato,sans-serif;height:50px;left:50%;margin:20px -100px;position:relative;top:50%;width:200px">Parola Sıfırla</button>
                </a>
                <p class="textcenter" style="font-family:Lato,sans-serif;text-align:center">Veya bağlantıyı tarayıcı adres çubuğuna yapıştırın: <span style="color:#FF0000"><?= site_url(route_to('auth.resetpassword', $reset_token)) ?></span></p>
                <p style="font-family:Lato,sans-serif"></p>
            </columns>
        </row>

        <spacer size="16"></spacer>
    </container>
</body>
</html>
