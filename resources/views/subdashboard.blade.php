

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <h3> Welcome to Subcategory</h3>
</head>
<style>
th {
  background-color: #007bff;
  color: white;
}
</style>
<body>
   <table border=1>
      <tr>
         <th>Sl No</th>
         <th>Category</th>
         <th>Sub Category</th>
         <th>Image</th>
         <th>Edit</th>
      </tr>
      @foreach ($categories as $inx=>$category)
      <tr>
         <td>{{ $inx+1 }}</td>
         <td>{{ $category->category_name }}</td>
         <td>{{ $category->subcategory_name }}</td>
         <td><img src={{ $category->image }} width="50" height=50></td>
         <td><a href='subedit/{{ $category->category_id }}'>Edit</a></td>
      </tr>
      @endforeach
     
   </table>

   <a href="/insertSubcat">Add Sub-category</a>
   <a link href="logout">Log Out</a>
</body>

</html>