<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
   Category Name<input type="text" name="category" class="category"><br><br>
    <input type="button" name="button" class="button" value="Add"><br><br>
   
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.button').click(function() {
            var category = $('.category').val();
            let _token = $('meta[name="csrf-token"]').attr('content');

            userdata = {
                category: category, 
                _token: _token
            }
            console.log('------------line-29--------', userdata)
            $.ajax({
                type: 'POST',
                url: '/catadd',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: userdata,
                success: function(response) {
                    console.log('------------------ajax response----------', response)
                    if (response.status == 200) {
                       window.location.href="/dashboard"

                        } else {
                            $('.error').text('Invalid Details');
                        }
                   
                }
            });

        })

    });
</script>

</html>
