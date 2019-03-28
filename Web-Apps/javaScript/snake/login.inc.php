
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secret Page</title>
    <link rel="stylesheet" media="screen" type="text/css" href="frontdoor.css" />
</head>
<body>
<div class=""></div>
    <header id="showcase">
        <h1 id="nh">Your Destiny Awaits You...</h1>
    </header>
    <div id="content" class="cantainer">
        <form class="contact" action="index.php" method="post" target="_self">
            <input placeholder=" Secret Password..." type="password" size="20" name="password"><br>
            <br />
            <button id="beer" class="btn" onclick="myfunction()" type="submit" name="submit" value="submit">>>ENTER<<</button>
            <input type="hidden" value="frontdoorval" name="content">
        </form>
    </div>
    <script>
        function myfunction() {
            document.getElementById("nh").innerHTML = "Snake Bite";
        }
    </script>
</body>

</html>