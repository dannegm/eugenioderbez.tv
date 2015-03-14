<!doctype html>
<html lang="es-Mx">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
	<base href="http://eugenioderbez.tv/" target="_top">
	<meta charset="utf-8" />
		<meta name="viewport" content="width=320, user-scalable=no" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title>Eugenio Derbez - EugenioDerbez.tv</title>
	<base href="http://derbez.tv/" target="_self" />

	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/derbez.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/derbez320.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/index320.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('css/index-derbez.css')}}">
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.js"></script>
	@if(!Agent::ismobile())
	<script src="{{URL::asset('js/b.js')}}"></script>
	<script src="{{URL::asset('js/jquery.parallax.js')}}"></script>
	<script src="{{URL::asset('js/buzz.min.js')}}"></script>
	<script src="{{URL::asset('js/derbez.js')}}"></script>
	<script src="{{URL::asset('js/index-derbez.js')}}"></script>
	@endif

	<script>
	$(document).ready(function(){
		$('nav.mobil .button').click(function(e){
			e.stopPropagation();
			$('nav.mobil ul').slideToggle(200);
		});
	});
	</script>
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-47107007-5', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body id="derbez">
	<nav class="menu">
		<div class="container">
			<div class="row">
				<div class="col-md-24">
					<ul>
						<li>
							<a href="home">
								Inicio
							</a>
						</li>
						<li>
							<a href="carnales">
								Videos
							</a>
						</li>
						<li>
							<a href="preguntame">
								Pregúntame
							</a>
						</li>
						<li>
							<a href="memeteca">
								memeteca
							</a>
						</li>
						<li>
							<a href="derbez">
								Derbez
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<nav class="mobil">
		<div class="logo">
			<a href="/">
				<img class="img-responsive" src="img/logo.png">
			</a>
		</div>
		<span class="button"></span>
		<ul>
			<li>
				<a href="home">
					Inicio
				</a>
			</li>
			<li>
				<a href="carnales">
					Videos
				</a>
			</li>
			<li>
				<a href="preguntame">
					Pregúntame
				</a>
			</li>
			<li>
				<a href="memeteca">
					memeteca
				</a>
			</li>
			<li>
				<a href="derbez">
					Derbez
				</a>
			</li>
		</ul>
	</nav>

@if(!Agent::ismobile())
<figure id="ciudad">
</figure>
<ul id="paralax_ciudad">
	<li class="layer" data-depth="0.30" id="cielo"></li>
	<li class="layer" data-depth="0" id="plano4"></li>
	<li class="layer" data-depth="0.05" id="plano3"></li>
	<li class="layer" data-depth="-0.05" id="plano2"></li>
	<li class="layer" data-depth="-0.15" id="primerplano">
		<ul id="personajes">
			<li id="c1" data-coords="142,978" data-size="80,200" data-ref="profetizo"><span></span></li>
			<li id="c2" data-coords="574,978" data-size="100,264" data-ref="peperoni"><span></span></li>
			<li id="c3" data-coords="1325,952" data-size="86,236" data-ref="aaronabazolo"><span></span></li>
			<li id="c4" data-coords="1574,970" data-size="148,150" data-ref="julioesteban"><span></span></li>
			<li id="c5" data-coords="1904,970" data-size="69,206" data-ref="diablito"><span></span></li>
			<li id="c6" data-coords="2019,970" data-size="78,254" data-ref="hanz"><span></span></li>
			<li id="c7" data-coords="2384,950" data-size="72,95" data-ref="superportero"><span></span></li>
			<li id="c8" data-coords="2412,1046" data-size="108,163" data-ref="nicolas"><span></span></li>
			<li id="c9" data-coords="2622,922" data-size="90,124" data-ref="marilin"><span></span></li>
			<li id="c10" data-coords="2832,910" data-size="80,236" data-ref="armandohoyos"><span></span></li>
			<li id="c11" data-coords="3078,1018" data-size="92,206" data-ref="barnaby"><span></span></li>
			<li id="c12" data-coords="3310,1010" data-size="85,232" data-ref="eloygame"><span></span></li>
			<li id="c13" data-coords="3010,952" data-size="52,52" data-ref="elonje"><span></span></li>
		</ul>
		<ul id="plecas">
			<li id="p1" data-coords="902,768" data-ref="s1"><span>Inicios</span></li>
			<li id="p2" data-coords="1363,932" data-ref="s2"><span>Formación</span></li>
			<li id="p3" data-coords="1494,674" data-ref="s3"><span>Teatro</span></li>
			<li id="p6" data-coords="1640,945" data-ref="s6"><span>Productor</span></li>
			<li id="p8" data-coords="1774,522" data-ref="s8"><span>Televisión</span></li>
			<li id="p9" data-coords="2093,960" data-ref="s9"><span>Internacional</span></li>
			<li id="p5" data-coords="2127,354" data-ref="s5"><span>Doblaje</span></li>
			<li id="p4" data-coords="2526,908" data-ref="s4"><span>Eventos</span></li>
			<li id="p10" data-coords="2675,625" data-ref="s10"><span>XHDRBZ</span></li>
			<li id="p11" data-coords="2868,886" data-ref="s11"><span>Libros</span></li>
			<li id="p7" data-coords="2924,464" data-ref="s7"><span>Director</span></li>
			<li id="p12" data-coords="3346,994" data-ref="s12"><span>Personal</span></li>
		</ul>
	</li>
