<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
<div class="container">
    <div class="col-lg-6 mx-auto py-5">
        <div class="card shadow">
            <div class="card-header">

            </div>
            <div class="card-body">
                <form action="{{route('')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-2">ФИО студента</label>
                        <input type="text" class="form-control" name="fullname" required>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>