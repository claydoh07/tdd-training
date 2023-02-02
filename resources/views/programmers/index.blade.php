<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        @foreach ($programmers as $programmer)
            <li>
                {{ $programmer['full_name'] }}
            </li>
            <li>
                {{ $programmer['email'] }}
            </li>
            <li>
                {{ $programmer['job_title'] }}
            </li>
            <li>
                {{ $programmer['address'] }}
            </li>
            <li>
                {{ $programmer['year_graduated'] }}
            </li>
        @endforeach
    </ul>
</body>
</html>