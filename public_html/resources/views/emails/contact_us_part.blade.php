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
            <td>{{ $data['part_name'] }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $data['part_email'] }}</td>
        </tr>
        <tr>
            <th>Phone No</th>
            <td>{{ $data['part_phoneno'] }}</td>
        </tr>
        <tr>
            <th>Designation</th>
            <td>{{ $data['part_designation'] }}</td>
        </tr>
        @if (isset($data['part_company']))
            <tr>
                <th>Company</th>
                <td>{{ $data['part_company'] }}</td>
            </tr>
        @endif
        <tr>
            <th>City</th>
            <td>{{ $data['part_city'] }}</td>
        </tr>
        <tr>
            <th>Message</th>
            <td>{{ $data['part_message'] }}</td>
        </tr>
    </table>
</body>
</html>