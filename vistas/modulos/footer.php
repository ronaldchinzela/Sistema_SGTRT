<footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://canvia.com" target="_blank">Canvia.</a>
</strong>
    Todos los derechos reservados 

    <div class="erikamonteza">
    <?php    
    if( $_GET["ruta"] == "licencia-spla" ||  $_GET["ruta"] == "costo-mantenimiento" || $_GET["ruta"] == "costo-nexsus" || $_GET["ruta"] == "costo-hp" || $_GET["ruta"] == "costo-fourwalls" || $_GET["ruta"] == "sow"){
    
    $item = null;
    $valor = null;

    $cambios = ControladorCambios::ctrMostrarCambios($item, $valor);

    foreach ($cambios as $key => $value){
    echo'  
    <h4 class="TC"><b><i>T.C: &nbsp;'.$value["valor"].'</i></b></h4>';
  }
}
?>
    </div>

</footer>

