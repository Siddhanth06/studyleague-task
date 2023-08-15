<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        table, th, td {
          border:1px solid black;
          border-collapse: collapse;
          padding: 1rem;
          text-align: center
        }
        </style>
</head>
<body>
    <table style="width:100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Promotion Level</th>
            <th>Bonus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $data as $employee )
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->pool }}</td>
                <td>{{ $employee->amount }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>