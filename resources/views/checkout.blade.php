@extends('layouts.master')
@section('content')
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <div class="px-32">
        <div class="grid gap-10">
                <div class="bg-gray-100 p-4 my-10 rounded-lg shadow w-96">
                        <div class="grid items-center ">
                            <p>Product: {{$cart->product_id}}</p>
                            <p>Qty: {{$cart->quantity}}</p>
                            <p>Price: {{$cart->price}}</p>
                            <button id="payment-button" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow ">Pay Now</button>
                        </div>
                </div>
        </div>
    </div>

    <script>
        var config = {
           // replace the publicKey with yours
           "publicKey": "test_public_key_b3e69affbc914832bea5e448c00f2ed8",
           "productIdentity": "1234567890",
           "test" : "hello",
           "productName": "Watch",
           "productUrl": "http://gameofthrones.wikia.com/wiki/",
           "paymentPreference": [
              "KHALTI",
              ],
           "eventHandler": {
              onSuccess (payload) {
                 console.log(payload);
                 if(payload.idx)
                 {
                    $.ajaxSetup({
                       headers: {
                          'X-CSRF-TOKEN' : '{{csrf_token()}}',
                       }
                    });

                    $.ajax({
                       method: 'POST',
                       url: "{{route('khalti.verify')}}",
                       data: payload,

                       success: function(response)
                       {
                          console.log('successfully paid');
                          $.ajax({
                             method: 'POST',
                             url: "{{route('order.store')}}",
                             data: {
                                cart_id: {{$cart->id}},
                                _token: '{{csrf_token()}}'
                            },
                             success: function(response)
                             {
                                location.href = "/";
                             },
                             error: function(data)
                             {
                                console.log(data.message);
                             }
                          });
                       },
                       error: function(data)
                       {
                          console.log(data.message);
                       }
                    });
                 }

              },
              onError (error) {
                 console.log(error);
              },
              onClose () {
                 console.log('widget is closing');
              }
           }
     };

     var checkout = new KhaltiCheckout(config);
     var btn = document.getElementById("payment-button");
     btn.onclick = function () {
           // minimum transaction amount must be 10, i.e 1000 in paisa.
           checkout.show({amount: 1000});
     }
  </script>
@endsection