<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Snacks') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/card_detail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/card_block_food.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/form_responsible.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/aside.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/new_deposit.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/card_extract.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/consumption.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsible/detail.css') }}" rel="stylesheet">

    <!-- Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons-->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
  <body onload="menuSelect('{{Route::currentRouteName()}}')">
    <div id="app">
      
      @include('layouts.responsible.aside_res')
      <main>
        @yield('content')
      </main>
    </div>
  </body>

  <script src="js/bootstrap.min.js"></script>
  
</html>