</ul>
@endif

<section id="intro">
	<h1>
		<span>Eugenio Derbez</span>
		<img src="img/principal-fecha.png" />
	</h1>
	<p id="inipleca" class="">
		Hace muchos años nació una estrella, cuyo talento y carisma incomparables cambiaron para siempre el panorama de la televisión y el cine mexicanos. Su nombre era Joaquín Pardavé. A Eugenio Derbez le gusta Joaquín Pardavé. Y hablando de Eugenio Derbez, a continuación un vistazo a la vida de Eugenio Derbez.
	</p>
</section>

<div id="overlive"></div>

<section class="popup" id="s12">
	<h2>Personal</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		Eugenio tiene tres hijos: Aislinn, Vadhir y José Eduardo. En 2012 contrajo matrimonio con la actriz y cantante Alessandra Rosaldo, convirtiéndose en padres de la pequeña Aitana en 2014.
		<br /><br />
		Eugenio ha mostrado su lado altruista a través de iniciativas como Corriendo Por Los Niños, y el apoyo a los damnificados por el reciente huracán que afectó las costas de Guerrero, a quienes donó parte de la taquilla de su exitoso film.
		</p>
		<img src="img/derbez/personal_1.png" />
		<a class="btn" href="http://es.wikipedia.org/wiki/Eugenio_Derbez">Wikipedia</a>
		<a class="btn" href="http://www.imdb.com/name/nm0220240/">IMBD</a>
	</div>
</section>
<section class="popup" id="s1">
	<h2>Inicios</h2>
	<button class="close"></button>
	<div class="p">
		<p>
			Eugenio comenzó su carrera participando como niño actor en telenovelas (discúlpenlo, no sabía lo que hacía). 
		<br /><br />
			A los diecinueve años comenzó a estudiar actuación y participó en varias telenovelas, tales como “CAMINEMOS”, “LA PASIÓN DE ISABELA”, “TAL COMO SOMOS”, “DOS VIDAS” y “DE FRENTE AL SOL” (él era el de los lentes obscuros).
		<br /><br />
			En programas semanales ha participado en varios; entre los más importantes denigrantes están: “CACHÚN CACHÚN, RA RA”, y entre los más importantes están “EN FAMILIA CON CHABELO” Y “ANABEL”, ahí fue donde se dió cuenta de que la gente se reía de él. A partir de entonces decidió empezar a cobrar por eso.
		</p>
		<img src="img/derbez/inicio_1.png" />
		<a class="btn" href="http://eugenioderbez.tv/descargas/EDBio.pdf">Descarga Biografía autorizada en inglés</a>
	</div>
</section>
<section class="popup" id="s2">
	<h2>Formación</h2>
	<div class="p">
		<button class="close"></button>
		<p>
		Estudió intensamente danza durante dos años y medio, (cuando terminó se tomó dos garrafones de  suero oral). Su preparación dancística se especializó en el tap, jazz y ballet, lo cual le permitió incursionar en el teatro como bailarín en comedias musicales como: “YO Y MI CHICA” y “ANJOU”, en la cual también participó como actor.
		<br /><br />
		Además de estudiar actuación, danza y canto, también estudió la carrera de realizador cinematográfico, graduándose como director de cine. También estudió música durante cinco años, (piano, órgano y acordeón).
		</p>
		<img src="img/derbez/formacion_1.png" />
	</div>
