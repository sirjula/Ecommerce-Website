<html>
<head>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<body>
    ...
    <!-- Place this where you need payment button -->
    <button id="payment-button">Pay with Khalti</button>
    <!-- Place this where you need payment button -->
    <!-- Paste this code anywhere in you body tag -->
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "key live_secret_key_68791341fdd94846a146f0457ff7b455",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
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
    <!-- Paste this code anywhere in you body tag -->
    ...
</body>
</html>