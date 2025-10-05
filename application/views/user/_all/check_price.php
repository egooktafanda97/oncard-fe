<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Gojo Pricing Calculator</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 1000px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            margin: 20px 0;
        }
        
        header {
            background: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .calculator {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 25px;
        }
        
        @media (max-width: 768px) {
            .calculator {
                grid-template-columns: 1fr;
            }
        }
        
        .input-section, .result-section {
            padding: 20px;
            border-radius: 10px;
            background: #f8f9fa;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        
        h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 8px;
        }
        
        h3 {
            font-size: 1.2rem;
            margin: 15px 0 10px;
            color: #2c3e50;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #34495e;
        }
        
        input, select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        input:focus, select:focus {
            border-color: #3498db;
            outline: none;
        }
        
        button {
            width: 100%;
            padding: 14px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }
        
        button:hover {
            background: #2980b9;
        }
        
        .result-box {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        
        .price {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2c3e50;
            margin: 15px 0;
        }
        
        .best-price {
            color: #27ae60;
        }
        
        .pricing-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        .pricing-table th, .pricing-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        
        .pricing-table th {
            background-color: #3498db;
            color: white;
        }
        
        .pricing-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        .explanation {
            margin-top: 20px;
            padding: 15px;
            background: #e8f4fc;
            border-radius: 8px;
            font-size: 14px;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: white;
            font-size: 0.9rem;
        }
        
        .comparison {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        
        .provider {
            text-align: center;
            padding: 15px;
            border-radius: 8px;
            flex: 1;
            margin: 0 10px;
        }
        
        .gojek { background: #00aa13; color: white; }
        .grab { background: #00b14f; color: white; }
        .gojo { background: #3498db; color: white; }
        
        .highlight {
            background: #f39c12 !important;
            transform: scale(1.05);
            transition: transform 0.3s;
        }
        
        .tier-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 10px;
        }
        
        .tier-inputs input {
            text-align: center;
        }
        
        .auto-update {
            display: flex;
            align-items: center;
            margin: 10px 0;
        }
        
        .auto-update input {
            width: auto;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Dynamic Gojo Pricing Calculator</h1>
            <p class="subtitle">Adjust tiered pricing and see results in real-time</p>
        </header>
        
        <div class="calculator">
            <div class="input-section">
                <h2>Input Details</h2>
                
                <div class="form-group">
                    <label for="distance">Distance (km)</label>
                    <input type="number" id="distance" placeholder="Enter distance in kilometers" min="0" step="0.1" value="15">
                </div>
                
                <div class="form-group">
                    <label for="gojek">GOJEK Price (IDR)</label>
                    <input type="number" id="gojek" placeholder="Enter GOJEK price" value="35000">
                </div>
                
                <div class="form-group">
                    <label for="grab">GRAB Price (IDR)</label>
                    <input type="number" id="grab" placeholder="Enter GRAB price" value="32000">
                </div>
                
                <div class="form-group">
                    <label for="app-fee">App Fee (IDR)</label>
                    <input type="number" id="app-fee" value="5000">
                </div>
                
                <div class="form-group">
                    <label for="surcharge">Surcharge (%)</label>
                    <input type="number" id="surcharge" value="13">
                </div>
                
                <div class="form-group">
                    <label for="minimum">Minimum Price (IDR)</label>
                    <input type="number" id="minimum" value="6000">
                </div>
                
                <div class="auto-update">
                    <input type="checkbox" id="auto-update" checked>
                    <label for="auto-update">Auto-update on changes</label>
                </div>
                
                <button id="calculate-btn">Calculate Best Gojo Price</button>
            </div>
            
            <div class="result-section">
                <h2>Results</h2>
                <div class="result-box">
                    <p>Recommended Gojo Price</p>
                    <div id="gojo-price" class="price">-</div>
                    <p>Based on your pricing structure and competitor rates</p>
                </div>
                
                <div class="comparison">
                    <div class="provider gojek">
                        <h3>GOJEK</h3>
                        <p id="gojek-display">-</p>
                    </div>
                    <div class="provider grab">
                        <h3>GRAB</h3>
                        <p id="grab-display">-</p>
                    </div>
                    <div class="provider gojo">
                        <h3>GOJO</h3>
                        <p id="gojo-display">-</p>
                    </div>
                </div>
                
                <div class="explanation">
                    <p><strong>Calculation Formula:</strong> Base rate × Distance + App fee + Surcharge</p>
                    <p><strong>Minimum Charge:</strong> <span id="min-display">6000</span> IDR</p>
                    <p>The calculator ensures Gojo price is competitive with GOJEK and GRAB.</p>
                </div>
            </div>
        </div>
        
        <div style="padding: 20px;">
            <h2>Dynamic Tiered Pricing</h2>
            <p>Adjust the tiered pricing structure below. Changes will automatically update the calculator.</p>
            
            <div class="tier-inputs-container">
                <div class="form-group">
                    <h3>Tier 1 (0-10 km)</h3>
                    <input type="number" class="tier-rate" data-tier="1" value="1750" min="0">
                </div>
                
                <div class="form-group">
                    <h3>Tier 2 (10-20 km)</h3>
                    <input type="number" class="tier-rate" data-tier="2" value="1700" min="0">
                </div>
                
                <div class="form-group">
                    <h3>Tier 3 (20-30 km)</h3>
                    <input type="number" class="tier-rate" data-tier="3" value="1950" min="0">
                </div>
                
                <div class="form-group">
                    <h3>Tier 4 (30+ km)</h3>
                    <input type="number" class="tier-rate" data-tier="4" value="1800" min="0">
                </div>
            </div>
            
            <table class="pricing-table">
                <thead>
                    <tr>
                        <th>Min Distance (km)</th>
                        <th>Max Distance (km)</th>
                        <th>Rate per km (IDR)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0</td>
                        <td>10</td>
                        <td id="tier1-display">1,750</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>20</td>
                        <td id="tier2-display">1,700</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>30</td>
                        <td id="tier3-display">1,950</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>1000</td>
                        <td id="tier4-display">1,800</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <footer>
        <p>© <?=date('Y');?> Gojo Pricing Calculator</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calculateBtn = document.getElementById('calculate-btn');
            const gojoPriceElement = document.getElementById('gojo-price');
            const gojekDisplay = document.getElementById('gojek-display');
            const grabDisplay = document.getElementById('grab-display');
            const gojoDisplay = document.getElementById('gojo-display');
            const autoUpdateCheckbox = document.getElementById('auto-update');
            const minDisplay = document.getElementById('min-display');
            
            // Tier rate inputs
            const tierInputs = document.querySelectorAll('.tier-rate');
            const tierDisplays = {
                1: document.getElementById('tier1-display'),
                2: document.getElementById('tier2-display'),
                3: document.getElementById('tier3-display'),
                4: document.getElementById('tier4-display')
            };
            
            // Add event listeners to all inputs for auto-update
            const allInputs = document.querySelectorAll('input');
            allInputs.forEach(input => {
                input.addEventListener('input', function() {
                    if (autoUpdateCheckbox.checked) {
                        calculatePrice();
                    }
                    
                    // Update tier displays
                    if (this.classList.contains('tier-rate')) {
                        const tier = this.getAttribute('data-tier');
                        tierDisplays[tier].textContent = Number(this.value).toLocaleString('id-ID');
                    }
                    
                    // Update minimum display
                    if (this.id === 'minimum') {
                        minDisplay.textContent = Number(this.value).toLocaleString('id-ID');
                    }
                });
            });
            
            calculateBtn.addEventListener('click', calculatePrice);
            
            // Calculate on page load
            calculatePrice();
            
            function calculatePrice() {
                const distance = parseFloat(document.getElementById('distance').value);
                const gojekPrice = parseFloat(document.getElementById('gojek').value);
                const grabPrice = parseFloat(document.getElementById('grab').value);
                const appFee = parseFloat(document.getElementById('app-fee').value);
                const surcharge = parseFloat(document.getElementById('surcharge').value);
                const minimum = parseFloat(document.getElementById('minimum').value);
                
                if (!distance || distance <= 0) {
                    alert('Please enter a valid distance');
                    return;
                }
                
                // Get tier rates
                const tierRates = {
                    1: parseFloat(document.querySelector('.tier-rate[data-tier="1"]').value),
                    2: parseFloat(document.querySelector('.tier-rate[data-tier="2"]').value),
                    3: parseFloat(document.querySelector('.tier-rate[data-tier="3"]').value),
                    4: parseFloat(document.querySelector('.tier-rate[data-tier="4"]').value)
                };
                
                // Calculate base rate based on distance
                let baseRate;
                if (distance <= 10) {
                    baseRate = tierRates[1];
                } else if (distance <= 20) {
                    baseRate = tierRates[2];
                } else if (distance <= 30) {
                    baseRate = tierRates[3];
                } else {
                    baseRate = tierRates[4];
                }
                
                // Calculate Gojo price
                let calculatedPrice = (baseRate * distance) + appFee; // Add app fee
                calculatedPrice *= (1 + surcharge/100); // Add surcharge
                
                // Ensure minimum price
                calculatedPrice = Math.max(calculatedPrice, minimum);
                
                // Make competitive with other providers
                let competitivePrice = calculatedPrice;
                if (!isNaN(gojekPrice)) {
                    competitivePrice = Math.min(competitivePrice, gojekPrice);
                }
                if (!isNaN(grabPrice)) {
                    competitivePrice = Math.min(competitivePrice, grabPrice);
                }
                
                // Display results
                gojoPriceElement.textContent = Math.round(competitivePrice).toLocaleString('id-ID') + ' IDR';
                gojekDisplay.textContent = isNaN(gojekPrice) ? '-' : Math.round(gojekPrice).toLocaleString('id-ID') + ' IDR';
                grabDisplay.textContent = isNaN(grabPrice) ? '-' : Math.round(grabPrice).toLocaleString('id-ID') + ' IDR';
                gojoDisplay.textContent = Math.round(competitivePrice).toLocaleString('id-ID') + ' IDR';
                
                // Highlight the best price
                const providers = document.querySelectorAll('.provider');
                providers.forEach(provider => provider.classList.remove('highlight'));
                
                if (!isNaN(gojekPrice) && !isNaN(grabPrice)) {
                    const prices = [
                        {provider: 'gojek', price: gojekPrice},
                        {provider: 'grab', price: grabPrice},
                        {provider: 'gojo', price: competitivePrice}
                    ];
                    
                    // Find the lowest price
                    const bestPrice = Math.min(gojekPrice, grabPrice, competitivePrice);
                    
                    // Highlight the best price
                    if (bestPrice === gojekPrice) {
                        document.querySelector('.gojek').classList.add('highlight');
                    } else if (bestPrice === grabPrice) {
                        document.querySelector('.grab').classList.add('highlight');
                    } else {
                        document.querySelector('.gojo').classList.add('highlight');
                    }
                }
            }
        });
    </script>
</body>
</html>