</section>
<section class="popup" id="s3">
	<h2>Teatro</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		<img class="left" src="img/derbez/teatro_1.png" />
		Otras obras en las que ha participado son: “ENTIENDE UD. A BRAHMS”, “DE NOCHE SALTA EL GATO”, “GOLFOS DE 5 ESTRELLAS”, “NINETTE Y UN SEÑOR DE MURCIA”, (premio al mejor actor de comedia en teatro 1993), además de la obra “SÁLVESE QUIEN PUEDA”, (premio al mejor actor de comedia en teatro en 1995).
		<br /><br />
		En centro nocturno estuvo más de cuatro años ininterrumpidos con el show “FELLATIO”. Estuvo también como músico y grupero con su show llamado “RONCO”, (parodia de “BRONCO”).
		</p>
	</div>
</section>
<section class="popup" id="s4">
	<h2>Eventos</h2>
	<button class="close"></button>
	<div class="p">
		<img src="img/derbez/eventos_1.png" />
		<p>
		Ha participado en eventos internacionales como el Mundial de Futbol en Estados Unidos en 1994, Juegos Olímpicos en Atlanta en 1996, Mundial de Futbol en Francia en 1998. Olimpiadas en Sydney, Australia, en 2000; en el Mundial en Corea y Japón en 2002; Olimpiadas de Atenas 2004; Copa Mundial de Alemania 2006; Olimpiadas en Beijin 2008; Mundial de Sudáfrica 2010; y las Olimpiadas de Londres 2012.
		</p>
	</div>
</section>
<section class="popup" id="s5">
	<h2>Doblaje</h2>
	<button class="close"></button>
	<div class="p">
		<img class="img1" src="img/derbez/doblaje_1.png" />
		<p>
		Ha doblado varias películas como “Mulán” (a Moshu, el dragón), Dr. Dolittle 1 y 2, (a el perro Lucky), 102 Dálmatas, (a la guacamaya Garcilazo) pero sin duda su obra cumbre en doblaje es Shrek, película en la cual dobló al burro (hay 2 características que lo hacen idéntico). Ahí  tuvo la oportunidad, con su grupo creativo, de adaptar la película al español e incluir mucho de su estilo a esta versión.
		</p>
		<img class="img2" src="img/derbez/doblaje_2.png" />
	</div>
</section>
<section class="popup" id="s6">
	<h2>Productor</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		“DERBEZ EN CUANDO” fue su segunda serie semanal de comedia, la cual inició en marzo de 1997  alcanzando desde su inicio el primer lugar de la barra de comedia en la televisión mexicana. Con el episodio “Gañanes De La Bahía” rompió el record histórico de un programa unitario en la TV Mexicana. Este programa ya se hizo bajo la “Producción de Eugenio Derbez”, estrenándose él como Productor General. Al terminar la temporada, el programa se repitió todo el año 2000, año durante el cual siguió como primer lugar en rating de la televisión mexicana.
		</p>
		<img class="hide" src="img/derbez/productor_1.png" />
	</div>
</section>
<section class="popup" id="s7">
	<h2>Director</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		En el año 2013 estrena su ópera prima como director “No Se Aceptan Devoluciones” (Intructions Not Included) que se convierte en uno de los mayores éxitos de taquilla de los últimos tiempos. En Estados Unidos se coloca como la película independiente más taquillera del año (por encima de cintas de Woody Allen y Spike Lee); la película en lengua extranjera número uno del año y la cuarta en la historia de la taquilla estadounidense. En México se convierte en la cinta más taquillera del año, la Mexicana más taquillera de la historia y la segunda más vista en la historia de la taquilla mexicana. La cinta le vale una nominación a los People's Choice Awards y una invitación a los Globos De Oro.
		</p>

		<img class="hide" src="img/derbez/director_1.png" />

		<iframe src="//www.youtube.com/embed/_Dn70Q4tWro?rel=0" frameborder="0" allowfullscreen></iframe>
				@if(Agent::isAndroidOS())
				<a class="btn" href="https://play.google.com/store/movies/details/No_se_aceptan_devoluciones?id=xNAIh-xaKrk">No Se Aceptan Devoluciones en Google play</a>
				@else
				<a class="btn" href="https://itunes.apple.com/mx/movie/no-se-aceptan-devoluciones/id794259708">No Se Aceptan Devoluciones en iTunes</a>
				@endif
			</div>
