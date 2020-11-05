

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <h3> Welcome to Category</h3>
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
         <th>Edit</th>
      </tr>
      @foreach ($categories as $inx=>$category)
      <tr>
         <td>{{ $inx+1 }}</td>
         <td>{{ $category->category_name }}</td>
         <td><a href='edit/{{ $category->category_id }}'>Edit</a></td>
      </tr>
      @endforeach
   </table>
  
</body>
<a link href="cat">Add Category</a>
<a link href="subdashboard">List Subcategory</a>
<a link href="logout">Log Out</a>
</html>