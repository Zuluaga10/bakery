<style>
    div.gallery {
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 180px;
    }

    div.gallery:hover {
        border: 1px solid #777;
    }

    div.gallery img {
        width: 100%;
        height: auto;
    }

    div.desc {
        padding: 15px;
        text-align: center;
    }
</style>

<!-- <div class="gallery">
    <a target="_blank" href="<?php echo URL; ?>build/images/pan.jpg">
        <img src="<?php echo URL; ?>build/images/pan.jpg" alt="Forest" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
    <a target="_blank" href="<?php echo URL; ?>build/images/pan.jpg">
        <img src="<?php echo URL; ?>build/images/pan.jpg" alt="Northern Lights" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
</div>

<div class="gallery">
    <a target="_blank" href="<?php echo URL; ?>build/images/pan.jpg">
        <img src="<?php echo URL; ?>build/images/pan.jpg" alt="Mountains" width="600" height="400">
    </a>
    <div class="desc">Add a description of the image here</div>
</div> -->

<div class="row">
    <!-- Elementos generados a partir del JSON -->
    <main id="items" class="col-sm-8 row"></main>
    <!-- Carrito -->
    <aside class="col-sm-4">
        <h2>Carrito</h2>
        <!-- Elementos del carrito -->
        <ul id="carrito" class="list-group"></ul>
        <hr>
        <!-- Precio total -->
        <p class="text-right">Total: <span id="total"></span>&euro;</p>

        <button id="confirm" class="btn btn-success" hidden>Confirmar pedido</button>
    </aside>
</div>

