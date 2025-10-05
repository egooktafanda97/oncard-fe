<style>
.service-management-table tr td[colspan="10"] {
  background-color: #e9ecef;
  font-size: 1rem;
  font-weight: 600;
}

</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Agensi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Agensi</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);">
                            <h4 class="mb-0"  style="font-weight:bolder; color:white;"><i class='bx bx-building-house mr-2'></i> Instansi Menunggu Konfirmasi</h4>
                        </div>
                            <div class="card-body" style="padding:0px!important;">
                            <div class="table-responsive">
                                <table class="table mb-0 service-management-table">
                                <thead class="table-light">
                                    <tr>
                                    <th>No.</th>
                                    <th colspan="4">Institution</th>
                                    
                                    </tr>
                                </thead>
                                <tbody class="service-management-content">
                                    <tr>
                                    <td colspan="7" class="text-center">Loading data...</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>


			</div>
		</div>

        <div class="modal fade" id="modalImportData" tabindex="-1" aria-hidden="true"   data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Import Data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                        <label for="kodeInstansi" >Kode Instansi</label>
						<input type="text" disabled id="kodeInstansi" class="form-control mb-3">

                        <label for="tipeImport" class="">Tipe Import</label>
                        <select id="tipe" class="form-control mb-3">
                            <option value="">Pilih tipe import</option>
                            <option value="siswa">Santri / Siswa</option>
                            <option value="general">General</option>
                        </select>

                        <label for="file">File</label>
                        <input type="file" class="form-control" id="file">
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" onclick="commitUpload();" id="btnUpload" class="btn btn-outline-primary">Mulai Import Data</button>
					</div>
				</div>
			</div>
		</div>
        
        
        <div class="modal fade" id="modalLoginByPass" tabindex="-1" aria-hidden="true"   data-bs-keyboard="false" data-bs-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Login By Pass Root</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                        <label for="namaInstansi" >ID Instansi</label>
						<input type="text" disabled id="namaInstansi" class="form-control mb-3">
                        
                        <label for="userInstansi" >Username</label>
						<input type="text" disabled id="userInstansi" class="form-control mb-3">
					</div>
					<div class="modal-footer text-center">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" id="btnCommitLoginReport" class="btn btn-outline-danger">Show Report</button>
						<button type="button" id="btnCommitLogin" class="btn btn-outline-primary">Commit Login</button>
					</div>
				</div>
			</div>
		</div>

        <div class="modal fade" id="activationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Activate Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    <label class="form-label">Institution Code</label>
                    <input type="text" class="form-control" id="modalInstitutionCode" readonly>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Service Provider</label>
                    <input type="text" class="form-control" id="modalServiceProvider" readonly>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Expiration Days</label>
                    <input type="number" class="form-control" id="modalExpiredDays" value="1000" min="1">
                    <div class="form-text">Number of days until service expires</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmActivation">Confirm Activation</button>
                </div>
                </div>
            </div>
        </div>


		<script type="text/javascript">

            let idsett = '';

            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });
            
			$(document).ready(function () {

                loadServiceManagement();

            });
			
            function loadServiceManagement() {
    const tbody = document.querySelector('.service-management-content');
    tbody.innerHTML = '<tr><td colspan="10" class="text-center">Loading data...</td></tr>';

    axios.get('https://api.qrion.id/qms/institution-service-providers', {
        headers: {
            'Authorization': 'Bearer ' + localStorage.getItem('_is_admin')
        }
    })
    .then(response => {
        const data = response.data; 
        if (!data || data.length === 0) {
            tbody.innerHTML = `
                <tr>
                    <td colspan="10" class="text-center">No data available</td>
                </tr>
            `;
            return;
        }

        // Group by institution_id
        const grouped = {};
        data.forEach(item => {
            const instId = item.institution_id;
            if (!grouped[instId]) {
                grouped[instId] = {
                    institution: item.institution,
                    services: []
                };
            }

            grouped[instId].services.push({
                provider: item.serviceProvider ? item.serviceProvider.name : '-',
                joinMethod: item.join_method,
                activeSince: item.created_at,
                activeUntil: item.service_expired_at
            });
        });

        // Render rows
        let rows = '';
        Object.values(grouped).forEach((g, index) => {
            const inst = g.institution;
            const address = [inst.address1, inst.address2, inst.address3].filter(Boolean).join(', ');

            // Services table for better structure
            const servicesHtml = `
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Service Provider</th>
                                <th>Join Method</th>
                                <th>Active Since</th>
                                <th>Active Until</th>
                                <th>Days Remaining</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${g.services.map(s => {
                                const activeSince = new Date(s.activeSince).toLocaleDateString('id-ID');
                                const activeUntil = new Date(s.activeUntil).toLocaleDateString('id-ID');
                                const today = new Date();
                                const expDate = new Date(s.activeUntil);
                                const diffTime = expDate - today;
                                const sisaHari = diffTime > 0 ? Math.ceil(diffTime / (1000 * 60 * 60 * 24)) : 0;
                                
                                let statusClass = 'bg-success';
                                if (sisaHari <= 7) statusClass = 'bg-warning text-dark';
                                if (sisaHari <= 3) statusClass = 'bg-danger';
                                if (sisaHari === 0) statusClass = 'bg-secondary';
                                
                                let statusJoinMethod = 'bg-success';
                                if (s.joinMethod =='KONTRAK') statusJoinMethod = 'bg-warning text-dark';
                                if (s.joinMethod =='TOPUP') statusJoinMethod = 'bg-danger';
                                if (s.joinMethod =='TRANSAKSI') statusJoinMethod = 'bg-primary';

                                return `
                                    <tr>
                                        <td><strong>${s.provider}</strong></td>
                                        <td><span class="badge ${statusJoinMethod}">${s.joinMethod}</span></td>
                                        <td>${activeSince}</td>
                                        <td>${activeUntil}</td>
                                        <td><span class="badge ${statusClass}">${sisaHari} days</span></td>
                                    </tr>
                                `;
                            }).join('')}
                        </tbody>
                    </table>
                </div>
            `;

            rows += `
                <tr class="institution-row">
                    <td class="align-top text-center">${index + 1}</td>
                    <td class="align-top" style="max-width: 350px; width: 350px;">
                        <div class="fw-bold text-success">${inst.name}</div>
                        
                        <div class="mt-1"><span class="badge bg-light text-dark border">${inst.institution_code}</span></div>
                    </td>
                    <td class="align-top" colspan="4">
                        ${servicesHtml}
                    </td>
                </tr>
            `;
        });

        tbody.innerHTML = rows;
    })
    .catch(error => {
        console.error('Error loading data:', error);
        tbody.innerHTML = `
        <tr>
            <td colspan="10" class="text-center text-danger">
                <div class="alert alert-danger mb-0">
                    <i class="fas fa-exclamation-triangle"></i> Error loading data: ${error.message}
                </div>
            </td>
        </tr>
        `;
    });
}
		</script>