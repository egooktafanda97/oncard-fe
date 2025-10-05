<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Produk</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Produk</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="card">
					<div class="card-body">
						<div class="d-lg-flex align-items-center mb-4 gap-3">
							<div class="position-relative">
								<input type="text" id="floatingInput" class="form-control ps-5 radius-30" placeholder="Ketik nama produk"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
							</div>
						  <div class="ms-auto"><a href="<?=base_url().$function.'/produkManage';?>" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Tambah Produk</a></div>
						</div>
						<div class="table-responsive">
						<button class="btn btn-sm btn-outline-success me-2 mb-3" onclick="saveToExcel('tabelproduk');" style="border-radius:0px;"><i class="bx bxs-file-export"></i> Export Excel</button>
							<table class="table mb-0 tabelproduk">
								<thead class="table-light">
									<tr>
										<th>No.</th>
										<th>Nama produk</th>
										<th>Kategori</th>
										<th>Harga Modal</th>
										<th>Harga Jual</th>
										<th>Stok</th>
										<th>Satuan</th>
										<th>Detail</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody class="putContentHere">
								</tbody>
							</table>

                            <!-- Pagination -->
							<nav class="container mt-5"
								id="siswa-pagination-container"
								aria-label="Page navigation example">
							</nav>

							<!-- Pagination details -->
							<div class="container mt-1 text-muted text-center">
								<small id="siswa-pagination-details"></small>
							</div>

						</div>
					</div>
				</div>


			</div>
		</div>

		<script type="text/javascript">
            let urlproduk = '<?= api_url(); ?>api/v1/produk';
			$(document).ready(function () {
                showData(urlproduk);
				$("#floatingInput").on("keyup", function() {
					let value = $(this).val().toLowerCase();
					$(".putContentHere tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
            });
			function showData(str){
				let num = 0;
				let tableColumn = '';
				tableColumn += `<tr><td colspan="7" class="text-center">Loading...</td></tr>`;
				$('.putContentHere').html(tableColumn);
				
				const save2 = async () => {
					const posts2 = await axios.get(str, {
						headers: {
							'Authorization': 'Bearer ' + localStorage.getItem('_token')
						}
					}).catch((err) => {
						console.log(err.response);
					});
			
					if (posts2.status == 200) {
							tableColumn = '';

                            if(posts2.data.data.data.length==0){
								tableColumn +=`<tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>`;
								$('.putContentHere').html(tableColumn);return false;
							}
							posts2.data.data.data.map((mapping,i)=>{
							num += 1;
							tableColumn +=`
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="ms-2">
												<h6 class="mb-0 font-14">${num}</h6>
											</div>
										</div>
									</td>
									<td>${mapping.nama_produk}</td>
									<td>${mapping.kategori_produk}</td>
									<td>Rp${formatRupiah(mapping.harga_modal.toString())}</td>
									<td>Rp${formatRupiah(mapping.harga)}</td>
									<td>${formatRupiah(mapping.stok.toString())}</td>
									<td>${mapping.satuan}</td>
									<td>${mapping.deskripsi}</td>
									<td>
										<div class="d-flex order-actions">
											<a href="#/" onclick="window.location.href='<?=base_url().$function;?>/produkManage/${mapping.id}'" class=""><i class='bx bxs-edit'></i></a>
											<!---<a href="#/" onclick="underMaintanance();return false; openModalDelete('${mapping.uid}','kantin');" class="ms-3"><i class='bx bxs-trash'></i></a>--->
										</div>
									</td>
								</tr>
							`;
							});
							
						$('.putContentHere').html(tableColumn);
                        createPaginations(posts2.data.data, "siswa-pagination-container", "siswa-pagination-details", "showData");
							
					}
				}
				
				save2();
				
				
			}
		</script>