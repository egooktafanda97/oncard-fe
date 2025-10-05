<!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Before </body> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<style>
    .card {
    max-width: 400px;
    margin: 10px auto;
    background-color: #ffffff;
    border-radius: 16px;
    transition: box-shadow 0.3s ease-in-out;
}

.form-section h4 {
    font-weight:900;
}

.card:hover {
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
}

.btn-primary {
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    border: none;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #1cc88a, #4e73df);
}

.nav-link.active {
      background-color: #0d6efd;
      color: #fff !important;
    }
    .form-section {
      display: none;
    }
    .form-section.active {
      display: block;
    }

    .transfer-details-card {
    max-width: 100%;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.transfer-details-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
}

.transfer-header {
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    color: white;
    padding: 18px 24px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.transfer-header h3 {
    margin: 0;
    font-weight: 600;
    font-size: 1.25rem;
}

.transfer-header svg {
    stroke: white;
}

.transfer-body {
    padding: 24px;
}

.status-summary {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
    padding-bottom: 16px;
    border-bottom: 1px solid #f0f0f0;
}

.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.success {
    background-color: #e6f7ee;
    color: #1cc88a;
}

.status-badge.pending {
    background-color: #fff8e6;
    color: #f6c23e;
}

.status-badge.failed {
    background-color: #fde8e8;
    color: #e74a3b;
}

.amount-display {
    font-size: 1.5rem;
    font-weight: 700;
    color: #2d3748;
}

.detail-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}

