<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <h1>Pengecekan Kode C</h1>
    @error('code')
        <p>Tolong isi dulu dong</p>
    @enderror

    
    <div class="editor-container">
        <pre id="editor"></pre>
    </div>
    <form method="post" action="/code-checker" id="myform">
        @csrf
        <input type="hidden" name="code" id="code" value="">
        <input type="submit" value="Eksekusi">
    </form>

    @if (isset($output))
        <h2>Hasil Eksekusi:</h2>
        <pre>{{ $output }}</pre>
    @endif

</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.14.0/ace.js" integrity="sha512-WYlXqL7GPpZL2ImDErTX0RMKy5hR17vGW5yY04p9Z+YhYFJcUUFRT31N29euNB4sLNNf/s0XQXZfzg3uKSoOdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/main.js"></script>
</html>

