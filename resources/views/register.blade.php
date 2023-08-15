<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div class="form-container">
        <div>
    <h1 class="form-title">Registration Form</h1>
    <form action="/register" method="post">
        @csrf
    <table>
        <tbody>
            <tr>
                <td> <label for="name">Name</label></td>
                <td>:</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td><label for="code">Enter Referral Code</label></td>
                <td>:</td>
                <td><input type="text" name="code" id="code"></td>
            </tr>
            <tr>
                <td> <button type="submit" class="submit-btn">Join</button></td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
</div>
</body>
</html>