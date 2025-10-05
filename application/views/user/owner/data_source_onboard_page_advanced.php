<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .btn-export {
        background-color: #4e73df;
        color: white;
        font-weight: bold;
        padding: 10px 25px;
        border-radius: 8px;
    }
    .btn-export:hover {
        background-color: #3a5bc7;
        color: white;
    }
    .form-label {
        font-weight: 500;
        color: #5a5c69;
    }
    .header {
        border-bottom: 1px solid #e3e6f0;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }
    .param-preview {
        max-height: 200px;
        overflow-y: auto;
        background: #f8f9fa;
        padding: 10px;
        border-radius: 5px;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data Source OnBoard Generator</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Generator Data Source(s)</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card" style="border-radius:15px;">
            <div class="card-body">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-header bg-primary text-white" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);font-size:1em;">
                                    <h4 class="mb-0 py-3" style="color:white; font-weight:600;"><i class="fas fa-file-export me-2"></i> Export Laporan Jurnal Oncard</h4>
                                </div>
                                
                                <div class="card-body">
                                    <form id="exportForm" method="GET" target="_blank">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Tanggal Mulai</label>
                                                <input type="date" class="form-control" name="date_from" 
                                                    value="<?= date('Y-m-d', strtotime('0 days')) ?>" max="<?= date('Y-m-d') ?>" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Tanggal Akhir</label>
                                                <input type="date" class="form-control" name="date_to" 
                                                    value="<?= date('Y-m-d') ?>" max="<?= date('Y-m-d') ?>" required>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Kode Instansi</label>

                                                <!-- <input type="text" class="form-control" name="kode_instansi" 
                                                    value="4CC.C91.193" placeholder="Masukkan kode instansi"> -->
                                                    <select class="form-control" name="kode_instansi" id="kode_instansi">
                                                        <option value="">Pilih salah satu instansi</option>
                                                        <?php foreach($instansi_data as $row){ ?>
                                                            <option value="<?=$row->kode_instansi;?>"><?=$row->nama;?></option>
                                                        <?php } ?>
                                                    </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Limit Data</label>
                                                <select class="form-select" name="take">
                                                    <option value="10" selected>10 records</option>
                                                    <option value="100" >100 records</option>
                                                    <option value="500">500 records</option>
                                                    <option value="1000">1000 records</option>
                                                    <option value="0">Semua Data</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Tipe Transaksi</label>
                                                <select class="form-select" name="trx_type">
                                                    <option value="" selected>Semua Tipe Transaksi</option>
                                                    <option value="top_up">Top Up</option>
                                                    <option value="topup_via_vendor">Top Up Edupay</option>
                                                    <option value="withdrawal">Withdrawal</option>
                                                    <option value="buy">Buy</option>
                                                    <option value="sell">Sell</option>
                                                    <option value="transfer">Transfer</option>
                                                    <option value="distribution" >Distribusi</option>
                                                    <option value="topup_via_vendor" >topup_via_vendor</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Level Akun</label>
                                                <select class="form-select" name="account_level">
                                                    <option value="" selected>Semua Level</option>
                                                    <option value="owner">Owner</option>
                                                    <option value="seller" >Seller</option>
                                                    <option value="users">Users</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label">Tipe Akun</label>
                                            <select class="form-select" name="account_type">
                                                <option value="" selected>Semua Tipe Akun</option>
                                                <option value="billing" >Billing</option>
                                                <option value="billing_cash" >Billing Cash</option>
                                                <option value="business">Business</option>
                                                <option value="primary">Primary</option>
                                            </select>
                                        </div>
                                        
                                        <!-- Preview Section -->
                                        <div class="card mb-4">
                                            <div class="card-header bg-light">
                                                <h6 class="mb-0"><i class="fas fa-code me-2"></i> Parameter yang akan dikirim</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="param-preview">
                                                    <code id="apiPreview">Mengisi form akan menampilkan parameter di sini...</code>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                            <button type="reset" class="btn btn-outline-secondary me-md-2">
                                                <i class="fas fa-undo me-1"></i> Reset
                                            </button>
                                            <button type="submit" class="btn btn-primary" id="exportBtn" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);">
                                                <i class="fas fa-file-excel me-1"></i> Export CSV
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('exportForm');
    const apiPreview = document.getElementById('apiPreview');
    const exportBtn = document.getElementById('exportBtn');
    let kode_instansi = document.getElementById('kode_instansi');


    // Set default action with base URL
    form.action = "<?= site_url('DataDownload/export_jurnal_csv_advanced') ?>";
    
    // Update API preview when form changes
    form.addEventListener('input', updateApiPreview);
    
    function updateApiPreview() {
        const formData = new FormData(form);
        const params = new URLSearchParams();
        
        // Only include parameters with values
        for (const [key, value] of formData.entries()) {
            if (value && value.trim() !== '') {
                params.append(key, value);
            }
        }
        
        apiPreview.textContent = `GET ${form.action}?${params.toString()}`;
    }
    
    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Disable button to prevent multiple clicks
        exportBtn.disabled = true;
        exportBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Processing...';
        
        const formData = new FormData(form);
        const params = new URLSearchParams();
        
        // Filter out empty values
        for (const [key, value] of formData.entries()) {
            if (value && value.trim() !== '') {
                params.append(key, value);
            }
        }
        
        // Submit the form with only non-empty parameters
        const exportWindow = window.open(`${form.action}?${params.toString()}`, '_blank');
        
        // Re-enable button after 3 seconds (in case window fails to open)
        setTimeout(() => {
            exportBtn.disabled = false;
            exportBtn.innerHTML = '<i class="fas fa-file-excel me-1"></i> Export CSV';
        }, 3000);
        
        // Focus back on the window if possible
        if (exportWindow) {
            exportWindow.focus();
        }
    });
    
    // Date validation
    const dateFrom = form.querySelector('[name="date_from"]');
    const dateTo = form.querySelector('[name="date_to"]');
    
    dateTo.addEventListener('change', function() {
        dateFrom.max = this.value;
    });
    
    // Initial preview update
    updateApiPreview();
});
</script>