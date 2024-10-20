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
                <td>{{ $row['channel_name'] }}</td>
                <td>{{ $row['channel_designation'] }}</td>
                <td>{{ $row['channel_phoneno'] }}</td>
                <td>{{ $row['channel_email'] }}</td>
                <td>{{ $row['channel_message'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
