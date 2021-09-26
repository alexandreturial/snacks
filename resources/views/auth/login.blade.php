<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login/login.css') }}" rel="stylesheet">


    <link href="{{ asset('css/layout/aside.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fontes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  
</head>
<body>
    <div class="container">
        
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
                    <div class="card-body">
                        <form method="" action="{{ route('stu_index') }}">
                            @csrf
                            <div class="form-group ">
                                <div class="label-float">
                                	<input type="text" required name="login" value="" id="login" onchange="isNotEmpty('login')" placeholder=" "/>
                                	<label>Login</label>
                                </div>
    
                                <div class="col-md-6">    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group">
															<div class="label-float">
																<input type="password" required name="password" value="" id="password" onchange="isNotEmpty('password')" placeholder=" "/>
																<label>Senha</label>
															</div>
                              <div class="col-md-6">    
                                  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                  {{ __('Login') }}
                                </button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
       
    </div>
</body>
<script src="{{ asset('js/Home/home.js') }}"></script>

</html>
