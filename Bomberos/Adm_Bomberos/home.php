<?php 
  include("admin.php");
?>
<style type="text/css">
    @media (min-width: 1024px){
        .topp {
            font-size: 1.1vw;
            line-height: 1em;
        }
    }

    @media (max-width: 1024px){
        .topp {
            font-size: 1.5vw;
            line-height: 1em;
        }
    }

    @media (max-width: 800px){
        .topp {
            font-size: 1.8vw;
            line-height: 1em;
        }
    }

    @media (max-width: 640px){
        .topp {
            font-size: 2.3vw;
            line-height: 1em;
        }
    }

    @media (max-width: 320px){
        .topp {
            font-size: 4.5vw;
            line-height: 1em;
        }
    } 
  </style>

  <script type="text/javascript">
    $("#nav-inicio").addClass('active');
  </script>

        <div class="col-lg-12 col-md-12 m-auto py-3">
          <div class="row text-center">
            <div class="col-12">
              <div class="col-12 mb-4 text-center topp">
                <span>
                  República Bolivariana de Venezuela<br>
                  Gobierno del Estado Bolivariano de Nueva Esparta<br>
                  Dirección de la Virgensita del Valle<br>
                </span>
              </div>
              <img src="../Imagenes/escudo-azul.png" class="img-fluid" style="height: 18em; width: 18em;">
            </div>
            <div class='col-12 text-center'>
              <h1 class="font-weight-light fuente">Bienvenido Inspector</h1>
              <p class='font-weight-light text-dark fuente2'><span class='text-primary text-center'>Panel de Bomberos<br>Estado Nueva Esparta</span>
                <br>Alfredo Díaz Gobernador</p>
            </div>
          </div>
        </div>
      
      <!-- PARTE QUE VIENE LUEGO DEL INCLUDE DE ADMINISTRACION.PHP -->
      </div>
  </div>
    <!-- FIN CONTENEDOR DE LAS OPCIONES -->
</body>
</html>