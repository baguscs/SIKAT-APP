<!DOCTYPE html>
<html>
<head>
    <title>SIKAT</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Silahkan klik link dibawah ini</p>
    <p>{{ route('form_forgot', $details['id']) }}</p>
    <p>Thank you</p>
</body>
</html>