<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<h1 class="h1-titulo">
    SGTRT
</h1>

</section>

<!-- Contenido temporal para la página de inicio -->
<section class="content">

<div class="box">
<div class="box-header with-border">
<?php                    
        $item = null;
        $valor = null;

        $cambios = ControladorCambios::ctrMostrarCambios($item, $valor);

        foreach ($cambios as $key => $value){
            echo'
    <h3 class="box-title" id="TC">Tipo de cambio actual:

    <b><i id="valor-cambio">&nbsp;'.$value["valor"].'</i></b> 

    </h3>

    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
        <i class="fa fa-minus"></i></button>
    </div>
    </div>

    <div class="box-body">
    <button class="btn btn-warning btnEditarCambio" idCambio="'.$value["idtipo"].'" data-toggle="modal" data-target="#modalEditarCambio"></i>&nbsp;&nbsp;<b>Editar el tipo de cambio actual</b></button>
    </div>';

    }
?>
    </div>

    <div>

  </div>

</section>

</div>


<!--======================================================================================================================================
                                                 MODAL AGREGAR NUEVO TC
=======================================================================================================================================-->
<div id="modalEditarCambio" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content" id="modal-contenido">

  <form role="form" method="post" id="dimensiones-form">

<!--===========================================
      CABECERA DEL MODAL
============================================-->
    <div class="modal-header" style="background:#3c8dbc; color:white">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title" id="center-titulo">Editar tipo de cambio</h4>
    </div>

<!--===========================================
      CUERPO DEL MODAL
============================================-->
  <div class="modal-body">
      
      <div class="box-body" id="cajas-formulario">

      <!-- ENTRADA PARA EL NOMBRE -->
          <div class="form-group">

              <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-money"></i></span>
                  <input type="text" class="form-control input-lg" id="editarCambio" name="editarCambio" placeholder="Ingresar el valor" required>
                  <input type="hidden" id="idCambio" name="idCambio">
              </div>

          </div>

          </div>
    
      </div>

<!--===========================================
      PIE DEL MODAL
============================================-->
    <div class="modal-footer" id="pie">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>

    </form>

    <?php

        $editarCambio = new ControladorCambios();
        $editarCambio -> ctrEditarCambio();

    ?>

  </div>

</div>
</div>




