<!DOCTYPE html>
<html lang="en">
<head>
    <title>Monthly Allowance Report</title>
</head>
<body>
<h1>Monthly Allowance Report - {{ $month }}</h1>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
    <tr>
        <th>Employee Name</th>
        <th>Food</th>
        <th>Transport</th>
        <th>Communication</th>
        <th>Child Care</th>
        <th>School Fee</th>
        <th>Total</th>
        <th>Average</th>
        <th>Overall Rank</th>
        <th>Rank by Gender</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($report as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            @php
                $total = 0;
                $allowances = $employee->allowances->pluck('amount', 'name');
            @endphp
            @foreach (['Food', 'Transport', 'Communication', 'Child Care', 'School Fee'] as $type)
                <td>{{ $allowances[$type] ?? 0 }}</td>
                @php $total += $allowances[$type] ?? 0; @endphp
            @endforeach
            <td>{{ $total }}</td>
            <td>{{ $total / 5 }}</td>
            <td>-</td> <!-- Placeholder for ranking -->
            <td>-</td> <!-- Placeholder for gender ranking -->
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
