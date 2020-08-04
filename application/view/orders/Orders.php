<!--         <div class="widget">
            <div class="widget-heading">
              <h3 class="widget-title">Orders</h3>
            </div>
            <div class="widget-body">
              <form method="post" action="<?php echo URL;?>Ingresos/RegistrarIngreso">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Valor</label>
                      <input type="number" required class="form-control" min="1" max="999999999" id="codigoServicio" name="cantidad">
                    </div>
                  </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtCustomerName">Fecha</label>
                      <input type="date" value="2019-07-22" required class="form-control" id="nombreServicio" name="fecha">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="ddlStatus">Tipo de ingreso</label>
                      <select name="tipoingreso" class="form-control">
                        <option value=""></option>
                      <?php foreach ($TipoIngreso as $value):?>
                        
                      <option value="<?= $value['IdTipoIngreso'] ?>"><?= $value['Nombre'] ?></option>
                       
                    <?php endforeach ?>
                      </select>
                    </div>
                  </div>
                </div>
                <input class="mb-15 btn btn-raised btn-primary" type="submit" onclick="alertaRegistroServicio()" name="submit_guardar" value="Pay" />
              </form>
       
                
            </div>
          </div> -->

          <h3>Not orders</h3>

          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
      <?php

if (isset($_POST['pay']))
{
    $url = 'https://api.mercadopago.com/v1/payments?access_token=TEST-8497676622443940-080121-fa83332099f0f3cf78041aead13b99d4-416979880';

    

    $token = $_POST['token'];

	$installments = $_POST['installments'];

    $transaction_amount = $_POST['transaction_amount'];
    $description = $_POST['description'];
    $payment_method_id = $_POST['payment_method_id'];
    $email = $_POST['email'];
    $payer=["email" => $email];
    

	$fields_string = 'token='.$token.'&installments='.$installments.'&transaction_amount='.$transaction_amount.'&description='.$description.'&payment_method_id='.$payment_method_id.'&payer='.$payer;

	//open connection

	$ch = curl_init();

	//set the url, number of POST vars, POST data

	curl_setopt($ch,CURLOPT_URL, $url);

	curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	//execute post

	$result = curl_exec($ch);

	print_r($result);

	//close connection

    curl_close($ch);
}



?>
<div class="widget">
    <div class="widget-heading">
        <h3 class="widget-title">Pay</h3>
    </div>
    <div class="widget-body">

        <fieldset>
            <div class="row">
                <form action="pay.php" method="post" id="pay" name="pay">
                    <div class="col-md-3">
                        <p>
                            <label for="cardNumber">Card Number</label>
                            <input type="text" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="transaction_amount">Monto a pagar</label>
                            <input name="transaction_amount" id="transaction_amount" value="100" />
                        </p>
                    </div>

                    <div class="col-md-3">
                        <p>
                            <label for="cardExpirationMonth">Expiration month</label>
                            <input type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="cardholderName">Nombre y apellido</label>
                            <input type="text" id="cardholderName" data-checkout="cardholderName" />
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="cardExpirationYear">Año de vencimiento</label>
                            <input type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="securityCode">Código de seguridad</label>
                            <input type="text" id="securityCode" data-checkout="securityCode" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="installments">Cuotas</label>
                            <select id="installments" class="form-control" name="installments"></select>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="docType">Tipo de documento</label>
                            <select id="docType" data-checkout="docType" class="form-control">
                                            <option value="Cedula">Select</option>
                                            <option value="Cedula">Card Id</option>
                                            <option value="Cedula">Stranger</option>
                                        </select>
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p>
                            <label for="docNumber">Número de documento</label>
                            <input type="text" id="docNumber" data-checkout="docNumber" />
                        </p>

                    </div>

                    <div class="col-md-4">
                        <p>
                            <label for="email">Email</label>
                            <br>
                            <input type="email" id="email" name="email" value="test@test.com" />
                        </p>
                    </div>
                    <div class="col-md-12">
                        <input type="hidden" name="payment_method_id" id="payment_method_id" />
                        <input type="submit" name="pagar" value="Pagar" />
                    </div>


        </fieldset>
        </form>

        </div>



    </div>
</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

<script>
    window.Mercadopago.setPublishableKey("TEST-81baefb1-6e9a-4e6b-af65-5df27e5448ac");
    window.Mercadopago.getIdentificationTypes();

    //método de pago de la tarjeta
    document.getElementById('cardNumber').addEventListener('keyup', guessPaymentMethod);
    document.getElementById('cardNumber').addEventListener('change', guessPaymentMethod);

    function guessPaymentMethod(event) {
        let cardnumber = document.getElementById("cardNumber").value;

        if (cardnumber.length >= 6) {
            let bin = cardnumber.substring(0, 6);
            window.Mercadopago.getPaymentMethod({
                "bin": bin
            }, setPaymentMethod);
        }
    };

    //cantidad de cuotas
    function setPaymentMethod(status, response) {
        // console.log(status);
        // console.log(response);
        if (status == 200) {
            let paymentMethodId = response[0].id;
            let element = document.getElementById('payment_method_id');
            element.value = paymentMethodId;
            getInstallments();
        } else {
            alert(`payment method info error: ${response}`);
        }
    }



    function getInstallments() {
        window.Mercadopago.getInstallments({

            "payment_method_id": document.getElementById('payment_method_id').value,
            "amount": parseFloat(document.getElementById('transaction_amount').value)

        }, function(status, response) {
            // console.log(status);
            // console.log(response);
            if (status == 200) {
                document.getElementById('installments').options.length = 0;
                response[0].payer_costs.forEach(installment => {
                    let opt = document.createElement('option');
                    opt.text = installment.recommended_message;
                    opt.value = installment.installments;
                    document.getElementById('installments').appendChild(opt);
                });
            } else {
                alert(`installments method info error: ${response}`);
            }
        });
    }



    // Crea el token de la tarjeta
    doSubmit = false;
    document.querySelector('#pay').addEventListener('submit', doPay);

    function doPay(event) {
        event.preventDefault();
        if (!doSubmit) {
            var $form = document.querySelector('#pay');

            window.Mercadopago.createToken($form, sdkResponseHandler);

            return false;
        }
    };

    function sdkResponseHandler(status, response) 
    {
        // console.log(status);
        // console.log(response);
        if (status != 200 && status != 201) {
            alert("verify filled data");
        } else {
            var form = document.querySelector('#pay');
            var card = document.createElement('input');
            card.setAttribute('name', 'token');
            card.setAttribute('type', 'hidden');
            card.setAttribute('value', response.id);
            form.appendChild(card);
            doSubmit = false;
            // form.submit();
            
            // axios({
            // method: 'post',
            // url: 'https://api.mercadopago.com/v1/payments?access_token=TEST-8497676622443940-080121-fa83332099f0f3cf78041aead13b99d4-416979880',
            // data: 
            // {
            // transaction_amount: document.getElementById("transaction_amount").value,
            // token: response.id,
            // description: "Incredible Copper Clock",
            // installments: document.getElementById("installments").value,
            // payment_method_id: document.getElementById("payment_method_id").value,
            // payer:
            // {
            //     email: document.getElementById("email").value,
            // }
            // }
            // });
            
            var nameValue = document.getElementById("transaction_amount").value;
            console.log(document.getElementById("transaction_amount").value);
            console.log(response.id);
            console.log(document.getElementById("installments").value);
            console.log(document.getElementById("payment_method_id").value);
            

        }
    };
    

    
</script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>