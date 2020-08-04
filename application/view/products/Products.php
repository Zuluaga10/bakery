        <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Products</h3>
            </div>
            <div class="widget-body">
              
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Name</label>
                      <input type="text" required class="form-control" id="productName" name="name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Description</label>
                      <input type="text" required class="form-control" id="productDescription" name="description">
                    </div>
                  </div>
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Price</label>
                      <input type="number" required class="form-control" id="productUnitPrice" name="price">
                    </div>
                    
                    

                    <div class="row">

                    <div class="col-md-6">
                    <button class="mb-15 btn btn-raised btn-primary"  id="but" onclick="createForm()" >
                    Add
                    </button></div>
                    </div>
                    
                    <!-- <div class="col-md-6">
                    <form method="post" action="<?php echo URL;?>Products/edit">
                    <input class="mb-15 btn btn-raised btn-primary" type="submit" name="submit_guardar" value="Edit" />
                    </form>
                    </div> -->

                    </div>
 
       
                
            </div>
          </div>

          <script>
          document.getElementById("but").addEventListener("click", function(event)
          {
            event.preventDefault()
          }); 

          function createForm(e)
          {
            var productName = document.getElementById("productName").value ;
            var productDescription = document.getElementById("productDescription").value ;
            var productPrice = document.getElementById("productUnitPrice").value ;
            axios.post('http://localhost:8000/api/products',
            {
              productName: productName,
              productDescription: productDescription,
              productPrice: productPrice,
            })
            .then(function (response) 
            {
              console.log(response);
            })
            .catch(function (error) 
            {
              console.log(error);
            });
          }
          
          
          </script>