

<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Oncard v2.0 © <?=date('Y');?>. All right reserved.</p>
		</footer>
	</div>

	<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Hapus Data</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Dengan memilih tombol <b>Hapus</b> dibawah ini, Anda dengan bersedia bahwa data tersebut dihapus pada sistem.<br/>Yakin ingin menghapus?</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
					<button type="button" onclick="commitDelete();" class="btn btn-primary">Hapus</button>
				</div>
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?=base_url();?>assets_oncard/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	
	<script src="<?=base_url();?>assets_oncard/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/chartjs/js/Chart.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="<?=base_url();?>assets_oncard/plugins/select2/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/id.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
	<script src="<?=base_url();?>assets_oncard/js/index.js"></script>
	<!--app JS-->
	<script src="<?=base_url();?>assets_oncard/js/app.js"></script>

    <script src="https://momentjs.com/downloads/moment.js"></script>
	<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
	<script type="text/javascript">moment.locale('id');</script>

	<script type="text/javascript">

        
		let uidsett = '';
		let tablesett = '';
		function openModalDelete(id, table){
			$('#modalDelete').modal('toggle');
			uidsett = id;
			tablesett = table;
		}

		function underMaintanance(){
			Toastify({
				text: "Fitur ini sedang dalam pengembangan dan pengujian",
				duration: 3000,
				close: true,
				gravity: "bottom",
				position: "left",
				className: "infoMessage",

			}).showToast();
		}

		function commitDelete(){
			const save = async (uidsett) => {
				const posts = await axios.delete('<?= api_url(); ?>api/v1/'+tablesett+'/destroy/' + uidsett, {
					headers: {
						'Authorization': 'Bearer ' + sessionStorage.getItem('_token')
					}
				}).catch((err) => { 

					if(err.error){
						Toastify({
							text: 'Maaf. Data tidak ditemukan.',
							duration: 3000,
							close: true,
							gravity: "bottom",
							position: "left",
							className: "errorMessage",

						}).showToast();
						return false;
					}

					for (const key in err.response.data.error) {
							Toastify({
								text: err.response.data.error[key],
								duration: 3000,
								close: true,
								gravity: "bottom",
								position: "left",
								className: "errorMessage",

							}).showToast();
						}
				});

				if (posts.status == 200) {

					Toastify({
						text: posts.message,
						duration: 3000,
						close: true,
						gravity: "top",
						position: "left",
						className: "successMessage",

					}).showToast();

					showData();
					uidsett = '';
					tablesett = '';

					$('#modalDelete').modal('toggle');


				} else {

				}
			}

			save(uidsett);
		}

		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
</body>

</html>