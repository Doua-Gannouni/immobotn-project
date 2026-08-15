<html>
<head>
<meta charset="utf-8" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" >
<link rel="icon" type="image/png"  href="{{ asset('clients/icon.png') }}">
<link rel="stylesheet" href="{{ asset('clients/style.css') }}">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<title>IMMOBOTN</title>

</head>



<body>

@include('client.includes.header')

<main>
  @yield('contenu')
</main>

@include('client.includes.footer')


<script>

  // Enable pusher logging - don't include this in production
 /* Pusher.logToConsole = true;

  var pusher = new Pusher('c21bc72bc239d911c301', {
    cluster: 'mt1'
  });

  var channel = pusher.subscribe('new_notification');
  channel.bind('my-event', function(data) {
    alert(JSON.stringify(data));
  });*/

 
         // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

var pusher = new Pusher('c21bc72bc239d911c301', {
  cluster: 'mt1'
});

var channel = pusher.subscribe('new-notifications');
channel.bind('NewNotification', function(data) {
  alert(JSON.stringify(data));
});



</script>

<script src="{{asset('pusherNotifications.js')}}"></script>

</body>


</html>