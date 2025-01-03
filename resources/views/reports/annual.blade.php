<!DOCTYPE html>
<html lang="en">
<head>
    <title>Annual Accumulative Allowance Report</title>
</head>
<body>
<h1>Annual Accumulative Allowance Report</h1>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>Allowance Name</th>
        <th>Total</th>
        <th>Average</th>
        <th>Rank by Total</th>
        <th>Total Members</th>
        <th>Total Non-Members</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($report as $allowance)
        <tr>
            <td>{{ $allowance->name }}</td>
            <td>{{ $allowance->total }}</td>
            <td>{{ $allowance->total / 12 }}</td>
            <td>-</td> <!-- Placeholder for ranking -->
            <td>{{ $allowance->total_members }}</td>
            <td>{{ 2000 - $allowance->total_members }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
