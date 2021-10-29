<?php
     /* DESTRUYENDO LAS SESIONES INICIADAS */
     
     session_destroy();

     echo '<script>

            window.location = "ingreso";

         </script>';