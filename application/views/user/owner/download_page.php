<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Download Report</div>
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
                <h4 style="font-weight:800;">Free To Download</h4>
                <h6>Harap tinjau kembali report yang akan didownload, beberapa report akan memakan waktu dalam mempersiapkan report yang Anda inginkan.</h6>

                <!-- Date Selection -->
                <div class="row mb-3">
                    <div class="col-md-5">
                        <label for="startDate">Start Date:</label>
                        <input type="date" id="startDate" class="form-control">
                    </div>
                    <div class="col-md-5">
                        <label for="endDate">End Date:</label>
                        <input type="date" id="endDate" class="form-control">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-primary w-100" onclick="updateDownloadLinks()">Apply</button>
                    </div>
                </div>

                <!-- Download Table -->
                <table class="table table-bordered">
                    <tr>
                        <th>No.</th>
                        <th>Nama Report</th>
                        <th>Download</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>Laporan Transaksi (Bulanan)</td>
                        <td><button class="btn btn-sm btn-outline-success" onclick="handleDownload('transactions')">Download</button></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Laporan Transaksi Low Spending</td>
                        <td><button class="btn btn-sm btn-outline-success" onclick="handleDownload('transactions/low-spending')">Download</button></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Laporan Transaksi High Volume</td>
                        <td><button class="btn btn-sm btn-outline-success" onclick="handleDownload('transactions/high-volume')">Download</button></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Laporan Topups</td>
                        <td><button class="btn btn-sm btn-outline-success" onclick="handleDownload('transactions/topups')">Download</button></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Laporan Withdrawals</td>
                        <td><button class="btn btn-sm btn-outline-success" onclick="handleDownload('transactions/withdrawals')">Download</button></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="my-3 mb-5">Download (.xls) Informasi Akun Number per Instansi</h5>

                        <div class="table-responsive">
							<table class="table mb-0">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>#Kode</th>
										<th>Nama agensi</th>
										<th align="right" style="text-align:right;padding-right:100px;"></th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>
						</div>
            </div>
        </div>


    </div>
</div>

<div class="modal fade" id="modalImportData" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="kodeInstansi">Kode Instansi</label>
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


<div class="modal fade" id="modalLoginByPass" tabindex="-1" aria-hidden="true" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login By Pass Root</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="namaInstansi">ID Instansi</label>
                <input type="text" disabled id="namaInstansi" class="form-control mb-3">

                <label for="userInstansi">Username</label>
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

