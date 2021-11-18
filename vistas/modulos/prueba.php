<div class="content-wrapper">

  <section class="content-header">
    
    <h1 class="h1-titulo">
      
     Página de prueba CSV
    
    </h1>

  </section>

  <section class="content">

    <div class="box">

      <form name="upload" action="" method="post" enctype="multipart/form-data">

      <div class="form-group">
            
              <input type="file" class="file" name="file">
              <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Cargar data">
            </div> 

        </form>
      

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>    
           <th style="width:10px">&#8470;</th>
           <th>id</th>
           <th>nombre</th>
           <th>proyecto</th>
           <th>serie</th>
           <th>precio</th>
         </tr>
          
        </thead>
        <tbody>
            
        <?php
            $item = null;
            $valor = null;

            $pruebas = ControladorPruebas::ctrMostrarPruebas($item, $valor);
            
            foreach ($pruebas as $key => $value){
                
            echo ' <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$value["id"].'</td>
                    <td>'.$value["nombre"].'</td>
                    <td>'.$value["proyecto"].'</td>
                    <td>'.$value["serie"].'</td>
                    <td>'.$value["precio"].'</td>';
            }
        
        ?>

        </tbody>

       </table>

      </div>



    </div>

  </section>

</div>







