<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notify</title>

	<script src="<?=base_url();?>assets_oncard/js/jquery.min.js"></script>
	
	<!--plugins-->
    
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets_oncard/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="<?=base_url();?>assets_oncard/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="<?=base_url();?>assets_oncard/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?=base_url();?>assets_oncard/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    
	<!-- loader-->
	<link href="<?=base_url();?>assets_oncard/css/pace.min.css" rel="stylesheet" />
	<script src="<?=base_url();?>assets_oncard/js/pace.min.js"></script>
    <!-- sweetalert -->
	<link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?=base_url();?>assets_oncard/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/app.css" rel="stylesheet">
	<link href="<?=base_url();?>assets_oncard/css/icons.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
    <!-- addons -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
	<!-- <link rel="stylesheet" href="<?=base_url();?>assets_oncard/css/dark-theme.css"/> -->
  
    <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css/style_universal.css">
	
	<style>
		.page-wrapper {
		height: 100%;
		margin-top: 0!important;
		margin-bottom: 0!important;
		margin-left: 0!important;}
	</style>
	<style>
	#notifTable td:nth-child(2) {
	white-space: normal !important;
	word-wrap: break-word;
	word-break: break-all;
	max-width: 150px;
	}
	</style>


</head>
<body>

<div class="page-wrapper">
			<div class="page-content">
			<div class="row table-responsive">
				<div class="col-12">
<table id="notifTable" class="display table table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>User Name</th>
            <th>Token</th>
            <th>Title</th>
            <th>Body</th>
            <th>Siswa</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

</div>
</div>
</div>
</div>

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
<script src="https://cdn.jsdelivr.net/npm/@linways/table-to-excel@1.0.4/dist/tableToExcel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script type="text/javascript">moment.locale('id');</script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<!-- jQuery + DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


<script>

	let groupedArray;

	$(document).ready(function () {
		// callDataToUpdate();
		callAllDataToUpdate();
	});

	async function callAllDataToUpdate() {
		try {
			// 1. Parent User
			const res1 = await axios.get('<?= base_url(); ?>CPanel_Admin/ShowDataFCMTokenAutoBot_1');
			const getDataOrtuOncard = res1.data.data;

			// 2. Wali <-> Siswa Map
			const res2 = await axios.get('<?= base_url(); ?>CPanel_Admin/ShowDataFCMTokenAutoBot_2');
			const getWalitoSiswaTuition = res2.data.data;

			// 3. Billing Info
			const res3 = await axios.get('<?= base_url(); ?>CPanel_Admin/ShowDataFCMTokenAutoBot_3');
			const getTagihan = res3.data.data;

			const tempGrouped = {}; // grouped per user_id
			const finalGroupedByToken = {}; // final grouped per token_firebase

			// STEP 1: Group individually per user_id first (same as your current structure)
			getDataOrtuOncard.forEach(user => {
				getWalitoSiswaTuition.forEach(student => {
					const userId = student.siswa_user_id;
					if (student.oncard_user_id !== user.user_id_ortu) return;

					const matchedTagihan = getTagihan.filter(tagihan => tagihan.user_id == student.siswa_user_id);
					if (matchedTagihan.length === 0) return;

					if (!tempGrouped[userId]) {
						tempGrouped[userId] = {
							user_oncard_id: user.user_id_ortu,
							user_id: userId,
							nama_lengkap: user.nama_lengkap,
							username: user.username,
							no_telepon: user.no_telepon,
							token_firebase: user.token_firebase,
							title: 'Reminder Pembayaran Tagihan',
							body: '',
							siswa_list: []
						};
					}

					let tagihanText = '';
					const uniqueTagihan = new Set();

					matchedTagihan.forEach(tag => {
						if (tag.status_pembayaran !== "belum lunas") return;

						const tagKey = `${tag.nama_tagihan}-${tag.jumlah_belum_dibayarkan}-${tag.tanggal_jatuh_tempo}`;
						if (uniqueTagihan.has(tagKey)) return;
						uniqueTagihan.add(tagKey);

						tagihanText += `- ${tag.nama_tagihan} sebesar Rp ${parseInt(tag.jumlah_belum_dibayarkan).toLocaleString('id-ID')} (Jatuh Tempo: ${tag.tanggal_jatuh_tempo})\n`;
					});

					if (!tagihanText) return;

					// Add siswa to list if not already
					const isSiswaAlreadyAdded = tempGrouped[userId].siswa_list.some(s => s.siswa_id === student.siswa_id);
					if (!isSiswaAlreadyAdded) {
						tempGrouped[userId].siswa_list.push({
							nama_siswa: student.siswa_nama,
							instansi_name: student.organame,
							siswa_id: student.siswa_id,
							tagihan: matchedTagihan,
							username: user.username,
							no_telepon: user.no_telepon,
							nama_lengkap: user.nama_lengkap,
							user_oncard_id: user.user_oncard_id,
						});
					}

					// Add tagihan body text
					const bodySection = `Tagihan untuk siswa ${student.siswa_nama}:\n${tagihanText}\n`;
					if (!tempGrouped[userId].body.includes(bodySection)) {
						tempGrouped[userId].body += bodySection;
					}
				});
			});

			// STEP 2: Merge per token_firebase
			Object.values(tempGrouped).forEach(entry => {
				const token = entry.token_firebase;
				if (!token) return;

				if (!finalGroupedByToken[token]) {
					finalGroupedByToken[token] = {
						token_firebase: token,
						username: entry.username,
						no_telepon: entry.no_telepon,
						user_oncard_id: entry.user_oncard_id,
						title: 'Reminder Pembayaran Tagihan',
						body: '',
						users: new Set(),
						user_ids: new Set(),
						siswa_list: []
					};
				}

				const group = finalGroupedByToken[token];
				group.body += entry.body;
				group.users.add(entry.nama_lengkap);
				group.user_ids.add(entry.user_id);
				group.siswa_list.push(...entry.siswa_list);
			});

			// STEP 3: Format to array and clean up Set()
			groupedArray = Object.values(finalGroupedByToken).map(group => ({
				title: group.title,
				body: group.body,
				token_firebase: group.token_firebase,
				usernames: Array.from(group.users).join(', '),
				user_ids: Array.from(group.user_ids),
				siswa_list: group.siswa_list,
				username: group.username,
				no_telepon: group.no_telepon,
				user_oncard_id: group.user_oncard_id,
				nama_lengkap: group.nama_lengkap??'Not yet available.',
			}));

			// STEP 4: Send or preview
			groupedArray.forEach(group => {
				const payload = {
					title: group.title,
					body: group.body,
					tokens: [{
						token: group.token_firebase,
						user: group.usernames,
						username: group.username,
						user_oncard_id: group.user_oncard_id,
						instansi: group.siswa_list[0]?.instansi_id ?? null,
						user_id: group.user_id,
					}]
				};

				
			});

			async function sendAllPushNotificationsSequentially() {
				for (const group of groupedArray) {
					const payload = {
						title: group.title,
						body: group.body,
						tokens: [{
							token: group.token_firebase,
							user: group.usernames,
							username: group.username,
							no_telepon: group.no_telepon,
							user_oncard_id: group.user_oncard_id,
							instansi: group.siswa_list[0]?.instansi_id ?? null,
							user_id: group.user_id,
						}]
					};

					console.log('📦 Sending Push Payload:', payload);
					await sendPushNotification(payload);
				}
			}

			sendAllPushNotificationsSequentially(); // Call it here

			function sendPushNotification(payload) {
				return axios.post('<?= base_url(); ?>CPanel_Admin/SendPushNotificationAutoBotMono', payload).then(response => {
					Toastify({
						text: response.data.message,
						duration: 3000,
						close: true,
						gravity: "top",
						position: "right",
						className: "successMessage",

					}).showToast();

					// bootstrap.Modal.getInstance(document.getElementById('notifModal')).hide();
				}).catch(error => {
					alert("Gagal mengirim notifikasi: " + error);
				});
			}

			console.log({
				status: true,
				data: groupedArray
			});


			runNext();

		} catch (err) {
			if (err.response?.data?.error) {
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
			} else {
				console.error("❌ Error tidak terduga:", err);
			}
		}
	}

