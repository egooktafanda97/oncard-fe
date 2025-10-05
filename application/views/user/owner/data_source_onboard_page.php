
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .template-card {
        border-radius: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    .template-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .template-icon {
        font-size: 2rem;
        margin-bottom: 15px;
    }
    .download-btn {
        border-radius: 8px;
        font-weight: 500;
        padding: 8px 20px;
    }
    .global-params {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Data Source Templates</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Template Export</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card" style="border-radius:15px;">
            <div class="card-body">
                <h5 class="card-title">Pilih Template Export</h5>
                <p class="text-muted">Pilih template yang sesuai dengan kebutuhan laporan Anda</p>
                
                <!-- Global Parameters -->
                <div class="global-params">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kode Instansi</label>
                            <input type="text" class="form-control" id="global-kode-instansi" 
                                   value="467.598.080" placeholder="Masukkan kode instansi">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Limit Data</label>
                            <select class="form-select" id="global-take">
                                <option value="10">10 records</option>
                                <option value="50">50 records</option>
                                <option value="100" selected>100 records</option>
                                <option value="500">500 records</option>
                                <option value="1000">1000 records</option>
                                <option value="0">Semua Data</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-3">
                    <!-- Template 1: Riwayat Belanja Anak -->
                    <div class="col">
                        <div class="card template-card h-100">
                            <div class="card-body text-center">
                                <div class="template-icon text-primary">
                                    <i class="fas fa-shopping-basket"></i>
                                </div>
                                <h5 class="card-title">Riwayat Belanja Anak</h5>
                                <p class="card-text text-muted">Transaksi pembelian oleh siswa</p>
                                <button type="button" class="btn btn-primary download-btn template-download" 
                                        data-trx-type="buy">
                                    <i class="fas fa-download me-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 2: Penjualan Kantin -->
                    <div class="col">
                        <div class="card template-card h-100">
                            <div class="card-body text-center">
                                <div class="template-icon text-success">
                                    <i class="fas fa-store"></i>
                                </div>
                                <h5 class="card-title">Penjualan Kantin</h5>
                                <p class="card-text text-muted">Transaksi penjualan oleh kantin</p>
                                <button type="button" class="btn btn-success download-btn template-download" 
                                        data-trx-type="sell">
                                    <i class="fas fa-download me-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 3: Riwayat Topup -->
                    <div class="col">
                        <div class="card template-card h-100">
                            <div class="card-body text-center">
                                <div class="template-icon text-info">
                                    <i class="fas fa-wallet"></i>
                                </div>
                                <h5 class="card-title">Riwayat Topup</h5>
                                <p class="card-text text-muted">Transaksi pengisian saldo</p>
                                <button type="button" class="btn btn-info download-btn template-download" 
                                        data-trx-type="top_up"
                                        >
                                    <i class="fas fa-download me-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 4: Pencairan Dana -->
                    <div class="col">
                        <div class="card template-card h-100">
                            <div class="card-body text-center">
                                <div class="template-icon text-warning">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <h5 class="card-title">Pencairan Dana</h5>
                                <p class="card-text text-muted">Transaksi penarikan saldo</p>
                                <button type="button" class="btn btn-warning download-btn template-download text-white" 
                                        data-trx-type="withdrawal">
                                    <i class="fas fa-download me-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 5: Fee Admin Payment Gateway -->
                    <div class="col">
                        <div class="card template-card h-100">
                            <div class="card-body text-center">
                                <div class="template-icon text-danger">
                                    <i class="fas fa-percentage"></i>
                                </div>
                                <h5 class="card-title">Fee Admin Payment</h5>
                                <p class="card-text text-muted">Biaya admin transaksi</p>
                                <button type="button" class="btn btn-danger download-btn template-download" 
                                        data-account-level="owner" 
                                        data-account-type="business">
                                    <i class="fas fa-download me-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Template 6: Pembayaran Tagihan Sekolah -->
                    <div class="col">
                        <div class="card template-card h-100">
                            <div class="card-body text-center">
                                <div class="template-icon text-secondary">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <h5 class="card-title">Pembayaran Tagihan Sekolah</h5>
                                <p class="card-text text-muted">Transaksi pembayaran sekolah</p>
                                <button type="button" class="btn btn-secondary download-btn template-download" 
                                        data-account-type="billing">
                                    <i class="fas fa-download me-1"></i> Download
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Custom Export Option -->
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-sliders-h me-2"></i>Export Custom</h5>
                        <p class="text-muted">Atur parameter export sesuai kebutuhan Anda</p>
                        <a href="<?= base_url('CPanel_Admin/DataSourceONBOARDAdvanced') ?>" class="btn btn-outline-primary">
                            <i class="fas fa-cog me-1"></i> Custom Export
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set default date range
    const today = new Date().toISOString().split('T')[0];
    const sevenDaysAgo = new Date();
    sevenDaysAgo.setDate(sevenDaysAgo.getDate() - 7);
    const sevenDaysAgoStr = sevenDaysAgo.toISOString().split('T')[0];
    
    // Handle template downloads
    document.querySelectorAll('.template-download').forEach(button => {
        button.addEventListener('click', function() {
            // Get global parameters
            const kodeInstansi = document.getElementById('global-kode-instansi').value;
            const take = document.getElementById('global-take').value;
            
            // Create form dynamically
            const form = document.createElement('form');
            form.action = "<?= site_url('DataDownload/export_jurnal_csv') ?>";
            form.method = "GET";
            form.target = "_blank";
            
            // Add hidden inputs
            const addInput = (name, value) => {
                if (value) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    input.value = value;
                    form.appendChild(input);
                }
            };
            
            // Add common parameters
            addInput('date_from', sevenDaysAgoStr);
            addInput('date_to', today);
            addInput('kode_instansi', kodeInstansi);
            addInput('take', take);
            
            // Add template-specific parameters
            if (this.dataset.trxType) {
                addInput('trx_type', this.dataset.trxType);
            }
            if (this.dataset.accountLevel) {
                addInput('account_level', this.dataset.accountLevel);
            }
            if (this.dataset.accountType) {
                addInput('account_type', this.dataset.accountType);
            }
            
            // Submit form
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        });
    });
});
</script>