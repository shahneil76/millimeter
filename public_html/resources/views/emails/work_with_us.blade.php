<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>Name</th>
            <td>{{ $data['name'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $data['email'] }}</td>
        </tr>
        <tr>
            <th>Phone No</th>
            <td>{{ $data['phoneno'] }}</td>
        </tr>
        <tr>
            <th>Experience</th>
            <td>{{ $data['experience'] }}</td>
        </tr>
        <tr>
            <th>Field</th>
            <td>{{ $data['field'] }}</td>
        </tr>
        <tr>
            <th>Education</th>
            <td>{{ $data['education'] }}</td>
        </tr>
    </table>
</body>

</html>