</section>
<section class="popup" id="s8">
	<h2>Televisión</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		<img class="right" src="img/derbez/television_1.png" />
		Después de realizar su programa de sketches llamado “AL DERECHO Y AL DERBEZ” en el que actuó, dirigió y escribió, surgió la oportunidad de... ¡ah! y también fue editor y musicalizador... decíamos que surgió la oportunidad de... ¡ah! y por que no decirlo, también se metió en la cuestión del maquillaje, escenógrafía y vestuario... bueno pues, surgió la oportunidad de... en fin ¿en que nos quedamos? Que después de “AL DERECHO Y AL DERBEZ” surgió la oportunidad de grabar la telenovela “NO TENGO MADRE” (él mismo define esta novela fársica como una de sus obras cumbre). En esta novela no hizo tantas cosas como en el programa porque ahí sólo pudo hacer un papel  estelar interpretando dos personajes, dirigió, escribió y compuso el tema musical y ya no le daba tiempo de dar aventones.
		</p>
	</div>
</section>
<section class="popup" id="s9">
	<h2>Internacional</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		En 2005 se estrenó como actor en Broadway, en Nueva York, con la puesta en escena Latinologues. 
		<br /><br />
		En el 2012 co-protagoniza la serie norteamericana ¡ROB! Al lado del actor Rob Schneider, la que se transmite en horario estelar por la cadena #1 en Estados Unidos, CBS.
		<br /><br />
		En 2013 la agencia Q Scores lo reconoce como el Latino más reconocido en los hogares hispanos, por encima de figuras como Messi y Shakira.
		</p>

		<img class="hide" src="img/derbez/internacional_1.png" />

		<iframe src="//www.youtube.com/embed/TiH_gBoIN4A?rel=0" frameborder="0" allowfullscreen></iframe>

				@if(Agent::isAndroidOS())
				<a class="btn" href="https://play.google.com/store/movies/details/No_Eres_Tu_Soy_Yo_VE?id=8ATuWQ_ZS2s">No Eres Tú, Soy Yo en Google play</a>
				@else
				<a class="btn" href="https://itunes.apple.com/mx/movie/no-eres-tu-soy-yo/id435869493">No Eres Tú, Soy Yo en iTunes</a>
				@endif
			</div>
</section>
<section class="popup" id="s10">
	<h2>XHDRBZ</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		En el 2002 estrena la serie XHDRBZ y lanza la sitcom más exitosa de los últimos tiempos: La Familia P. Luche, que en tres temporadas ha sido un gran éxito tanto en su transmisión en México como en Estados Unidos.
		</p>
		<img class="hide img2" src="img/derbez/xhdrbz_2.png" />
		<img class="img1" src="img/derbez/xhdrbz_1.png" />
	</div>
</section>
<section class="popup" id="s11">
	<h2>Libros</h2>
	<button class="close"></button>
	<div class="p">
		<p>
		<img class="left" src="img/derbez/libros_1.png" />
		Tiene 2 libros en su haber: “La Autobiografía no autorizada de Armando Hoyos  lanzada en 1995 y El Diccionario de la Real Epidemia de la Lengua´, publicado a finales del año 2000. Ambos estuvieron en primer lugar de ventas (en Sanborn’s estuvo 4 meses consecutivos en primer lugar).
		</p>
	</div>
</section>

<footer id="footer">
	<div class="center">

		<ul class="social">
			<li><a href="https://twitter.com/EugenioDerbez" title="Twitter de Eugenio Derbez"><img src="http://derbez.tv/img/twitter.png" alt="Twitter"></a></li>
			<li><a href="https://www.facebook.com/pages/Eugenio-Derbez/148393515248368" title="Facebook de Eugenio Derbez"><img src="http://derbez.tv/img/facebook.png" alt="Facebook"></a></li>
		</ul>

		<p>Derechos reservados eugenioderbez.tv / Diseño y desarrollo <a href="http://ambmultimedia.com.mx" title="AMB Multimedia">AMB Multimedia</a></p>

		<a class="info" href="legales" title="Info"><img src="img/info.png" alt="Info"></a>

	</div>
</footer>

<footer class="mobil">
		<p>TODO EL CONTENIDO QUE SE EXHIBE EN ESTE PORTAL, PERTENECE A WWW.EUGENIODERBEZ.TV</p>
</footer>

</body>
</html>