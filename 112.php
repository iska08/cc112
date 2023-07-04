<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="/themes/css/bootstrap.min.css">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="/themes/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>

    <!-- New Posts -->
    <div id="newposts"></div>

</html>
<script language="javascript">
setTimeout("checkUpdate()", 1000); //poll every second


function checkUpdate() {
    $.post("backend_file.php", function(data, status) {
        if (data.toString() == "true") {
            playSound();
        }
    });
}

function playSound() {
    var audio = new Audio('http://www.rangde.org/static/bell-ring-01.mp3');
    audio.play();
}
</script>