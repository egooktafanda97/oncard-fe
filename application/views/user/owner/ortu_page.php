<style>
    .summary-card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: transform 0.3s;
    height: 100%;
    color:white!important;
}
.summary-card:hover {
    transform: translateY(-5px);
}
.summary-card .card-body {
    padding: 1.25rem;
}
.summary-card small {
    opacity: 0.8;
    display: block;
    margin-top: 5px;
}
        
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Orangtua</div>
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
                
			  
                <div class="card" style="border-radius:15px;">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <div class="card summary-card bg-primary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Total Wali</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="total_user_x" class="mb-0 text-white">0</h2>
                                            <i class="bx bx-group text-white" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Total orangtua/wali terdaftar</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card summary-card bg-success text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Active Connected</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="activeConnectedCount" class="mb-0 text-white">0</h2>
                                            <i class="bx bx-check-circle text-white" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Sudah login & terhubung</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card summary-card bg-warning text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Logged In Only</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="loggedInOnlyCount" class="mb-0 text-white">0</h2>
                                            <i class="bx bx-user-check" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Sudah login tapi belum terhubung</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card summary-card bg-danger text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Inactive</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="inactiveCount" class="mb-0 text-white">0</h2>
                                            <i class="bx bx-user-x" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Belum login & belum terhubung</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="card summary-card bg-info text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Total Siswa</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="totalStudents" class="mb-0 text-white">0</h2>
                                            <i class="bx bx-user-pin" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Total siswa yang terdaftar</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card summary-card bg-secondary text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Total Instansi</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="totalOrganisasi" class="mb-0 text-white">0</h2>
                                            <i class="bx bx-building-house" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Lembaga yang terdaftar</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card summary-card bg-dark text-white">
                                    <div class="card-body">
                                        <h5 class="card-title text-white">Connection Rate</h5>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 id="connectionRate" class="mb-0 text-white">0%</h2>
                                            <i class="bx bx-line-chart" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <small>Persentase koneksi sukses</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12 my-3 text-center">
                                <label for="organisasiFilter">Pilih instansi</label>
                                <select id="organisasiFilter" class="form-control" style="width:35%;display:block; margin:auto;">
                                    <option value="">Filter by Instansi</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4" id="filteredSummaryRow" style="display: none;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Filtered Summary <small class="text-muted" id="filterTitle"></small></h5>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bx-filter-alt me-2"></i>
                                                    <div>
                                                        <h6 class="mb-0">Filtered Wali</h6>
                                                        <small id="filteredWaliCount">0</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bx-check-circle me-2 text-success"></i>
                                                    <div>
                                                        <h6 class="mb-0">Active Connected</h6>
                                                        <small id="filteredActiveCount">0</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bx-user-check me-2 text-warning"></i>
                                                    <div>
                                                        <h6 class="mb-0">Logged In Only</h6>
                                                        <small id="filteredLoggedInCount">0</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bx-user-x me-2 text-danger"></i>
                                                    <div>
                                                        <h6 class="mb-0">Inactive</h6>
                                                        <small id="filteredInactiveCount">0</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="bx bx-line-chart me-2 text-info"></i>
                                                    <div>
                                                        <h6 class="mb-0">Connection Rate</h6>
                                                        <div class="progress" style="height: 10px;">
                                                            <div id="connectionRateBar" class="progress-bar bg-info" role="progressbar" style="width: 0%"></div>
                                                        </div>
                                                        <small id="filteredConnectionRate">0%</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
                        <table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
                            <thead class="table-light">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Orangtua (akun)</th>
                                    <th>Nama Orangtua (akun)</th>
                                    <th>Kode Kelas</th>
                                    <th>Nama Kelas</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>


			</div>
		</div>

    
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script> -->

		<script type="text/javascript">

            let idsett = '';
            let table;
            
            let siswaDataGroupedByPhone = {};

            function showData() {
                return new Promise((resolve, reject) => {
                    const save2 = async () => {
                        try {
                            const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getAllDataSiswaOnly');
                            
                            // Ensure we have data and it's in array format
                            const responseData = posts2?.data;
                            if (!responseData) {
                                console.warn('No data received from getAllDataSiswaOnly');
                                return resolve(); // Resolve without error but with empty data
                            }

                            // Convert to array if it's not already
                            const dataArray = Array.isArray(responseData) ? responseData : 
                                            (responseData.data ? (Array.isArray(responseData.data) ? responseData.data : []) : []);

                            // Group by phone number
                            dataArray.forEach(row => {
                                if (!row.telp_ortu) return;

                                if (!siswaDataGroupedByPhone[row.telp_ortu]) {
                                    siswaDataGroupedByPhone[row.telp_ortu] = [];
                                }
                                siswaDataGroupedByPhone[row.telp_ortu].push(row);
                            });
                            
                            resolve(); // Resolve when data is loaded
                        } catch (err) {
                            console.error('Error in showData:', err);
                            reject(err);
                        }
                    };
                    save2();
                });
            }
			$(document).ready(async function () {
                
            try {
                await showData(); // Wait for data to load
         
                table = $('#example').DataTable( {
					fixedHeader: true,
					"processing": true,
					//"serverSide": true,
					"searching": true,
					columnDefs: [
						{
							targets: [2], // Column index (e.g., 1 for the second column)
							className: 'text-right' // Adds a class for right alignment
						}
					],
					order: [[0, 'asc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?=api_url_tagihan(); ?>api/dashboard/wali-connected-siswa').then(response => {
								
                                let allData = response.data;

                                                           // Existing counts
                            let total_user_x = allData.length;
                            let totalStudents = 0;
                            let totalLogin = 0;
                            let totalNotLogin = 0;
                            let totalOrganisasi = new Set().size; // From your existing code

                                // Extract unique organisasi names
                                let organisasiSet = new Set();
                                allData.forEach(row => {
                                    if (Array.isArray(row.siswa)) {
                                        row.siswa.forEach(siswa => {
                                            organisasiSet.add(siswa.siswa?.organisasi?.name??'EMPTY DATA');
                                        });
                                    }
                                });

                                allData.forEach(row => {
                                    if (row.token_firebase) {
                                        totalLogin++;
                                    } else {
                                        totalNotLogin++;
                                    }

                                    if (Array.isArray(row.siswa)) {
                                        totalStudents += row.siswa.length;
                                        row.siswa.forEach(siswa => {
                                            organisasiSet.add(siswa.siswa?.organisasi?.name??'EMPTY DATA');
                                        });
                                    }
                                });

                                // Update summary card
                                $('#totalOrganisasi').text(organisasiSet.size);
                                // $('#total_user_x').text(total_user_x);
                                $('#totalStudents').text(totalStudents);
                                $('#totalLogin').text(totalLogin);
                                $('#totalNotLogin').text(totalNotLogin);

                                // Inside your axios.get callback function:


                            // New counts for summary
                            let activeConnectedCount = 0; // Logged in AND connected
                            let loggedInOnlyCount = 0;   // Logged in but NOT connected
                            let inactiveCount = 0;       // Not logged in AND not connected

                            allData.forEach(row => {
                                const hasLoggedIn = row.token_firebase != null;
                                const isConnected = row.siswa && row.siswa.length > 0;
                                
                                if (hasLoggedIn && isConnected) {
                                    activeConnectedCount++;
                                } else if (hasLoggedIn && !isConnected) {
                                    loggedInOnlyCount++;
                                } else if (!hasLoggedIn && !isConnected) {
                                    inactiveCount++;
                                }

                                // Your existing student count logic
                                if (Array.isArray(row.siswa)) {
                                    totalStudents += row.siswa.length;
                                }
                            });

                            // Calculate connection rate (percentage of connected accounts from total)
                            const connectionRate = total_user_x > 0 
                                ? Math.round((activeConnectedCount / total_user_x) * 100) 
                                : 0;

                            // Update all summary cards
                            $('#totalStudents').text(totalStudents);
                            $('#totalOrganisasi').text([...organisasiSet].length);
                            $('#activeConnectedCount').text(activeConnectedCount);
                            $('#loggedInOnlyCount').text(loggedInOnlyCount);
                            $('#inactiveCount').text(inactiveCount);
                            $('#connectionRate').text(connectionRate + '%');
                            
                            console.log("tots : ",total_user_x);
                            $('#total_user_x').html(total_user_x.toString());

                                // Populate dropdown
                                let organisasiDropdown = $('#organisasiFilter');
                                organisasiDropdown.empty().append('<option value="">Filter by Instansi</option>');
                                [...organisasiSet].sort().forEach(org => {
                                    organisasiDropdown.append(`<option value="${org}">${org}</option>`);
                                });

                            	callback({
									data: response.data
								});


							})

                            .catch(error => {
								console.error('Error fetching data:', error);
							});
					},
                    columns: [
                    {
                        data: null,
                        title: 'No', 
                        render: function (data, type, row, meta) {
                            return meta.row + 1;
                        },
                        orderable: false,
                        searchable: false
                    },
                    { 
                        data: 'ortuname', 
                        title: 'Orangtua (akun)', 
                        render: function (data, type, row) {
                            let samePhoneUsers = siswaDataGroupedByPhone[row.no_telepon] || [];
                            
                            let html = `<span class="kode-semester text-dark" style="font-weight: bold; ">
                                ${row.nama_lengkap}<br/>
                                <i class="bx bxs-user-rectangle me-1"></i><small>${row.username}</small>
                            </span>`;
                            return html;
                        } 
                    },
                    { 
                        data: 'ortuname2', 
                        title: 'Expected Connect With', 
                        render: function (data, type, row) {
                            let samePhoneUsers = siswaDataGroupedByPhone[row.no_telepon] || [];
                            
                            let html = ``;
                            
                            if (samePhoneUsers.length > 0) {
                                html += `<div style="margin-top: 5px; border-top: 1px dashed #ccc; padding-top: 5px;">
                                    <small style="color: #666;">Users with same phone:</small><br/>`;
                                
                                samePhoneUsers.forEach(user => {
                                    html += `<small>
                                        <i class="bx bx-user"></i> ${user.nama_lengkap} (${user.instansi_nama})<br/>
                                        <b>${user.account_number}</b>
                                    </small><br/>`;
                                });
                                
                                html += `</div>`;
                            }
                            
                            return html;
                        } 
                    },
                    { 
                        data: 'phone', 
                        title: 'Phone Number', 
                        render: function (data, type, row) {
                            return `<span class="kode-semester text-dark" style=" ">
                                ${row.no_telepon}
                            </span>`;
                        } 
                    },
                    { 
                        data: 'terdaftar', 
                        title: 'Register', 
                        render: function (data, type, row) {
                            return `<span class="kode-semester text-dark" style="">
                                ${moment(row.created_at).format('DD/MM/YYYY HH:mm:ss')} WIB
                            </span>`;
                        } 
                    },
                    {
                        data: 'koneksi_ke',
                        title: 'Relasi',
                        render: function (data, type, row) {
                            let siswaList = '';

                            if (Array.isArray(row.siswa) && row.siswa.length > 0) {
                                siswaList = '<ul style="margin:0; padding-left: 0px; list-style-type: none;">';
                                
                                row.siswa.forEach((siswa, index) => {
                                    // Generate unique ID for the button to prevent conflicts
                                    const buttonId = `disconnect-btn-${row.id}-${siswa.siswa_id}-${siswa.user_id}`;
                                    
                                    siswaList += `
                                        <li style="font-size:13px; font-weight:bold; margin-bottom: 10px;">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <div>
                                                    <i class="bx bxs-check-circle text-success"></i> ${siswa.siswa?.nama??'EMPTY DATA'}<br/>
                                                    <small class="text-muted" style="font-weight:400;">@${siswa.siswa?.organisasi?.name??'EMPTY DATA'}</small><br/>
                                                    <small class="text-muted" style="font-weight:400;font-size:10px;">
                                                        Dikoneksikan pada ${moment(siswa.created_at).format('DD/MM/YYYY HH:mm:ss')} WIB
                                                    </small>
                                                </div>
                                                <button id="${buttonId}" 
                                                        class="btn btn-sm btn-outline-danger ms-2" 
                                                        style="font-size: 11px; padding: 2px 8px;"
                                                        title="Putus Koneksi"
                                                        onclick="confirmDisconnect(${row.id}, ${siswa.siswa_id}, ${siswa.user_id}, '${siswa.siswa?.nama?.replace(/'/g, "\\'") || 'EMPTY DATA'}')">
                                                    <i class="bx bx-unlink"></i>
                                                </button>
                                            </div>
                                        </li>
                                    `;

                                    if (row.siswa.length > 1 && index !== row.siswa.length - 1) {
                                        siswaList += `<hr style="border: none; border-top: 1px dashed #000; margin: 5px 0;">`;
                                    }
                                });

                                siswaList += '</ul>';
                                return siswaList;
                            }

                            return `
                                <span class="kode-semester text-dark" style="font-weight: bold;">
                                    <i class="bx bxs-x-circle text-danger ms-1"></i> NOT CONNECTED YET
                                </span>
                            `;
                        }
                    },
                    { 
                        data: 'koneksi_ke', 
                        title: 'Has Login', 
                        render: function (data, type, row) {
                            const hasLoggedIn = row.token_firebase != null;
                            return `
                                <span class="kode-semester" style="font-weight: bold; ">
                                    ${hasLoggedIn ? '<i class="bx bxs-check-circle text-success ms-1"></i> ALREADY LOGIN' : '<i class="bx bxs-x-circle text-danger ms-1"></i> NOT LOGIN YET'}
                                </span>
                            `;
                        } 
                    },
                    // Add this column to your columns array (probably as the last column)
                    {
                        data: null,
                        title: 'Action',
                        className: 'text-center',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return `
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton${row.id}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-cog"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${row.id}">
                                    <li>
                                        <a class="dropdown-item reset-password-btn" href="#" data-username="${row.username}">
                                            <i class="bx bx-key me-2"></i> Reset Password
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            `;
                        }
                    }
                ],
                createdRow: function(row, data, dataIndex) {
                    const hasLoggedIn = data.token_firebase != null;
                    const isConnected = data.siswa && data.siswa.length > 0;

                    if (!hasLoggedIn && !isConnected) {
                        // Red for not logged in and not connected
                        $(row).css('background-color', '#ffebee');
                        $(row).css('border-left', '4px solid #f44336');
                    } else if (hasLoggedIn && !isConnected) {
                        // Grey for logged in but not connected
                        $(row).css('background-color', '#f5f5f5');
                        $(row).css('border-left', '4px solid #9e9e9e');
                    } else if (hasLoggedIn && isConnected) {
                        // Green for logged in and connected
                        $(row).css('background-color', '#e8f5e9');
                        $(row).css('border-left', '4px solid #4caf50');
                    }
                },
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );

                
                // Call function after DataTables loads data
                table.on('draw', function () {
                    updateOrganisasiDropdown();
                });

               // Update your filter change handler
                $('#organisasiFilter').on('change', function() {
                    let selectedOrg = $(this).val();
                    
                    // Apply filter
                    table.column(2).search(selectedOrg || '').draw();
                    
                    // Update filtered summary
                    updateFilteredSummary(selectedOrg);
                });



                // Also update the table draw event to maintain filtered summary
                table.on('draw', function() {
                    updateFilteredSummary($('#organisasiFilter').val());
                });



            } catch (error) {
                    console.error('Error initializing table:', error);
                }
        });

        function confirmDisconnect(waliId, siswaId, userId, siswaName) {
            Swal.fire({
                title: 'Putus Koneksi?',
                html: `Apakah Anda yakin ingin memutus koneksi dengan <strong>${siswaName}</strong>?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Putuskan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Show loading indicator
                    Swal.fire({
                        title: 'Memproses...',
                        text: 'Sedang memutus koneksi',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // Make API call to disconnect
                    const apiUrl = `https://api.management-tagihan.oncard.id/api/wali/batal-koneksi/${siswaId}/${userId}`;
                    
                    fetch(apiUrl, {
                        method: 'DELETE', // or 'DELETE' depending on your API
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('_is_admin') // Adjust based on your auth method
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Success response
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Koneksi berhasil diputus.',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            // Reload the DataTable or update the specific row
                            // Adjust based on your DataTable instance name
                            $('#example').DataTable().ajax.reload(null, false);
                        });
                    })
                    .catch(error => {
                        // Error handling
                        console.error('Error:', error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Terjadi kesalahan saat memutus koneksi.',
                            timer: 3000
                        });
                    });
                }
            });
        }

        // Handle password reset
        $(document).on('click', '.reset-password-btn', function(e) {
            e.preventDefault();
            let username = $(this).data('username');
            username = username.toString();
            
            Swal.fire({
                title: 'Reset Password',
                html: `
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">New Password for ${username}</label>
                        <input type="password" id="newPassword" class="form-control" placeholder="Enter new password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm new password">
                    </div>
                `,
                showCancelButton: true,
                confirmButtonText: 'Reset',
                cancelButtonText: 'Cancel',
                focusConfirm: false,
                preConfirm: () => {
                    const password = $('#newPassword').val();
                    const confirmPassword = $('#confirmPassword').val();
                    
                    if (!password || !confirmPassword) {
                        Swal.showValidationMessage('Both fields are required');
                        return false;
                    }
                    
                    if (password !== confirmPassword) {
                        Swal.showValidationMessage('Passwords do not match');
                        return false;
                    }
                    
                    if (password.length < 6) {
                        Swal.showValidationMessage('Password must be at least 6 characters');
                        return false;
                    }
                    
                    return { username: username, password: password };
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    const { username, password } = result.value;
                    
                    // Show loading indicator
                    Swal.fire({
                        title: 'Processing...',
                        html: 'Resetting password...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    
                    // Make API call
                    axios.post('https://oncard.id/app/api/v1/password/reset-pwd', {
                        username: username,
                        new_password: password
                    },{headers: {
                                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                                }})
                    .then(response => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Password has been reset successfully',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    })
                    .catch(error => {
                        console.error('Error resetting password:', error);
                        let errorMessage = 'Failed to reset password';
                        if (error.response && error.response.data && error.response.data.message) {
                            errorMessage = error.response.data.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: errorMessage
                        });
                    });
                }
            });
        });

        // Add this function to calculate filtered summary
        function updateFilteredSummary(selectedOrg) {
            const filteredData = table.rows({ search: 'applied' }).data().toArray();
            
            let filteredWaliCount = filteredData.length;
            let filteredActiveCount = 0;
            let filteredLoggedInCount = 0;
            let filteredInactiveCount = 0;
            
            filteredData.forEach(row => {
                const hasLoggedIn = row.token_firebase != null;
                const isConnected = row.siswa && row.siswa.length > 0;
                
                if (hasLoggedIn && isConnected) {
                    filteredActiveCount++;
                } else if (hasLoggedIn && !isConnected) {
                    filteredLoggedInCount++;
                } else if (!hasLoggedIn && !isConnected) {
                    filteredInactiveCount++;
                }
            });
            
            // Calculate connection rate (percentage of active connected from total filtered)
            const connectionRate = filteredWaliCount > 0 
                ? Math.round((filteredActiveCount / filteredWaliCount) * 100)
                : 0;
            
            // Update the UI
            if (selectedOrg) {
                $('#filteredSummaryRow').show();
                $('#filterTitle').text(`(Filter: ${selectedOrg})`);
                $('#filteredWaliCount').text(filteredWaliCount);
                $('#filteredActiveCount').text(filteredActiveCount);
                $('#filteredLoggedInCount').text(filteredLoggedInCount);
                $('#filteredInactiveCount').text(filteredInactiveCount);
                
                // Update connection rate visualization
                $('#filteredConnectionRate').text(`${connectionRate}%`);
                $('#connectionRateBar').css('width', `${connectionRate}%`);
                
                // Color code based on rate
                const rateBar = $('#connectionRateBar');
                rateBar.removeClass('bg-danger bg-warning bg-success');
                
                if (connectionRate < 30) {
                    rateBar.addClass('bg-danger');
                } else if (connectionRate < 70) {
                    rateBar.addClass('bg-warning');
                } else {
                    rateBar.addClass('bg-success');
                }
            } else {
                $('#filteredSummaryRow').hide();
            }
        }

            function updateOrganisasiDropdown() {
                    let organisasiCounts = {}; // Object to store counts

                    // Loop through table data and count occurrences
                    table.rows().data().each(function (row) {
                        if (Array.isArray(row.siswa)) {
                            row.siswa.forEach((siswa) => {
                                let orgName = siswa.siswa.organisasi.name;
                                organisasiCounts[orgName] = (organisasiCounts[orgName] || 0) + 1;
                            });
                        }
                    });

                    // Populate the dropdown
                    let dropdown = $('#organisasiFilter');
                    dropdown.empty(); // Clear previous options
                    dropdown.append('<option value="">Filter by Instansi</option>'); // Default option

                    $.each(organisasiCounts, function (orgName, count) {
                        dropdown.append(`<option value="${orgName}">${orgName}</option>`);
                    });
                }


            $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
        </script>