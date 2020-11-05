<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <h3> welcome admin </h3>
</head>

<body>
    <form action="/edit/<?php echo $categories[0]->category_id; ?>" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        Name<input type="text" name="category" value='<?php echo $categories[0]->category_name; ?>' class="name"><br><br>
        <input type="submit" class="button" value="update">
    </form>
</body>

</html>