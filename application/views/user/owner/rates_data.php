<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Processing Time</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .result {
            font-size: 2em;
            font-weight: bold;
            margin-top: 20px;
            color: #4caf50;
        }

        .btn-refresh {
            padding: 10px 20px;
            font-size: 1em;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-refresh:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Average Processing Time (Seconds)</h1>
        <div id="result" class="result">Loading...</div>
        <button class="btn-refresh" onclick="fetchData()">Refresh</button>
        <div id="error" class="error"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const fetchData = async () => {
            const resultDiv = document.getElementById('result');
            const errorDiv = document.getElementById('error');

            // Clear previous error message
            errorDiv.innerText = '';
            resultDiv.innerText = 'Loading...';

            try {
                // Make a request to the backend
                const response = await axios.get('<?=base_url();?>CPanel_Admin/getDataRates/10');

                // Extract average_time_seconds from the response
                if (response.data && response.data.status && response.data.data.length > 0) {
                    const avgTime = parseFloat(response.data.data[0].average_time_seconds);
                    resultDiv.innerText = `${avgTime.toFixed(2)} seconds`;
                } else {
                    throw new Error('Invalid response from server.');
                }
            } catch (error) {
                console.error(error);
                errorDiv.innerText = 'Failed to fetch data. Please try again.';
                resultDiv.innerText = 'N/A';
            }
        };

        // Fetch data on page load
        fetchData();

        $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
    </script>
</body>
</html>
