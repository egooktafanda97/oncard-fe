<div class="page-wrapper">
			<div class="page-content">
				<div class="row">
                   <div class="col">
					 <div class="card radius-1">
						<div class="card-body">
							<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
								<div class="breadcrumb-title pe-3">Biaya</div>
								<div class="ps-3">
									<nav aria-label="breadcrumb">
										<ol class="breadcrumb mb-0 p-0">
											<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
											</li>
											<li class="breadcrumb-item"><a href="<?=base_url().$function;?>/JenisTagihan">Kelola Kategori Biaya</a>
											</li>
											<li class="breadcrumb-item active" aria-current="page">Daftar Biaya</li>
										</ol>
									</nav>
								</div>
							</div>
							
							<div class="ms-auto">
								
                                <button class="btn btn-sm btn-outline-primary mt-2 me-2 px-2 mb-3" id="btnSave2PDF" onclick="save2PDF('tabelPrint');" style="border-radius:100px;"><i style="padding:0; margin:0;" class="bx bxs-file-export"></i></button>
                                <button class="btn btn-sm btn-outline-success mt-2 me-2 px-2 mb-3" onclick="saveToExcel('tabelsiswa');" style="border-radius:100px;"><i style="padding:0; margin:0;" class="bx bxs-file-export"></i> </button>
								<a href="#/" onclick="goToPage();" style="margin-top:-10px!important;" class="btn btn-success radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i> Tambah Data</a>
							</div>
						</div>
						<div class="table-responsive" style="margin-top:-15px;">
							<table class="table mb-0 tabelsiswa table-hover" id="tabelPrint">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama Tagihan</th>
										<th>Tanggal Jatuh Tempo</th>
										<th>Tanggal Penagihan</th>
										<!-- <th>Progress</th>
										<th class="text-end"></th> -->
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

						</div>
					 </div>
				   </div>
				  </div>
				</div><!--end row-->

			</div>

			<div class="modal fade" id="modalViewDetails" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Details</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body puter">

						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						</div>
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="modalSetTagihan" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title titledetail">Add / Modify</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body addmodify">
							<div class="row g-3">
								<div class="col-md-12">
									<label for="tagihan_name" class="form-label">Nama tagihan</label>
									<input type="text" class="form-control" id="tagihan_name" placeholder="Cth : Iuran Komite">
								</div>
							</div>
						</div>
						<div class="modal-footer text-center">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
							<button type="button" class="btn btn-success" id="submitBtnTagihan" onclick="procModifyTagihan();">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>

		<script src="https://pawelgrzybek.github.io/siema/assets/siema.min.js"></script>

        <script type="text/javascript">
			
			let idsett;
			let modesett;

            let textsett='';

			$(document).ready(function () {
				getTagihanList();
				getTagihanListDetail();
  
            });


			function getTagihanList(){
				let num = 1;
				let tableColumn = '';
			
				tableColumn += `<tr><td colspan="20" class="text-center">Loading....</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/tagihan/get-by-jenis-tagihan/<?=$idJenisTagihan;?>', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';
						
						if(posts2.data.data.length==0){
							tableColumn=`<tr><td colspan="11" class="text-center p-5">Tidak ada data.</td></tr>`;
						}

						posts2.data.data.map((mapping,i)=>{

							// tableColumn+=`
							// 	<tr>
							// 		<td>${num++}</td>
							// 		<td>${mapping.nama_tagihan}</td>
							// 		<td>${moment(mapping.tanggal_mulai_tagihan).format('dddd, DD-MM-YYYY')}</td>
							// 		<td>${moment(mapping.tanggal_jatuh_tempo).format('dddd, DD-MM-YYYY')}</td>
							// 		<td>
							// 		<div class="progress">
							// 		<div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
							// 		</div>
							// 		</td>
							// 		<td class="text-end">
							// 			<button type="button" class="btn btn-sm btn-outline-success" onclick="showDetails('${mapping.id}');" id="seeDetails"><i class="bx bx-show-alt"></i> Details</button>
							// 			<button type="button" class="btn btn-sm btn-outline-primary" onclick="modalAddModify(${mapping.id});" id="updateData"><i class="bx bx-pencil"></i> Update</button>
							// 		</td>
							// `; 
							tableColumn+=`
                            <tr>
                                <td>${num++}</td>
                                <td>${mapping.nama_tagihan}</td>
                                <td>
                                    ${moment(mapping.tanggal_mulai_tagihan).format('dddd, DD-MM-YYYY')}
                                    <br>
                                    <small>
                                        ${moment(mapping.tanggal_mulai_tagihan).diff(moment(), 'days') < 0 
                                            ? `Sudah lewat ${Math.abs(moment(mapping.tanggal_mulai_tagihan).diff(moment(), 'days')+1)} hari` 
                                            : `${moment(mapping.tanggal_mulai_tagihan).diff(moment(), 'days')+1} hari lagi`}
                                    </small>
                                </td>
                                <td>
                                    ${moment(mapping.tanggal_jatuh_tempo).format('dddd, DD-MM-YYYY')}
                                    <br>
                                    <small>
                                        ${moment(mapping.tanggal_jatuh_tempo).diff(moment(), 'days') < 0 
                                            ? `Sudah lewat ${Math.abs(moment(mapping.tanggal_jatuh_tempo).diff(moment(), 'days')+1)} hari` 
                                            : `${moment(mapping.tanggal_jatuh_tempo).diff(moment(), 'days')+1} hari lagi`}
                                    </small>
                                </td>
                            </tr>
							`; 
						});
						
						$('.putContentHere').html(tableColumn);
					}
				}
				save2();
			}

			function showDetails(str){

				$('#modalViewDetails').modal('toggle');

				$('.puter').html('<div class="row"><div class="col-12 text-center">Loading...</div></div>');

				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan/'+str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						tableColumn='';

						console.log(posts2.data);
						
						tableColumn+=`
							<p>
								<small>Value</small><br/>
								<code>${posts2.data.data.value}</code>
							</p>
							<p>
								<small>Tanggal Terbuat</small><br/>
								${moment(posts2.data.data.created_at).format('dddd, DD-MM-YYYY')}
							</p>
							<p>
								<small>Jam Terbuat</small><br/>
								${moment(posts2.data.data.created_at).format('HH:mm:ss')} WIB
							</p>
						`; 
						$('.puter').html(tableColumn);
						$('.titledetail').html(posts2.data.data.name);

						
					}
				}
				save2();

				
			}

			function modalAddModify(mode){
				modesett = mode;

				if(mode!='add'){

					const save2 = async () => {
						const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan/'+mode, {
							headers: {
								'Authorization': 'Bearer ' + localStorage.getItem('_token')
							}
						}).catch((err) => {
							console.log(err.response);
						});
				
						if (posts2.status == 200) {
							$('#tagihan_name').val(posts2.data.data.name);

							
						}
					}
					save2();
				}
				$('#modalSetTagihan').modal('toggle');
			}

			function procModifyTagihan(){
				$('#submitBtnTagihan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...');
				$('#submitBtnTagihan').attr('disabled', 'disabled');
				$('#submitBtnTagihan').css('cursor', 'not-allowed');

				let url = '';
				if(modesett=='add'){
					url = '<?= api_url_tagihan(); ?>api/master/jenis-tagihan';
				}else {
					url = '<?= api_url_tagihan(); ?>api/master/jenis-tagihan/'+modesett;
				}

				var tagihan_name = $("#tagihan_name").val();
				var tagihan_name_convertion = tagihan_name.replace(/\s+/g, '_');
				var timestamp = Date.now();
				tagihan_name_convertion += '_' + timestamp;

				var form_data = new FormData();

				form_data.append('name', tagihan_name);
				form_data.append('value', tagihan_name_convertion);

				const save = async (str) => {
					const posts = await axios.post(url,form_data, {
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
					});

					if (posts.status == 200||posts.status == 201) {
						Toastify({
							text: 'Jenis tagihan berhasil ditambahkan.',
							duration: 3000,
							close: true,
							gravity: "top",
							position: "right",
							className: "successMessage",

						}).showToast();
						$('#modalSetTagihan').modal('toggle');
						getTagihanList();

						$('#submitBtnTagihan').html('Simpan');
						$('#submitBtnTagihan').attr('disabled', false);
						$('#submitBtnTagihan').css('cursor', 'pointer');
					} else {

					}
				}
				save(form_data);
			}

            function getTagihanListDetail(){
				const save2 = async () => {
					const posts2 = await axios.get('<?= api_url_tagihan(); ?>api/master/jenis-tagihan/<?=$idJenisTagihan;?>', {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {

						console.log(posts2.data.data);
                        $('.active').html(posts2.data.data.name);
                        textsett = posts2.data.data.name;
					}
				}
				save2();
			}

            function goToPage(){
                window.location.href = `<?=base_url();?>CPanel_Tagihan/AddModifyTagihan/<?=$idJenisTagihan;?>/${encodeURIComponent(textsett)}`;
            }

        </script>