.detail-column {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.detail-label {
    font-size: 0.75rem;
    color: #718096;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 4px;
}

.detail-value {
    font-size: 0.9375rem;
    color: #2d3748;
    font-weight: 500;
    word-break: break-all;
}

@media (max-width: 768px) {
    .detail-grid {
        grid-template-columns: 1fr;
    }
    
    .status-summary {
        flex-direction: column;
        align-items: flex-start;
        gap: 12px;
    }
}

</style>

<style>
.account-info-card {
  max-width: 100%;
  background: white;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  overflow: hidden;
  margin-bottom: 70px;
  border: 1px solid #f0f0f0;
}

.account-info-header {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 20px;
  background: linear-gradient(135deg, #f8f9fa, #ffffff);
  border-bottom: 1px solid #f0f0f0;
}

.user-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: linear-gradient(135deg, #4e73df, #1cc88a);
  display: flex;
  align-items: center;
  justify-content: center;
}

.user-avatar svg {
  width: 24px;
  height: 24px;
  stroke: white;
}

.account-info-header h3 {
  margin: 0;
  font-size: 1.25rem;
  color: #2d3748;
  font-weight: 600;
}

.account-info-body {
  padding: 20px;
}

.info-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 0;
  border-bottom: 1px solid #f8f9fa;
}

.info-item:last-child {
  border-bottom: none;
}

.info-label {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.875rem;
  color: #718096;
}

.info-label svg {
  stroke: #718096;
}

.info-value {
  font-size: 0.9375rem;
  font-weight: 500;
  color: #2d3748;
  text-align: right;
}

@media (max-width: 576px) {
  .info-item {
    flex-direction: column;
    align-items: flex-start;
    gap: 4px;
  }
  
  .info-value {
    text-align: left;
    width: 100%;
    padding-left: 32px;
  }
}
</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="max-width:100%;">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-7 text-start">
                                            <h5 style="font-weight:900;margin-bottom:0">SNAP BI DEV</h5>
                                            <p style="font-size:12px; margin:0;padding:0">Fitur ini dalam tahap uji coba. Versi 1.0.0</p>
                                            <button type="button" class="btn btn-sm btn-outline-secondary mt-2" style="font-size:11px; padding:5px!important;" onclick="window.location.href='<?=base_url();?>CPanel_Admin/Apps'"><i class="bx bxs-lock"></i>Re-login</button>
                                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" style="font-size:11px; padding:5px!important;" onclick="location.reload();"><i class="bx bx-refresh"></i>Refresh</button>
                                        </div>
                                        <div class="col-5 text-end">
                                        <img src="https://oncard.id/assets_oncard/logo/logo_dongker.png" alt="" style="width:100px;margin-top:10px;margin-right:25px;">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Logo_BRK_Syariah.png/1200px-Logo_BRK_Syariah.png" alt="" style="width:130px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
			  
                <div class="container-fluid py-4">
                    <div class="row">
                        <!-- Sidebar -->
                        <div class="col-md-3">
                        <div class="list-group">
                            <!-- <a href="#" class="list-group-item list-group-item-action active" data-target="authForm">Authentication</a> -->
                            <a href="#" class="list-group-item list-group-item-action" data-target="balanceForm">Balance Inquiry</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="statementForm">Bank Statement</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="internalForm">Internal Account Inquiry</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="externalForm">External Account Inquiry</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="api17Form">Intrabank Transfer (Sesama BRK Syariah)</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="api18Form">Interbank Transfer (Selain BRK Syariah)</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="api22Form">Transfer RTGS</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="api23Form">Transfer SKN</a>
                            <a href="#" class="list-group-item list-group-item-action" data-target="api36Form">Transaction Status Inquiry</a>

                        </div>
                        </div>

                        <!-- Content -->
                        <div class="col-md-9">
                        <!-- Balance Inquiry Form -->
                        <div id="balanceForm" class="form-section">
                            <h4>Balance Inquiry</h4>
                            <form>
                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">Account Number</label>
                                <input type="text" class="form-control" value="8212125080" id="accountNumber">
                            </div>
                            <button class="btn btn-primary" type="button" id="btn_checkbalance" onclick="checkBalance();">Check Balance</button>
                            </form>

                            <div class="row">
                                <div class="col-12">
                                    <div id="balanceResult" class="mt-3"></div>
                                </div>
                            </div>
                            

                        </div>

                        <!-- Bank Statement Form -->
                        <div id="statementForm" class="form-section">
                            <h4>Bank Statement</h4>
                            <form>
                            <div class="mb-3">
                                <label for="statementAccount" class="form-label">Account Number</label>
                                <input type="text" class="form-control" value="8212125080" id="statementAccount">
                            </div>
                            <div class="mb-3">
                                <label for="startDate" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="startDate">
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate">
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-sm btn-primary" onclick="setDateRange('today')">Today</button>
                                <button type="button" class="btn btn-sm btn-primary" onclick="setDateRange('yesterday')">Yesterday</button>
                                <button type="button" class="btn btn-sm btn-primary" onclick="setDateRange('3days')">Last 3 Days</button>
                                <button type="button" class="btn btn-sm btn-primary" onclick="setDateRange('7days')">Last 7 Days</button>
                                <button type="button" class="btn btn-sm btn-primary" onclick="setDateRange('30days')">Last 30 Days</button>
                            </div>

                            <button class="btn btn-primary" type="button" id="btn_statement" onclick="getBankStatement();">Get Statement</button>
                            </form>

                            <div id="statementResult" class="mt-4"></div>

                        </div>

                        <!-- Internal Account Inquiry -->
                        <div id="internalForm" class="form-section">
                            <h4>Internal Account Inquiry (BRK Syariah)</h4>
                            <form>
                            <div class="mb-3">
                                <label for="internalAccount" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="internalAccount">
                            </div>
                            <button class="btn btn-primary" id="btn_internal_inquiry" onclick="internalInquiry();" type="button">Search</button>
                            </form>

                            <div id="internalResult" class="mt-3"></div>
                        </div>

                        <!-- External Account Inquiry -->
                        <div id="externalForm" class="form-section">
                            <h4>External Account Inquiry (Non-BRK Syariah)</h4>
                            <form>
                            <div class="mb-3">
                                <label for="externalAccount" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="externalAccount">
                            </div>
                            <div class="mb-3">
                                <label for="bankCode" class="form-label">Bank Selection</label><br/>
                                <select class="form-control" id="bankCode" style="display:block;width:100%;padding:10px;">
                                    <option value="">Loading...</option>
                                </select>

                            </div>
                            <button class="btn btn-primary" id="btn_external_inquiry" onclick="externalInquiry();" type="button">Search</button>
                            </form>

                            <div id="externalResult" class="mt-3"></div>
                        </div>

                        <div id="api17Form" class="form-section">
                            <h4>Intrabank Transfer</h4>
                            <form id="form17">
                                <!-- Target Account -->
                                <div class="mb-3">
                                    <label>Target Account Number</label>
                                    <input type="text" class="form-control" id="targetAccount" placeholder="Enter target account number">
                                </div>

                                <!-- Check & Validate Button -->
                                <button type="submit" class="btn btn-primary" id="checkBtn">Check & Validate</button>

                                <div id="formStatus" class="p-2 ps-3 mt-3 fw-bold text-dark text-dark border-start border-5 border-info bg-light"></div>

                                <!-- Hidden Section: Amount & Submit -->
                                <div id="transferFields" class="d-none mt-3" style="margin-top:-50px!important;">
                                    <div class="mb-3">
                                        <label>Amount</label>
                                        <input type="text" class="form-control input_number" id="amount_intrabank" placeholder="Enter amount">
                                        <input type="hidden" class="input_number_value">

                                    </div>
                                    <div class="mb-3">
                                        <div class="mb-3">
                                        <label for="remark_intrabank" class="form-label">Remark</label>
                                        <input type="text" maxlength="20" class="form-control" placeholder="Input the remark. Max 20 characters." id="remark_intrabank">
                                        <small id="charCount" class="form-text text-muted">20 characters left</small>
                                        </div>

                                    </div>

                                    <button type="button" class="btn btn-primary" id="submitTransferBtn" onclick="intraBankTransfer()">Submit Transfer</button>
                                </div>

                                <div id="intraBankTransfer" class="mt-4"></div>

                                
                            </form>
                        </div>



                        <div id="api18Form" class="form-section">
                            <h4>Interbank Transfer</h4>
                            <form id="form18">
                                <div class="mb-3">
                                    <label>Target Account Number</label>
                                    <input type="text" class="form-control" id="targetAccountInter" placeholder="Enter target account number">
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" id="bankCodeInter" style="display:block;width:100%;padding:10px;">
                                        <option value="">Loading...</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" id="checkBtnInter">Check & Validate</button>
                            </form>

                            <div id="formStatusInter" class="p-2 ps-3 mt-3 fw-bold text-dark text-dark border-start border-5 border-info bg-light"></div>
                            <!-- Hidden Section: Amount & Submit -->
                            <div id="transferFieldsInter" class="d-none mt-5" style="margin-top:0px!important;">
                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="text" class="form-control input_number" id="amount_interbank" placeholder="Enter amount">
                                    <input type="hidden" class="input_number_value">
                                </div>

                                <button type="button" class="btn btn-primary" id="submitTransferBtnInter" onclick="interBankTransfer()">Submit Transfer</button>
                            </div>

                            <div id="interBankTransfer" class="mt-4"></div>

                        </div>

                        <div id="api22Form" class="form-section">
                        <h4>Transfer RTGS</h4>
                            <form id="form19">
                                <div class="mb-3">
                                    <label>Target Account Number</label>
                                    <input type="text" class="form-control" id="targetAccountRTGS" placeholder="Enter target account number">
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" id="bankCodeRTGS" style="display:block;width:100%;padding:10px;">
                                        <option value="">Loading...</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" id="checkBtnRTGS">Check & Validate</button>
                            </form>

                            <div id="formStatusRTGS" class="p-2 ps-3 mt-3 fw-bold text-dark text-dark border-start border-5 border-info bg-light"></div>
                            <!-- Hidden Section: Amount & Submit -->
                            <div id="transferFieldsRTGS" class="d-none" style="margin-top:0px!important;">
                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="text" class="form-control input_number" id="amount_rtgs" placeholder="Enter amount">
                                    <input type="hidden" class="input_number_value">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Beban Fee Ke:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bebanFee2" id="feeSender1" value="OUR" checked>
                                        <label class="form-check-label" for="feeSender1">Pengirim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bebanFee2" id="feeReceiver1" value="BEN">
                                        <label class="form-check-label" for="feeReceiver1">Penerima</label>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary" id="submitTransferBtnRTGS" onclick="rtgsTransfer()">Submit Transfer</button>
                            </div>

                            <div id="rtgsTransfer" class="mt-1"></div>
                            

                        </div>

                        <div id="api23Form" class="form-section">
                            <h4>Transfer SKN</h4>
                            <form id="form20">
                                <div class="mb-3">
                                    <label>Target Account Number</label>
                                    <input type="text" class="form-control" id="targetAccountSKN" placeholder="Enter target account number">
                                </div>
                                <div class="mb-3">
                                    <select class="form-control" id="bankCodeSKN" style="display:block;width:100%;padding:10px;">
                                        <option value="">Loading...</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" id="checkBtnSKN">Check & Validate</button>
                            </form>

                            <div id="formStatusSKN" class="p-2 ps-3 mt-3 fw-bold text-dark text-dark border-start border-5 border-info bg-light"></div>
                            <!-- Hidden Section: Amount & Submit -->
                            <div id="transferFieldsSKN" class=" mt-3" style="margin-top:0px!important;">
                                <div class="mb-3">
                                    <label>Amount</label>
                                    <input type="text" class="form-control input_number" id="amount_skn" placeholder="Enter amount">
                                    <input type="hidden" class="input_number_value">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label d-block">Beban Fee Ke:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bebanFee" id="feeSender" value="OUR" checked>
                                        <label class="form-check-label" for="feeSender">Pengirim</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="bebanFee" id="feeReceiver" value="BEN">
                                        <label class="form-check-label" for="feeReceiver">Penerima</label>
                                    </div>
                                </div>


                                <button type="button" class="btn btn-primary" id="submitTransferBtnSKN" onclick="sknTransfer()">Submit Transfer</button>
                            </div>

                            <div id="sknTransfer" class="mt-1"></div>
                        </div>

                        <div id="api36Form" class="form-section">
                        <h4>Transaction Status Inquiry</h4>
                        <form>
                            <div class="mb-3"><label>Transaction ID</label><input type="text" class="form-control" id="valueCheck"></div>
                            <div class="mb-3"><label>Nominal Value</label><input type="text" class="form-control" id="nominalCheck"></div>
                            <button type="submit" class="btn btn-primary" id="checkStatusBtn" onclick="checkStatusInquiry();">Check Status</button>

                            <div id="checkStatus" class="p-2 ps-3 mt-3 fw-bold text-dark text-dark border-start border-5 border-info bg-light"></div>
                        </form>
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

        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>

    <script>
    const input = document.getElementById('remark_intrabank');
    const charCount = document.getElementById('charCount');
    const maxLength = 20;

    input.addEventListener('input', function () {
        const remaining = maxLength - input.value.length;
        charCount.textContent = `${remaining} characters left`;
    });
    </script>

    <script>
    document.querySelectorAll('.input_number').forEach(input => {
    // Find the associated hidden input (next sibling with class input_number_value)
    const hiddenInput = input.nextElementSibling.classList.contains('input_number_value') 
        ? input.nextElementSibling
        : input.parentNode.querySelector('.input_number_value');
    
    input.addEventListener('input', function(e) {
        // Get cursor position
        const cursorPos = this.selectionStart;
        
        // Remove all non-digit characters
        let value = this.value.replace(/[^\d]/g, '');
        
        // Store raw value in hidden input
        if(hiddenInput) hiddenInput.value = value;
        
        // Format with thousand separators if not empty
        if(value) {
        value = parseInt(value, 10).toLocaleString('id-ID');
        }
        
        // Update display value
        this.value = value;
        
        // Restore cursor position (adjusting for added separators)
        const separatorCount = (this.value.match(/\./g) || []).length;
        const newCursorPos = cursorPos + separatorCount;
        this.setSelectionRange(newCursorPos, newCursorPos);
    });
    });
    </script>

    <script>

    let mode = 'OUR';

    // Watch for change on radio buttons
    document.querySelectorAll('input[name="bebanFee"]').forEach((elem) => {
        elem.addEventListener("change", function () {
            mode = this.value;
            console.log("Mode selected:", mode); // optional for debug
        });
    });
    
    document.querySelectorAll('input[name="bebanFee2"]').forEach((elem) => {
        elem.addEventListener("change", function () {
            mode = this.value;
            console.log("Mode selected:", mode); // optional for debug
        });
    });
    
    const navLinks = document.querySelectorAll('.list-group-item');
    const formSections = document.querySelectorAll('.form-section');

    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
        e.preventDefault();

        // Remove active class from all
        navLinks.forEach(item => item.classList.remove('active'));
        this.classList.add('active');

        // Hide all forms
        formSections.forEach(section => section.classList.remove('active'));

        // Show target form
        const target = this.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
        });
    });
    </script>

		<script type="text/javascript">

            function setDateRange(range) {
                const today = new Date();
                let startDate = new Date();

                switch (range) {
                    case 'today':
                        // Start = Today, End = Today
                        break;
                    case 'yesterday':
                        startDate.setDate(today.getDate() - 1);
                        today.setDate(today.getDate() - 1);
                        break;
                    case '3days':
                        startDate.setDate(today.getDate() - 2); // inclusive today
                        break;
                    case '7days':
                        startDate.setDate(today.getDate() - 6);
                        break;
                    case '30days':
                        startDate.setDate(today.getDate() - 29);
                        break;
                }

                document.getElementById("startDate").value = startDate.toISOString().split("T")[0];
                document.getElementById("endDate").value = today.toISOString().split("T")[0];

                applyDateFilter(); // Automatically apply after setting
            }

            function applyDateFilter() {
                const startDate = document.getElementById("startDate").value;
                const endDate = document.getElementById("endDate").value;

                if (!startDate || !endDate) {
                    alert("Please select both start and end dates.");
                    return;
                }

                const fromDateTime = `${startDate}T00:00:00+07:00`;

                let toDateTime;
                const todayString = new Date().toISOString().split("T")[0];
                if (endDate === todayString) {
                    const now = new Date();
                    const hours = now.getHours().toString().padStart(2, '0');
                    const minutes = now.getMinutes().toString().padStart(2, '0');
                    const seconds = now.getSeconds().toString().padStart(2, '0');
                    toDateTime = `${endDate}T${hours}:${minutes}:${seconds}+07:00`;
                } else {
                    toDateTime = `${endDate}T23:59:59+07:00`;
                }

                console.log("Filtered range:", fromDateTime, "to", toDateTime);

                // 🔁 Replace this with your actual filter call
                // fetchFilteredData(fromDateTime, toDateTime);
            }


            let idsett = '';
            let table;

            let target_norek_transfer;

            let target_nama_transfer;
            let target_bank_nama_transfer;

            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });

            async function checkBalance() {

                $("#btn_checkbalance").html('<span class="loader dot-pulse"></span>');
                $('#btn_checkbalance').prop("disabled", true);
                $("#btn_checkbalance").attr('style', 'cursor:not-allowed');

                const acct = document.getElementById('accountNumber').value.trim();
                const resultDiv = document.getElementById('balanceResult');

                // clear previous
                resultDiv.innerHTML = '';
                if (!acct) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please enter an account number.</div>';
                return;
                }

                // --- build request ---
                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                accountNo: acct,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbibalanceinquiry';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data) {

                        if(data.data.responseCode==parseInt(4031115)){
                            Toastify({
                            text: data.data.responseMessage,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                        $("#btn_checkbalance").html('Check Balance');
                        $('#btn_checkbalance').prop("disabled", false);
                        $("#btn_checkbalance").attr('style', 'cursor:pointer');

                        return false;
                        }

                        $("#btn_checkbalance").html('Check Balance');
                        $('#btn_checkbalance').prop("disabled", false);
                        $("#btn_checkbalance").attr('style', 'cursor:pointer');

                        const info = data.data;
                        const balRaw = info.accountInfos[0]?.availableBalance.value || 0;
                        const balRaw2 = info.accountInfos[0]?.availableBalance.currency || '-';
                        const bal = parseFloat(balRaw);

                        resultDiv.innerHTML = `
                            <div class="account-info-card">
                                <div class="account-info-header">
                                    <div class="user-avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    </div>
                                    <h3>Account Information</h3>
                                </div>
                                
                                <div class="account-info-body">
                                    <div class="info-item">
                                    <div class="info-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span>Name</span>
                                    </div>
                                    <div class="info-value">${info.name}</div>
                                    </div>
                                    
                                    <div class="info-item">
                                    <div class="info-label">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <span>Account No</span>
                                    </div>
                                    <div class="info-value">${info.accountNo}</div>
                                    </div>
                                    <div class="info-item">
                                    <div class="info-label">
                                    <svg fill="#000000" width="16px" height="16px" viewBox="0 0 24 24" id="wallet" data-name="Line Color" xmlns="http://www.w3.org/2000/svg" class="icon line-color"><path id="primary" d="M19,4H5A2,2,0,0,0,3,6H3A2,2,0,0,0,5,8H21" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="primary-2" data-name="primary" d="M21,8V19a1,1,0,0,1-1,1H4a1,1,0,0,1-1-1V6A2,2,0,0,0,5,8Z" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path><path id="secondary" d="M16,12h5a0,0,0,0,1,0,0v4a0,0,0,0,1,0,0H16a1,1,0,0,1-1-1V13A1,1,0,0,1,16,12Z" style="fill: none; stroke: rgb(44, 169, 188); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                                        <span>Available Balance</span>
                                    </div>
                                    <div class="info-value" style="font-weight:900;">
                                    ${formatRupiah(bal.toString()) ?? '-'} ${balRaw2 ?? ''}
                                    </div>
                                    </div>
                                </div>
                                </div>
                      `;

                        
                    } else {
                        resultDiv.innerHTML = `
                        <div class="alert alert-danger">
                            ${data.message || 'Unknown error'}
                        </div>`;

                        $("#btn_checkbalance").html('Check Balance');
                        $('#btn_checkbalance').prop("disabled", false);
                        $("#btn_checkbalance").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                const responseMessage = err.response?.data?.responseMessage || 'Unknown error : 66091';
                resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${responseMessage}</div>`;

                $("#btn_checkbalance").html('Check Balance');
                $('#btn_checkbalance').prop("disabled", false);
                $("#btn_checkbalance").attr('style', 'cursor:pointer');
                }
            }
            
            
            
            async function externalInquiry() {

                $("#btn_external_inquiry").html('<span class="loader dot-pulse"></span>');
                $('#btn_external_inquiry').prop("disabled", true);
                $("#btn_external_inquiry").attr('style', 'cursor:not-allowed');

                const acct = document.getElementById('externalAccount').value.trim();
                const bank_code = document.getElementById('bankCode').value.trim();
                const resultDiv = document.getElementById('externalResult');

                // clear previous
                resultDiv.innerHTML = '';
                if (!acct) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please enter an account number.</div>';
                return;
                }

                // --- build request ---
                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryBankCode: bank_code,
                beneficiaryAccountNo: acct,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbiaccountinquiryeksternal';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data) {

                        $("#btn_external_inquiry").html('Search');
                        $('#btn_external_inquiry').prop("disabled", false);
                        $("#btn_external_inquiry").attr('style', 'cursor:pointer');

                        const info = data.data;
                        resultDiv.innerHTML = `
                            <div class="card border-success" style="max-width:100%;">
                                <div class="card-header bg-success text-white" style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                                    Beneficiary Account Inquiry Result
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Name:</strong> ${info.beneficiaryAccountName}</li>
                                    <li class="list-group-item"><strong>Account:</strong> ${info.beneficiaryAccountNo}</li>
                                    <li class="list-group-item"><strong>Type:</strong> ${info.beneficiaryBankName}</li>
                                    <li class="list-group-item"><strong>Currency:</strong> ${info.currency}</li>
                                    <li class="list-group-item"><strong>Reference No:</strong> ${info.referenceNo}</li>
                                </ul>
                            </div>
                        `;

                        Toastify({
                            text: data.data.responseMessage,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                    } else {
                        resultDiv.innerHTML = `
                        <div class="alert alert-danger">
                            ${data.message || 'Unknown error'}
                        </div>`;
                        $("#btn_external_inquiry").html('Search');
                        $('#btn_external_inquiry').prop("disabled", false);
                        $("#btn_external_inquiry").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    const responseMessage = err.response?.data?.responseMessage || 'Unknown error : 66092';
                    resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${responseMessage}</div>`;
                    $("#btn_external_inquiry").html('Search');
                    $('#btn_external_inquiry').prop("disabled", false);
                    $("#btn_external_inquiry").attr('style', 'cursor:pointer');

                }
            }
            
            
            async function internalInquiry() {

                $("#btn_internal_inquiry").html('<span class="loader dot-pulse"></span>');
                $('#btn_internal_inquiry').prop("disabled", true);
                $("#btn_internal_inquiry").attr('style', 'cursor:not-allowed');

                const acct = document.getElementById('internalAccount').value.trim();
                const resultDiv = document.getElementById('internalResult');

                // clear previous
                resultDiv.innerHTML = '';
                if (!acct) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please enter an account number.</div>';
                return;
                }

                // --- build request ---
                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: acct,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbiaccountinquiryinternal';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data) {

                        $("#btn_internal_inquiry").html('Search');
                        $('#btn_internal_inquiry').prop("disabled", false);
                        $("#btn_internal_inquiry").attr('style', 'cursor:pointer');

                        const info = data.data;
                        resultDiv.innerHTML = `
                            <div class="card border-success" style="max-width:100%;">
                                <div class="card-header bg-success text-white" style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                                    Beneficiary Account Inquiry Result
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Name:</strong> ${info.beneficiaryAccountName}</li>
                                    <li class="list-group-item"><strong>Account:</strong> ${info.beneficiaryAccountNo}</li>
                                    <li class="list-group-item"><strong>Status:</strong> ${info.beneficiaryAccountStatus}</li>
                                    <li class="list-group-item"><strong>Type:</strong> ${info.beneficiaryAccountType}</li>
                                    <li class="list-group-item"><strong>Currency:</strong> ${info.currency}</li>
                                    <li class="list-group-item"><strong>Reference No:</strong> ${info.referenceNo}</li>
                                </ul>
                            </div>
                        `;

                        Toastify({
                            text: data.data.responseMessage,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                    } else {
                        resultDiv.innerHTML = `
                        <div class="alert alert-danger">
                            ${data.message || 'Unknown error'}
                        </div>`;
                        $("#btn_internal_inquiry").html('Search');
                        $('#btn_internal_inquiry').prop("disabled", false);
                        $("#btn_internal_inquiry").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    const responseMessage = err.response?.data?.responseMessage || 'Unknown error : 66093';
                    resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${responseMessage}</div>`;
                    $("#btn_internal_inquiry").html('Search');
                    $('#btn_internal_inquiry').prop("disabled", false);
                    $("#btn_internal_inquiry").attr('style', 'cursor:pointer');

                }
            }

            async function intraBankTransfer() {

                $("#submitTransferBtn").html('<span class="loader dot-pulse"></span>');
                $('#submitTransferBtn').prop("disabled", true);
                $("#submitTransferBtn").attr('style', 'cursor:not-allowed');

                const acct = target_norek_transfer;
                const bank_code = document.getElementById('bankCode').value.trim();
                const remark_intrabank = document.getElementById('remark_intrabank').value;
                let amount_intrabank_raw = document.getElementById('amount_intrabank').value.trim();
                amount_intrabank_raw = amount_intrabank_raw.split('.').join("");
                const amount_intrabank = parseFloat(amount_intrabank_raw || 0).toFixed(2);

                const resultDiv = document.getElementById('intraBankTransfer');

                // clear previous
                resultDiv.innerHTML = '';
                if (!acct) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please enter an account number.</div>';
                return;
                }

                // --- build request ---
                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                // partnerReferenceNo: 'PNX-1747641596438',
                beneficiaryAccountNo: acct,
                amount: {
                value: amount_intrabank,
                currency: "IDR"
                },
                customerReference: 'PNX-TRF-INTRA-' + Date.now(),
                feeType: "OUR",
                remark: remark_intrabank,
                sourceAccountNo: "8212125080", //akun number pnx
                transactionDate: Date.now(),
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbitransferintrabank';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data) {

                        $("#submitTransferBtn").html('Submit Transfer');
                        $('#submitTransferBtn').prop("disabled", false);
                        $("#submitTransferBtn").attr('style', 'cursor:pointer');

                        const info = data.data;
                        resultDiv.innerHTML = `
                            <div class="card border-success" style="max-width:100%!important;">
                                <div class="card-header bg-success text-white" style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                                    Transfer ${info.responseCode==4031718?'Failed':'Successful'}
                                </div>
                                <div class="card-body">
                                    <p><strong>Response Message:</strong> ${info.responseMessage}</p>
                                    <p><strong>Reference No:</strong> ${info.referenceNo}</p>
                                    <p><strong>Partner Reference No:</strong> ${info.partnerReferenceNo}</p>
                                    <p><strong>Amount:</strong> ${info.amount.value} ${info.amount.currency}</p>
                                    <p><strong>Source Account:</strong> ${info.sourceAccountNo}</p>
                                    <p><strong>Beneficiary Account:</strong> ${info.beneficiaryAccountNo}</p>
                                    <p><strong>Customer Reference:</strong> ${info.customerReference}</p>
                                    <p><strong>Transaction Date:</strong> ${new Date(info.transactionDate).toLocaleString()}</p>
                                    <p><strong>Device ID:</strong> ${info.additionalInfo.deviceId}</p>
                                    <p><strong>Channel:</strong> ${info.additionalInfo.channel}</p>
                                </div>
                            </div>
                        `;

                        $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", false);
                        $("#checkBtn").attr('style', 'cursor:pointer');


                    } else {
                        resultDiv.innerHTML = `
                        <div class="alert alert-danger">
                            ${data.message || 'Unknown error'}
                        </div>`;
                        $("#submitTransferBtn").html('Submit Transfer');
                        $('#submitTransferBtn').prop("disabled", false);
                        $("#submitTransferBtn").attr('style', 'cursor:pointer');
                        $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", false);
                        $("#checkBtn").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    const responseMessage = err.response?.data?.responseMessage || 'Unknown error : 66092';
                    resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${responseMessage}</div>`;
                    $("#submitTransferBtn").html('Submit Transfer');
                    $('#submitTransferBtn').prop("disabled", false);
                    $("#submitTransferBtn").attr('style', 'cursor:pointer');
                    $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", false);
                        $("#checkBtn").attr('style', 'cursor:pointer');

                }
            }


            async function interBankTransfer() {

                $("#submitTransferBtnInter").html('<span class="loader dot-pulse"></span>');
                $('#submitTransferBtnInter').prop("disabled", true);
                $("#submitTransferBtnInter").attr('style', 'cursor:not-allowed');

                const acct = target_norek_transfer;
                const bank_code = document.getElementById('bankCodeInter').value.trim();
                let amount_interbank_raw = document.getElementById('amount_interbank').value.trim();
                amount_interbank_raw = amount_interbank_raw.split('.').join("");
                const amount_interbank = parseFloat(amount_interbank_raw || 0).toFixed(2);

                if(amount_interbank<50000){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Minimal 50.000 IDR',
                        showConfirmButton: true,

                    });
                    $("#submitTransferBtnInter").html('Submit Transfer');
                    $('#submitTransferBtnInter').prop("disabled", false);
                    $("#submitTransferBtnInter").attr('style', 'cursor:pointer');
                    return false;
                }

                const resultDiv = document.getElementById('interBankTransfer');

                // clear previous
                resultDiv.innerHTML = '';
                if (!acct) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please enter an account number.</div>';
                return;
                }

                // --- build request ---
                const requestData = {
                "partnerReferenceNo": 'PNX-' + Date.now(),
                "amount": {
                    "value": amount_interbank,
                    "currency": "IDR"
                },
                "beneficiaryAccountName": target_nama_transfer,
                "beneficiaryAccountNo": acct,
                "beneficiaryBankCode": bank_code,
                "beneficiaryBankName": target_bank_nama_transfer,
                "customerReference": 'PNX-INTER-' + Date.now(),
                "sourceAccountNo": "8212125080",
                "transactionDate": Date.now(),
                "additionalInfo": {
                    "deviceId": "12345679237",
                    "channel": "mobilephone",
                    "channelId":"10000"
                    
                }
                }

                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbitransferinterbank';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data) {

                        $("#submitTransferBtnInter").html('Submit Transfer');
                        $('#submitTransferBtnInter').prop("disabled", false);
                        $("#submitTransferBtnInter").attr('style', 'cursor:pointer');

                        const info = data.data;
                        resultDiv.innerHTML = `
                            <div class="card border-success" style="max-width:100%!important;">
                                <div class="card-header bg-success text-white" style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                                    Transfer ${info.responseCode==4031718?'Failed':'Successful'}
                                </div>
                                <div class="card-body">
                                    <p><strong>Response Message:</strong> ${info.responseMessage}</p>
                                    <p><strong>Reference No:</strong> ${info.referenceNo}</p>
                                    <p><strong>Partner Reference No:</strong> ${info.partnerReferenceNo}</p>
                                    <p><strong>Amount:</strong> ${info.amount.value} ${info.amount.currency}</p>
                                    <p><strong>Source Account:</strong> ${info.sourceAccountNo}</p>
                                    <p><strong>Beneficiary Account:</strong> ${info.beneficiaryAccountNo}</p>
                                    <p><strong>Device ID:</strong> ${info.additionalInfo.deviceId}</p>
                                    <p><strong>Channel:</strong> ${info.additionalInfo.channel}</p>
                                </div>
                            </div>
                        `;

                        $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", false);
                        $("#checkBtn").attr('style', 'cursor:pointer');
                        $("#submitTransferBtnInter").html('Submit Transfer');
                        $('#submitTransferBtnInter').prop("disabled", false);
                        $("#submitTransferBtnInter").attr('style', 'cursor:pointer');


                    } else {
                        resultDiv.innerHTML = `
                        <div class="alert alert-danger">
                            ${data.message || 'Unknown error'}
                        </div>`;
                        $("#submitTransferBtnInter").html('Submit Transfer');
                        $('#submitTransferBtnInter').prop("disabled", false);
                        $("#submitTransferBtnInter").attr('style', 'cursor:pointer');
                        $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", false);
                        $("#checkBtn").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    const responseMessage = err.response?.data?.responseMessage || 'Unknown error : 66092';
                    resultDiv.innerHTML = `<div class="alert alert-danger">Error: ${responseMessage}</div>`;
                    $("#submitTransferBtnInter").html('Submit Transfer');
                    $('#submitTransferBtnInter').prop("disabled", false);
                    $("#submitTransferBtnInter").attr('style', 'cursor:pointer');
                    $("#checkBtn").html('Check & Validate');
                    $('#checkBtn').prop("disabled", false);
                    $("#checkBtn").attr('style', 'cursor:pointer');

                }
            }


            document.getElementById('form17').addEventListener('submit', async function(e) {
                e.preventDefault();

                $("#checkBtn").html('<span class="loader dot-pulse"></span>');
                $('#checkBtn').prop("disabled", true);
                $("#checkBtn").attr('style', 'cursor:not-allowed');

                const targetAccount = document.getElementById('targetAccount').value;
                const statusEl = document.getElementById('formStatus');
                const transferFields = document.getElementById('transferFields');

                statusEl.textContent = 'Checking target account...';
                transferFields.classList.add('d-none');

                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: targetAccount,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbiaccountinquiryinternal';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", true);
                        $("#checkBtn").attr('style', 'cursor:not-allowed');

                        target_norek_transfer = data.data.beneficiaryAccountNo;
                        const infoHtml = `
                            <div class="account-info-card">
                            <div class="account-info-header">
                                <div class="user-avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                </div>
                                <h3>Account Information</h3>
                            </div>
                            
                            <div class="account-info-body">
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Name</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountName}</div>
                                </div>
                                
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span>Account No</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountNo}</div>
                                </div>
                            </div>
                            </div>

                        `;

                        $('#formStatus').html(infoHtml);
                        transferFields.classList.remove('d-none');
                        
                    } else {
                        // $('#formStatus').html('<font class="text-danger">Target account not found.</font>');
                        $('#formStatus').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        $("#checkBtn").html('Check & Validate');
                        $('#checkBtn').prop("disabled", false);
                        $("#checkBtn").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    console.error(err);
                    statusEl.textContent = 'Error checking account.';
                }

            });
            
            
            document.getElementById('form18').addEventListener('submit', async function(e) {
                e.preventDefault();

                $("#checkBtnInter").html('<span class="loader dot-pulse"></span>');
                $('#checkBtnInter').prop("disabled", true);
                $("#checkBtnInter").attr('style', 'cursor:not-allowed');

                const targetAccount = document.getElementById('targetAccountInter').value;
                const statusEl = document.getElementById('formStatusInter');
                const transferFields = document.getElementById('transferFieldsInter');
                const bank_code = document.getElementById('bankCodeInter').value.trim();

                statusEl.textContent = 'Checking target account...';
                transferFields.classList.add('d-none');

                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: targetAccount,
                beneficiaryBankCode: bank_code,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbiaccountinquiryeksternal';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        $("#checkBtnInter").html('Check & Validate');
                        $('#checkBtnInter').prop("disabled", true);
                        $("#checkBtnInter").attr('style', 'cursor:not-allowed');

                        target_norek_transfer = data.data.beneficiaryAccountNo;
                        target_nama_transfer = data.data.beneficiaryAccountName;
                        target_bank_nama_transfer= data.data.beneficiaryBankName;

                        const infoHtml = `
                        <div class="account-info-card">
                            <div class="account-info-header">
                                <div class="user-avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                </div>
                                <h3>Account Information</h3>
                            </div>
                            
                            <div class="account-info-body">
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Name</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountName}</div>
                                </div>
                                
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span>Account No</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountNo}</div>
                                </div>
                            </div>
                            </div>
                        `;

                        $('#formStatusInter').html(infoHtml);
                        transferFields.classList.remove('d-none');
                        
                    } else {
                        // $('#formStatusInter').html('<font class="text-danger">Target account not found.</font>');
                        $('#formStatusInter').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        $("#checkBtnInter").html('Check & Validate');
                        $('#checkBtnInter').prop("disabled", true);
                        $("#checkBtnInter").attr('style', 'cursor:not-allowed');
                    }
                } catch (err) {
                    console.error(err);
                    statusEl.textContent = 'Error checking account.';
                }

            });
            

            document.getElementById('form19').addEventListener('submit', async function(e) {
                e.preventDefault();

                $("#checkBtnRTGS").html('<span class="loader dot-pulse"></span>');
                $('#checkBtnRTGS').prop("disabled", true);
                $("#checkBtnRTGS").attr('style', 'cursor:not-allowed');

                const targetAccount = document.getElementById('targetAccountRTGS').value;
                const statusEl = document.getElementById('formStatusRTGS');
                const transferFields = document.getElementById('transferFieldsRTGS');
                const bank_code = document.getElementById('bankCodeRTGS').value.trim();

                statusEl.textContent = 'Checking target account...';
                transferFields.classList.add('d-none');

                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: targetAccount,
                beneficiaryBankCode: bank_code,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbiaccountinquiryeksternal';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        $("#checkBtnRTGS").html('Check & Validate');
                        $('#checkBtnRTGS').prop("disabled", true);
                        $("#checkBtnRTGS").attr('style', 'cursor:not-allowed');

                        target_norek_transfer = data.data.beneficiaryAccountNo;
                        target_nama_transfer = data.data.beneficiaryAccountName;
                        target_bank_nama_transfer= data.data.beneficiaryBankName;

                        const infoHtml = `
                        <div class="account-info-card">
                            <div class="account-info-header">
                                <div class="user-avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                </div>
                                <h3>Account Information</h3>
                            </div>
                            
                            <div class="account-info-body">
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Name</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountName}</div>
                                </div>
                                
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span>Account No</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountNo}</div>
                                </div>
                            </div>
                            </div>
                        `;

                        $('#formStatusRTGS').html(infoHtml);
                        transferFields.classList.remove('d-none');
                        
                    } else {
                        $('#formStatusRTGS').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        $("#checkBtnRTGS").html('Check & Validate');
                        $('#checkBtnRTGS').prop("disabled", true);
                        $("#checkBtnRTGS").attr('style', 'cursor:not-allowed');
                    }
                } catch (err) {
                    console.error(err);
                    statusEl.textContent = 'Error checking account.';
                }

            });
            
            
            async function rtgsTransfer(){
                $("#submitTransferBtnRTGS").html('<span class="loader dot-pulse"></span>');
                $('#submitTransferBtnRTGS').prop("disabled", true);
                $("#submitTransferBtnRTGS").attr('style', 'cursor:not-allowed');

                const targetAccount = document.getElementById('targetAccountRTGS').value;
                const statusEl = document.getElementById('formStatusRTGS');
                const transferFields = document.getElementById('rtgsTransfer');
                const bank_code = document.getElementById('bankCodeRTGS').value.trim();

                let rtgs_amount = document.getElementById('amount_rtgs').value.trim();
                rtgs_amount = rtgs_amount.split('.').join("");
                const amount_rtgs = parseFloat(rtgs_amount || 0).toFixed(2);

                if(amount_rtgs<100000000){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Minimal 100.000.000 IDR',
                        showConfirmButton: true,

                    });
                    $("#submitTransferBtnRTGS").html('Submit Transfer');
                    $('#submitTransferBtnRTGS').prop("disabled", false);
                    $("#submitTransferBtnRTGS").attr('style', 'cursor:pointer');
                    return false;
                }


                statusEl.textContent = 'Checking target account...';
                
                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: targetAccount,
                beneficiaryBankCode: bank_code,
                beneficiaryAccountName:target_nama_transfer,
                beneficiaryCustomerResidence:'1',
                beneficiaryCustomerType: '1',
                feeType: mode,
                remark: "Test RTGS Fee Rek Tujuan",
                customerReference: 'PNX-RTGS-' + Date.now(),
                "sourceAccountNo": "8212125080",
                "transactionDate": Date.now(),
                "amount": {
                    "value": amount_rtgs,
                    "currency": "IDR"
                },

                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbitransferrtgs';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        $("#submitTransferBtnRTGS").html('Check & Validate');
                        $('#submitTransferBtnRTGS').prop("disabled", true);
                        $("#submitTransferBtnRTGS").attr('style', 'cursor:not-allowed');

                        const info = data.data;

                        statusEl.textContent = '';

                        const infoHtml = `
                        <div class="card mt-4 shadow-sm" style="max-width:100%;">
                            <div class="card-header bg-primary text-white" style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                                <strong>Transfer Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                <strong>Message:</strong> Transfer ${info.responseCode==4031718?'Failed':'Successful'}
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Reference No:</strong> 2b9f5613-6ae7-46c2-a198-944345be8a3d<br>
                                <strong>Partner Reference No:</strong> ${info.referenceNo}<br>
                                <strong>Customer Reference:</strong> ${info.customerReference}
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Source Account:</strong> ${info.sourceAccountNo}<br>
                                <strong>Beneficiary Account:</strong> ${info.beneficiaryAccountNo}<br>
                                <strong>Beneficiary Name:</strong> ${info.beneficiaryAccountName}<br>
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Amount:</strong> IDR ${info.amount.value}
                                </div>

                                <div class="mb-2">
                                <strong>Transaction Date:</strong> 2025-05-14 14:57:38
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Channel:</strong> MOBILEAPP001<br>
                                <strong>Device ID:</strong> DEVICE1234567890
                                </div>
                            </div>
                            </div>

                        `;

                        

                        $('#rtgsTransfer').html(infoHtml);
                        
                    } else {

                        Toastify({
                            text: data.data?.responseMessage??data?.message??'--',
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                        $('#formStatusRTGS').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        // $('#formStatusRTGS').html('<font class="text-danger">Target account not found.</font>');
                        $("#submitTransferBtnRTGS").html('Submit Transfer');
                        $('#submitTransferBtnRTGS').prop("disabled", false);
                        $("#submitTransferBtnRTGS").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    console.error(err);
                    statusEl.textContent = 'Error checking account.';
                    $("#submitTransferBtnRTGS").html('Submit Transfer');
                    $('#submitTransferBtnRTGS').prop("disabled", false);
                    $("#submitTransferBtnRTGS").attr('style', 'cursor:pointer');
                }

            }

            document.getElementById('form20').addEventListener('submit', async function(e) {
                e.preventDefault();

                $("#checkBtnSKN").html('<span class="loader dot-pulse"></span>');
                $('#checkBtnSKN').prop("disabled", true);
                $("#checkBtnSKN").attr('style', 'cursor:not-allowed');

                const targetAccount = document.getElementById('targetAccountSKN').value;
                const statusEl = document.getElementById('formStatusSKN');
                const transferFields = document.getElementById('transferFieldsSKN');
                const bank_code = document.getElementById('bankCodeSKN').value.trim();

                statusEl.textContent = 'Checking target account...';
                transferFields.classList.add('d-none');

                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: targetAccount,
                beneficiaryBankCode: bank_code,
                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbiaccountinquiryeksternal';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        $("#checkBtnSKN").html('Check & Validate');
                        $('#checkBtnSKN').prop("disabled", true);
                        $("#checkBtnSKN").attr('style', 'cursor:not-allowed');

                        target_norek_transfer = data.data.beneficiaryAccountNo;
                        target_nama_transfer = data.data.beneficiaryAccountName;
                        target_bank_nama_transfer= data.data.beneficiaryBankName;

                        const infoHtml = `
                            <div class="account-info-card">
                            <div class="account-info-header">
                                <div class="user-avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                </div>
                                <h3>Account Information</h3>
                            </div>
                            
                            <div class="account-info-body">
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span>Name</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountName}</div>
                                </div>
                                
                                <div class="info-item">
                                <div class="info-label">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                    <span>Account No</span>
                                </div>
                                <div class="info-value">${data.data.beneficiaryAccountNo}</div>
                                </div>
                            </div>
                            </div>
                        `;

                        $('#formStatusSKN').html(infoHtml);
                        transferFields.classList.remove('d-none');
                        
                    } else {
                        $('#formStatusSKN').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        $("#checkBtnSKN").html('Check & Validate');
                        $('#checkBtnSKN').prop("disabled", true);
                        $("#checkBtnSKN").attr('style', 'cursor:not-allowed');
                    }
                } catch (err) {
                    console.error(err);
                    $('#formStatusSKN').html(`<font class="text-danger">Error checking account.</font>`);

                    $("#checkBtnSKN").html('Check & Validate');
                        $('#checkBtnSKN').prop("disabled", true);
                        $("#checkBtnSKN").attr('style', 'cursor:not-allowed');
                }

            });

            async function sknTransfer(){
                $("#submitTransferBtnSKN").html('<span class="loader dot-pulse"></span>');
                $('#submitTransferBtnSKN').prop("disabled", true);
                $("#submitTransferBtnSKN").attr('style', 'cursor:not-allowed');

                const targetAccount = document.getElementById('targetAccountSKN').value;
                const statusEl = document.getElementById('formStatusSKN');
                const transferFields = document.getElementById('sknTransfer');
                const bank_code = document.getElementById('bankCodeSKN').value.trim();

                let skn_amount = document.getElementById('amount_skn').value.trim();
                skn_amount = skn_amount.split('.').join("");
                const amount_skn = parseFloat(skn_amount || 0).toFixed(2);

                if(amount_skn<50000){
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Minimal 50.000 IDR',
                        showConfirmButton: true,

                    });
                    $("#submitTransferBtnSKN").html('Submit Transfer');
                    $('#submitTransferBtnSKN').prop("disabled", false);
                    $("#submitTransferBtnSKN").attr('style', 'cursor:pointer');
                    return false;
                }


                statusEl.textContent = 'Checking target account...';
                
                const requestData = {
                partnerReferenceNo: 'PNX-' + Date.now(),
                beneficiaryAccountNo: '39962601011234',
                beneficiaryBankCode: '048',
                beneficiaryAccountName:'REKENING TEST',
                // beneficiaryAccountNo: targetAccount,
                // beneficiaryBankCode: bank_code,
                // beneficiaryAccountName:target_nama_transfer,
                beneficiaryCustomerResidence:'1',
                beneficiaryCustomerType: '1',
                feeType: mode,
                remark: "Test SKN Fee Rek Tujuan",
                customerReference: 'PNX-SKN-' + Date.now(),
                "sourceAccountNo": "8212125080",
                "transactionDate": Date.now(),
                "amount": {
                    "value": amount_skn,
                    "currency": "IDR"
                },

                additionalInfo: {
                    deviceId: 'DEVICE1234567890',
                    channel: 'MOBILEAPP001',
                    channelId: 'CH001'
                }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbitransferskn';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        $("#submitTransferBtnSKN").html('Submit Transfer');
                        $('#submitTransferBtnSKN').prop("disabled", true);
                        $("#submitTransferBtnSKN").attr('style', 'cursor:not-allowed');

                        const info = data.data;

                        const emont = parseInt(info.amount.value);  // 10000

                        statusEl.textContent = '';

                        const infoHtml = `
                        <div class="card mt-4 shadow-sm" style="max-width:100%;">
                            <div class="card-header bg-primary text-white" style="background: linear-gradient(135deg, #4e73df, #1cc88a);">
                                <strong>Transfer Details</strong>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                <strong>Message:</strong> Transfer ${info.responseCode==4031718?'Failed':'Successful'}
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Reference No:</strong> 2b9f5613-6ae7-46c2-a198-944345be8a3d<br>
                                <strong>Partner Reference No:</strong> ${info.referenceNo}<br>
                                <strong>Customer Reference:</strong> ${info.customerReference}
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Source Account:</strong> ${info.sourceAccountNo}<br>
                                <strong>Beneficiary Account:</strong> ${info.beneficiaryAccountNo}<br>
                                <strong>Beneficiary Name:</strong> ${info.beneficiaryAccountName}<br>
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Amount:</strong> IDR ${formatRupiah(emont.toString())}
                                </div>

                                <div class="mb-2">
                                <strong>Transaction Date:</strong> ${info.transactionDate}
                                </div>
                                <hr>

                                <div class="mb-2">
                                <strong>Channel:</strong> ${info.additionalInfo.channel}<br>
                                <strong>Device ID:</strong> ${info.additionalInfo.deviceId}
                                </div>
                            </div>
                            </div>

                        `;

                        

                        $('#sknTransfer').html(infoHtml);
                        
                    } else {

                        Toastify({
                            text: data.data.responseMessage,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                        $('#formStatusSKN').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        $("#submitTransferBtnSKN").html('Submit Transfer');
                        $('#submitTransferBtnSKN').prop("disabled", false);
                        $("#submitTransferBtnSKN").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    console.error(err);
                    statusEl.textContent = 'Error checking account.';
                    $("#submitTransferBtnSKN").html('Submit Transfer');
                    $('#submitTransferBtnSKN').prop("disabled", false);
                    $("#submitTransferBtnSKN").attr('style', 'cursor:pointer');
                }

            }
            
            
            async function checkStatusInquiry(){
                $("#checkStatusBtn").html('<span class="loader dot-pulse"></span>');
                $('#checkStatusBtn').prop("disabled", true);
                $("#checkStatusBtn").attr('style', 'cursor:not-allowed');

                const statusEl = document.getElementById('checkStatus');
                
                const valueCheck = document.getElementById('valueCheck').value;
                const nominalCheck = document.getElementById('nominalCheck').value;
                let formattedValue;
                if (nominalCheck.trim() === '') {
                    formattedValue = '0.00';  // Handle empty input
                } else {
                    const numberValue = parseFloat(nominalCheck.replace(/,/g, ''));
                    
                    if (isNaN(numberValue)) {
                        formattedValue = '0.00';  // Handle invalid numbers
                    } else {
                        formattedValue = numberValue.toFixed(2);  // Format to 2 decimal places
                    }
                }

                const afterDash = valueCheck.split('-')[1];

                console.log(afterDash); // Output: 912418414818

                
                statusEl.textContent = 'Checking target...';
                
                const requestData = {
                    originalPartnerReferenceNo: valueCheck,
                    transactionDate: parseInt(afterDash),
                    "amount": {
                        "value": formattedValue,
                        "currency": "IDR"
                    },
                    additionalInfo: {
                        deviceId: 'DEVICE1234567890',
                        channel: 'MOBILEAPP001',
                        channelId: 'CH001'
                    }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbitransferstatus';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data && data.data.responseMessage=='Successful') {

                        const info = data.data;
                        const emont = parseInt(info.amount.value);  // 10000
                        statusEl.textContent = '';

                        const infoHtml = `
                        <div class="transfer-details-card">
                            <div class="transfer-header">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
                                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                    <line x1="1" y1="10" x2="23" y2="10"></line>
                                </svg>
                                <h3 class="text-white">Transfer Details</h3>
                            </div>
                            
                            <div class="transfer-body">
                                <div class="status-summary">
                                    <div class="status-badge ${info.latestTransactionStatus.toLowerCase()}">
                                    <span class="detail-value">${info.transactionStatusDesc}</span> - ${info.latestTransactionStatus}
                                    </div>
                                    
                                    <div class="amount-display ">
                                        ${formatRupiah(emont.toString())} ${info.amount.currency}
                                    </div>
                                </div>
                                
                                <div class="detail-grid">
                                    <!-- Transaction Info Column -->
                                    <div class="detail-column">
                                        <div class="detail-item">
                                            <span class="detail-label">Transaction Date</span>
                                            <span class="detail-value">${moment(info.transactionDate).format('DD/MM/YYYY HH:mm:ss')}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Reference Number</span>
                                            <span class="detail-value">${info.referenceNumber}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Status Description</span>
                                            <span class="detail-value">${info.transactionStatusDesc || '-'}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Channel</span>
                                            <span class="detail-value">${info.additionalInfo.channel}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Device ID</span>
                                            <span class="detail-value">${info.additionalInfo.deviceId}</span>
                                        </div>
                                       
                                    </div>
                                    
                                    <!-- Account Info Column -->
                                    <div class="detail-column">
                                        <div class="detail-item">
                                            <span class="detail-label">Source Account</span>
                                            <span class="detail-value">${info.sourceAccountNo}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Beneficiary Account</span>
                                            <span class="detail-value">${info.beneficiaryAccountNo}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Original Reference</span>
                                            <span class="detail-value">${info.originalReferenceNo}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">Partner Reference</span>
                                            <span class="detail-value">${info.originalPartnerReferenceNo}</span>
                                        </div>
                                        <div class="detail-item">
                                            <span class="detail-label">External ID</span>
                                            <span class="detail-value">${info.originalExternalId}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        `;

                        $("#checkStatusBtn").html('Check Status');
                        $('#checkStatusBtn').prop("disabled", false);
                        $("#checkStatusBtn").attr('style', 'cursor:pointer');
                        

                        $('#checkStatus').html(infoHtml);
                        
                    } else {

                    
                        $('#checkStatus').html(`<font class="text-danger">${data.data?.responseMessage??data?.message??'--'}</font>`);
                        $("#checkStatusBtn").html('Check Status');
                        $('#checkStatusBtn').prop("disabled", false);
                        $("#checkStatusBtn").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                    console.error(err);
                    statusEl.textContent = 'Error checking account.';
                    $("#checkStatusBtn").html('Check Status');
                    $('#checkStatusBtn').prop("disabled", false);
                    $("#checkStatusBtn").attr('style', 'cursor:pointer');
                }

            }

            
            
            async function getBankStatement() {
                // Set loading state
                $("#btn_statement").html('<span class="loader dot-pulse"></span>');
                $('#btn_statement').prop("disabled", true);
                $("#btn_statement").css('cursor', 'not-allowed');

                // Get selected account
                const acct = document.getElementById('statementAccount').value.trim();

                // Get date values
                const startDate = document.getElementById("startDate").value;
                const endDate = document.getElementById("endDate").value;

                if (!startDate || !endDate) {
                    alert("Please select both start and end dates.");
                    return;
                }

                const fromDateTime = `${startDate}T00:00:00+07:00`;

                const todayStr = new Date().toISOString().split("T")[0];
                let toDateTime;

                if (endDate === todayStr) {
                    const now = new Date();
                    const hh = now.getHours().toString().padStart(2, '0');
                    const mm = now.getMinutes().toString().padStart(2, '0');
                    const ss = now.getSeconds().toString().padStart(2, '0');
                    toDateTime = `${endDate}T${hh}:${mm}:00+07:00`;
                    // toDateTime = `${endDate}T15:02:59+07:00`;
                } else {
                    toDateTime = `${endDate}T23:59:59+07:00`;
                }

                // Build request payload
                const requestData = {
                    partnerReferenceNo: 'PNX-' + Date.now(),
                    accountNo: acct,
                    fromDateTime: fromDateTime,
                    toDateTime: toDateTime,
                    additionalInfo: {
                        deviceId: 'DEVICE1234567890',
                        channel: 'MOBILEAPP001',
                        channelId: 'CH001'
                    }
                };
                const headers = {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer '+localStorage.getItem('_token_apps')
                };
                const endpoint = 'https://pg.qrion.id/dev/snapbi/api/brkssnapbibankstatement';

                try {
                const { data } = await axios.post(endpoint, requestData, { headers });

                    if (data.status_code === 200 && data.data) {

                        $("#btn_statement").html('Get Statement');
                        $('#btn_statement').prop("disabled", false);
                        $("#btn_statement").attr('style', 'cursor:pointer');

                        renderBankStatementTable(data);

                    } else {
                        
                        Toastify({
                            text: data.message,
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            className: "errorMessage",

                        }).showToast();

                        $("#btn_statement").html('Get Statement');
                        $('#btn_statement').prop("disabled", false);
                        $("#btn_statement").attr('style', 'cursor:pointer');
                    }
                } catch (err) {
                
                $("#btn_statement").html('Get Statement');
                $('#btn_statement').prop("disabled", false);
                $("#btn_statement").attr('style', 'cursor:pointer');
                }
            }

            function renderBankStatementTable(data) {
                const detailData = data.data.detailData;

                // Sort by transactionDate descending (latest first)
                detailData.sort((a, b) => new Date(b.transactionDate) - new Date(a.transactionDate));

                const table = `
                    <h5>Bank Statement</h5>
                    <table class="table table-bordered table-striped">
                        <thead class="text-white">
                            <tr style="background: linear-gradient(135deg, #4e73df, #1cc88a);" class="text-white">
                                <th>Date</th>
                                <th>Type</th>
                                <th>Currency</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Start Balance</th>
                                <th>End Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${detailData.map(txn => {
                                const amount = Number(txn.amount.value).toLocaleString();
                                const currency = txn.amount.currency;
                                const date = moment(txn.transactionDate).format('DD/MM/YYYY HH:mm:ss');
                                const type = txn.type;
                                const remark = txn.remark;
                                const startBalance = txn.detailBalance?.startAmount?.[0]?.amount?.value 
                                    ? Number(txn.detailBalance.startAmount[0].amount.value).toLocaleString() 
                                    : '-';
                                const endBalance = txn.detailBalance?.endAmount?.[0]?.amount?.value 
                                    ? Number(txn.detailBalance.endAmount[0].amount.value).toLocaleString() 
                                    : '-';

                                return `
                                    <tr>
                                        <td>${date} WIB</td>
                                        <td>${type}</td>
                                        <td>${currency}</td>
                                        <td>${remark}</td>
                                        <td>${amount}</td>
                                        <td>${startBalance}</td>
                                        <td>${endBalance}</td>
                                    </tr>
                                `;
                            }).join('')}
                        </tbody>
                    </table>
                `;

                document.getElementById("statementResult").innerHTML = table;
            }

            $(document).ready(function () {
                // showData();

                $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');

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
					order: [[3, 'desc']], // Order by "created_at" column in descending order (most recent first)
					ajax: function (data, callback) {
						axios.get('<?=base_url(); ?>CPanel_Admin/getDataKartu50Max').then(response => {
								
								callback({
									data: response.data.data
								});
							})
							.catch(error => {
								console.error('Error fetching data:', error);
							});
					},
					columns: [
                        { data: 'id', title: 'ID' },          // Maps to 'age' field
						
						{ 
							data: 'card_id', 
							title: 'Kode Kartu', 
							render: function (data, type, row) {
								
								return `<span class="kode-semester text-primary" style="font-weight: bold; ">
											${row.card_id}
										</span>`;
							} 
						},
						{ data: 'keterangan', title: 'Status' },          // Maps to 'age' field
						{ data: 'created_at', title: 'Terbuat Pada' },          // Maps to 'age' field
					],
					lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]], // Add "All" option
    				pageLength: 20 // Default page length
				} );
            });
			function showData(){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataAgensiAll').catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

                        console.log(posts2.data.data);

							tableColumn = '';
                            let totals = 0;
							posts2.data.data.map((mapping,i)=>{
							num += 1;
                            totals += parseInt(mapping.punyaoncard);
							tableColumn +=`
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-2">
												<h6 class="mb-0 font-14">${num}</h6>
											</div>
										</div>
									</td>
									<td>${mapping.kode_instansi}</td>
									<td style="white-space: normal !important;max-width:200px;min-width:200px;">
                                    <img src="<?=base_url();?>app/assets/users/foto/${mapping.foto}" style="width:30px; height:30px; object-fit:cover;border-radius:5px;margin-bottom:20px;float:left; margin-right:10px;"/>
                                    ${mapping.nama}
                                    
                                    </td>
                                    <td>${mapping.username} / <small class="text-muted">${mapping.email}</small></td>
									<td style="word-wrap: break-word!important;min-width: 160px;max-width: 160px;white-space: normal !important;">${mapping.alamat}</td>
									<td style="word-wrap: break-word!important;min-width: 160px;max-width: 160px;white-space: normal !important;">Rp${formatRupiah(mapping.punyaoncard)}</td>
									<td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="openDialogImport('${mapping.idINSTANSI}');" class="me-3"><i class='bx bx-import'></i></a>
										</div>
                                        <div class="d-flex order-actions mt-3">
											<a href="#/" onclick="openDialogLoginByPass('${mapping.idINSTANSI}','${mapping.username}');" class="btn-success me-3"><i class='bx bx-log-in-circle'></i></a>
										</div>
									</td>
								</tr>
							`;
							});
							
                        $('.putContentHere').html(tableColumn);
                        $('.footerContentHere').html(`<tr style="font-size:15px;font-weight:bold;"><td colspan="5">Total</td><td colspan="2">Rp${formatRupiah(totals.toString())}</td></tr>`);
							
					}
				}
				
				save2();
				
				
			}

            function openDialogImport(str){
                idsett = str;
                $('#modalImportData').modal('toggle');
                $('#kodeInstansi').val(idsett);
            }
            
            function openDialogLoginByPass(str,str2){
                $('#namaInstansi').val(str);
                $('#userInstansi').val(str2);
                $('#modalLoginByPass').modal('toggle');
            }

            getDataBanks();

            function getDataBanks() {
                const $bankSelect = $('#bankCode');
                const $bankSelectInter = $('#bankCodeInter');
                const $bankSelectRTGS = $('#bankCodeRTGS');
                const $bankSelectSKN = $('#bankCodeSKN');
                
                $bankSelect.html('<option value="">Loading...</option>');
                $bankSelectInter.html('<option value="">Loading...</option>');
                $bankSelectRTGS.html('<option value="">Loading...</option>');
                $bankSelectSKN.html('<option value="">Loading...</option>');

                const fetchData = async () => {
                    try {
                        const response = await axios.get('<?=base_url(); ?>CPanel_Admin/getDataBanks');

                        if (response.status === 200) {
                            const bankData = response.data.data;

                            let options = '<option value="">-- Select Bank --</option>';
                            bankData.forEach((bank, i) => {
                                options += `<option value="${bank.kode_bank}">${bank.nama_bank} - (${bank.kode_bank})</option>`;
                            });
                            let options2 = '<option value="">-- Select Bank --</option>';
                            bankData.forEach((bank, i) => {
                                options2 += `<option value="${bank.bic}">${bank.nama_bank} - (${bank.kode_bank}) (${bank.bic})</option>`;
                            });

                            $bankSelect.html(options2);
                            $bankSelectInter.html(options2);
                            $bankSelectRTGS.html(options2);
                            $bankSelectSKN.html(options2);

                            // Optional: Initialize Select2 if you want searchable dropdown
                            if ($.fn.select2) {
                                $bankSelect.select2({
                                    placeholder: "-- Select Bank --",
                                    allowClear: true
                                });
                                $bankSelectInter.select2({
                                    placeholder: "-- Select Bank --",
                                    allowClear: true
                                });
                                $bankSelectRTGS.select2({
                                    placeholder: "-- Select Bank --",
                                    allowClear: true
                                });
                                $bankSelectSKN.select2({
                                    placeholder: "-- Select Bank --",
                                    allowClear: true
                                });
                            }
                        }
                    } catch (error) {
                        console.log(error);
                        $bankSelect.html('<option value="">Failed to load banks</option>');
                    }
                };

                fetchData();
            }

		</script>