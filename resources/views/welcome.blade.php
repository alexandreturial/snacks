<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
		<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">

				<title>Snacks</title>

				<!-- Fonts -->
				<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
				 <!-- Bootstrap CSS -->
				 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
				 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

				<!-- Styles -->
				<link href="{{ asset('css/landing/styles.css') }}" rel="stylesheet">
				<link href="{{ asset('css/landing/header.css') }}" rel="stylesheet">
				<link href="{{ asset('css/landing/home.css') }}" rel="stylesheet">
				<link href="{{ asset('css/landing/profile.css') }}" rel="stylesheet">
				<link href="{{ asset('css/landing/about.css') }}" rel="stylesheet">

			
				</head>
		<body>
				<header class="navbar">
						<h3>Snacks</h3>
						<div class="contact">
							<h4><a href="#aboutpage">Sobre</a></h4>
							<h4><a href="mailto:snacks@gmail.com">Contato</a> </h4>
						</div>
						
						@if(in_array('nome', session()->all()))
						
							<div class="sigin-btns">
								<a class="primary" href="{{Route('entrar')}}">Home</a>
							</div>
            @else
							<div class="sigin-btns">
								<a class="primary" href="{{Route('entrar')}}">Login</a>
							</div>
            @endguest
				</header>
				<main>
					<div class="home-page">
						<div class="home-title">
							<h1>A melhor maneira de pedir comida.</h1>
							<p>
								Controle e monitore o que seu filho está comendo <br/>
								e propocione uma melhor eduação alimentar para ele
							</p>
						</div>
						<div class="home-card">
							<img id="img1" src="{{ asset('images/food1.png') }}" alt="food1">
							 <img id="img2" src="{{ asset('images/food2.png') }}" alt="food2">
							<img id="img3" src="{{ asset('images/food3.png') }}" alt="food3">
						</div>
					</div>
					<img src="{{ asset('images/group.svg') }}" alt="waves">
					<div class="about-page" id="aboutpage">
						<img id="open-img" src="{{ asset('images/sea-waves.svg') }}" alt="waves">
						<div class="content">
							<h3>Vantagens da escola até o aluno</h3>
							<div class="content-info-list">
								<article class="right-direction">
									<div class="description">
										<h4>Vantagens para escola</h4>
										<p>
											Colégio U.A. - "Uma das coisas mais importantes na vida de um futuro herói é ter controle sobre sua alimentação! Com a chegada do Snacks, 
											a agilidade na hora de fazer uma compra e facilidade ao fazer um planejamento alimentar deixou os pais, os responsáveis e os alunos extremamente satisfeitos, PLUS ULTRA!"
										</p>
										<button ><a href="mailto:snacks@gmail.com">Contato</a></button>
									</div>
									<div class="img-description">
										<img src="{{ asset('images/escola3.png') }}" alt="" >
									</div>
									
								</article>
								<article class="left-direction">
									<div class="img-description">
										<img src="{{ asset('images/responsavel.jpg') }}" alt="">
									</div>
									
									<div class="description reverse">
										<h4>Vantagens para responsável</h4>
										<p>
											Felonius Gru - "O Snacks me permite controlar quais alimentos as minhas 3 danadinhas tem acesso, assim posso evitar que elas comam algo que são alérgicas ou comidas que eu ache imprópria. Além disso consigo 
											também ter o controle do quanto elas podem gastar e todo o histórico das compras!"
										</p>
										<button><a href="mailto:snacks@gmail.com">Contato</a></button>
									</div>
									
								</article>
								<article class="right-direction">
									<div class="description">
										<h4>Vantagens para aluno</h4>
										<p>
											Mike Wazowski - "Eu fico feliz em ter um programa tão fácil e intuitivo para 
											eu poder comprar meus lanches, com ele eu consigo saber os valores das comidas e bebidas que estão disponíveis sem precisar sempre perguntar cada item para os atendentes!"
										</p>
										<button><a href="mailto:snacks@gmail.com">Contato</a></button>
									</div>
									<div class="img-description">
										<img src="{{ asset('images/aluno.jpg') }}" alt="">
									</div>
								</article>
							</div>
						</div>
						<img id="end-img" src="{{ asset('images/sea-waves.svg') }}" alt="waves">
					</div>
					<div class="school-page">
						<h3>Escola</h3>
						<div class="profiles">
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="overflow: hidden;">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<div class="info-school">
										<h3>{{$escola->nome}}</h3>
										<h5>{{$escola->endereco}}</h5>
										<h5>Tel: {{$escola->telefone}}</h5>
										<h5>Email: {{$escola->email}}</h5>
									</div>
									<img class="d-block" src="{{ asset('images/escola1.jpeg') }}" alt="First slide">
									
								</div>
						</div>
					</div>
				</main>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		</body>
</html>
