<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .body {
            display: block;
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="body">
    <form action="{{ route('add-customer') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" aria-describedby="nameHelp" placeholder="Enter name">
                <small id="nameHelp" class="form-text text-muted"></small>
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted"></small>
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <input name="message" type="text" class="form-control" aria-describedby="surnameHelp" placeholder="Enter message">
                <small id="messageHelp" class="form-text text-muted"></small>
                @error('message')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-file">
                    <?php
                    echo Form::open(array('url' => '/uploadfiles', 'files' => 'true'));
                    echo Form::file('image');

                    Form::close();
                    ?>
                    
                </div>
            </div>


            <div class="form-group">
                <input type="submit" name="send" value="Send" class="btn btn-info">
            </div>
        </form>
    </div>
</body>
</html>