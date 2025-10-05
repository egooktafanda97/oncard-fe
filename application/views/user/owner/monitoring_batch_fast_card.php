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
				
				<div class="card">

					<div class="card-body">
                        
						<div class="">

                        
                            <h4>Fastcard Monitoring</h4>
                           <!-- Summary Cards -->
                            <!-- Additional Summary Cards for Limit Status -->
                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <div class="card border-success">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-success">Aktif</h5>
                                            <h2 id="active-limit-cards" class="mb-0">0</h2>
                                            <small class="text-muted">< 12 hari</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card border-warning">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-warning">Peringatan</h5>
                                            <h2 id="warning-limit-cards" class="mb-0">0</h2>
                                            <small class="text-muted">> 12 hari & < 30 hari</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card border-danger">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-danger">Kadaluarsa</h5>
                                            <h2 id="expired-limit-cards" class="mb-0">0</h2>
                                            <small class="text-muted">Lewat batas</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-primary">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-primary">Total Kartu</h5>
                                            <h2 id="total-cards" class="mb-0">0</h2>
                                            <small class="text-muted">Semua kartu</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card border-info">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-info">Total Balance</h5>
                                            <h2 id="total-balance" class="mb-0">Rp 0</h2>
                                            <small class="text-muted">Total saldo</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Filter Data</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter-instansi">Instansi</label>
                                                <select id="filter-instansi" class="form-control">
                                                    <option value="">Semua Instansi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter-status">Status Kartu</label>
                                                <select id="filter-status" class="form-control">
                                                    <option value="">Semua Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="connected">Terkoneksi</option>
                                                    <option value="not_connected">Belum Terkoneksi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter-date-start">Waktu Terkoneksi Dari</label>
                                                <input type="date" id="filter-date-start" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="filter-date-end">Sampai</label>
                                                <input type="date" id="filter-date-end" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <button id="btn-apply-filter" class="btn btn-primary">Terapkan Filter</button>
                                            <button id="btn-reset-filter" class="btn btn-secondary">Reset Filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- DataTable -->
                            <table id="example" class="table table-striped table-bordered" style="width:100%"></table>
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

            $(document).ready(function () {
                let dataTableInstance;

                dataTableInstance = $('#example').DataTable({
                    fixedHeader: true,
                    "processing": true,
                    "searching": true,
                    columnDefs: [
                        {
                            targets: [4, 5], // Balance and Limit columns
                            className: 'text-right'
                        },
                        {
                            targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], // All columns including new one
                            className: 'text-center'
                        }
                    ],
                    order: [[6, 'desc']], // Order by "created_at" descending
                    ajax: function (data, callback) {
                        axios.get('<?=base_url(); ?>CPanel_Admin/getDataKartuFromTo')
                            .then(response => {
                                const data = response.data.data;
                                populateInstansiFilter(data);
                                dataTableInstance.originalData = data;
                                updateSummaryStats(data);
                                callback({ data: data });
                            })
                            .catch(error => {
                                console.error('Error fetching data:', error);
                            });
                    },
                    columns: [
                        { 
                            data: 'id', 
                            title: 'No',
                            render: function (data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        { 
                            data: 'card_id', 
                            title: 'Kode Kartu', 
                            render: function (data, type, row) {
                                return `<span class="kode-semester text-primary" style="font-weight: bold;">
                                            ${row.card_id || '-'}
                                        </span>`;
                            } 
                        },
                        { 
                            data: 'account', 
                            title: 'Nama Customer', 
                            render: function (data, type, row) {
                                return row.account && row.account.customers_name 
                                    ? `<span class="customer-name">${row.account.customers_name}</span>`
                                    : '<span class="text-muted">Belum Terkoneksi</span>';
                            } 
                        },
                        { 
                            data: 'instansi_nama', 
                            title: 'Instansi', 
                            render: function (data, type, row) {
                                return row.instansi_nama 
                                    ? `<span class="instansi-name">${row.instansi_nama}</span>`
                                    : '<span class="text-muted">-</span>';
                            } 
                        },
                        { 
                            data: 'account', 
                            title: 'Balance', 
                            render: function (data, type, row) {
                                if (row.account && row.account.balance !== undefined && row.account.balance !== null) {
                                    return `Rp ${formatNumber(row.account.balance)}`;
                                }
                                return '<span class="text-muted">-</span>';
                            } 
                        },
                        { 
                            data: 'account', 
                            title: 'Terakhir Transaksi', 
                            render: function (data, type, row) {
                                if (row.account && row.account.limits_dates) {
                                    return formatDate(row.account.limits_dates);
                                }
                                return '<span class="text-muted">-</span>';
                            } 
                        },
                        { 
                            data: 'account', 
                            title: 'Status', 
                            render: function (data, type, row) {
                                if (row.account && row.account.limits_dates) {
                                    const limitDate = new Date(row.account.limits_dates);
                                    const today = new Date();
                                    const dayDiff = Math.ceil((today-limitDate) / (1000 * 60 * 60 * 24));
                                    
                                    if (dayDiff <= 12) {
                                        return `<span class="badge text-dark  badge-success">Kartu Aktif</span>`;
                                    } else if (dayDiff > 12 && dayDiff <=30) {
                                        return `<span class="badge text-dark  badge-warning">${dayDiff} hari lalu</span>`;
                                    } else {
                                        return `<span class="badge text-dark  badge-danger">Kadaluarsa (${Math.abs(dayDiff)} hari)</span>`;
                                    }
                                }
                                return '<span class="badge text-dark badge-secondary">Tidak Ada Limit</span>';
                            } 
                        },
                        { 
                            data: 'waktu_terkoneksi', 
                            title: 'Waktu Terkoneksi', 
                            render: function (data, type, row) {
                                if (row.waktu_terkoneksi) {
                                    return formatDate(row.waktu_terkoneksi);
                                }
                                return '<span class="text-muted">Belum Terkoneksi</span>';
                            } 
                        },
                        { 
                            data: 'created_at', 
                            title: 'Kartu Diregis', 
                            render: function (data, type, row) {
                                return formatDate(row.created_at);
                            } 
                        },
                        { 
                            data: 'keterangan', 
                            title: 'Kondisi', 
                            render: function (data, type, row) {
                                let statusClass = 'secondary';
                                let statusText = row.keterangan || 'Unknown';
                                
                                if (row.keterangan) {
                                    const status = row.keterangan.toLowerCase();
                                    if (status.includes('active') || status.includes('aktif')) {
                                        statusClass = 'success';
                                    } else if (status.includes('inactive') || status.includes('nonaktif')) {
                                        statusClass = 'danger';
                                    } else if (status.includes('pending')) {
                                        statusClass = 'warning';
                                    }
                                }
                                
                                return `<span class="badge  badge-${statusClass} text-dark">${statusText}</span>`;
                            } 
                        }
                    ],
                    lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]],
                    pageLength: 20,
                    drawCallback: function() {
                        setTimeout(() => {
                            const filteredData = getFilteredData();
                            updateSummaryStats(filteredData);
                        }, 100);
                    }
                });

                    // Function to get currently filtered data
                // Function to get currently filtered data
                function getFilteredData() {
                        const filteredData = [];
                        
                        if (!dataTableInstance) {
                            return filteredData;
                        }
                        
                        try {
                            dataTableInstance.rows({ filter: 'applied' }).every(function() {
                                filteredData.push(this.data());
                            });
                        } catch (error) {
                            console.warn('Error accessing filtered rows:', error);
                        }
                        
                        return filteredData;
                    }


                    // Populate instansi filter from data
                    function populateInstansiFilter(data) {
                        const instansiSelect = $('#filter-instansi');
                        const instansiSet = new Set();
                        
                        data.forEach(item => {
                            if (item.instansi_nama) {
                                instansiSet.add(item.instansi_nama);
                            }
                        });
                        
                        // Sort instansi names alphabetically
                        const sortedInstansi = Array.from(instansiSet).sort();
                        
                        sortedInstansi.forEach(instansi => {
                            instansiSelect.append(`<option value="${instansi}">${instansi}</option>`);
                        });
                    }
                // Update summary statistics to include limit status counts
                function updateSummaryStats(data) {
                        const totalCards = data.length;
                        const connectedCards = data.filter(item => item.waktu_terkoneksi).length;
                        const activeCards = data.filter(item => item.account && item.account.customers_name).length;
                        const totalBalance = data.reduce((sum, item) => {
                            return sum + (item.account && item.account.balance ? parseFloat(item.account.balance) : 0);
                        }, 0);

                        // Calculate limit status counts
                        const limitStats = calculateLimitStats(data);

                        // Calculate additional metrics
                        const connectedPercentage = totalCards > 0 ? ((connectedCards / totalCards) * 100).toFixed(1) : 0;
                        const activePercentage = totalCards > 0 ? ((activeCards / totalCards) * 100).toFixed(1) : 0;

                        // Update DOM elements
                        $('#total-cards').text(formatNumber(totalCards));
                        $('#connected-cards').html(`${formatNumber(connectedCards)} <small class="text-muted">(${connectedPercentage}%)</small>`);
                        $('#active-cards').html(`${formatNumber(activeCards)} <small class="text-muted">(${activePercentage}%)</small>`);
                        $('#total-balance').text('Rp ' + formatNumber(totalBalance));
                        
                        // Update limit stats if you have elements for them
                        if ($('#active-limit-cards').length) {
                            $('#active-limit-cards').text(formatNumber(limitStats.active));
                            $('#warning-limit-cards').text(formatNumber(limitStats.warning));
                            $('#expired-limit-cards').text(formatNumber(limitStats.expired));
                        }

                        // Update card styles based on filtered results
                        updateCardStyles(totalCards, connectedPercentage, activePercentage, totalBalance);
                    }

                    // Calculate limit status statistics
                    function calculateLimitStats(data) {
                        const stats = {
                            active: 0,
                            warning: 0,
                            expired: 0,
                            noLimit: 0
                        };

                        data.forEach(item => {
                            if (item.account && item.account.limits_dates) {
                                const limitDate = new Date(item.account.limits_dates);
                                const today = new Date();
                                const dayDiff = Math.ceil((today-limitDate) / (1000 * 60 * 60 * 24));
                                
                                if (dayDiff <= 12) {
                                    stats.active++;
                                } else if (dayDiff > 12 && dayDiff <=30) {
                                    stats.warning++;
                                } else {
                                    stats.expired++;
                                }
                            } else {
                                stats.noLimit++;
                            }
                        });

                        return stats;
                    }


                    // Update card styles based on metrics
                    function updateCardStyles(totalCards, connectedPercentage, activePercentage, totalBalance) {
                        const totalCard = $('#total-cards').closest('.card');
                        const connectedCard = $('#connected-cards').closest('.card');
                        const activeCard = $('#active-cards').closest('.card');
                        const balanceCard = $('#total-balance').closest('.card');

                        // Reset all cards to default state
                        totalCard.removeClass('border-warning');
                        connectedCard.removeClass('border-success border-warning border-danger');
                        activeCard.removeClass('border-success border-warning border-danger');
                        balanceCard.removeClass('border-success border-warning border-danger');

                        // Style based on percentages
                        if (totalCards === 0) {
                            totalCard.addClass('border-warning');
                        }

                        if (connectedPercentage >= 80) {
                            connectedCard.addClass('border-success');
                        } else if (connectedPercentage >= 50) {
                            connectedCard.addClass('border-warning');
                        } else if (connectedPercentage > 0) {
                            connectedCard.addClass('border-danger');
                        }

                        if (activePercentage >= 80) {
                            activeCard.addClass('border-success');
                        } else if (activePercentage >= 50) {
                            activeCard.addClass('border-warning');
                        } else if (activePercentage > 0) {
                            activeCard.addClass('border-danger');
                        }

                        // Style balance card based on amount
                        if (totalBalance > 1000000) {
                            balanceCard.addClass('border-success');
                        } else if (totalBalance > 100000) {
                            balanceCard.addClass('border-warning');
                        } else if (totalBalance > 0) {
                            balanceCard.addClass('border-danger');
                        }
                    }

                    // Apply filter function
                    function applyFilters() {
                        const instansiFilter = $('#filter-instansi').val();
                        const statusFilter = $('#filter-status').val();
                        const dateStart = $('#filter-date-start').val();
                        const dateEnd = $('#filter-date-end').val();

                        $.fn.dataTable.ext.search.push(
                            function(settings, data, dataIndex) {
                                const row = dataTableInstance.row(dataIndex).data();
                                let instansiMatch = true;
                                let statusMatch = true;
                                let dateMatch = true;

                                // Instansi filter
                                if (instansiFilter) {
                                    instansiMatch = row.instansi_nama === instansiFilter;
                                }

                                // Status filter
                                if (statusFilter) {
                                    if (statusFilter === 'connected') {
                                        statusMatch = row.waktu_terkoneksi !== null && row.waktu_terkoneksi !== undefined;
                                    } else if (statusFilter === 'not_connected') {
                                        statusMatch = !row.waktu_terkoneksi;
                                    } else {
                                        const rowStatus = row.keterangan ? row.keterangan.toLowerCase() : '';
                                        statusMatch = rowStatus.includes(statusFilter);
                                    }
                                }

                                // Date range filter
                                if (dateStart || dateEnd) {
                                    if (row.waktu_terkoneksi) {
                                        const connectionDate = new Date(row.waktu_terkoneksi).toISOString().split('T')[0];
                                        
                                        if (dateStart && dateEnd) {
                                            dateMatch = connectionDate >= dateStart && connectionDate <= dateEnd;
                                        } else if (dateStart) {
                                            dateMatch = connectionDate >= dateStart;
                                        } else if (dateEnd) {
                                            dateMatch = connectionDate <= dateEnd;
                                        }
                                    } else {
                                        dateMatch = false; // No connection date, exclude from results
                                    }
                                }

                                return instansiMatch && statusMatch && dateMatch;
                            }
                        );

                        dataTableInstance.draw();
                        // Remove the custom filter after drawing
                        $.fn.dataTable.ext.search.pop();
                    }

                    // Event listeners
                    $('#btn-apply-filter').on('click', function() {
                        applyFilters();
                    });

                    $('#btn-reset-filter').on('click', function() {
                        $('#filter-instansi').val('');
                        $('#filter-status').val('');
                        $('#filter-date-start').val('');
                        $('#filter-date-end').val('');
                        dataTableInstance.search('').columns().search('').draw();
                        // Update stats with all data after reset
                        if (dataTableInstance.originalData) {
                            updateSummaryStats(dataTableInstance.originalData);
                        }
                    });

                    // Helper functions for formatting
                    function formatNumber(num) {
                        return new Intl.NumberFormat('id-ID').format(num);
                    }

                    function formatDate(dateString) {
                        if (!dateString) return '-';
                        
                        const date = new Date(dateString);
                        return new Intl.DateTimeFormat('id-ID', {
                            year: 'numeric',
                            month: '2-digit',
                            day: '2-digit',
                            hour: '2-digit',
                            minute: '2-digit'
                        }).format(date);
                    }
                });
            
            function openDialogLoginByPass(str,str2){
                $('#namaInstansi').val(str);
                $('#userInstansi').val(str2);
                $('#modalLoginByPass').modal('toggle');
            }

            $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
		</script>