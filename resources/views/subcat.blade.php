<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
  
Category Name <select name="category" class="category">
            <option value="">Select category</option>
            @foreach ($categories as $category)
            <option value="{{$category->category_id}}">{{ $category->category_name }}</option>
            @endforeach
            </select><br><br>
    Subcategory Name<input type="text" name="subcategory" class="subcategory"><br><br>
    Image<input type="file" name="image" id="file" class="image"><br><br>
    <input type="button" name="button" class="button" value="Add"><br><br>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.button').click(function() {
            var category = $('.category').val();
            console.log(category);
            var subcategory = $('.subcategory').val();
            console.log(subcategory,'-------------------');
            var image = $('.image').get(0).files[0];
            console.log(image)
            let _token = $('meta[name="csrf-token"]').attr('content');

            const formdata = new FormData()
            formdata.append('category', category)
            formdata.append('image', image)
            formdata.append('subcategory', subcategory)
            formdata.append('_token', _token)
              
            console.log('------------line-29--------', formdata)
            $.ajax({
                type: 'POST',
                url: '/subcat_data',
                data: formdata,
                processData: false,
                contentType: false,
                dataType:'JSON',
                cache: false,
                async:false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                }
            });

        })

    });
</script>

</html>