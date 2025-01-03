<!DOCTYPE html>
<html lang="en">
<head>
    <title>Summary Monthly Salary Report</title>
</head>
<body>
<h1>Summary Monthly Salary Report</h1>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>Employee Name</th>
        @for ($i = 1; $i <= 12; $i++)
            <th>{{ now()->startOfYear()->addMonths($i - 1)->format('M') }}</th>
        @endfor
        <th>Total</th>
        <th>Average</th>
        <th>Overall Rank</th>
        <th>Rank by Gender</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($report as $employee)
        <tr>
            <td>{{ $employee['name'] }}</td>
            @foreach ($employee['monthly'] as $month => $salary)
                <td>{{ $salary }}</td>
            @endforeach
            <td>{{ $employee['total'] }}</td>
            <td>{{ $employee['average'] }}</td>
            <td>-</td> <!-- Placeholder for ranking -->
            <td>-</td> <!-- Placeholder for gender ranking -->
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
