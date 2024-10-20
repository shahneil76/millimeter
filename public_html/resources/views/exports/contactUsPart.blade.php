<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Phone no</th>
            <th>Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row['part_name'] }}</td>
                <td>{{ $row['part_designation'] }}</td>
                <td>{{ $row['part_phoneno'] }}</td>
                <td>{{ $row['part_email'] }}</td>
                <td>{{ $row['part_message'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
