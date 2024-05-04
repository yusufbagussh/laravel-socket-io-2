<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Receiver</title>

    @vite('resources/js/app.js')
</head>

<body>
    <div id="messages"></div>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof window.Echo !== 'undefined') {
                console.log('window.Echo is defined');
                window.Echo.channel('EveryoneChannel')
                    .listen('EveryoneMessage', function(e) {
                        console.log('Received message: ' + e.message);
                        $('#messages').append('<p>' + e.message + '</p>');
                    });
            } else {
                console.error('window.Echo is not defined. Please check that Echo is properly imported in app.js');
            }
        });
    </script>
</body>

</html>
