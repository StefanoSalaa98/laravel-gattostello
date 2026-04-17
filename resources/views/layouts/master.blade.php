<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("titolo")</title>

    <!-- Includo gli assets compilati da Vite -->
    @vite(['resources/js/app.js'])

</head>

<style>
    .card {
        display: inline-block;
        border: solid 1px grey;
        border-radius: 10px;
        padding: 5px;
        background-color: lightblue;
        text-align: center;
        width: calc((100% - 80px) / 5);

        h3 {
            margin-top: 0;
        }
    }
</style>

<body>
    @include("partials/header")

    @yield("contenuto")

    @include("partials/footer")

</body>

</html>