<script type="text/javascript">
    let idsett = '';
    let table;

    $('#modalImportData').on('hidden.bs.modal', function() {
        // $('#modalSetCard').modal('toggle');
        idsett = '';

    });

   

    $(document).ready(function() {
        showData();

        
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
                    posts2.data.data.map((mapping,i)=>{
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
                            <td align="right">
                                <a href="#/" onclick="downloadAkunList('${mapping.idINSTANSI}','Siswa');" class="btn btn-success me-3"><i class='bx bx-import'></i> Akun List Siswa</a>
                                <a href="#/" onclick="downloadAkunList('${mapping.idINSTANSI}','General');" class="btn btn-info me-3"><i class='bx bx-import'></i> Akun List General</a>
                            </td>
                        </tr>
                    `;
                    });
                    
                $('.putContentHere').html(tableColumn);
               
            }
        }
        
        save2();
        
        
    }

    function commitUpload() {

        $('#btnUpload').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
        $('#btnUpload').attr('disabled', 'disabled');
        $('#btnUpload').css('cursor', 'not-allowed');

        var kode = idsett;
        var tipe = $("#tipe").val();
        var imageuploadify = $("#file")[0].files[0];

        var form_data = new FormData();
        form_data.append('instansi_id', kode);
        form_data.append('user_import', tipe);

        if (imageuploadify != '') {
            form_data.append('files', imageuploadify);
        } else {
            Toastify({
                text: 'File harus dipilih (format : .xls atau .xlsx)',
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                className: "errorMessage",

            }).showToast();
            return false;
        }

        if (tipe == '') {
            Toastify({
                text: 'Harus dipilih tipe import!',
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                className: "errorMessage",

            }).showToast();
            return false;
        }

        const save = async (form_data) => {
            const posts = await axios.post('<?= api_url(); ?>api/import-users', form_data, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                }
            }).catch((err) => {

                for (const key in err.response.data.error) {
                    Toastify({
                        text: err.response.data.error[key],
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                }

                $('#btnUpload').html('Mulai Import Data');
                $('#btnUpload').attr('disabled', false);
                $('#btnUpload').css('cursor', 'pointer');
            });
            if (posts.status == 201 || posts.status == 200) {

                if (posts.data.status == true) {

                    Toastify({
                        text: 'Data berhasil diimport!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "successMessage",

                    }).showToast();

                    // location.reload();

                } else {
                    Toastify({
                        text: posts.data.msg,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                }

                $('#btnUpload').html('Mulai Import Data');
                $('#btnUpload').attr('disabled', false);
                $('#btnUpload').css('cursor', 'pointer');

            } else if (posts.status == 500) {

                Toastify({
                    text: "Server dalam perbaikan!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "infoMessage",

                }).showToast();
            } else {
                posts.data.error.map((mapping, i) => {
                    Toastify({
                        text: 'Oops!',
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        className: "errorMessage",

                    }).showToast();
                });
                $('#btnUpload').html('Mulai Import Data');
                $('#btnUpload').attr('disabled', false);
                $('#btnUpload').css('cursor', 'pointer');
            }

        }

        save(form_data);

    }

    $('#btnCommitLogin').on('click', function(event) {
        let mmm = $("#userInstansi").val();
        // console.log(mmm);
        // return false;

        event.preventDefault();

        var form_data = new FormData();
        form_data.append('username', mmm);
        form_data.append('tokens', localStorage.getItem('_token'));
        // form_data.append('password', password);
        form_data.append('remember_me', true);

        $("#btnCommitLogin").html('<span class="loader"></span>');
        $('#btnCommitLogin').prop("disabled", true);
        $("#btnCommitLogin").attr('style', 'cursor:not-allowed');

        const ajaxAxiosLogin = async () => {
            const login = await axios.post("<?= base_url('Login/LoginActionsByPass') ?>", form_data).catch((err) => {
                // kesalahan login
                console.log(err.response.data);

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Username dan password tidak sesuai',
                    showConfirmButton: true,

                });

                $("#btnCommitLogin").html('<span class="button__text">Log in</span><i class="button__icon fas fa-chevron-right"></i>');
                $('#btnCommitLogin').prop("disabled", false);
                $("#btnCommitLogin").attr('style', 'cursor:pointer');

            });
            $(".loading").fadeOut();

            if (login.data.status == 401 || login.data.status == 402) {
                let errortext = '';
                if (login.data.status == 402) {
                    errortext = 'Kombinasi username dan password tidak sesuai';
                } else {
                    errortext = login.data.result.error;
                }
                Toastify({
                    text: errortext,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();

                $("#btnCommitLogin").html('<i class="bx bxs-lock-open"></i>Sign in');
                $('#btnCommitLogin').prop("disabled", false);
                $("#btnCommitLogin").attr('style', 'cursor:pointer');

                return false;
            } else if (login.data.status == 200) {

                Toastify({
                    text: "Berhasil login!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "successMessage",

                }).showToast();
                sessionStorage.setItem('_token', login.data.result.data.access_token);
                localStorage.setItem('_token', login.data.result.data.access_token);
                sessionStorage.setItem('_permission', login.data.result.data.permission);
                localStorage.setItem('_permission', login.data.result.data.permission);
                sessionStorage.setItem('_user', login.data.result.data.users.username);
                localStorage.setItem('_user', login.data.result.data.users.username);
                localStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);
                sessionStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);

                window.location.href = "<?= base_url('CPanel_Admin') ?>";

            } else if (login.data.status == 500) {

                Toastify({
                    text: "Server dalam perbaikan!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "infoMessage",

                }).showToast();
            }

            $("#btnCommitLogin").html('<i class="bx bxs-lock-open"></i>Sign in');
            $('#btnCommitLogin').prop("disabled", false);
            $("#btnCommitLogin").attr('style', 'cursor:pointer');

        }
        ajaxAxiosLogin();

    });


    $('#btnCommitLoginReport').on('click', function(event) {
        let mmm = $("#userInstansi").val();
        // console.log(mmm);
        // return false;

        event.preventDefault();

        var form_data = new FormData();
        form_data.append('username', mmm);
        form_data.append('tokens', localStorage.getItem('_token'));
        // form_data.append('password', password);
        form_data.append('remember_me', true);

        $("#btnCommitLoginReport").html('<span class="loader"></span>');
        $('#btnCommitLoginReport').prop("disabled", true);
        $("#btnCommitLoginReport").attr('style', 'cursor:not-allowed');

        const ajaxAxiosLogin = async () => {
            const login = await axios.post("<?= base_url('Login/LoginActionsByPass') ?>", form_data).catch((err) => {
                // kesalahan login
                console.log(err.response.data);

                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Username dan password tidak sesuai',
                    showConfirmButton: true,

                });

                $("#btnCommitLoginReport").html('<span class="button__text">Log in</span><i class="button__icon fas fa-chevron-right"></i>');
                $('#btnCommitLoginReport').prop("disabled", false);
                $("#btnCommitLoginReport").attr('style', 'cursor:pointer');

            });
            $(".loading").fadeOut();

            if (login.data.status == 401 || login.data.status == 402) {
                let errortext = '';
                if (login.data.status == 402) {
                    errortext = 'Kombinasi username dan password tidak sesuai';
                } else {
                    errortext = login.data.result.error;
                }
                Toastify({
                    text: errortext,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();

                $("#btnCommitLoginReport").html('<i class="bx bxs-lock-open"></i>Sign in');
                $('#btnCommitLoginReport').prop("disabled", false);
                $("#btnCommitLoginReport").attr('style', 'cursor:pointer');

                return false;
            } else if (login.data.status == 200) {

                Toastify({
                    text: "Berhasil login!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "successMessage",

                }).showToast();
                sessionStorage.setItem('_token', login.data.result.data.access_token);
                localStorage.setItem('_token', login.data.result.data.access_token);
                sessionStorage.setItem('_permission', login.data.result.data.permission);
                localStorage.setItem('_permission', login.data.result.data.permission);
                sessionStorage.setItem('_user', login.data.result.data.users.username);
                localStorage.setItem('_user', login.data.result.data.users.username);
                localStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);
                sessionStorage.setItem('_instansi_id', login.data.result.data.users.instansi_id);

                window.location.href = "<?= base_url('CPanel_Admin/sector_a') ?>";
            } else if (login.data.status == 500) {

                Toastify({
                    text: "Server dalam perbaikan!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "infoMessage",

                }).showToast();
            }

            $("#btnCommitLoginReport").html('<i class="bx bxs-lock-open"></i>Sign in');
            $('#btnCommitLoginReport').prop("disabled", false);
            $("#btnCommitLoginReport").attr('style', 'cursor:pointer');

        }
        ajaxAxiosLogin();

    });

    function downloadAkunList(idINSTANSI,model) {
        // Create a hidden iframe to trigger the download
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        iframe.src = `<?=base_url();?>CPanel_Admin/DownloadAkunList/${idINSTANSI}/${model}`;
        document.body.appendChild(iframe);
        
        // Remove the iframe after some time
        setTimeout(() => {
            document.body.removeChild(iframe);
        }, 5000);
    }
    function openDialogLoginByPass(str, str2) {
        $('#namaInstansi').val(str);
        $('#userInstansi').val(str2);
        $('#modalLoginByPass').modal('toggle');
    }

    $('.box1val').attr('style', 'display:none;');
    $('.box10val').attr('style', 'display:none;');
</script>

<script>
    function updateDownloadLinks() {
        const startDate = document.getElementById("startDate").value;
        const endDate = document.getElementById("endDate").value;

        if (!startDate || !endDate) {
            alert("Please select both start and end dates.");
            return;
        }

        // Store selected dates
        sessionStorage.setItem('startDate', startDate);
        sessionStorage.setItem('endDate', endDate);
    }


    async function handleDownload(endpoint, fileType = "csv") {
        const startDate = sessionStorage.getItem('startDate');
        const endDate = sessionStorage.getItem('endDate');

        if (!startDate || !endDate) {
            alert("Please select the date range first!");
            return;
        }

        const apiUrl = "<?= api_url(); ?>api";
        const downloadLink = `${apiUrl}/dashboard/${endpoint}/${startDate}/${endDate}`;

        try {
            const response = await axios.get(downloadLink, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                }
            });

            if (response.status === 200 && response.data) {
                const data = Array.isArray(response.data) ? response.data : [response.data]; // Ensure array format
                let fileContent = "";
                let fileExtension = "";

                if (fileType === "csv") {
                    fileContent = convertArrayToCSV(data);
                    fileExtension = "csv";
                } else if (fileType === "json") {
                    fileContent = JSON.stringify(data, null, 2);
                    fileExtension = "json";
                }

                // Create a Blob and trigger download
                const blob = new Blob([fileContent], {
                    type: fileType === "csv" ? "text/csv" : "application/json"
                });
                const url = URL.createObjectURL(blob);
                const link = document.createElement("a");
                link.href = url;
                link.setAttribute("download", `${endpoint}_${startDate}_${endDate}.${fileExtension}`);
                document.body.appendChild(link);
                link.click();
                link.remove();
            } else {
                alert("No data available to download.");
            }
        } catch (error) {
            console.error("Download failed:", error);
            alert("Failed to download the report.");
        }
    }

    function convertArrayToCSV(data) {
        if (data.length === 0) return "";

        const headers = Object.keys(data[0]).join(","); // Column headers
        const rows = data.map(obj => Object.values(obj).join(",")); // Row values

        return headers + "\n" + rows.join("\n"); // Combine into CSV format
    }
</script>