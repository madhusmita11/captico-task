<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Enter Number<input type="text" name="num" class="num">
    <input type="button" name="button" class="button" value="Reverse"><br><br>
    Result<input type="text" name="res" class="res">
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
     $(document).ready(function() {
        $('.button').click(function() {
    n=$('.num').val()
    console.log(n)
n = n + "";
	var x= n.split("").reverse().join("");
    $('.res').val(x);
})

});
    </script>
</html>