</div>
</div>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    window.onload = function() {
        // Variables
        var products;

        axios.get('http://localhost:8000/api/products')
            .then(function(response) {
                products = response.data;
                renderItems();
            })
            .catch(function(error) {
                // handle error
                console.log(error);
            })
            .then(function() {
                // always executed
            });

        let $items = document.querySelector('#items');
        let carrito = [];
        let total = 0;
        let $carrito = document.querySelector('#carrito');
        let $total = document.querySelector('#total');
        let $confirm = document.querySelector('#confirm');
        let cantidadItems = [];
        // Funciones
        function renderItems() {
            for (let info of products) {
                // Estructura
                let miNodo = document.createElement('div');
                miNodo.classList.add('card', 'col-sm-4');
                // Body
                let miNodoCardBody = document.createElement('div');
                miNodoCardBody.classList.add('card-body');
                // Titulo
                let miNodoTitle = document.createElement('h5');
                miNodoTitle.classList.add('card-title');
                miNodoTitle.textContent = info['productName'];
                // Imagen
                let miNodoImagen = document.createElement('img');
                miNodoImagen.classList.add('img-fluid');
                // miNodoImagen.setAttribute('width', 250);
                // miNodoImagen.setAttribute('heigth', 250);
                miNodoImagen.setAttribute('src', 'https://cdn2.cocinadelirante.com/sites/default/files/styles/gallerie/public/images/2020/03/10-tips-para-poner-un-negocio-de-panaderia-en-casa.jpg');
                // Precio
                let miNodoPrecio = document.createElement('p');
                miNodoPrecio.classList.add('card-text');
                miNodoPrecio.textContent = info['productUnitPrice'] + ' COP';
                // Boton 
                let miNodoBoton = document.createElement('button');
                miNodoBoton.classList.add('btn', 'btn-primary');
                miNodoBoton.textContent = 'Añadir';
                miNodoBoton.setAttribute('marcador', info['productId']);
                miNodoBoton.addEventListener('click', anyadirCarrito);
                // Insertamos
                miNodoCardBody.appendChild(miNodoImagen);
                miNodoCardBody.appendChild(miNodoTitle);
                miNodoCardBody.appendChild(miNodoPrecio);
                miNodoCardBody.appendChild(miNodoBoton);
                miNodo.appendChild(miNodoCardBody);
                $items.appendChild(miNodo);

                $confirm.addEventListener('click', confirmarPedido);
            }
        }

        function anyadirCarrito() {
            // Anyadimos el Nodo a nuestro carrito
            carrito.push(this.getAttribute('marcador'))
            // Calculo el total
            calcularTotal();
            // Renderizamos el carrito 
            renderizarCarrito();
            $confirm.removeAttribute("hidden");
        }

        function renderizarCarrito() {
            // Vaciamos todo el html
            $carrito.textContent = '';
            cantidadItems = [];
            // Quitamos los duplicados
            let carritoSinDuplicados = [...new Set(carrito)];
            // Generamos los Nodos a partir de carrito
            carritoSinDuplicados.forEach(function(item, indice) {
                // Obtenemos el item que necesitamos de la variable base de datos
                let miItem = products.filter(function(itemBaseDatos) {
                    return itemBaseDatos['productId'] == item;
                });
                // Cuenta el número de veces que se repite el producto
                let numeroUnidadesItem = carrito.reduce(function(total, itemId) {
                    return itemId === item ? total += 1 : total;
                }, 0);

                var values = [
                    miItem[0].productId,
                    numeroUnidadesItem,
                    (parseInt(miItem[0]['productUnitPrice']) * numeroUnidadesItem)
                ];
                cantidadItems.push(values);

                // Creamos el nodo del item del carrito
                let miNodo = document.createElement('li');
                miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
                miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0]['productName']} - ${miItem[0]['productUnitPrice']} COP`;
                // Boton de borrar
                let miBoton = document.createElement('button');
                miBoton.classList.add('btn', 'btn-danger', 'mx-5');
                miBoton.textContent = 'X';
                miBoton.style.marginLeft = '1rem';
                miBoton.setAttribute('item', item);
                miBoton.addEventListener('click', borrarItemCarrito);
                // Mezclamos nodos
                miNodo.appendChild(miBoton);
                $carrito.appendChild(miNodo);
            })
        }

        function borrarItemCarrito() {
            console.log()
            // Obtenemos el producto ID que hay en el boton pulsado
            let id = this.getAttribute('item');
            // Borramos todos los productos
            carrito = carrito.filter(function(carritoId) {
                return carritoId !== id;
            });
            // volvemos a renderizar
            renderizarCarrito();
            // Calculamos de nuevo el precio
            calcularTotal();
        }

        function calcularTotal() {
            // Limpiamos precio anterior
            total = 0;
            // Recorremos el array del carrito
            for (let item of carrito) {
                // De cada elemento obtenemos su precio
                let miItem = products.filter(function(itemBaseDatos) {
                    return itemBaseDatos['productId'] == item;
                });
                total = total + miItem[0]['productUnitPrice'];
            }
            // Formateamos el total para que solo tenga dos decimales
            let totalDosDecimales = total.toFixed(2);
            // Renderizamos el precio en el HTML
            $total.textContent = totalDosDecimales;
        }

        function confirmarPedido() {
            axios.post('http://localhost:8000/api/orderCreationByUser', {
                    customerDocument: 32156324,
                    finalAmount: total
                })
                .then(function(response) {
                    orderIdIn = response.data[0].id
                    //console.log(orderIdIn);

                    cantidadItems.forEach(orderProduct => {

                        axios.post('http://localhost:8000/api/storeProductsByOrder', {
                                productId: orderProduct[0],
                                orderId: orderIdIn,
                                quantity: orderProduct[1],
                                subtotal: orderProduct[2]

                            })
                            .then(function(response) {
                                //console.log('agregado')
                            })
                            .catch(function(error) {
                                console.log(error);
                            });
                    });

                    $carrito.textContent = '';
                    cantidadItems = [];
                    carrito = [];
                    $confirm.style.visibility = 'hidden';
                    calcularTotal();
                    alert('Pedido realizado. A la espera de confirmación. Su número de pedido es ' + orderIdIn);

                })
                .catch(function(error) {
                    console.log(error);
                });




        }
        // Eventos

        // Inicio
        //renderItems();
    }
</script>