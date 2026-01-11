<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@php
for ($i=1; $i <= 100; $i++) {
    if (0 == $i % 15) {
        echo "Mari Berkarya";
    } else if (0 == $i % 5) {
        echo "Berkarya";
    } else if (0 == $i % 3) {
        echo "Mari";
    } else {
        echo $i;
    }
    echo ",";
}
@endphp
</body>
</html>
