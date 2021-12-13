<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Please wait...</title>
    <style>
        *
        {
            margin:0px;
            padding:0px;
        }
        body
        {
            direction:rtl;
            background-color:#289edb;
            font-family:IRANSansWeb;
        }
        @font-face {
            font-family:'IRANSansWeb';
            src:url('fonts/IRANSansWeb.eot');
            src:url('fonts/IRANSansWeb.eot?#iefix') format("embedded-opentype"),
            url('fonts/IRANSansWeb.woff') format("woff"),
            url('fonts/IRANSansWeb.ttf') format("truetype");
        }
        .msg
        {
            width: 500px;
            height:200px;
            text-align:center;
            background-color:white;
            margin:150px auto;
            border-radius:5px;
        }
    </style>
    <script>
        function postRefId(refIdValue)
        {
            var form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action", "https://bpm.shaparak.ir/pgwchannel/startpay.mellat");
            form.setAttribute("target", "_self");
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("name", "RefId");
            hiddenField.setAttribute("value", refIdValue);
            form.appendChild(hiddenField);
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    </script>
</head>
<body>


<div class="msg">

    <p style="padding-top:80px;font-size:18px;padding-bottom:15px;">در حال انتقال به صفحه پرداخت بانکی ...کمی صبر کنید</p>

    <?php
    if($res)
    {
    ?><script>postRefId('<?= $res; ?>');</script><?php
    }
    else
    {
    ?><p style="font-family:Yekan">اتصال به درگاه بانک ملت امکان پذیرنیست</p><?php
    }
    ?>
</div>

</body>
</html>