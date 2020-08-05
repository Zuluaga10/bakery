<div class="">
    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">Pedidos pendientes por confirmar</h3>
        </div>
        <div class="widget-body">
            <table id="myTable" cellspacing="0" width="100%" class="table table-hover dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Número de pedido</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Productos</th>
                        <th>Valor Total</th>
                        <th>Aceptar / Rechazar</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="widget">
        <div class="widget-heading">
            <h3 class="widget-title">Pedidos pagados</h3>
        </div>
        <div class="widget-body">
            <table id="tablePay" cellspacing="0" width="100%" class="table table-hover dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>Número de pedido</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Productos</th>
                        <th>Valor Total</th>
                        <th>Listo para despachar</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<script>
    function listPendingOrders() {

        axios.get('http://localhost:8000/api/getAllPendingOrders', {})
            .then(function(response) {
                var Response = response.data;
                console.log(response.data)
                Response.forEach(r => {
                    products = "";
                    axios.get("http://localhost:8000/api/orderProducts/" + r.orderId, {

                        })
                        .then(function(responseOP) {
                            //console.log(responseOP.data);
                            var orderproduct = responseOP.data;
                            //console.log(orderproduct)
                            orderproduct.forEach(element => {
                                products += ("x" + element.orderProductQuantity + " " + element.productName + ", ")

                            });

                            var tableRef = document.getElementById('myTable').getElementsByTagName('tbody')[0];

                            // Insert a row in the table at row index 0
                            var newRow = tableRef.insertRow(tableRef.rows.length);

                            // Insert a cell in the row at index 0
                            var newCell0 = newRow.insertCell(0);
                            var newCell1 = newRow.insertCell(1);
                            var newCell2 = newRow.insertCell(2);
                            var newCell3 = newRow.insertCell(3);
                            var newCell4 = newRow.insertCell(4);
                            var newCell5 = newRow.insertCell(5);
                            newCell0.innerHTML = r.orderId;
                            newCell1.innerHTML = r.orderDate;
                            newCell2.innerHTML = r.customerName;
                            newCell3.innerHTML = products;
                            newCell4.innerHTML = r.orderFinalAmount;
                            newCell5.innerHTML = "<a type='button' class='btn btn-info' onclick='acceptOrder(" + r.orderId + ")'>Aceptar</a>" + "<a type='button' class='btn btn-warning' onclick='rejectOrder(" + r.orderId + ")'>Rechazar</a>";

                            products = "";

                        })
                        .catch(function(error) {
                            console.log(error);
                        })
                        .then(function() {
                            // always executed
                        });

                });
                listPayedOrders();

            })
            .catch(function(error) {
                console.log(error);
            });
    }



    function listPayedOrders() {

        axios.get('http://localhost:8000/api/getAllPayedOrders', {

            })
            .then(function(response) {
                var Response = response.data;
                console.log(response.data)
                Response.forEach(r => {
                    products = "";
                    axios.get("http://localhost:8000/api/orderProducts/" + r.orderId, {

                        })
                        .then(function(responseOP) {
                            //console.log(responseOP.data);
                            var orderproduct = responseOP.data;
                            //console.log(orderproduct)
                            if (!orderproduct) {
                                var newRow = tableRef.insertRow(tableRef.rows.length);

                                // Insert a cell in the row at index 0
                                var newCell1 = newRow.insertCell(0);
                                newCell1.innerHTML = "<p>No hay pedidos pagados</p>";
                            } else {
                                orderproduct.forEach(element => {
                                    products += ("x" + element.orderProductQuantity + " " + element.productName + ", ")

                                });

                                var tableRef = document.getElementById('tablePay').getElementsByTagName('tbody')[0];

                                // Insert a row in the table at row index 0
                                var newRow = tableRef.insertRow(tableRef.rows.length);

                                // Insert a cell in the row at index 0
                                var newCell0 = newRow.insertCell(0);
                                var newCell1 = newRow.insertCell(1);
                                var newCell2 = newRow.insertCell(2);
                                var newCell3 = newRow.insertCell(3);
                                var newCell4 = newRow.insertCell(4);
                                var newCell5 = newRow.insertCell(5);
                                newCell0.innerHTML = r.orderId;
                                newCell1.innerHTML = r.orderDate;
                                newCell2.innerHTML = r.customerName;
                                newCell3.innerHTML = products;
                                newCell4.innerHTML = r.orderFinalAmount;
                                newCell5.innerHTML = "<a type='button' class='btn btn-info' onclick='sendOrder(" + r.orderId + ")'>Enviar Pedido</a>";

                                products = "";
                            }

                        })
                        .catch(function(error) {
                            //console.log(error);
                            var newRow = tableRef.insertRow(tableRef.rows.length);

                            // Insert a cell in the row at index 0
                            var newCell1 = newRow.insertCell(0);
                            newCell1.innerHTML = "<p>No hay pedidos por pagar</p>";

                        })
                        .then(function() {
                            // always executed
                        });

                });


            })
            .catch(function(error) {
                //console.log(error);
                var newRow = tableRef.insertRow(tableRef.rows.length);

                // Insert a cell in the row at index 0
                var newCell1 = newRow.insertCell(0);
                newCell1.innerHTML = "<p>No hay pedidos por pagar</p>";
            });
    }

    function acceptOrder(idOrden) {
        axios.post('http://localhost:8000/api/acceptOrder', {
                orderId: idOrden
            })
            .then(function(response) {
                location.reload();
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function rejectOrder(idOrden) {
        axios.post('http://localhost:8000/api/rejectOrder', {
                orderId: idOrden,
                sellerDocument: null
            })
            .then(function(response) {
                location.reload();
            })
            .catch(function(error) {
                console.log(error);
            });
    }


    window.onload = listPendingOrders;
    //window.onload = listPendingForPayment;
</script>





<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>


</div>