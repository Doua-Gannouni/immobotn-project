<html lang="fr">
<head>
<meta charset="utf-8" >
<link rel="icon" type="image/png"  href="{{ asset('clients/icon.png') }}">
<link rel="stylesheet" href="{{ asset('clients/style.css') }}">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<title>IMMOBOTN</title>

</head>



<body>

@include('client.includes.header')

<main>
  @yield('contenu')
</main>

@include('client.includes.footer')


</body>


</html>
