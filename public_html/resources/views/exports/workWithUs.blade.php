<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone no</th>
            <th>Experience</th>
            <th>Field</th>
            <th>Education</th>
            <th>CV</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['email'] }}</td>
                <td>{{ $row['phoneno'] }}</td>
                <td>{{ $row['experience'] }}</td>
                <td>{{ $row['field'] }}</td>
                <td>{{ $row['education'] }}</td>
                <td>{{ URL($row['cv']) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
