<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<style>
    select {
        padding:15px!important;
        border-radius:16px!important;
        display:flex!important;
        flex-direction:column!important;
        
    }
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Kartu</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Kartu</li>
							</ol>
						</nav>
                        
					</div>
                    
				</div>
				<!--end breadcrumb-->
			  
                <div class="row py-3">
                    <div class="col-12 mb-4">
                        <label for="filterDate">Filter by Tanggal</label>
                        <input type="date" id="filterDate" class="form-control" onchange="showDataEachMinute()" />
                    </div>
                    <div class="col-lg-9 col-md-12 col-12" style="display:flex;gap:10px;">
                        <select id="filterInstansi" class="form-control">
                            <option value="">Loading...</option>
                        </select>

                        <select id="filterDepartment" class="form-control">
                            <option value="">Loading...</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-12 text-end">
                    <button class="btn btn-primary " onclick="reloadData()"><i class="bx bx-refresh"></i> Refresh Data</button>
                    </div>
                </div>

                <div class="row" id="summaryCard2">
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card p-3" style="border-radius:20px;">
                        <div class="card-header">Tingkat transaksi dalam tiap menit</div>
                            <div class="card-body">
                                <div id="chart2" style=""></div>
                            </div>
                            <div class="card-footer text-sm">
                                <small> Update pada <?=date("Y/m/d");?> </small>
                            </div>
                        </div>
                        
                    </div>
                
                    <div class="col-12">
                        <div class="card p-3">
                            <div class="card-body processSummary">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card " style="border-radius:20px;">
                                    <div class="card-body">
                                        <h1 class="title text-dark" style="font-size:14px;">Grup TRX Speed</h1>
                                        <div id="summaryCard"></div> <!-- This is where the summary table will appear -->
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-6 col-12">
                                <div class="card" style="border-radius:20px;">
                                    <div class="card-body">
                                        <h1 class="title text-dark" style="font-size:14px;">Grafik TRX Speed</h1>
                                        <div id="barChart" style=""></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
			</div>
		</div>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

		<script type="text/javascript">

            let idsett = '';
            let table;

            let last5minuteData = 0;

            document.addEventListener("DOMContentLoaded", function () {
                const dateInput = document.getElementById("filterDate");

                // Set date input to today's date in format YYYY-MM-DD
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;

                // Call data loader with today's date
                showDataEachMinute(today);

                // Optional: Trigger on date change
                dateInput.addEventListener("change", function () {
                    showDataEachMinute(this.value);
                });
            });


            function reloadData(){
                // fetchData();
                showDataEachMinute();
            }

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
                        resultDiv.innerText = `${avgTime.toFixed(2)}`;
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
            // fetchData();
            // showDataEachMinute();

            // let dataX = [];
            // let dataY = [];
            // let allData = []; // Store fetched data globally

            // function showDataEachMinute() {
            //     axios.get('<?=base_url(); ?>CPanel_Admin/getDataEachMinute')
            //         .then(response => {
            //             allData = response.data.data; // Store data in global variable

            //             // Extract unique instansi_id and corresponding instansi_nama
            //             const uniqueInstansi = [...new Map(allData.map(item => [item.instansi_id, item])).values()]
            //                 .map(item => ({ instansi_id: item.instansi_id, instansi_nama: item.instansi_nama }));

            //             // Populate instansi dropdown dynamically
            //             populateDropdown("filterInstansi", uniqueInstansi, "Semua Instansi");

            //             // Set default department filter (empty initially)
            //             document.getElementById("filterDepartment").innerHTML = `<option value="">Pilih Instansi Dahulu</option>`;

            //             // Display data initially
            //             filterAndDisplayData();
            //         })
            //         .catch(error => {
            //             console.error("Error fetching data:", error);
            //         });
            // }


            function showDataEachMinute() {
                const selectedDate = document.getElementById("filterDate").value;

                axios.get('<?= base_url(); ?>CPanel_Admin/getDataEachMinute', {
                    params: {
                        date: selectedDate
                    }
                })
                .then(response => {
                    allData = response.data.data;

                    const uniqueInstansi = [...new Map(allData.map(item => [item.instansi_id, item])).values()]
                        .map(item => ({ instansi_id: item.instansi_id, instansi_nama: item.instansi_nama }));

                    populateDropdown("filterInstansi", uniqueInstansi, "Semua Instansi");
                    document.getElementById("filterDepartment").innerHTML = `<option value="">Pilih Instansi Dahulu</option>`;
                    filterAndDisplayData();
                })
                .catch(error => {
                    console.error("Error fetching data:", error);
                });
            }



            // Function to populate dropdown dynamically
            function populateDropdown(elementId, options, defaultText) {
                const dropdown = document.getElementById(elementId);
                dropdown.innerHTML = `<option value="">${defaultText}</option>`; // Default option

                options.forEach(option => {
                    dropdown.innerHTML += `<option value="${option.instansi_id}">${option.instansi_nama}</option>`;
                });
            }
            function populateDropdown2(elementId, options, defaultText) {
                const dropdown = document.getElementById(elementId);
                dropdown.innerHTML = `<option value="">${defaultText}</option>`; // Default option

                options.forEach(option => {
                    dropdown.innerHTML += `<option value="${option.department_id}">${option.kantin_nama}</option>`;
                });
            }
            function populateDropdown(elementId, options, defaultText) {
                const dropdown = document.getElementById(elementId);
                dropdown.innerHTML = `<option value="">${defaultText}</option>`; // Default option

                options.forEach(option => {
                    dropdown.innerHTML += `<option value="${option.instansi_id}">${option.instansi_nama}</option>`;
                });
            }

            function updateDepartmentDropdown() {
                const selectedInstansiId = document.getElementById("filterInstansi").value;

                if (!selectedInstansiId) {
                    document.getElementById("filterDepartment").innerHTML = `<option value="">Pilih Instansi Dahulu</option>`;
                    return;
                }

                console.log("Selected Instansi ID:", selectedInstansiId);
                console.log("All Data:", allData); // Debugging

                // Extract unique departments
                const uniqueDepartments = [...new Map(
                    allData
                        .filter(item => item.instansi_id === selectedInstansiId)
                        .map(item => {
                            
                            // Extract department_id (first segment of name)
                            const department_id = item.name ? item.name.split("-")[1] : null;
                            if (!department_id) {
                                console.warn("Invalid department_id for item:", item);
                                return null;
                            }

                            // Try different keys for kantin_nama
                            const kantin_nama = item.kantin_nama || item.nama_kantin || item.kantin?.nama_kantin;
                            if (!kantin_nama) {
                                console.warn("Missing kantin_nama for:", item);
                                return null;
                            }

                            return [department_id, { department_id, kantin_nama }];
                        })
                        .filter(Boolean) // Remove null values
                ).values()];

                console.log("Unique Departments Processed:", uniqueDepartments);

                // Populate dropdown with department_id as value and kantin_nama as text
                populateDropdown2("filterDepartment", uniqueDepartments, "Semua Merchant");
            }



            // Function to filter data and update UI
            function filterAndDisplayData() {
                const selectedInstansiId = document.getElementById("filterInstansi").value;
                const selectedDepartmentId = document.getElementById("filterDepartment").value;

                const filteredData = allData.filter(item => {
                    const departmentId = item.name.split("-")[1]; // Extract department_id
                    return (!selectedInstansiId || item.instansi_id === selectedInstansiId) &&
                        (!selectedDepartmentId || departmentId === selectedDepartmentId);
                });

                const formattedData = filteredData.map(item => {
                    const gmt7Time = new Date(new Date(item.start).getTime() + (7 * 60 * 60 * 1000)); // Convert to GMT+7
                    
                    return {
                        x: gmt7Time.getTime(), // Use GMT+7 timestamp for X-axis
                        y: parseInt(item.duration_seconds), // Ensure numeric
                        instansi_id: item.instansi_id, // Include instansi_id
                        department_id: item.name.split('-')[1], // Extract department_id from name
                        instansi_nama: item.instansi_nama, // Include instansi name
                        kantin_nama: item.kantin_nama,
                        version_trx: item.version_trx // Include kantin name
                    };
                });

                // Group and count occurrences of duration_seconds
                const durationGroups = filteredData.reduce((acc, item) => {
                    const duration = parseInt(item.duration_seconds);
                    acc[duration] = (acc[duration] || 0) + 1;
                    return acc;
                }, {});

                // Convert grouped data into an array for display
                const groupedData = Object.entries(durationGroups).map(([duration, count]) => ({
                    duration: duration,
                    count: count
                }));

                // Generate HTML table
                let html = `<table class="table">
                                <thead>
                                    <tr>
                                        <th>Duration (seconds)</th>
                                        <th>Count</th>
                                    </tr>
                                </thead>
                                <tbody>`;
                groupedData.forEach(item => {
                    html += `<tr>
                                <td>${item.duration}</td>
                                <td>${item.count}</td>
                            </tr>`;
                });
                html += `</tbody></table>`;
                
                // Convert grouped data into arrays for ApexCharts
                const durations = Object.keys(durationGroups);
                const counts = Object.values(durationGroups);

                // Bar Chart
                const options1 = {
                    chart: { type: 'bar', height: 400 },
                    series: [{ name: 'Count', data: counts }],
                    xaxis: { categories: durations, title: { text: 'Duration (seconds)' } },
                    yaxis: { title: { text: 'Occurrences' } },
                    plotOptions: { bar: { horizontal: true, barHeight: '70%' } },
                    colors: ['#008FFB'],
                };
                document.querySelector("#barChart").innerHTML = ""; // Reset chart
                new ApexCharts(document.querySelector("#barChart"), options1).render();


                const toGMT7Time = (dateString) => {
                    if (!dateString) return "-"; 
                    const date = new Date(dateString);
                    date.setUTCHours(date.getUTCHours() - 7); // Convert to GMT+7
                    return date.toLocaleTimeString('en-GB', { hour12: false }); // Format as HH:mm:ss (24-hour)
                };
                const options = {
                    chart: { type: 'line', height: 400 },
                    series: [{ name: '', data: formattedData }],
                    stroke: { width: 1, curve: 'smooth' },
                    markers: {
                        size: 5,
                        discrete: formattedData.map(item => ({
                            seriesIndex: 0,
                            dataPointIndex: formattedData.indexOf(item),
                            fillColor: item.y > 3 ? '#FF0000' : '#008FFB',
                            strokeColor: 'transparent',
                            size: 4
                        }))
                    },
                    xaxis: { 
                        type: 'datetime',
                        labels: {
                            formatter: function(value) {
                                return toGMT7Time(value);
                            }
                        }
                    },
                    yaxis: { title: { text: 'Duration (seconds)' } },
                    tooltip: {
                        enabled: true,
                        x: {
                            formatter: function(value) {
                                return `🕒 ${toGMT7Time(value)}`; // Ensure tooltip uses GMT+7 time
                            }
                        },
                        y: {
                            formatter: function(value, { dataPointIndex }) {
                                const item = formattedData[dataPointIndex];
                                return `* ${item?.version_trx} <br>⏳ ${value} sec <br>🏛 Instansi: ${item?.instansi_nama || "N/A"} <br>🏢 Merchant: ${item?.kantin_nama || "N/A"}`;
                            }
                        }
                    }
                };

                document.querySelector("#chart2").innerHTML = ""; // Reset chart
                new ApexCharts(document.querySelector("#chart2"), options).render();



                showafter();
            }

            // Attach event listeners to dropdowns
            document.getElementById("filterInstansi").addEventListener("change", () => {
                updateDepartmentDropdown(); // Update department dropdown
                filterAndDisplayData(); // Filter data after instansi selection
            });
            document.getElementById("filterDepartment").addEventListener("change", filterAndDisplayData);

            
            function showafter() {
                const selectedInstansiId = document.getElementById("filterInstansi").value;
                const selectedDepartmentId = document.getElementById("filterDepartment").value;

                // Filter data based on selected values
                const filteredData = allData.filter(item => {
                    const departmentId = item.name.split("-")[1]; // Extract department_id
                    return (!selectedInstansiId || item.instansi_id === selectedInstansiId) &&
                        (!selectedDepartmentId || departmentId === selectedDepartmentId);
                });

                // 📌 Compute summary metrics
                const totalTrx = filteredData.length;
                const longestTrx = totalTrx > 0 ? Math.max(...filteredData.map(item => parseInt(item.duration_seconds))) : 0;
                const shortestTrx = totalTrx > 0 ? Math.min(...filteredData.map(item => parseInt(item.duration_seconds))) : 0;

                // Count transactions per instansi (for speed analysis)
                let instansiSpeedCount = {};
                let instansiSlowCount = {};

                filteredData.forEach(item => {
                    const instansi = item.instansi_nama;
                    const duration = parseInt(item.duration_seconds);

                    if (duration < 4) {
                        instansiSpeedCount[instansi] = (instansiSpeedCount[instansi] || 0) + 1;
                    }
                    if (duration > 3) {
                        instansiSlowCount[instansi] = (instansiSlowCount[instansi] || 0) + 1;
                    }
                });

                // Get the instansi with the most speedy transactions (<4 sec)
                const mostSpeedInstansi = Object.keys(instansiSpeedCount).length
                    ? Object.keys(instansiSpeedCount).reduce((a, b) => instansiSpeedCount[a] > instansiSpeedCount[b] ? a : b)
                    : "-";

                // Get the instansi with the most slow transactions (>3 sec)
                const slowestInstansi = Object.keys(instansiSlowCount).length
                    ? Object.keys(instansiSlowCount).reduce((a, b) => instansiSlowCount[a] > instansiSlowCount[b] ? a : b)
                    : "-";

                // Process rate calculation
                const durationGroups = filteredData.reduce((acc, item) => {
                    const duration = parseInt(item.duration_seconds);
                    acc[duration] = (acc[duration] || 0) + 1;
                    return acc;
                }, {});

                // Convert grouped data to array
                const groupedData = Object.entries(durationGroups).map(([duration, count]) => ({
                    duration: duration, 
                    count: count
                }));

                // 📌 Mencari **rentang waktu dengan transaksi paling padat**
                let mostDenseStart = "-";
                let mostDenseEnd = "-";
                let mostDenseTrxCount = 0;

                if (filteredData.length > 1) {
                    const sortedData = [...filteredData].sort((a, b) => new Date(a.start) - new Date(b.start));

                    let maxCount = 0;
                    let bestStartTime = "";
                    let bestEndTime = "";

                    for (let i = 0; i < sortedData.length; i++) {
                        let count = 1;
                        const startTime = new Date(sortedData[i].start).getTime();
                        let endTime = startTime;

                        for (let j = i + 1; j < sortedData.length; j++) {
                            const nextTime = new Date(sortedData[j].start).getTime();
                            if (nextTime - startTime <= 60000) { // Cek dalam 1 menit
                                count++;
                                endTime = nextTime;
                            } else {
                                break;
                            }
                        }

                        if (count > maxCount) {
                            maxCount = count;
                            bestStartTime = sortedData[i].start;
                            bestEndTime = new Date(endTime).toISOString();
                        }
                    }

                    const toGMT7Time = (dateString) => {
                        if (!dateString) return "-"; 
                        const date = new Date(dateString);
                        date.setUTCHours(date.getUTCHours() + 0); // Convert to GMT+7
                        return date.toLocaleTimeString('en-GB', { hour12: false }); // Format as HH:mm:ss (24-hour)
                    };

                    mostDenseStart = bestStartTime ? toGMT7Time(bestStartTime) : "-";
                    mostDenseEnd = bestEndTime ? toGMT7Time(bestEndTime) : "-";
                    mostDenseTrxCount = maxCount;

                }
                const processRate = Object.entries(durationGroups).map(([duration, count]) => {
                    return `<li class="my-3">${duration} sec: ${(count / totalTrx * 100).toFixed(2)}% (${count} times)</li>`;
                }).join("");

                // 🏷 Generate HTML for Summary Card
                let summaryHtml = `
                <div class="col-4">
                <div class="card p-1" style="border-radius:20px;">
                        <div class="card-body">
                            <strong>Total Transaksi:</strong><br/> ${totalTrx}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card p-1" style="border-radius:20px;">
                        <div class="card-body">
                            <strong>Transaksi Terlama:</strong><br/> <font style="font-weight:800;color:red;">${longestTrx} dtk</font>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card p-1" style="border-radius:20px;">
                        <div class="card-body">
                            <strong>Transaksi Tercepat:</strong><br/> <font style="font-weight:800;" class="text-success">${shortestTrx} dtk</font>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card p-1" style="border-radius:20px;">
                        <div class="card-body">
                            <strong>Instansi dengan trx cepat (under 3s):</strong><br/> ${mostSpeedInstansi}
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card p-1" style="border-radius:20px;">
                        <div class="card-body">
                            <strong>Instansi dengan trx lama (over 3s):</strong> <br/>${slowestInstansi} 
                        </div>
                    </div>
                </div>
                <div class="col-4">
                <div class="card p-1" style="border-radius:20px;">
                        <div class="card-body">
                            <strong>Periode Transaksi Padat:</strong> <br/>${mostDenseStart} - ${mostDenseEnd} (${mostDenseTrxCount} trx)
                        </div>
                    </div>
                </div>
                   `;

                    let summaryHtml2= `
                        <ul>${processRate}</ul>`;


                        let entries = Object.entries(durationGroups);
                        let goodProcessCount = 0;
                        let hardProcessCount = 0;

                        const processRate3 = entries.map(([duration, count], index) => {
                            let percent = (count / totalTrx) * 100;
                            if (index < 4) {
                                goodProcessCount += percent;
                            } else {
                                hardProcessCount += percent;
                            }
                            return `<li class="my-3">${duration} sec: ${percent.toFixed(2)}% (${count} times)</li>`;
                        }).join("");

                        // Create the summary HTML
                        let processSummary = `

                            <div class="row">

                                <div class="col-12 text-center">
                                    <h2 style="font-weight:900;">Kecepatan Standar Transaksi</h2>
                                    <p>Persentase dibawah ini merupakan hasil dari perbandingan antara proses yang <=3 detik dan diatas dari tiga detik</p>

                                </div>
                                <div class="col-6 text-center text-success">
                                    <h4 style="font-size:16px; font-weight:600;">Good Process</h4>
                                    <p style="font-size:36px; font-weight:900;">${goodProcessCount.toFixed(2)}%</p>
                                </div>
                                <div class="col-6 text-center">
                                    <h4 style="font-size:16px; font-weight:600;">Hard Process</h4>
                                    <p style="font-size:36px; font-weight:900;">${hardProcessCount.toFixed(2)}%</p>
                                </div>
                            </div>
                            
                        `;

                        $('.processSummary').html(processSummary);

                // Inject into HTML
                document.getElementById("summaryCard").innerHTML = summaryHtml2;
                document.getElementById("summaryCard2").innerHTML = summaryHtml;
            }

		</script>