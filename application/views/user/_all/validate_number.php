<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oncard Phone Number Validation</title>
    <link rel="icon" href="<?=base_url();?>assets_oncard/images/logo_oncard3.webp" type="image/png" />
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="<?=base_url();?>assets/img/icon_oncard2.png" alt="" style="width:35px;">
        <h2>Phone Number to Validate</h2>
        <input type="number" id="phone" placeholder="Enter phone number">
        <button class="bm" onclick="submitPhoneNumber()">Validate</button>
    </div>

    <script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function submitPhoneNumber() {

            $('.bm').html('Processing...');
            const phoneNumber = document.getElementById('phone').value;

            if (!phoneNumber) {
                alert('Please enter a phone number.');
                return;
            }

            axios.get('<?=base_url();?>WebhookOncard/validateNumberManually/'+phoneNumber)
                .then(response => {
                    alert(response.data.message);
                    console.log(response.data);

                    $('.bm').html('Validate');
                })
                .catch(error => {
                    alert('There was an error submitting the phone number.');
                    console.error(error);
                    $('.bm').html('Validate');
                });
        }
    </script>
</body>
</html>