</script>

<script>
	function runNext(){
		// Simulate fetching or use your actual data
		const response = {
			status: true,
			data: groupedArray // <-- use from previous logic
		};

		const tableData = response.data.map(group => ({
			user: group.usernames,
			token: group.token_firebase,
			title: group.title,
			body: group.body.replace(/\n/g, '<br>'),
			siswa: group.siswa_list.map(s => s.nama_siswa).join('<br>'),
			status: 'Not Sent',
			payload: {
				title: group.title,
				body: group.body,
				tokens: [{
					token: group.token_firebase,
					user: group.usernames,
					username: group.username,
					user_oncard_id: group.user_oncard_id,
					instansi: group.siswa_list[0]?.instansi_id ?? null,
					user_id: group.user_id,
				}]
			}
		}));

		const table = $('#notifTable').DataTable({
			data: tableData,
			columns: [
				{ data: 'user' },
				{ data: 'token' },
				{ data: 'title' },
				{ data: 'body' },
				{ data: 'siswa' },
				{ data: 'status' },
				{
					data: null,
					render: function (data, type, row, meta) {
						return `<button class="send-btn btn btn-sm btn-primary" data-row="${meta.row}">Send</button>`;
					}
				}
			],
			columnDefs: [
			{
				targets: 1, // index for 'token' column
				width: '150px'
			}
			]

		});

		// Handle click on send button
		$('#notifTable tbody').on('click', '.send-btn', function () {
			const rowIdx = $(this).data('row');
			const rowData = table.row(rowIdx).data();

			// Simulate sending push (replace with real sendPushNotification function)
			sendPushNotification(rowData.payload)
				.then(result => {
					rowData.status = 'Sent';
					table.row(rowIdx).data(rowData).invalidate().draw();
				})
				.catch(err => {
					rowData.status = 'Failed';
					table.row(rowIdx).data(rowData).invalidate().draw();
				});
		});

		// Dummy push notification function (simulate async)
		function sendPushNotification(payload) {
			return axios.post('<?= base_url(); ?>CPanel_Admin/SendPushNotificationAutoBotMono', payload).then(response => {
				Toastify({
					text: response.data.message,
					duration: 3000,
					close: true,
					gravity: "top",
					position: "right",
					className: "successMessage",

				}).showToast();

				// bootstrap.Modal.getInstance(document.getElementById('notifModal')).hide();
			}).catch(error => {
				alert("Gagal mengirim notifikasi: " + error);
			});
		}

	}
</script>

</body>
</html>
