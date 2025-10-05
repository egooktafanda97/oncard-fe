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
                        <div class="card-header">OLD - Tingkat transaksi dalam tiap menit</div>
                            <div class="card-body">
                                <div id="chart2" style=""></div>
                            </div>
                            <div class="card-footer text-sm">
                                <small> Update pada <?=date("Y/m/d");?> </small>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card p-3" style="border-radius:20px;">
                        <div class="card-header">NEW - Tingkat transaksi dalam tiap menit</div>
                            <div class="card-body">
                                <div id="chart3" style=""></div>
                            </div>
                            <div class="card-footer text-sm">
                                <small> Update pada <?=date("Y/m/d");?> </small>
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
    let allData = []; // Store the fetched data
    let allDataWithCache = []; // Store the fetched data
    let last5minuteData = 0;

    document.addEventListener("DOMContentLoaded", function () {
        const dateInput = document.getElementById("filterDate");

        // Set date input to today's date in format YYYY-MM-DD
        const today = new Date().toISOString().split('T')[0];
        dateInput.value = today;
        // Optional: Trigger on date change
        dateInput.addEventListener("change", function () {
            showDataCamp();
        });
    });

    function reloadData(){
        showDataCamp();
    }

    function showDataCamp() {
        const selectedDate = document.getElementById("filterDate").value;
        
        // Add the date parameter to the API request
        axios.get('<?= base_url(); ?>app/api/monitoring/get-monitorig-time-execute/usr', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            },
            params: {
                // tanggal: '2025-09-17' // Add the selected date as a parameter
                tanggal: selectedDate // Add the selected date as a parameter
            }
        })
        .then(response => {
            allData = response.data.data;

            const uniqueInstansi = [...new Map(allData.map(item => [item.instansi_id, item])).values()]
                .map(item => ({ instansi_id: item.instansi_id, instansi_nama: item.instansi_id }));

            populateDropdown("filterInstansi", uniqueInstansi, "Semua Instansi");
            
            // Process data for visualization
            const processedData = processDataForVisualization(allData);
            
            // Render the chart
            renderExecutionTimeChart(processedData);

            showDataCampWithCache();
        })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
    }
    
    
    function showDataCampWithCache() {
        const selectedDate = document.getElementById("filterDate").value;
        
        // Add the date parameter to the API request
        axios.get('<?= base_url(); ?>app/api/monitoring/get-monitorig-time-execute/usr_cache', {
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('_token')
            },
            params: {
                // tanggal: '2025-09-17' // Add the selected date as a parameter
                tanggal: selectedDate // Add the selected date as a parameter
            }
        })
        .then(response => {
            allDataWithCache = response.data.data;

            const uniqueInstansi = [...new Map(allDataWithCache.map(item => [item.instansi_id, item])).values()]
                .map(item => ({ instansi_id: item.instansi_id, instansi_nama: item.instansi_id }));

            populateDropdown("filterInstansi", uniqueInstansi, "Semua Instansi");
            
            // Process data for visualization
            const processedData = processDataForVisualization(allDataWithCache);
            
            // Render the chart
            renderExecutionTimeChartWithCache(processedData);
        })
        .catch(error => {
            console.error("Error fetching data:", error);
        });
    }

    function processDataForVisualization(data) {
        // Calculate execution time for each item
        const chartData = data.map(item => {
            const startTime = new Date(item.start);
            const endTime = new Date(item.end);
            const executionTime = endTime - startTime; // in milliseconds
            
            return {
                instansi: `Instansi ${item.instansi_id}`,
                executionTime: executionTime,
                start: item.start,
                end: item.end,
                status: item.status
            };
        });
        
        return chartData;
    }

    function renderExecutionTimeChart(data) {
    console.log("data",data);
    // Prepare series data for the chart
    const categories = data.map(item => item.instansi);
    const seriesData = data.map(item => item.executionTime);
    
    // Chart options
    const options = {
        series: [{
            name: 'Execution Time (ms)',
            data: seriesData
        }],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: categories,
            title: {
                text: 'Instansi'
            }
        },
        yaxis: {
            title: {
                text: 'Execution Time (ms)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " ms"
                }
            }
        },
        colors: ['#6a11cb']
    };

    // Create or update chart
    if (window.executionTimeChart) {
        window.executionTimeChart.updateOptions(options);
    } else {
        window.executionTimeChart = new ApexCharts(document.querySelector("#chart2"), options);
        window.executionTimeChart.render();
    }
}


function renderExecutionTimeChartWithCache(data) {
    console.log("data-NEW : ",data);
    // Prepare series data for the chart
    const categories = data.map(item => item.instansi);
    const seriesData = data.map(item => item.executionTime);
    
    // Chart options
    const options = {
        series: [{
            name: 'Execution Time (ms)',
            data: seriesData
        }],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: true
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: categories,
            title: {
                text: 'Instansi'
            }
        },
        yaxis: {
            title: {
                text: 'Execution Time (ms)'
            }
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " ms"
                }
            }
        },
        colors: ['#0cd870']
    };

    // Create or update chart - Use a different variable name for the second chart
    if (window.executionTimeChartWithCache) {
        window.executionTimeChartWithCache.updateOptions(options);
    } else {
        window.executionTimeChartWithCache = new ApexCharts(document.querySelector("#chart3"), options);
        window.executionTimeChartWithCache.render();
    }
}

    function filterAndDisplayData() {
        const instansiFilter = document.getElementById("filterInstansi").value;
        
        // Filter data based on selection
        let filteredData = allData;
        if (instansiFilter) {
            filteredData = filteredData.filter(item => item.instansi_id == instansiFilter);
        }
        
        // Process and render filtered data
        const processedData = processDataForVisualization(filteredData);
        renderExecutionTimeChart(processedData);
    }

    function populateDropdown(dropdownId, options, defaultText) {
        const dropdown = document.getElementById(dropdownId);
        // Clear existing options except the first one
        while (dropdown.options.length > 1) {
            dropdown.remove(1);
        }
        
        // Add new options
        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option.instansi_id;
            opt.textContent = `Instansi ${option.instansi_id}`;
            dropdown.appendChild(opt);
        });
    }

    // Initialize when page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Set default date to today
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('filterDate').value = today;
        
        // Load initial data
        showDataCamp();
    });
</script>