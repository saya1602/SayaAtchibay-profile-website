<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="container_box">
        <h1>Display content of database</h1>
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Image</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr>
                        <th> {{ $customer->id }} </th>
                        <th> {{ $customer->name }} </th>
                        <th> {{ $customer->email }} </th>
                        <th> {{ $customer->message }} </th>
                        <th> <img src="{{ asset('upload/' . $customer->image) }}" width=100px height=100px alt="">  </th>
                    </tr>
                    @endforeach
                </tbody>
                </table>
        </div>
    </div>
</body>
</html>