<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
 <form method="post" enctype="multipart/form-data">
        @csrf
        Category
        <select name="category">
            @foreach($categories as $category)
            <option {{ $category->category_id == $category->category_name ? 'selected':'' }}>{{$category->category_name}}</option>
            @endforeach
            </select></br></br>
            Sub Category  <input type="text" name="subcategory" value="<?php echo $subcategories[0]->subcategory_name; ?>" ></br></br>
               <img src="<?php echo $subcategories[0]->image; ?>" alt="" height="50px" width="50px">
                <input type="file" name="image" id="image">
                <br>
                <input type="submit" class="button" value="update">
    </form>
</body>

</html>
</body>

</html>