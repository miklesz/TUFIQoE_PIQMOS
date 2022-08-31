<html lang="">
<head>
    <meta charset="iso=8859-2">
    <title>TUFIQoE PIQMOS psycho-physical test</title>
    <link rel="stylesheet" href="css/style_test.css" type="text/css"/>
</head>
<script type="text/javascript">
    const span = document.getElementById('span');
    const start = Date.now();

    function time(){
        document.getElementById('duration').value = (Date.now() - start).toString();
    }
    setInterval(time,1);
</script>
<body>
<span id="span"></span>
<form method="post" action="next_page.php" style = "margin-bottom: 0;">
    <label for="duration">
        <input id="duration" name="duration" value="answer">
    </label>
</form>
</body>
