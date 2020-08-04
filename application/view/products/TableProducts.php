<div class="widget">
  <div class="widget-heading">
              <h3 class="widget-title">Lista de productos</h3>
            </div>
<div class="widget-body">
                  <table id="example-1" cellspacing="0" width="100%" class="table table-hover dt-responsive nowrap">
                    <thead>
                      <tr>
                    <th>Product name</th>
                    <th>Description</th>
                    <th>Price</th>
                    
                  </tr>
                    </thead>
                    
                    <tbody>
                     <?php foreach ($datos as $value): ?>
                  <tr>
                    <td><?=$value["tipoDocumento"]?></td>
                    <td><?=$value["documento"]?></td>
                    <td><?=$value["nombre"]?></td>
                   
                    <td>
                      <a href="<?php echo URL; ?>Cliente/edit/<?=$value["documento"] ?>" type="button" class="btn btn-info" >Editar</a>

                      
                    </td>
                  </tr>

                <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
