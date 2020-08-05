<div class="widget">
  <div class="widget-heading">
    <h3 class="widget-title">Product List</h3>
  </div>
  <div class="widget-body">
    <table id="myTable" cellspacing="0" width="100%" class="table table-hover dt-responsive nowrap">
      <thead>
        <tr>
          <th>PRODUCT NAME</th>
          <th>DESCRIPTION</th>
          <th>PRICE</th>
          <th>OPCIONES</th>
        </tr>
      </thead>

      <tbody>

        <tr>

        </tr>
      </tbody>
    </table>
  </div>
</div>
<script>
  function listProducts() {

    axios.get('http://localhost:8000/api/products', {

      })
      .then(function(response) {
        var Response = response.data;

        Response.forEach(r => {

          var tableRef = document.getElementById('myTable').getElementsByTagName('tbody')[0];

          // Insert a row in the table at row index 0
          var newRow = tableRef.insertRow(tableRef.rows.length);

          // Insert a cell in the row at index 0
          var newCell1 = newRow.insertCell(0);
          var newCell2 = newRow.insertCell(1);
          var newCell3 = newRow.insertCell(2);
          var newCell4 = newRow.insertCell(3);
          newCell1.innerHTML = r.productName;
          newCell2.innerHTML = r.productDescription;
          newCell3.innerHTML = r.productUnitPrice;
          newCell4.innerHTML = "<a href='<?php echo URL; ?>Products/edit/" + r.productId + "' type='button' class='btn btn-info' >Editar</a>";

        });

      })
      .catch(function(error) {
        console.log(error);
      });
  }

  // function editProducts(id)
  // {

  // }
  window.onload = listProducts;
</script>