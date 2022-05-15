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
    <div class="col-lg-8 mx-auto py-5">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="float-start">Студенты</h4>
                <a href="{{route('students.create')}}" class="btn btn-primary float-end">Добавить</a>
            </div>
            <div class="card-body">
                <div class="table-respinsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ФИО</th>
                            <th>Год рождения</th>
                            <th>Место жительства</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{$student->fullname}}</td>
                                <td>{{$student->birthdate}}</td>
                                <td>{{$student->address}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Пусто</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>