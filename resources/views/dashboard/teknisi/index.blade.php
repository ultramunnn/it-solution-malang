<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>HALLO PEMUDA NYENI</h1>
    <p>Selamat datang di dashboard teknisi</p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>
    </form>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('loaded');
        })
        if (performance.navigation.type === 2 || performance.getEntriesByType("navigation")[0].type === 'back_forward') {
            window.location.reload();
        }

        window.onpageshow = function(event) {
            if (event.persisted) {
                window.location.reload();
            }
        };

        window.onunload = function() {};
    </script>

</body>

</html>
