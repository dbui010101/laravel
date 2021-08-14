<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container">

<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden max-w-screen-2xl">
  <div class="md:flex">
    <div class="md:flex-shrink-0">
      <img class="h-full  w-full " src="https://image.freepik.com/free-vector/announce-advertisement-background_118124-332.jpg" >
    </div>
    @include('flash::message')
    @yield('contenu')
  </div>
</div>
   
</div>
</body>
</html>