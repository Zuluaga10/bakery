     <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Editar cliente</h3>
            </div>
            <div class="widget-body">
              <form method="post" action="<?php echo URL;?>Clientes/EditarCliente">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Cédula</label>
                      <input type="number" readonly value="<?=$codi ?>" required class="form-control" name="cedula">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Nombre</label>
                      <input type="text" id="nombre" required class="form-control" name="nombre" value="<?= $datos['Nombre']; ?>">
                    </div>
                  </div>
                                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Apellidos</label>
                      <input type="text" id="nombre" required class="form-control" name="apellidos" value="<?= $datos['Apellido']; ?>">
                    </div>
                  </div>
                                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Edad</label>
                      <input type="text" id="nombre" required class="form-control" name="edad" value="<?= $datos['Edad']; ?>">
                    </div>
                  </div>

                                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Dirección</label>
                      <input type="text" id="nombre" required class="form-control" name="direccion" value="<?= $datos['Direccion']; ?>">
                    </div>
                  </div>
                                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Teléfono</label>
                      <input type="number" id="nombre" required class="form-control" name="telefono" value="<?= $datos['Telefono']; ?>">
                    </div>
                  </div>
  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Fecha Inicio</label>
                      <input type="date" id="nombre" required class="form-control" name="fechainscripcion" value="<?= $datos['FechaInscripcion']; ?>">
                    </div>
                  </div>
                                                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="ddlStatus">Tipo de plan</label>
                      <select name="plan" class="form-control">
                        <option value="<?= $datos['FechaInscripcion']; ?>"></option>
                      <?php foreach ($Planes as $value):?>
                        
                      <option value="<?= $value['IdPlan'] ?>"><?= $value['Nombre'] ?></option>
                       
                    <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                
                 <input class="mb-15 btn btn-raised btn-primary" type="submit" onclick="alertaModificarServicio()" name="submit_guardar" value="MODIFICAR" />
              </form>
              
                
                
            </div>
          </div>