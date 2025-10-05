<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengecekan Absensi Siswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
            color: #333;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        
        header {
            background: #4a6fc0;
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        
        header h1 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        header p {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .date-display {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .controls {
            padding: 20px;
            background: #f6f9ff;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .input-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .input-group label {
            font-weight: 500;
            color: #444;
        }
        
        .input-group input {
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            width: 200px;
        }
        
        button {
            padding: 12px 25px;
            background: #4a6fc0;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        button:hover {
            background: #3b5aa6;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        .results {
            padding: 20px;
        }
        
        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .summary-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            border-top: 4px solid #4a6fc0;
        }
        
        .summary-card h3 {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .summary-card .number {
            font-size: 32px;
            font-weight: 600;
            color: #4a6fc0;
        }
        
        .summary-card.alumni {
            border-top-color: #6a11cb;
        }
        
        .summary-card.alumni .number {
            color: #6a11cb;
        }
        
        .summary-card.absent {
            border-top-color: #2ecc71;
        }
        
        .summary-card.absent .number {
            color: #2ecc71;
        }
        
        .summary-card.missing {
            border-top-color: #e74c3c;
        }
        
        .summary-card.missing .number {
            color: #e74c3c;
        }
        
        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
            overflow: hidden;
        }
        
        .student-table th {
            background: #4a6fc0;
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 500;
        }
        
        .student-table tr:nth-child(even) {
            background: #f6f9ff;
        }
        
        .student-table tr:hover {
            background: #e9effd;
        }
        
        .student-table td {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        
        .status-present {
            background: #e6f7ee;
            color: #2ecc71;
        }
        
        .status-absent {
            background: #feeaea;
            color: #e74c3c;
        }
        
        .loading {
            text-align: center;
            padding: 40px;
            color: #666;
        }
        
        .loading i {
            font-size: 40px;
            color: #4a6fc0;
            margin-bottom: 15px;
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: white;
            font-size: 14px;
            margin-top: auto;
        }
        
        @media (max-width: 768px) {
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .input-group {
                width: 100%;
            }
            
            .input-group input {
                flex: 1;
            }
            
            .student-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1><i class="fas fa-school"></i> Sistem Pengecekan Absensi Siswa</h1>
            <p>Memantau kehadiran siswa secara real-time</p>
            <div class="date-display">
                <i class="far fa-calendar-alt"></i> <span id="current-date">Senin, 19 Agustus 2025</span>
            </div>
        </header>
        
        <div class="controls">
            <div class="input-group">
                <label for="segment-input">ID Instansi:</label>
                <input type="text" id="segment-input" placeholder="Masukkan ID instansi">
            </div>
            
            <button id="sendBC" onclick="sendBroadcastMessage()" style="background:#af0000;">
                <i class="fas fa-message"></i> Send Broadcast Message
            </button>
            <button id="check-btn" onclick="checkAttendance()">
                <i class="fas fa-sync-alt"></i> Periksa Absensi
            </button>
        </div>
        
        <div class="results">
            <div class="summary">
                <div class="summary-card">
                    <h3>Total Siswa</h3>
                    <div class="number">0</div>
                </div>
                <div class="summary-card alumni">
                    <h3>Jumlah Alumni</h3>
                    <div class="number">0</div>
                </div>
                <div class="summary-card absent">
                    <h3>Sudah Absen</h3>
                    <div class="number">0</div>
                </div>
                <div class="summary-card missing">
                    <h3>Belum Absen</h3>
                    <div class="number">0</div>
                </div>
            </div>
            
            <div class="loading">
                <i class="fas fa-spinner fa-spin"></i>
                <p>Data belum diperiksa. Klik tombol "Periksa Absensi" untuk memulai.</p>
            </div>
            
            <table class="student-table" style="display: none;">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Nomor Orang Tua</th>
                        <th>Instansi</th>
                        <th>Status Absensi</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be populated here -->
                </tbody>
            </table>
        </div>
    </div>
    
    <footer>
        <p>© 2025 QRION Smart School | Dibuat dengan <i class="fas fa-heart" style="color: #e74c3c;"></i></p>
    </footer>

    <script>
		const lastSegment = window.location.pathname.split('/').pop();


		
		let toSend = [];
		let todayFormatted;
        // Set current date
        const today = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = today.toLocaleDateString('id-ID', options);

		const today2 = new Date();
		// Add 7 hours to convert UTC to WIB (UTC+7)
		const indonesiaTime = new Date(today.getTime() + (7 * 60 * 60 * 1000));
		const indonesiaDate = indonesiaTime.toISOString().split('T')[0];
        
        // Your function with the logic to find students without attendance
        async function callAllDataToUpdate(lastSegment) {
            try {
                
                // Fetch all data
                const res1 = await axios.get('<?= base_url(); ?>CPanel_Admin/showdata_kelengkapan_from_3rd_party/'+lastSegment);
                const getDataOrtuOncard = res1.data.data;

                // Fetch alumni data
                const res2 = await axios.get('<?= base_url(); ?>CPanel_Admin/showdata_kelengkapan_dataabsensi_from_3rd_party_alumni/'+lastSegment);
                const getWalitoSiswaTuition = res2.data.data;

                // Fetch attendance data
                const res3 = await axios.get('<?= base_url(); ?>CPanel_Admin/showdata_kelengkapan_dataabsensi_from_3rd_party/'+lastSegment+"/"+indonesiaDate);
                const getTagihan = res3.data.data;

                // Process the data to find students without attendance
                processAttendanceData(getDataOrtuOncard, getWalitoSiswaTuition, getTagihan, indonesiaDate);
                
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
        
        
		
		async function callAllDataToUpdateSendMessage(lastSegment) {
            try {
                
                // Fetch all data
                const res1 = await axios.get('<?= base_url(); ?>CPanel_Admin/showdata_kelengkapan_from_3rd_party/'+lastSegment);
                const getDataOrtuOncard = res1.data.data;

                // Fetch alumni data
                const res2 = await axios.get('<?= base_url(); ?>CPanel_Admin/showdata_kelengkapan_dataabsensi_from_3rd_party_alumni/'+lastSegment);
                const getWalitoSiswaTuition = res2.data.data;

                // Fetch attendance data
                const res3 = await axios.get('<?= base_url(); ?>CPanel_Admin/showdata_kelengkapan_dataabsensi_from_3rd_party/'+lastSegment+"/"+indonesiaDate);
                const getTagihan = res3.data.data;

                // Process the data to find students without attendance
                processAttendanceDataSendMessage(getDataOrtuOncard, getWalitoSiswaTuition, getTagihan, indonesiaDate);
                
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
        
        // Process the data to find students who haven't attended today
        function processAttendanceData(allStudents, alumni, absensi, todayFormatted) {

		
            // Filter out alumni
            const nonAlumniStudents = allStudents.filter(student => 
                !alumni.some(alum => alum.network_identity === student.user_id)
            );
            
            // Find students who haven't attended today
            const studentsWithoutAttendance = nonAlumniStudents.filter(student => 
                !absensi.some(absen => absen.oncard_user_id === student.user_id)
            );
            
            // Update summary cards
            document.querySelectorAll('.summary-card .number')[0].textContent = allStudents.length;
            document.querySelectorAll('.summary-card .number')[1].textContent = alumni.length;
            document.querySelectorAll('.summary-card .number')[2].textContent = nonAlumniStudents.length - studentsWithoutAttendance.length;
            document.querySelectorAll('.summary-card .number')[3].textContent = studentsWithoutAttendance.length;
            
            // Populate the table
            const tableBody = document.querySelector('.student-table tbody');
            tableBody.innerHTML = '';
            

			toSend = [];

            nonAlumniStudents.forEach((student, index) => {
                const hasAttended = absensi.some(absen => absen.oncard_user_id === student.user_id);
				
				if(!hasAttended){

					let pesanText = `*❌ INFORMASI ABSEN HARI INI*
Ananda ${student.nama_lengkap} pada hari ini (${indonesiaDate}) sampai dengan pukul 07.30 belum melakukan absensi kedatangan di sekolah.

Jika ada kekeliruan pada informasi ini, harap hubungi Admin Sekolah. Terimakasih.`;

					toSend.push({
						'nama_siswa' : student.nama_lengkap,
						'telp_ortu' : student.telp_ortu,
						'pesan' : pesanText,
					})
				}
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${student.nama_lengkap}</td>
                    <td>${student.telp_ortu}</td>
                    <td>${student.namaInstansi}</td>
                    <td>
                        <span class="status-badge ${hasAttended ? 'status-present' : 'status-absent'}">
                            ${hasAttended ? 'Sudah Absen' : 'Belum Absen'}
                        </span>
                    </td>
                    <td>${hasAttended ? 'Siswa telah absen hari ini' : 'Siswa tersebut belum melakukan absen pada hari ini (' + todayFormatted + ')'}</td>
                `;
                
                tableBody.appendChild(row);
            });
            
            // Hide loading, show table
            document.querySelector('.loading').style.display = 'none';
            document.querySelector('.student-table').style.display = 'table';

			// sendAllPushNotificationsSequentially();
        }
        
		
		function processAttendanceDataSendMessage(allStudents, alumni, absensi, todayFormatted) {

		
            // Filter out alumni
            const nonAlumniStudents = allStudents.filter(student => 
                !alumni.some(alum => alum.network_identity === student.user_id)
            );
            
            // Find students who haven't attended today
            const studentsWithoutAttendance = nonAlumniStudents.filter(student => 
                !absensi.some(absen => absen.oncard_user_id === student.user_id)
            );
            
            // Update summary cards
            document.querySelectorAll('.summary-card .number')[0].textContent = allStudents.length;
            document.querySelectorAll('.summary-card .number')[1].textContent = alumni.length;
            document.querySelectorAll('.summary-card .number')[2].textContent = nonAlumniStudents.length - studentsWithoutAttendance.length;
            document.querySelectorAll('.summary-card .number')[3].textContent = studentsWithoutAttendance.length;
            
            // Populate the table
            const tableBody = document.querySelector('.student-table tbody');
            tableBody.innerHTML = '';
            

			toSend = [];

			let a=1;

            nonAlumniStudents.forEach((student, index) => {
                const hasAttended = absensi.some(absen => absen.oncard_user_id === student.user_id);
				
				if(!hasAttended){

					let pesanText = `*❌ INFORMASI ABSEN HARI INI*
Ananda ${student.nama_lengkap} tidak melakukan absensi kelengkapan pada hari ini (${indonesiaDate}) sampai dengan pukul 07.30 belum melakukan absensi kedatangan di sekolah.

Jika ada kekeliruan pada informasi ini, harap hubungi Admin Sekolah. Terimakasih.`;

					toSend.push({
						'nama_siswa' : student.nama_lengkap,
						'telp_ortu' : student.telp_ortu,
						'pesan' : pesanText,
					});

					const row = document.createElement('tr');
					row.innerHTML = `
						<td>${a++}</td>
						<td>${student.nama_lengkap}</td>
						<td>${student.telp_ortu}</td>
						<td>${student.namaInstansi}</td>
						<td>
							<span class="status-badge ${hasAttended ? 'status-present' : 'status-absent'}">
								${hasAttended ? 'Sudah Absen' : 'Belum Absen'}
							</span>
						</td>
						<td>${hasAttended ? 'Siswa telah absen hari ini' : 'Siswa tersebut belum melakukan absen pada hari ini (' + todayFormatted + ')'}</td>
					`;
					
					tableBody.appendChild(row);
				}
                
               
            });
            
            // Hide loading, show table
            document.querySelector('.loading').style.display = 'none';
            document.querySelector('.student-table').style.display = 'table';

			sendAllPushNotificationsSequentially();
        }
        
        // Wrapper function for the UI
        function checkAttendance() {
            const segmentInput = document.getElementById('segment-input').value;
            if (!segmentInput) {
                alert('Masukkan ID Segmen terlebih dahulu!');
                return;
            }
            
            // Show loading state
            document.querySelector('.loading').style.display = 'block';
            document.querySelector('.student-table').style.display = 'none';
            
            // Call your function
            callAllDataToUpdate(segmentInput);
        }
        
		
		function sendBroadcastMessage() {
            const segmentInput = document.getElementById('segment-input').value;
            if (!segmentInput) {
                alert('Masukkan ID Segmen terlebih dahulu!');
                return;
            }
            
            // Show loading state
            document.querySelector('.loading').style.display = 'block';
            document.querySelector('.student-table').style.display = 'none';
            
            // Call your function
            callAllDataToUpdateSendMessage(segmentInput);
        }
        
        // Initialize with some data for demonstration
        window.onload = function() {
			document.getElementById('segment-input').value = lastSegment;
			
			setTimeout(function() {
				document.getElementById('sendBC').click();
			}, 250); // 250ms delay
		};

		async function sendAllPushNotificationsSequentially() {
			for (const group of toSend) {
				const payload = {
					noWA: group.telp_ortu,
					pesan: group.pesan,
					kodeInstansi: lastSegment,
					nama_siswa: group.nama_siswa,
				};

				console.log('📦 Sending Push Payload:', payload);
				await sendAbsenceNotifications(payload);
			}
		}


		async function sendAbsenceNotifications(payload) {
			if (!payload || payload.length === 0) {
				console.log("No notifications to send");
				return;
			}

			var form_data = new FormData();
			form_data.append('noWA', payload.noWA);
			form_data.append('pesan', payload.pesan);
			form_data.append('kodeInstansi', payload.kodeInstansi);
			form_data.append('nama_siswa', payload.nama_siswa);
			
			return axios.post('<?= base_url(); ?>WebhookOncard/sendMessageAbsenKelengkapan', form_data).then(response => {
				Toastify({
					text: 'Pesan telah dikirim.',
					duration: 3000,
					close: true,
					gravity: "top",
					position: "right",
					className: "successMessage",

				}).showToast();

				// bootstrap.Modal.getInstance(document.getElementById('notifModal')).hide();
			}).catch(error => {
				// alert("Gagal mengirim notifikasi: " + error);
			});
		}
    </script>
</body>
</html>