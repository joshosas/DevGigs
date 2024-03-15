<!-- resources/views/pages/weather.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
</head>

<body>
    <h1>Hello and welcome,</h1>
    <p>Your weather today is: {{ $weather['current']['temperature_2m'] }}°C</p>
</body>

</html>