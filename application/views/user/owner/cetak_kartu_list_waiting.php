<style>
.bg-order {
    background-color: #fff3cd !important; /* Light Yellow */
}
.bg-delivery {
    background-color: #cce5ff !important; /* Light Blue */
}
.bg-done {
    background-color: #d4edda !important; /* Light Green */
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
                        <li class="breadcrumb-item active" aria-current="page">Daftar Kartu Dalam Masa Cetak</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        
        <div class="card">
            <div class="card-body">
                <div class="">

                <div class="row">
                    <div class="col-lg-12 col-12">
                    <div id="summary" class="d-flex flex-wrap gap-3 mb-4">
                        <div class="card shadow-sm p-3 rounded text-center" style="min-width: 180px;">
                            <div>Belum dieksekusi</div>
                            <div id="count-pending" class="fw-bold fs-4">0</div>
                        </div>
                        <div class="card shadow-sm p-3 rounded text-center" style="min-width: 180px;">
                            <div>Sedang di order</div>
                            <div id="count-order" class="fw-bold fs-4">0</div>
                        </div>
                        <div class="card shadow-sm p-3 rounded text-center" style="min-width: 180px;">
                            <div>Dalam pengantaran</div>
                            <div id="count-delivery" class="fw-bold fs-4">0</div>
                        </div>
                        <div class="card shadow-sm p-3 rounded text-center" style="min-width: 180px;">
                            <div>Selesai</div>
                            <div id="count-done" class="fw-bold fs-4">0</div>
                        </div>
                        <div class="card shadow-sm p-3 rounded text-center bg-light" style="min-width: 180px;">
                            <div>Total Data</div>
                            <div id="count-total" class="fw-bold fs-4">0</div>
                        </div>
                    </div>

                    </div>
                </div>
                    
                    <table id="example" class="tabelsiswa table table-hover tabelproduk" style="width:100%;font-size:12px!important;">
                        <thead class="table-light">
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Kode</th>
                                <th>Kode</th>
                                <th>Kode</th>
                                <th>Kode</th>
                                <th>Kode</th>
                                <th>Kode</th>
                            </tr>
                        </thead>
                    </table>
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

<script type="text/javascript">

    let idsett = '';
    let table;

    $('#modalImportData').on('hidden.bs.modal', function () {
        // $('#modalSetCard').modal('toggle');
        idsett = '';
        
    });


    function saveValue(str){
        axios.get('<?=base_url(); ?>CPanel_Admin/saveKartuManifest/'+str).then(response => {
            
            console.log(response.status);

            if(response.data.status==true){
                Toastify({
                    text: 'Kartu berhasil diregistrasikan',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "successMessage",

                }).showToast();
                $('#textToCard').val('');

                table.ajax.reload();
            }else {
                Toastify({
                    text: 'Telah terdaftar sebelumnya!!!',
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "errorMessage",

                }).showToast();
                $('#textToCard').val('');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    }
    
    $(document).ready(function () {
        // showData();

        
        table = $('#example').DataTable({
            fixedHeader: true,
            processing: true,
            searching: true,
            columnDefs: [
                {
                    targets: [2],
                    className: 'text-right'
                }
            ],
            order: [[3, 'desc']], // Order by Instansi ID
            ajax: function (data, callback) {
                axios.get('<?= api_url(); ?>api/v1/history-card/user-card-issue', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                }).then(response => {
                    callback({
                        data: response.data
                    });

                    // Calculate summary
                    const counts = {
                        order: 0,
                        delivery: 0,
                        done: 0,
                        pending:0,
                        total: response.data.length
                    };

                    response.data.forEach(item => {
                        const status = item.progress_status?.toLowerCase();
                        if (status === 'sedang di order') counts.order++;
                        else if (status === 'dalam pengantaran') counts.delivery++;
                        else if (status === 'selesai') counts.done++;
                        else if (status === 'pending') counts.pending++;
                    });

                    // Update UI
                    document.getElementById('count-order').innerText = counts.order;
                    document.getElementById('count-delivery').innerText = counts.delivery;
                    document.getElementById('count-done').innerText = counts.done;
                    document.getElementById('count-total').innerText = counts.total;
                    document.getElementById('count-pending').innerText = counts.pending;
                }).catch(error => {
                    console.error('Error fetching data:', error);
                });
            },
            columns: [
                {
                    data: null,
                    title: 'No.',
                    render: function (data, type, row, meta) {
                        return meta.row + 1; // Auto-increment number
                    }
                },
                {
                    data: null,
                    title: 'Nama User',
                    render: function (data, type, row) {
                        const user = row.general_user || row.siswa;
                        return user ? user.nama_lengkap : '-';
                    }
                },
                {
                    data: null,
                    title: 'Tanggal Request',
                    render: function (data, type, row) {
                        // Format the date using Moment.js
                        return moment(row.created_at).format('DD/MM/YYYY HH:mm')+" WIB";
                        // Example output: "22/07/2025 14:30"
                    }
                },
                {
                    data: null,
                    title: 'Alamat',
                    render: function (data, type, row) {
                        const user = row.general_user || row.siswa;
                        return user ? user.alamat_lengkap : '-';
                    }
                },
                {
                    data: 'instansi_id',
                    title: 'ID Instansi'
                },
                {
                    data: 'noted',
                    title: 'Noted',
                    render: function (data) {
                        return data ? data : '-';
                    }
                },
                {
                    data: 'status_issue',
                    title: 'Status Issue',
                    render: function (data) {
                        return data ? data.toUpperCase() : '-';
                    }
                },
                {
                    data: null,
                    title: 'Update Status',
                    render: function (data, type, row) {
                        return `
                            <select class="form-select form-select-sm status-dropdown" data-id="${row.id}" style="min-width:160px;">
                                <option value="">-- Pilih --</option>
                                <option value="sedang di order" ${row.progress_status === 'sedang di order' ? 'selected' : ''}>Sedang di Order</option>
                                <option value="dalam pengantaran" ${row.progress_status === 'dalam pengantaran' ? 'selected' : ''}>Dalam Pengantaran</option>
                                <option value="selesai" ${row.progress_status === 'selesai' ? 'selected' : ''}>Selesai</option>
                            </select>
                        `;
                    }
                }
            ],
            drawCallback: function () {
            $('.status-dropdown').off('change').on('change', function () {
                const id = $(this).data('id');
                const progress_status = $(this).val();
                const noted = prompt("Tambahkan catatan (optional):") || "";

                axios.post('<?= api_url(); ?>api/v1/history-card/create-history-progress', {
                    id,
                    progress_status,
                    noted
                }, {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('_token')
                    }
                }).then(response => {
                    alert("Status berhasil diperbarui!");
                    table.ajax.reload(null, false);
                }).catch(error => {
                    alert("Gagal memperbarui status.");
                    console.error(error);
                });
            });

            // Apply color classes based on selected value
            $('.status-dropdown').each(function () {
                const val = $(this).val();
                $(this).removeClass('bg-order bg-delivery bg-done');

                if (val === 'sedang di order') {
                    $(this).addClass('bg-order');
                } else if (val === 'dalam pengantaran') {
                    $(this).addClass('bg-delivery');
                } else if (val === 'selesai') {
                    $(this).addClass('bg-done');
                }
            });
        },  
            lengthMenu: [[20, 35, 50, -1], [20, 35, 50, "All"]],
            pageLength: 20
        });

        

        

    });

    
    function showData(){
        let num = 0;
        let tableColumn = '';
        // $('.putContentHere').html(tableColumn);
        
        const save2 = async () => {
            const posts2 = await axios.get('<?= api_url(); ?>api/v1/history-card/user-card-issue', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_token')
                }
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
        
        if(imageuploadify!=''){
            form_data.append('files', imageuploadify);	
        }else {
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
        
        if(tipe==''){
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
            if (posts.status == 201||posts.status == 200) {

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

            }else if(posts.status==500){
                
                Toastify({
                    text: "Server dalam perbaikan!",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    className: "infoMessage",

                }).showToast();
            } 
            else {
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

        $('#btnCommitLogin').on('click', function (event) {
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
                    
                    if(login.data.status==401||login.data.status==402){
                        let errortext = '';
                        if(login.data.status==402){
                            errortext = 'Kombinasi username dan password tidak sesuai';
                        }else {
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
                    }else if(login.data.status==200){
                            
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

                    } else if(login.data.status==500){
                            
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
        
        
        $('#btnCommitLoginReport').on('click', function (event) {
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
                    
                    if(login.data.status==401||login.data.status==402){
                        let errortext = '';
                        if(login.data.status==402){
                            errortext = 'Kombinasi username dan password tidak sesuai';
                        }else {
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
                    }else if(login.data.status==200){
                            
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
                    } else if(login.data.status==500){
                            
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

    $('.box1val').attr('style','display:none;');
        $('.box10val').attr('style','display:none;');
</script>