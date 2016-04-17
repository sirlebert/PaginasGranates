<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION["username"])){
	$in=1;
}else{
	$in=0;
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Españoles en Edimburgo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php
		include 'header.php';
	?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php
						include 'categories.php';
					?>
				</div>
				
				<div class="col-sm-9 padding-right">
					<table width="100%" border="0">
							  <tr>
							    <td>
								
							<div class="item-title">Autónomo – Self employed</div></td>
							    <td>Informacion de: <a href="www.viviredimburgo.com" target="_blank"><br>
										<img src="images/viviredimburgo-logo.png" alt="" width="171" height="57" />
									</div></a></td>
						      </tr>
				  </table>
				  
				  <div class="item-p">
		<p>Existe la posibilidad de que por tu experiencia laboral, por el gremio en concreto al que te dediques, o porque quieras desarrollar una idea profesional, necesites darte de alta como autónomo (self employed).</p>
		<p>En este documento abordaremos de una forma simple y con el objeto de introducirte superficialmente en el sistema de autónomos inglés. Es imposible abordar todas las opciones y variables, y por lo tanto tiene que ser uno mismo quien aborde su caso particular.</p>
		<p>A diferencia de otros países de la Unión Europea, existen unas variables en función de la actividad y la cantidad de ingresos que condicionarán nuestro registro.</p>
		<p>Es por esto, que existen <strong>tres tipos</strong> de casos los cuales nos obligarán a diferentes presiones fiscales:</p>
		<p>Si nuestra facturación en ingresos <strong>no superan los 5.075,00 libras al año</strong>, nos atenemos al pago de tasas &ldquo;class2&ldquo;. Esto quiere decir, que sólo abonaremos al mes una cuota que no supera las 10 libras mensuales (2,40 libras por semana) para cubrir el impuesto de la seguridad social. En caso de encontrarnos en esta situación, podemos incluso solicitar estar exento de este pago, o incluso pagar una cantidad superior voluntariamente. En caso de que solicitemos el no pago de esta tasa, afectará a las ayudas que en un futuro podamos solicitar como ayudas al crédito o ayudas por desempleado. En cambio, podemos abonar voluntariamente una cantidad para que en un futuro tengamos más derechos a percibir ciertas ayudas. En este caso nos podremos atener al pago de &ldquo;class3&ldquo;. Esto significaría unas 48,20 libras al mes. (12,05 libras a la semana.)</p>
		<p>Si las cosas nos han ido muy bien y resulta que hemos facturado más de lo previsto y hemos superado la cifra anterior y<strong> nos encontramos entre 5.715,00 libras pero no hemos llegado a 43.875,00 libras</strong>, la tasa por la que nos regiremos será &ldquo;class4″. Ésta se abona anualmente. Esto quiere decir, que al final del año fiscal (en UK, el año fiscal empieza el 6 de Abril y termina el 5 de Abril del año siguiente), nos llegará el Tax Return.</p>
		</div>
		<div class="articulo">¿Qué es el Tax return?</div><div class="item-p">
		<p>El Tax Return es un formulario en el que introduciremos toda la facturación del año además de los gastos derivados de ella. Este nos vendrá al primer año de nuestra actividad y a partir de este primer año, será cada seis meses. Abonaremos, además de las 10 libras mensuales de la &ldquo;class2&ldquo; o las 48,20 libras de la &ldquo;class3″, el 8 % de nuestras ganancias generadas en el año fiscal. Este porcentaje aumentará algo más de un 1% si superamos la cantidad máxima anteriormente dicha (sirva de información, que aparte deberemos presentar nuestra declaración de la renta donde pagaremos por nuestros ahorros o inversiones. Esto es común en todas las opciones).</p>
		<p>Si resulta que nuestra actividad, por el motivo que fuese, es muy rentable y <strong>superamos la cantidad de 67.000,00 libras</strong>, el porcentaje a pagar por nuestros ingresos cambia de formato y ya debemos estar subscritos a otra forma de pago. Deberemos de darnos de alta en el <strong>VAT</strong>. Para estos casos, no vamos a extendernos en esta página pues serían muchas las diferentes variables y no consideramos que sea la información que busca el perfil al que va dirigida esta página.</p>
		<div></div></div>
		<div class="articulo">¿Qué es el VAT?</div><div class="item-p">
		<p>El <strong>VAT</strong> es el impuesto de bienes añadido (IVA en España). Este impuesto se aplica a determinados bienes y transacciones entre empresas, ya sean británicas o comunitarias.</p>
		<p>En el Reino unido existen 3 formas de aplicar el VAT.</p>
		<ul>
		  <li>Estándar: 17,5%</li>
		  <li>Reducido 5%</li>
		  <li>Extra reducido o nulo: 0%</li>
	  </ul>
		<p>Como trabajador autónomo en Inglaterra, no estás obligado a registrarte en el VAT si tus ingresos no superan las 67.000 libras. Esto no quiere decir que no puedas hacerlo.</p>
		<p>Es evidente, que como trabajador autónomo, vamos a necesitar abordar una serie de gastos los cuales nos implicaran un pago de VAT. Este gasto, al igual que en otros países se puede desgravar de nuestros ingresos.</p>
		<p>Por lo tanto, la decisión de apuntarnos o no apuntarnos al VAT, tiene que ser tomada en función de la actividad que vayamos a desarrollar y qué movimiento de capital se va a derivar de esta.</p>
		</div><div>
		  <div>
		    <div class="item-title2"><img src="http://www.viviredimburgo.com/wp-content/themes/shoutbox-Version-1.3/images/icons/iconbox/info.png" alt="">Atención</div>
		    <p>Antes de darse de alta en el VAT, tenemos que darnos de alta como autónomos (self employed).</p>
	      </div></div>
	  <div class="item-p">
		<p>Podemos resumir, diciendo que una persona que vaya a hacer trabajos puntuales y sin mucha repercusión económica, no necesita el número VAT. En cambio, para una actividad diaria o más o menos regular, que implique gastos y facturación más abundante, claramente necesita conseguir este registro.</p>
		<div class="articulo">Trámites para darte de alta como autónomo</div>
		<p>Para darse de alta como autónomo en Reino Unido, tanto en <strong>Londres</strong> como en <strong>Edimburgo</strong>, los trámites son más simples que en otras zonas de la Unión Europea.</p>
		<p>Lo primero que debes de tener en cuenta para empezar los trámites, es obtener el &ldquo;NIN&ldquo; (Nacional Insurance Number). Este lo conseguirás en las oficinas del Job Centre.</p>
		<p>A continuación debes registrarte rellenando un formulario que encontrarás en la página:<a href="http://www.hmrc.gov.uk/sa/register.htm">www.hmrc.gov.uk</a>. Puedes registrarte online o vía correo ordinario. Debes hacerlo en &ldquo;<strong>H.M. Revenue &amp; Customs</strong>&rdquo;. Es posible hacerlo por teléfono, pero salvo que tu inglés sea de muy alto nivel, no es recomendable. Esto es debido principalmente, a que el responsable de que los datos sean correctos es la persona que se inscribe y no la persona que toma los datos.</p>
		</div><div>
		  <div>
		    <div class="item-title2"><img src="http://www.viviredimburgo.com/wp-content/themes/shoutbox-Version-1.3/images/icons/iconbox/info.png" alt="">Información</div>
		    <p>No puedes registrarte antes de empezar una actividad.</p>
	      </div>
	  </div><div class="item-p">
		<p>El registro como autónomo tiene que ir acompañado de la primera actividad. Hay que tener en cuenta que desde que desarrollemos la primera actividad no deben pasar más de tres meses sin registrarse. Si superamos este plazo, nos enfrentamos a penalizaciones de hasta 100 libras.</p>
		<p>En el propio formulario de registro deberemos indicar si solicitamos número VAT. Es posible que al principio no tengamos claro si nos interesa o no. La diferencia radica, como dije anteriormente, en el volumen de facturación que tengamos previsto. Si al principio no creemos que este vaya a ser grande, podemos dejar este registro para el futuro. Hay que tener en cuenta que el tenerlo, nos implica un trabajo contabilidad más complejo que el no tenerlo.</p>
		<p>El no tener número VAT, no implica que no podamos facturar. Simplemente no podremos aplicar el impuesto y por lo tanto no podremos desgravar este, de los gastos que de nuestra actividad se derive. Facturaremos como persona física, y al final de año pagaremos impuestos en función de nuestros ingresos como si de una declaración de la renta fuera.</p>
		<p>Esta información puede tener variaciones, por lo que se debe utilizar de forma prudente y como introducción. Lo recomendable, si es la opción laboral por la que nos hemos declinado, es acudir a las oficinas de <strong>H.M. Revenue &amp; Customs</strong>. Éstas se encuentran en la calle:</p>
		<p>Elgin House<br>
		  20 Haymarket Yards<br>
		  Edinburgh EH12 5WS</p>
		<p>Telf: 08453 021 448</p>
		<p><a href="http://www.hmrc.gov.uk/">http://www.hmrc.gov.uk</a></p></div>
				</div>
		</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php
		include 'footer.php';
	?>
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>