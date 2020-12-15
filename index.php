

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>La ruleta de la muerte</title>
    <script src="js/Winwheel.min.js"></script>

<script src="./js/TweenMax.min.js"></script>
<script src="./js/jquery-3.2.1.slim.min.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <script src="./js/sweetalert.min.js"></script>
    <link href="./css/sweetalert.css" rel="stylesheet" />
    
  <meta property="og:url"               content="./" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="La ruleta (Rifa cosas)" />
<meta property="og:description"        content="Con esta ruleta online puedes rifar lo que gustes, solo llena la lista y genera tu ruleta" />
<meta property="og:image"              content="https://oscaruhp.github.io/Laruleta/img/ruleta.jpg" />

</head>
<body>
    <form id="form1" runat="server">

    <div>
        <style>
         #canvasContainer {
            background-image: url(img/Muerte.png);
            background-repeat: no-repeat;  
            background-position: center;   
            width: 700px;                  
            height: 700px;
			cursor:pointer;
		
        }

        </style>

        <div class="container-fluid">

            <div class="row">
                <div class="col-3 text-center">  
				<h1>La Ruleta</h1>
                    <br />
                       <a href="http://develoteca.com/" rel="home">
                          <img width="130px" src="http://develoteca.com/wp-content/themes/sitioweb/img/develoteca.png">
                    </a>
                     <br />
                    <br />
                    <div class="card bg-warning">
  <div class="card-body">
  
                  <h4 class="card-title">Lista de elementos:</h4>  
                    
                    <textarea id="ListaElementos" class="form-control" rows="13">
Equipo 1
Equipo 2
Equipo 3
Equipo 4
Equipo 5
Equipo 6
Equipo 7
Equipo 8
Equipo 9
Equipo 10
Equipo 11
Equipo 12
Equipo 13
Equipo 14
Equipo 15
Equipo 16
Equipo 17
Equipo 18
Equipo 19
Equipo 20
	  </textarea>
<br />
                    <input type="button" onclick="leerElementos()" class="btn btn-danger btn-lg btn-block" value="Generar Ruleta"/><br />
      </div></div>
      
                </div>
                <div class="col-7 text-center">
				<br/>
                     <input id="bigButton" class="btn-block btn-lg btn btn-success " onclick="objRuleta.startAnimation(); this.disabled=true;" value="Girar" type="button"/>
                      <div id="canvasContainer" onclick="objRuleta.startAnimation();bigButton.disabled = true;">
     <canvas id='Ruleta' width='700' height='690'>
         
            Canvas not supported, use another browser.
        </canvas> 
        
            </div>
                </div>
                <div class="col-2">
                    				<br/>
                    <script async src="./js/adsbygoogle.js"></script>
<!-- anuncio160_600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-4331617637495482"
     data-ad-slot="3603100456"></ins>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>

                </div>
            </div>
      

            </div>

     <script>
         var objRuleta;
         var winningSegment;
         var distnaciaX = 150;
         var distnaciaY = 50;
         var ctx ;
         function Mensaje() {
             winningSegment = objRuleta.getIndicatedSegment();
			 SonidoFinal();
             swal({
                 title: " ¡ "+winningSegment.text+" !",
               
                 imageUrl: "img/Muerte.png",
                 showCancelButton: true,
                 confirmButtonColor: "#e74c3c",
                 confirmButtonText: "Ok,Reiniciar",
                 cancelButtonText: "Quitar elemento",
                 closeOnConfirm: true,
                 closeOnCancel: true
             },
      function (isConfirm) {
          if (isConfirm) {
             
          } else {

              $('#ListaElementos').val($('#ListaElementos').val().replace(winningSegment.text,""));
              leerElementos();
              
          }
          objRuleta.stopAnimation(false);
          objRuleta.rotationAngle = 0;
          objRuleta.draw();
          DibujarTriangulo();
          bigButton.disabled = false;
      });

      }

         function DibujarTriangulo() {
             distnaciaX = 150;
             distnaciaY = 50;
             ctx = objRuleta.ctx;
             ctx.strokeStyle = 'navy';
             ctx.fillStyle = '#000000';
             ctx.lineWidth = 2;
             ctx.beginPath();
             ctx.moveTo(distnaciaX + 170, distnaciaY + 5);
             ctx.lineTo(distnaciaX + 230, distnaciaY + 5);
             ctx.lineTo(distnaciaX + 200, distnaciaY + 40);
             ctx.lineTo(distnaciaX + 171, distnaciaY + 5);
             ctx.stroke();
             ctx.fill();
         }

         function DibujarRuleta(ArregloElementos) {
             
               objRuleta = new Winwheel({
                 'canvasId': 'Ruleta',
                 'numSegments': ArregloElementos.length,
                 'outerRadius': 270,
                 'innerRadius': 80,
                 'segments':ArregloElementos,
                 'animation':
                 {
                     'type': 'spinToStop',
                     'duration':4,
                     'spins': 15,
					 'callbackFinished': 'Mensaje()',
                     'callbackAfter': 'DibujarTriangulo()' 
					 
                 }, 
				
             });
    
               DibujarTriangulo();
	  }
        function leerElementos() {
                  txtListaElementos=$('#ListaElementos').val().trim();
                  var Elementos = txtListaElementos.split('\n');
                  var ElementosRuleta= [];
	          Elementos.forEach(function (Elemento) {
                      if(Elemento){
                      ElementosRuleta.push({ 'fillStyle': "#" + ((1 << 24) * Math.random() | 0).toString(16), 'text': Elemento });
                  }
                  });
                  DibujarRuleta(ElementosRuleta);
	     } 
         leerElementos();
		  var audio = new Audio('alarma.mp3');  // Create audio object and load desired file.
		function SonidoFinal()
			{
				audio.pause();
				audio.currentTime = 0;
				audio.play();
			}
 
</script>
    </div>
    </form>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-74824848-1', 'auto');
  ga('send', 'pageview');
</script>



</body>
</html>
