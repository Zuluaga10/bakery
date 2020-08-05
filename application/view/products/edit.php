     <div class="widget">
         <div class="widget-heading">
             <h3 class="widget-title">Editar cliente</h3>
         </div>
         <div class="widget-body">
             <form method="post" action="<?php echo URL; ?>Products/EditarCliente">
                 <div class="row">
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="txtCustomerName">Nombre</label>
                             <input type="number" value="<?= $name ?>" required class="form-control" name="cedula">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="txtCustomerName">Descripción</label>
                             <input type="text" id="nombre" required class="form-control" name="nombre" value="<?= $description; ?>">
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="form-group">
                             <label for="txtCustomerName">Precio</label>
                             <input type="text" id="nombre" required class="form-control" name="apellidos" value="<?= $price; ?>">
                         </div>
                     </div>
                 </div>

                 <input class="mb-15 btn btn-raised btn-primary" type="submit" onclick="alertaModificarServicio()" name="submit_guardar" value="MODIFICAR" />
             </form>

         </div>
     </div>

     <script>
         window.onload = function(){
             
             function getProduct(){
                 
             }
         }
     </script>