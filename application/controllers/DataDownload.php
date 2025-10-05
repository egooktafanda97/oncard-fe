<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') or exit('No direct script access allowed');

class DataDownload extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agivest_model');
        $this->load->model('Home_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('cookie');
        $this->load->helper('html');
        $this->load->helper('string');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('upload');
    }


    public function export_jurnal_csv()
    {
        // Set timeout to 60 seconds
        set_time_limit(1000);

        // Set parameters with validation
        $date_from = $this->input->get('date_from', true) ?: date('Y-m-d', strtotime('-7 days'));
        $date_to = $this->input->get('date_to', true) ?: date('Y-m-d');
        $kode_instansi = $this->input->get('kode_instansi', true) ?: '467.598.080';

        // Validate dates
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_from) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_to)) {
            die("Format tanggal tidak valid. Gunakan format YYYY-MM-DD");
        }

        // Build API URL
        $api_url = "https://oncard.id/app/api/report-dashboard/jurnal?" . http_build_query([
            'date_from' => $date_from,
            'date_to' => $date_to,
            'kode_instansi' => $kode_instansi
        ]);

        // Initialize cURL with comprehensive options
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 300, // Increased timeout
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_SSL_VERIFYPEER => false, // Only for testing, remove in production
            CURLOPT_SSL_VERIFYHOST => 0, // Only for testing, remove in production
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ]);

        $response = curl_exec($ch);
        
        // Check for cURL errors first
        if (curl_errno($ch)) {
            $error_msg = 'cURL Error (' . curl_errno($ch) . '): ' . curl_error($ch);
            curl_close($ch);
            die("Gagal terhubung ke server: " . $error_msg);
        }

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Handle HTTP errors
        if ($http_code === 0) {
            die("Tidak dapat terhubung ke server API. Periksa koneksi internet atau konfigurasi server.");
        }

        if ($http_code !== 200) {
            die("API mengembalikan kode status: $http_code");
        }

        $data = json_decode($response, true);
        if (!$data || !isset($data['status'])) {
            die("Respon API tidak valid");
        }

        if (!$data['status'] || empty($data['data'])) {
            die("Tidak ada data yang tersedia untuk parameter yang dipilih");
        }

        // Generate CSV
        $this->generate_csv($data['data'], 'Laporan_Jurnal_' . $date_from . '_sd_' . $date_to);
    }

    private function generate_csv($data, $filename)
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '.csv"');
        
        $output = fopen('php://output', 'w');
        
        // Add BOM for UTF-8
        fwrite($output, "\xEF\xBB\xBF");
        
        // Header row
        fputcsv($output, [
            'No',
            'Nomor Invoice',
            'Tanggal',
            'Nama Pembeli',
            'No. Rekening',
            'Tipe Transaksi',
            'Debit (Rp)',
            'Kredit (Rp)',
            'Saldo (Rp)',
            'Keterangan',
            'Status'
        ]);
        
        // Data rows
        foreach ($data as $index => $record) {
            fputcsv($output, [
                $index + 1,
                $record['invoice'] ?? '-',
                isset($record['created_at']) ? date('d/m/Y H:i', strtotime($record['created_at'])) : '-',
                $record['account']['customers_name'] ?? '-',
                $record['account']['account_number'] ?? '-',
                $record['management_type']['name_type'] ?? '-',
                isset($record['debit_amount']) ? number_format($record['debit_amount'], 0, ',', '.') : '0',
                isset($record['credit_amount']) ? number_format($record['credit_amount'], 0, ',', '.') : '0',
                isset($record['balance']) ? number_format($record['balance'], 0, ',', '.') : '0',
                $record['description'] ?? '-',
                $record['status']['status'] ?? '-'
            ]);
        }
        
        fclose($output);
        exit;
    }



//////////////////////////////////////////////////////////////////



    public function export_jurnal_csv_advanced()
    {
        // Set extended timeout for large exports
        set_time_limit(180); // 3 minutes
        
        // Validate and sanitize input parameters
        $params = $this->validate_and_sanitize_inputs();
        
        // Build and validate API URL
        $api_url = $this->build_api_url($params);
        
        // Execute API request
        $response = $this->execute_api_request($api_url);
        
        // Process response and generate CSV
        $this->process_response_and_generate_csv_advanced($response, $params);
    }
    
    public function export_jurnal_csv_ontime()
    {
        // Set extended timeout for large exports
        set_time_limit(180); // 3 minutes

        $params = $this->validate_and_sanitize_inputs();
        
        // Extract parameters
        $date_from = $params['date_from'];
        $date_to = $params['date_to'];
        $instansiID = $params['kode_instansi'];
        
        // First get all teachers
        $getDataGuru = $this->Home_model->getSelectData3rd(
            "id, name",
            "users",
            "WHERE organisasi_id = '$instansiID' 
            AND role = 'general' 
            AND status_id = 1
            ORDER BY name ASC"
        )->result_array();

        // Get attendance data
        $getDataAbsensi = $this->Home_model->getSelectData3rd(
            "a.id, a.tanggal_absen, a.jam_absen, a.user_absensi_id, 
            j.jam_mulai, j.jam_selesai, a.sub_kelas_id, a.keterangan_absen_id,
            u.name as nama_guru, sk.name as nama_kelas, ka.name as keterangan_absen, kab.name as kategoriabsen",
            "absensi a",
            "LEFT JOIN users u ON a.user_absensi_id = u.id
            LEFT JOIN jadwal_pelajaran j ON a.jadwal_id = j.id
            LEFT JOIN m_sub_kelas sk ON a.sub_kelas_id = sk.id
            LEFT JOIN m_kategori_absen kab ON a.kategori_absen_id = kab.id
            LEFT JOIN m_keterangan_absen ka ON a.keterangan_absen_id = ka.id
            WHERE a.organisasi_id = '$instansiID'
            AND a.tanggal_absen >= '$date_from' 
            AND a.tanggal_absen <= '$date_to'
            ORDER BY a.tanggal_absen ASC, a.jam_absen ASC"
        )->result_array();

        // Create date range
        $start = new DateTime($date_from);
        $end = new DateTime($date_to);
        $end = $end->modify('+1 day');
        $interval = new DateInterval('P1D');
        $date_range = new DatePeriod($start, $interval, $end);

        // Organize attendance data by date and user
        $absensi_by_date = [];
        foreach ($getDataAbsensi as $absensi) {
            $date = $absensi['tanggal_absen'];
            $user_id = $absensi['user_absensi_id'];
            
            if (!isset($absensi_by_date[$date])) {
                $absensi_by_date[$date] = [];
            }
            
            $absensi_by_date[$date][$user_id] = $absensi;
        }

        // Format the results - for each teacher and each date
        $formatted_data = [];
        foreach ($getDataGuru as $guru) {
            $guru_id = $guru['id'];
            $guru_name = $guru['name'];
            $guru_jabatan = $guru['jabatan'];
            
            foreach ($date_range as $date) {
                $date_str = $date->format('Y-m-d');
                
                if (isset($absensi_by_date[$date_str][$guru_id])) {
                    // Teacher has attendance record for this date
                    $row = $absensi_by_date[$date_str][$guru_id];
                    
                    // Determine if on time or late based on kategoriabsen
                    $status_ketepatan = '-';
                    $kategori = strtolower($row['kategoriabsen']);
                    
                    if (strpos($kategori, 'keluar kelas') !== false || strpos($kategori, 'pulang') !== false) {
                        // For "keluar kelas" category, compare with jam_selesai
                        $status_ketepatan = ($row['jam_absen'] >= $row['jam_selesai']) ? 
                                            "Tepat Waktu" : "Tidak Tepat Waktu";
                    } elseif (strpos($kategori, 'masuk') !== false || strpos($kategori, 'datang') !== false) {
                        // For "masuk" category, compare with jam_mulai
                        $status_ketepatan = ($row['jam_absen'] <= $row['jam_mulai']) ? 
                                            "Tepat Waktu" : "Tidak Tepat Waktu";
                    } else {
                        // For other categories, set default or custom logic
                        $status_ketepatan = "Tepat Waktu"; // Or whatever default you prefer
                    }
                    
                    $formatted_data[] = [
                        'Nama guru' => $guru_name,
                        'Jabatan' => $guru_jabatan,
                        'Waktu absensi' => $row['tanggal_absen'] . ' ' . $row['jam_absen'],
                        'Kategori' => $row['kategoriabsen'],
                        'Jam mulai' => $row['jam_mulai'],
                        'Jam selesai' => $row['jam_selesai'],
                        'Tepat waktu / tidak tepat waktu' => $status_ketepatan,
                        'Kelas' => $row['nama_kelas'],
                        'Keterangan absen' => $row['keterangan_absen']
                    ];
                } else {
                    // Teacher has no attendance record for this date
                    $formatted_data[] = [
                        'Nama guru' => $guru_name,
                        'Jabatan' => $guru_jabatan,
                        'Waktu absensi' => $date_str,
                        'Kategori' => '-',
                        'Jam mulai' => '-',
                        'Jam selesai' => '-',
                        'Tepat waktu / tidak tepat waktu' => '-',
                        'Kelas' => '-',
                        'Keterangan absen' => '-'
                    ];
                }
            }
        }

        // Output as JSON
        header('Content-Type: application/json');
        echo json_encode($formatted_data, JSON_PRETTY_PRINT);
        exit;
    }


    public function export_journal_csv_ontime_download()
{
    // Set extended timeout for large exports
    set_time_limit(180); // 3 minutes

    $params = $this->validate_and_sanitize_inputs();
    
    // Extract parameters
    $date_from = $params['date_from'];
    $date_to = $params['date_to'];
    $instansiID = $params['kode_instansi'];
    $jamMasuk = urldecode($params['jam_masuk']); // Convert %3A to :
    
    // Get all teachers with their schedules in a single query
    // First get the teacher data with schedules
$getDataGuru = $this->Home_model->getSelectData3rd(
    "u.id, u.name, u.network_identity,
     jp.hari, jp.jam_mulai as jadwal_jam_mulai, jp.jam_selesai as jadwal_jam_selesai,
     jp.matapelajaran_id, jp.sub_kelas_id,
     sk.name as nama_kelas, m.name as nama_mapel",
    "users u",
    "LEFT JOIN jadwal_pelajaran jp ON u.id = jp.guru_id AND jp.hari IN (1,2,3,4,5,6,7)
     LEFT JOIN m_sub_kelas sk ON jp.sub_kelas_id = sk.id
     LEFT JOIN m_matapelajaran m ON jp.matapelajaran_id = m.id
     WHERE u.organisasi_id = '$instansiID' 
     AND u.role = 'general' 
     AND u.status_id = 1
     ORDER BY u.name ASC, jp.hari ASC, jp.jam_mulai ASC"
)->result_array();

// Extract network_identity values for the general table query
$networkIdentities = array_column($getDataGuru, 'network_identity');
$networkIdentities = array_filter(array_unique($networkIdentities)); // Remove duplicates and empty values

// Get jabatan data from general table
$generalData = [];
if (!empty($networkIdentities)) {
    $idsString = "'" . implode("','", $networkIdentities) . "'";
    
    $getGeneralData = $this->Home_model->getSelectData(
        "user_id, jabatan",
        "onca_oncard_v2.general",
        "WHERE user_id IN ($idsString)"
    )->result_array();
    
    // Convert to associative array for easy lookup
    foreach ($getGeneralData as $general) {
        $generalData[$general['user_id']] = $general['jabatan'];
    }
}

// Merge jabatan data back into the main $getDataGuru array
foreach ($getDataGuru as &$guru) {
    $networkId = $guru['network_identity'];
    $guru['jabatan'] = isset($generalData[$networkId]) ? $generalData[$networkId] : '-';
}
unset($guru); // Unset reference to avoid potential issues


    // Get all attendance data in a single query
    $getDataAbsensi = $this->Home_model->getSelectData3rd(
        "a.tanggal_absen, a.jam_absen, a.user_absensi_id, 
         j.jam_mulai, j.jam_selesai, a.sub_kelas_id, a.keterangan_absen_id,
         u.name as nama_guru, sk.name as nama_kelas, ka.name as keterangan_absen, 
         kab.name as kategoriabsen, m.name nama_mapel, a.jadwal_id",
        "absensi a",
        "LEFT JOIN users u ON a.user_absensi_id = u.id
         LEFT JOIN jadwal_pelajaran j ON a.jadwal_id = j.id
         LEFT JOIN m_sub_kelas sk ON a.sub_kelas_id = sk.id
         LEFT JOIN m_kategori_absen kab ON a.kategori_absen_id = kab.id
         LEFT JOIN m_keterangan_absen ka ON a.keterangan_absen_id = ka.id
         LEFT JOIN m_matapelajaran m ON a.matapelajaran_id = m.id
         WHERE a.organisasi_id = '$instansiID'
         AND a.tanggal_absen >= '$date_from' 
         AND a.tanggal_absen <= '$date_to'
         ORDER BY a.tanggal_absen ASC, a.jam_absen ASC"
    )->result_array();

    // Create date range
    $start = new DateTime($date_from);
    $end = new DateTime($date_to);
    $end = $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $date_range = new DatePeriod($start, $interval, $end);

    // Organize teachers and their schedules
    $teachers = [];
    $teacher_schedules = [];
    
    foreach ($getDataGuru as $data) {
        $teacher_id = $data['id'];
        
        // Add teacher to list if not already present
        if (!isset($teachers[$teacher_id])) {
            $teachers[$teacher_id] = [
                'id' => $teacher_id,
                'name' => $data['name'],
                'jabatan' => $data['jabatan'],
            ];
        }
        
        // Add schedule if it exists
        if ($data['hari']) {
            if (!isset($teacher_schedules[$teacher_id])) {
                $teacher_schedules[$teacher_id] = [];
            }
            
            if (!isset($teacher_schedules[$teacher_id][$data['hari']])) {
                $teacher_schedules[$teacher_id][$data['hari']] = [];
            }
            
            $teacher_schedules[$teacher_id][$data['hari']][] = [
                'jam_mulai' => $data['jadwal_jam_mulai'],
                'jam_selesai' => $data['jadwal_jam_selesai'],
                'nama_mapel' => $data['nama_mapel'],
                'nama_kelas' => $data['nama_kelas']
            ];
        }
    }

    // Organize attendance data by date and user
    $absensi_by_date = [];
    foreach ($getDataAbsensi as $absensi) {
        $date = $absensi['tanggal_absen'];
        $user_id = $absensi['user_absensi_id'];
        
        if (!isset($absensi_by_date[$date])) {
            $absensi_by_date[$date] = [];
        }
        
        if (!isset($absensi_by_date[$date][$user_id])) {
            $absensi_by_date[$date][$user_id] = [];
        }
        
        $absensi_by_date[$date][$user_id][] = $absensi;
    }

    // Function to calculate time difference in human readable format
    function getTimeDifference($time1, $time2) {
        $datetime1 = new DateTime($time1);
        $datetime2 = new DateTime($time2);
        $interval = $datetime1->diff($datetime2);
        
        $result = "";
        if ($interval->h > 0) {
            $result .= $interval->h . " jam ";
        }
        if ($interval->i > 0) {
            $result .= $interval->i . " menit ";
        }
        if ($interval->s > 0 && $interval->h == 0 && $interval->i == 0) {
            $result .= $interval->s . " detik ";
        }
        
        return trim($result);
    }

    // Create CSV content
    $csv_data = "";
    
    // Create header row
    $headers = ['Nama Guru'];
    $headers[] = 'Jabatan'; // Add Jabatan column header
    foreach ($date_range as $date) {
        $date_str = $date->format('Y-m-d');
        $headers[] = $date_str;
    }
    
    
    // Add headers to CSV
    $csv_data .= '"' . implode('","', $headers) . '"' . "\n";
    
    // Add data for each teacher
    foreach ($teachers as $teacher) {
        $teacher_id = $teacher['id'];
        $teacher_name = $teacher['name'];
        $teacher_jabatan = $teacher['jabatan'];
        
        // Teacher name in first column
        $row_data = ['"' . $teacher_name . '"'];
        
        // Add jabatan as the last column
            $row_data[] = '"' . $teacher_jabatan . '"';

        // Add attendance data for each date
        foreach ($date_range as $date) {
            $date_str = $date->format('Y-m-d');
            $day_of_week = $date->format('N'); // 1 (Monday) to 7 (Sunday)
            
            // Check if teacher has schedule for this day
            $has_schedule = isset($teacher_schedules[$teacher_id][$day_of_week]);
            
            // Build schedule info
            $schedule_info = "";
            if ($has_schedule) {
                $schedule_info = "JADWAL:\n";
                foreach ($teacher_schedules[$teacher_id][$day_of_week] as $schedule) {
                    $schedule_info .= $schedule['jam_mulai'] . " - " . $schedule['jam_selesai'] . 
                                     ": " . $schedule['nama_mapel'] . " (" . $schedule['nama_kelas'] . ")\n";
                }
            }
            
            // Check for attendance
            if (isset($absensi_by_date[$date_str][$teacher_id])) {
                $attendance_records = $absensi_by_date[$date_str][$teacher_id];
                $attendance_infos = [];
                
                // Process each attendance record
                foreach ($attendance_records as $attendance) {
                    // Determine if on time or late
                    $status_ketepatan = '-';
                    $kategori = strtolower($attendance['kategoriabsen']);
                    $is_late = false;
                    $time_difference = "";
                    
                    // Special handling for "masuk sekolah" category
                    $jam_pembanding = $attendance['jam_mulai'];
                    $jam_pembanding_display = $attendance['jam_mulai'];
                    
                    if (strpos($kategori, 'masuk sekolah') !== false) {
                        $jam_pembanding = $jamMasuk;
                        $jam_pembanding_display = $jamMasuk . " (Jam Masuk Sekolah)";
                        $is_late = ($attendance['jam_absen'] > $jam_pembanding);
                        $status_ketepatan = $is_late ? "Tidak Tepat Waktu" : "Tepat Waktu";
                        
                        // Calculate time difference
                        if ($is_late) {
                            $time_difference = "Terlambat: " . getTimeDifference($jam_pembanding, $attendance['jam_absen']);
                        } else if ($attendance['jam_absen'] < $jam_pembanding) {
                            $time_difference = "Awal: " . getTimeDifference($attendance['jam_absen'], $jam_pembanding);
                        }
                    } elseif (strpos($kategori, 'keluar kelas') !== false || strpos($kategori, 'pulang') !== false) {
                        $is_late = ($attendance['jam_absen'] < $attendance['jam_selesai']);
                        $status_ketepatan = $is_late ? "Tidak Tepat Waktu" : "Tepat Waktu";
                        
                        // Calculate time difference
                        if ($is_late) {
                            $time_difference = "Pulang lebih awal: " . getTimeDifference($attendance['jam_absen'], $attendance['jam_selesai']);
                        } else if ($attendance['jam_absen'] > $attendance['jam_selesai']) {
                            $time_difference = "Pulang terlambat: " . getTimeDifference($attendance['jam_selesai'], $attendance['jam_absen']);
                        }
                    } elseif (strpos($kategori, 'masuk') !== false || strpos($kategori, 'datang') !== false) {
                        $is_late = ($attendance['jam_absen'] > $jam_pembanding);
                        $status_ketepatan = $is_late ? "Tidak Tepat Waktu" : "Tepat Waktu";
                        
                        // Calculate time difference
                        if ($is_late) {
                            $time_difference = "Terlambat: " . getTimeDifference($jam_pembanding, $attendance['jam_absen']);
                        } else if ($attendance['jam_absen'] < $jam_pembanding) {
                            $time_difference = "Awal: " . getTimeDifference($attendance['jam_absen'], $jam_pembanding);
                        }
                    } else {
                        $status_ketepatan = "Tepat Waktu";
                    }
                    
                    // Create attendance info
                    $attendance_info = 
                        "Waktu: " . $attendance['jam_absen'] . "\n" .
                        "Kategori: " . $attendance['kategoriabsen'] . "\n" .
                        "Mata Pelajaran: " . $attendance['nama_mapel'] . "\n" .
                        "Jam Mulai: " . $jam_pembanding_display . "\n" .
                        "Jam Selesai: " . $attendance['jam_selesai'] . "\n" .
                        "Status: " . $status_ketepatan . "\n";
                    
                    // Add time difference if available
                    if (!empty($time_difference)) {
                        $attendance_info .= "Selisih Waktu: " . $time_difference . "\n";
                    }
                    
                    $attendance_info .=
                        "Kelas: " . $attendance['nama_kelas'] . "\n" .
                        "Keterangan: " . $attendance['keterangan_absen'];
                    
                    // Add color indicator
                    if ($is_late) {
                        $attendance_info = "[RED] " . $attendance_info;
                    }
                    
                    $attendance_infos[] = $attendance_info;
                }
                
                // Combine all attendance records
                $combined_info = implode("\n--------------------\n", $attendance_infos);
                
                // Add schedule information if available
                if ($has_schedule) {
                    $combined_info = $schedule_info . "\nABSENSI:\n" . $combined_info;
                }
                
                $row_data[] = '"' . $combined_info . '"';
            } else {
                // No attendance record
                if ($has_schedule) {
                    // Add [GREY] indicator for schedules without attendance
                    $no_attendance_info = "[GREY] Tidak melakukan absen pada jadwal ini\n\n" . $schedule_info;
                    $row_data[] = '"' . $no_attendance_info . '"';
                } else {
                    $row_data[] = '"Tidak ada jadwal & absensi"';
                }
            }
        }
        
        // Add row to CSV
        $csv_data .= implode(',', $row_data) . "\n";
    }
    
    // Set download headers
    $filename = "laporan_absensi_guru_" . date('Y-m-d') . ".csv";
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    // Output CSV
    echo $csv_data;
    exit;
}



public function export_journal_csv_ontime_download_secondary()
{
    $summary = '';
    // Set extended timeout for large exports
    set_time_limit(300);

    $params = $this->validate_and_sanitize_inputs();
    
    // Extract parameters
    $date_from = $params['date_from'];
    $date_to = $params['date_to'];
    $instansiID = $params['kode_instansi'];
    $jamMasuk = urldecode($params['jam_masuk']);

    // Get all teachers with their schedules
    $getDataGuru = $this->Home_model->getSelectData3rd(
        "u.id, 
        u.name, 
        u.network_identity,
        jp.hari, 
        jp.jam_mulai AS jadwal_jam_mulai, 
        jp.jam_selesai AS jadwal_jam_selesai,
        jp.matapelajaran_id, 
        jp.sub_kelas_id,
        sk.name AS nama_kelas, 
        m.name AS nama_mapel, 
        jp.id AS jadwal_id",
        "users u",
        "LEFT JOIN general_detail gd 
                ON gd.user_id = u.id
        LEFT JOIN jadwal_pelajaran jp 
                ON gd.id = jp.guru_id
            AND jp.hari IN ('1','2','3','4','5','6','7')
        LEFT JOIN m_sub_kelas sk 
                ON jp.sub_kelas_id = sk.id
        LEFT JOIN m_matapelajaran m 
                ON jp.matapelajaran_id = m.id
        WHERE u.organisasi_id = '$instansiID' 
        AND u.role = 'general' 
        AND u.status_id = 1
        ORDER BY u.name ASC, jp.hari ASC, jp.jam_mulai ASC"
    )->result_array();

    

    // Get jabatan data from general table
    $networkIdentities = array_column($getDataGuru, 'network_identity');
    $networkIdentities = array_filter(array_unique($networkIdentities));
    
    $generalData = [];
    if (!empty($networkIdentities)) {
        $idsString = "'" . implode("','", $networkIdentities) . "'";
        
        $getGeneralData = $this->Home_model->getSelectData(
            "user_id, jabatan",
            "onca_oncard_v2.general",
            "WHERE user_id IN ($idsString)"
        )->result_array();
        
        foreach ($getGeneralData as $general) {
            $generalData[$general['user_id']] = $general['jabatan'];
        }
    }

    // Merge jabatan data
    foreach ($getDataGuru as &$guru) {
        $networkId = $guru['network_identity'];
        $guru['jabatan'] = isset($generalData[$networkId]) ? $generalData[$networkId] : '-';
    }
    unset($guru);

    // Get all attendance data
    $getDataAbsensi = $this->Home_model->getSelectData3rd(
        "a.tanggal_absen, a.jam_absen, a.user_absensi_id, 
         j.jam_mulai, j.jam_selesai, a.sub_kelas_id, a.keterangan_absen_id,
         u.name as nama_guru, sk.name as nama_kelas, ka.name as keterangan_absen, 
         kab.name as kategoriabsen, m.name nama_mapel, a.jadwal_id, j.hari as jadwal_hari,
         j.matapelajaran_id, j.sub_kelas_id as jadwal_sub_kelas_id,
         s.tanggal_mulai as semester_mulai, s.tanggal_selesai as semester_selesai",
        "absensi a",
        "LEFT JOIN users u ON a.user_absensi_id = u.id
         LEFT JOIN jadwal_pelajaran j ON a.jadwal_id = j.id
         LEFT JOIN m_semester s ON j.semester_id = s.id  -- Join semester table
         LEFT JOIN m_sub_kelas sk ON a.sub_kelas_id = sk.id
         LEFT JOIN m_kategori_absen kab ON a.kategori_absen_id = kab.id
         LEFT JOIN m_keterangan_absen ka ON a.keterangan_absen_id = ka.id
         LEFT JOIN m_matapelajaran m ON a.matapelajaran_id = m.id
         WHERE a.organisasi_id = '$instansiID'
         AND a.tanggal_absen >= '$date_from' 
         AND a.tanggal_absen <= '$date_to'
         AND u.role = 'general' 
         AND a.tanggal_absen BETWEEN s.tanggal_mulai AND s.tanggal_selesai  -- Date range check
         ORDER BY a.tanggal_absen ASC, a.jam_absen ASC"
    )->result_array();
    
    // Create date range
    $start = new DateTime($date_from);
    $end = new DateTime($date_to);
    $end = $end->modify('+1 day');
    $interval = new DateInterval('P1D');
    $date_range = new DatePeriod($start, $interval, $end);

    // Organize attendance data by user, date, and schedule time
    $absensi_by_user_date_time = [];
    foreach ($getDataAbsensi as $absensi) {
        $user_id = $absensi['user_absensi_id'];
        $date = $absensi['tanggal_absen'];
        $jadwal_id = $absensi['jadwal_id'];
        
        if (!isset($absensi_by_user_date_time[$user_id])) {
            $absensi_by_user_date_time[$user_id] = [];
        }
        
        if (!isset($absensi_by_user_date_time[$user_id][$date])) {
            $absensi_by_user_date_time[$user_id][$date] = [];
        }
        
        // Use jadwal_id as key for more precise matching
        $absensi_by_user_date_time[$user_id][$date][$jadwal_id] = $absensi;
    }

    // Organize teacher schedules by user and jadwal_id
    $schedules_by_user = [];
    foreach ($getDataGuru as $guru) {
        $user_id = $guru['id'];
        $jadwal_id = $guru['jadwal_id'];
        
        if (!isset($schedules_by_user[$user_id])) {
            $schedules_by_user[$user_id] = [];
        }
        
        if ($jadwal_id) {
            $schedules_by_user[$user_id][$jadwal_id] = $guru;
        }
    }

    // Function to calculate time difference in seconds
    function getTimeDifferenceInSeconds($time1, $time2) {
        $datetime1 = new DateTime($time1);
        $datetime2 = new DateTime($time2);
        return $datetime2->getTimestamp() - $datetime1->getTimestamp();
    }

    // Function to format time difference
    function formatTimeDifference($seconds) {
        $abs_seconds = abs($seconds);
        
        if ($abs_seconds >= 3600) {
            $hours = floor($abs_seconds / 3600);
            $minutes = floor(($abs_seconds % 3600) / 60);
            return ($seconds < 0 ? '-' : '') . $hours . ' jam ' . $minutes . ' menit';
        } elseif ($abs_seconds >= 60) {
            $minutes = floor($abs_seconds / 60);
            $remaining_seconds = $abs_seconds % 60;
            return ($seconds < 0 ? '-' : '') . $minutes . ' menit ' . $remaining_seconds . ' detik';
        } else {
            return ($seconds < 0 ? '-' : '') . $abs_seconds . ' detik';
        }
    }

    // Function to determine attendance status with time difference
    function determineAttendanceStatus($attendance, $jamMasuk) {
        if (!$attendance) {
            return [
                'status' => 'JADWAL TANPA ABSEN',
                'detail' => "Tidak ada catatan absensi\n(Jadwal terjadwal: tetap ditampilkan)",
                'summary' => 'TIDAK ABSEN',
                'time_difference' => '',
                'time_difference_seconds' => 0
            ];
        }
        
        
        $status_ketepatan = 'Tepat Waktu';
        $detail = '';
        $kategori = strtolower($attendance['kategoriabsen']);
        $is_late = false;
        $time_difference_seconds = 0;
        $time_difference_formatted = "";
        
        // Special handling for "masuk sekolah" category
        $jam_pembanding = $attendance['jam_mulai'];
        $jam_pembanding_display = $attendance['jam_mulai'];
        
        if (strpos($kategori, 'masuk sekolah') !== false) {
            $jam_pembanding = $jamMasuk;
            $jam_pembanding_display = $jamMasuk . " (Jam Masuk Sekolah)";
            $time_difference_seconds = getTimeDifferenceInSeconds($jam_pembanding, $attendance['jam_absen']);
            $is_late = ($time_difference_seconds > 0);
            $status_ketepatan = $is_late ? "Tidak Tepat Waktu" : "Tepat Waktu";
            
            // Format time difference
            $time_difference_formatted = formatTimeDifference($time_difference_seconds);
            
        } elseif (strpos($kategori, 'keluar kelas') !== false || strpos($kategori, 'pulang') !== false) {
            $time_difference_seconds = getTimeDifferenceInSeconds($attendance['jam_selesai'], $attendance['jam_absen']);
            $is_late = ($time_difference_seconds < 0); // Negative means left early
            $status_ketepatan = ($time_difference_seconds == 0) ? "Tepat Waktu" : "Tidak Tepat Waktu";
            
            // Format time difference
            $time_difference_formatted = formatTimeDifference($time_difference_seconds);
            
        } elseif (strpos($kategori, 'masuk') !== false || strpos($kategori, 'datang') !== false) {
            $time_difference_seconds = getTimeDifferenceInSeconds($jam_pembanding, $attendance['jam_absen']);
            $is_late = ($time_difference_seconds > 0);
            $status_ketepatan = $is_late ? "Tidak Tepat Waktu" : "Tepat Waktu";
            
            // Format time difference
            $time_difference_formatted = formatTimeDifference($time_difference_seconds);
        }
        
        // Create attendance detail
        $detail = 
            "Waktu Absen: " . $attendance['jam_absen'] . "\n" .
            "Kategori: " . $attendance['kategoriabsen'] . "\n" .
            "Jam Mulai: " . $jam_pembanding_display . "\n" .
            "Jam Selesai: " . $attendance['jam_selesai'] . "\n" .
            "Status: " . $status_ketepatan . "\n";
        
        // Add time difference if available
        if (!empty($time_difference_formatted)) {
            $detail .= "Selisih Waktu: " . $time_difference_formatted . "\n";
        }
        
        $detail .=
            "Kelas: " . $attendance['nama_kelas'] . "\n" .
            "Keterangan: " . $attendance['keterangan_absen'];
        
        // Determine summary status
        $summary = "TEPAT WAKTU";
        if ($is_late) {
            $summary = "TELAT";
        } else if ($time_difference_seconds < 0) {
            $summary = "AWAL";
        }
        
        return [
            'status' => $status_ketepatan,
            'detail' => $detail,
            'summary' => $summary,
            'time_difference' => $time_difference_formatted,
            'time_difference_seconds' => $time_difference_seconds
        ];
    }

    // Create CSV content for Sheet 1: Matrix view (Nama Guru | Jabatan | Date1 | Date2 | ...)
    $csv_data_sheet1 = "";
    
    // Create header row for Sheet 1
    $headers_sheet1 = ['Nama Guru', 'Jabatan'];
    
    // Add date columns to header
    foreach ($date_range as $date) {
        $date_str = $date->format('d M');
        $headers_sheet1[] = $date_str;
    }
    
    // ADD PERSENTASE KEhadiran column
    $headers_sheet1[] = 'Persentase Kehadiran';
    
    $csv_data_sheet1 .= '"' . implode('","', $headers_sheet1) . '"' . "\n";
    
    // Group teachers by ID to avoid duplicates
    $teachers_by_id = [];
    foreach ($getDataGuru as $teacher) {
        $teacher_id = $teacher['id'];
        if (!isset($teachers_by_id[$teacher_id])) {
            $teachers_by_id[$teacher_id] = [
                'name' => $teacher['name'],
                'jabatan' => $teacher['jabatan'],
                'schedules' => [],
                'total_scheduled_classes' => 0,
                'total_attended_classes' => 0
            ];
        }
        
        if ($teacher['jadwal_id']) {
            $teachers_by_id[$teacher_id]['schedules'][] = $teacher;
        }
    }
    
    // Process each teacher for Sheet 1
    foreach ($teachers_by_id as $teacher_id => $teacher_data) {
        $row_data = [
            '"' . $teacher_data['name'] . '"',
            '"' . $teacher_data['jabatan'] . '"'
        ];
        
        $total_scheduled = 0;
        $total_attended = 0;
        
        // Process each date in the range
        foreach ($date_range as $date) {
            $date_str = $date->format('Y-m-d');
            $day_of_week = $date->format('N');
            
            $date_details = [];
            
            // Check all schedules for this teacher on this day
            foreach ($teacher_data['schedules'] as $schedule) {
                if ($schedule['hari'] == $day_of_week) {
                    $total_scheduled++;
                    $schedule_info = $schedule['jadwal_jam_mulai'] . "-" . $schedule['jadwal_jam_selesai'] . 
                                   ": " . $schedule['nama_mapel'] . " (" . $schedule['nama_kelas'] . ")";
                    
                    // Check attendance for this schedule
                    $jadwal_id = $schedule['jadwal_id'];
                    $attendance_status = "✓";
                    
                    if (isset($absensi_by_user_date_time[$teacher_id][$date_str][$jadwal_id])) {
                        $attendance = $absensi_by_user_date_time[$teacher_id][$date_str][$jadwal_id];
                        $attendanceStatus = determineAttendanceStatus($attendance, $jamMasuk);
                        $attendance_status = $attendanceStatus['summary'];
                        $total_attended++;
                    } else {
                        $attendance_status = "TIDAK ABSEN";
                    }
                    
                    $date_details[] = $schedule_info . " [" . $attendance_status . "]";
                }
            }
            
            if (empty($date_details)) {
                $date_details[] = "Tidak ada jadwal";
            }
            
            $row_data[] = '"' . implode("; ", $date_details) . '"';
        }
        
        // Calculate attendance percentage
        $attendance_percentage = 0;
        if ($total_scheduled > 0) {
            $attendance_percentage = round(($total_attended / $total_scheduled) * 100, 2);
        }
        
        // Add attendance percentage to row
        $row_data[] = '"' . $attendance_percentage . '% (' . $total_attended . '/' . $total_scheduled . ' jadwal)' . '"';
        
        $csv_data_sheet1 .= implode(',', $row_data) . "\n";
    }
    
    // Create Sheet 2: Grouped by Guru with Summary Statistics
    $csv_data_sheet2 = "";

    // Helper function to update statistics
    function updateStat(&$statArray, $summary) {
        switch ($summary) {
            case 'TELAT':
                $statArray['telat']++;
                break;
            case 'TEPAT WAKTU':
                $statArray['tepat']++;
                break;
            case 'AWAL':
                $statArray['awal']++;
                break;
            case 'TIDAK ABSEN':
                // You can choose to count this or not
                break;
        }
    }

    // Organize attendance data by user and category for statistics
    $attendance_stats_by_user = [];

    // First, initialize all teachers with their schedules from getDataGuru
    foreach ($getDataGuru as $guru) {
        $user_id = $guru['id'];
        
        if (!isset($attendance_stats_by_user[$user_id])) {
            $attendance_stats_by_user[$user_id] = [
                'name' => $guru['name'],
                'jabatan' => $guru['jabatan'],
                'masuk_kelas' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'masuk_sekolah' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'keluar_kelas' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'pulang_sekolah' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'details' => [],
                'total_scheduled_classes' => 0,
                'total_attended_classes' => 0
            ];
        }
    }

    // Process all attendance records first
    foreach ($getDataAbsensi as $absensi) {
        $user_id = $absensi['user_absensi_id'];
        $kategori = strtolower($absensi['kategoriabsen']);
        
        // If teacher not initialized yet (in case they have attendance but no schedule in getDataGuru)
        if (!isset($attendance_stats_by_user[$user_id])) {
            $attendance_stats_by_user[$user_id] = [
                'name' => $absensi['nama_guru'],
                'jabatan' => isset($generalData[$user_id]) ? $generalData[$user_id] : '-',
                'masuk_kelas' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'masuk_sekolah' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'keluar_kelas' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'pulang_sekolah' => ['telat' => 0, 'tepat' => 0, 'awal' => 0],
                'details' => [],
                'total_scheduled_classes' => 0,
                'total_attended_classes' => 0
            ];
        }
        
        // Determine attendance status
        $attendanceStatus = determineAttendanceStatus($absensi, $jamMasuk);
        
        // Categorize based on attendance type
        if (strpos($kategori, 'masuk kelas') !== false) {
            updateStat($attendance_stats_by_user[$user_id]['masuk_kelas'], $attendanceStatus['summary']);
        } elseif (strpos($kategori, 'masuk sekolah') !== false) {
            updateStat($attendance_stats_by_user[$user_id]['masuk_sekolah'], $attendanceStatus['summary']);
        } elseif (strpos($kategori, 'keluar kelas') !== false) {
            updateStat($attendance_stats_by_user[$user_id]['keluar_kelas'], $attendanceStatus['summary']);
        } elseif (strpos($kategori, 'pulang sekolah') !== false || strpos($kategori, 'pulang') !== false) {
            updateStat($attendance_stats_by_user[$user_id]['pulang_sekolah'], $attendanceStatus['summary']);
        }
        
        // Store detail for CSV output
        $attendance_stats_by_user[$user_id]['details'][] = [
            'tanggal' => $absensi['tanggal_absen'],
            'hari' => $this->getDayName($absensi['jadwal_hari']),
            'jam_mulai' => $absensi['jam_mulai'],
            'jam_selesai' => $absensi['jam_selesai'],
            'mata_pelajaran' => $absensi['nama_mapel'],
            'kelas' => $absensi['nama_kelas'],
            'detail_absensi' => $attendanceStatus['detail'],
            'status' => $attendanceStatus['summary'],
            'selisih_waktu' => $attendanceStatus['time_difference'],
            'selisih_detik' => $attendanceStatus['time_difference_seconds'],
            'kategori' => $absensi['kategoriabsen'],
            'has_attendance' => true,
            'jadwal_id' => $absensi['jadwal_id']
        ];
        
        // Count as attended class
        $attendance_stats_by_user[$user_id]['total_attended_classes']++;
    }

    // MODIFIED: Process ALL schedules from getDataGuru and check for attendance in date range
    // This ensures ALL mata pelajaran are shown even without attendance data
    foreach ($getDataGuru as $guru) {
        $user_id = $guru['id'];
        $jadwal_id = $guru['jadwal_id'];
        
        if (!$jadwal_id) {
            continue; // Skip teachers without schedule
        }
        
        // Count total scheduled classes for this teacher
        foreach ($date_range as $date) {
            $date_str = $date->format('Y-m-d');
            $day_of_week = $date->format('N');
            
            // Check if this date matches the schedule day
            $has_schedule = ($guru['hari'] == $day_of_week);
            
            if (!$has_schedule) {
                continue;
            }
            
            $attendance_stats_by_user[$user_id]['total_scheduled_classes']++;
            
            // Check if this schedule has already been processed in attendance data
            $already_processed = false;
            if (isset($attendance_stats_by_user[$user_id]['details'])) {
                foreach ($attendance_stats_by_user[$user_id]['details'] as $detail) {
                    if ($detail['tanggal'] == $date_str && 
                        $detail['jadwal_id'] == $jadwal_id) {
                        $already_processed = true;
                        break;
                    }
                }
            }
            
            // If not already processed, add as "TIDAK ABSEN"
            if (!$already_processed) {
                $attendanceStatus = determineAttendanceStatus(null, $jamMasuk);
            
                $attendance_stats_by_user[$user_id]['details'][] = [
                    'tanggal' => $date_str,
                    'hari' => $this->getDayName($guru['hari']),
                    'jam_mulai' => $guru['jadwal_jam_mulai'],
                    'jam_selesai' => $guru['jadwal_jam_selesai'],
                    'mata_pelajaran' => $guru['nama_mapel'],
                    'kelas' => $guru['nama_kelas'],
                    'detail_absensi' => $attendanceStatus['detail'],
                    'status' => $attendanceStatus['summary'],
                    'selisih_waktu' => $attendanceStatus['time_difference'],
                    'selisih_detik' => $attendanceStatus['time_difference_seconds'],
                    'kategori' => 'Jadwal Terjadwal',
                    'has_attendance' => false,
                    'jadwal_id' => $jadwal_id
                ];
            }
        }
    }

    // Create header row for Sheet 2
    $headers_sheet2 = ['Nama Guru', 'Jabatan', 'Tanggal', 'Hari', 'Jam Mulai', 'Jam Selesai', 
                    'Mata Pelajaran', 'Kelas', 'Kategori', 'Detail Absensi', 'Status', 
                    'Selisih Waktu', 'Selisih (Detik)'];
    $csv_data_sheet2 .= '"' . implode('","', $headers_sheet2) . '"' . "\n";

    // Sort users by name
    usort($attendance_stats_by_user, function($a, $b) {
        return strcmp($a['name'], $b['name']);
    });

    // Process each teacher for Sheet 2
    foreach ($attendance_stats_by_user as $user_data) {
        // Calculate attendance percentage for this teacher
        $attendance_percentage = 0;
        if ($user_data['total_scheduled_classes'] > 0) {
            $attendance_percentage = round(($user_data['total_attended_classes'] / $user_data['total_scheduled_classes']) * 100, 2);
        }
        
        // Add PERSENTASE KEHADIRAN row first
        $persentase_row = [
            '"' . $user_data['name'] . '"',
            '"' . $user_data['jabatan'] . '"',
            '"PERSENTASE KEHADIRAN"',
            '""',
            '""',
            '""',
            '""',
            '""',
            '""',
            '"' . $attendance_percentage . '% (' . $user_data['total_attended_classes'] . '/' . $user_data['total_scheduled_classes'] . ' jadwal)"',
            '""',
            '""',
            '""'
        ];
        $csv_data_sheet2 .= implode(',', $persentase_row) . "\n";
        
        // Add summary rows first
        $summary_rows = [
            [
                '"' . $user_data['name'] . '"',
                '"' . $user_data['jabatan'] . '"',
                '"TOTAL MASUK KELAS"',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '"' . $user_data['masuk_kelas']['telat'] . ' telat, ' . 
                    $user_data['masuk_kelas']['tepat'] . ' tepat waktu, ' . 
                    $user_data['masuk_kelas']['awal'] . ' awal"',
                '""',
                '""',
                '""'
            ],
            [
                '"' . $user_data['name'] . '"',
                '"' . $user_data['jabatan'] . '"',
                '"TOTAL MASUK SEKOLAH"',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '"' . $user_data['masuk_sekolah']['telat'] . ' telat, ' . 
                    $user_data['masuk_sekolah']['tepat'] . ' tepat waktu, ' . 
                    $user_data['masuk_sekolah']['awal'] . ' awal"',
                '""',
                '""',
                '""'
            ],
            [
                '"' . $user_data['name'] . '"',
                '"' . $user_data['jabatan'] . '"',
                '"TOTAL KELUAR KELAS"',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '"' . $user_data['keluar_kelas']['telat'] . ' telat, ' . 
                    $user_data['keluar_kelas']['tepat'] . ' tepat waktu, ' . 
                    $user_data['keluar_kelas']['awal'] . ' awal"',
                '""',
                '""',
                '""'
            ],
            [
                '"' . $user_data['name'] . '"',
                '"' . $user_data['jabatan'] . '"',
                '"TOTAL PULANG SEKOLAH"',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '"' . $user_data['pulang_sekolah']['telat'] . ' telat, ' . 
                    $user_data['pulang_sekolah']['tepat'] . ' tepat waktu, ' . 
                    $user_data['pulang_sekolah']['awal'] . ' awal"',
                '""',
                '""',
                '""'
            ],
            [
                '"' . $user_data['name'] . '"',
                '"' . $user_data['jabatan'] . '"',
                '"DETAIL ABSENSI"',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""',
                '""'
            ]
        ];
        
        foreach ($summary_rows as $summary_row) {
            $csv_data_sheet2 .= implode(',', $summary_row) . "\n";
        }
        
        // Sort details by date for better organization
        usort($user_data['details'], function($a, $b) {
            return strcmp($a['tanggal'], $b['tanggal']);
        });
        
        // Add detail rows
        foreach ($user_data['details'] as $detail) {
            $row_data = [
                '"' . $user_data['name'] . '"',
                '"' . $user_data['jabatan'] . '"',
                '"' . $detail['tanggal'] . '"',
                '"' . $detail['hari'] . '"',
                '"' . $detail['jam_mulai'] . '"',
                '"' . $detail['jam_selesai'] . '"',
                '"' . $detail['mata_pelajaran'] . '"',
                '"' . $detail['kelas'] . '"',
                '"' . $detail['kategori'] . '"',
                '"' . str_replace('"', '""', $detail['detail_absensi']) . '"',
                '"' . $detail['status'] . '"',
                '"' . $detail['selisih_waktu'] . '"',
                '"' . $detail['selisih_detik'] . '"'
            ];
            
            $csv_data_sheet2 .= implode(',', $row_data) . "\n";
        }
        
        // Add empty row between teachers
        $csv_data_sheet2 .= '""' . str_repeat(',""', count($headers_sheet2) - 1) . "\n";
    }
        
    // Create a zip archive containing both CSV files
    $zip_filename = "laporan_absensi_guru_" . date('Y-m-d') . ".zip";
    
    // Create temporary files
    $temp_dir = sys_get_temp_dir();
    $file1 = tempnam($temp_dir, 'sheet1_');
    $file2 = tempnam($temp_dir, 'sheet2_');
    
    file_put_contents($file1, $csv_data_sheet1);
    file_put_contents($file2, $csv_data_sheet2);
    
    // Create zip archive
    $zip = new ZipArchive();
    if ($zip->open($temp_dir . '/' . $zip_filename, ZipArchive::CREATE) === TRUE) {
        $zip->addFile($file1, 'matrix_jadwal_guru.csv');
        $zip->addFile($file2, 'detail_absensi_dengan_selisih_waktu.csv');
        $zip->close();
        
        // Set download headers for zip file
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zip_filename . '"');
        header('Content-Length: ' . filesize($temp_dir . '/' . $zip_filename));
        
        // Output zip file
        readfile($temp_dir . '/' . $zip_filename);
        
        // Clean up temporary files
        unlink($file1);
        unlink($file2);
        unlink($temp_dir . '/' . $zip_filename);
        
        exit;
    } else {
        // Fallback: if zip creation fails, download only the first sheet
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="matrix_jadwal_guru_' . date('Y-m-d') . '.csv"');
        echo $csv_data_sheet1;
        exit;
    }
}

    // Helper function to convert day number to day name
    private function getDayName($dayNumber) {
        $days = [
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu'
        ];
        
        return isset($days[$dayNumber]) ? $days[$dayNumber] : 'Unknown';
    }



    private function validate_and_sanitize_inputs()
    {
        // Required parameters with validation
        $params = [
            'date_from' => $this->input->get('date_from', true) ?: date('Y-m-d', strtotime('-7 days')),
            'date_to' => $this->input->get('date_to', true) ?: date('Y-m-d'),
            'kode_instansi' => $this->sanitize_kode_instansi($this->input->get('kode_instansi', true)),
            'jam_masuk' => $this->input->get('jam_masuk', true) ?: '07:00',
        ];
        
        // Optional parameters - only add if they exist in GET request
        $optional_params = [
            'trx_type', 'take', 'account_level', 'account_type'
        ];
        
        foreach ($optional_params as $param) {
            $value = $this->input->get($param, true);
            if ($value !== null && $value !== '') {
                $params[$param] = $value;
            }
        }
        
        // Validate dates
        $this->validate_dates($params['date_from'], $params['date_to']);
        
        return $params;
    }

    private function sanitize_kode_instansi($kode_instansi)
    {
        $kode_instansi = $kode_instansi ?: '467.598.080';
        return $kode_instansi;
    }

    private function validate_dates($date_from, $date_to)
    {
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_from) || 
            !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date_to)) {
            die("Format tanggal tidak valid. Gunakan format YYYY-MM-DD");
        }
        
        if (strtotime($date_from) > strtotime($date_to)) {
            die("Tanggal mulai tidak boleh lebih besar dari tanggal akhir");
        }
    }

    private function build_api_url($params)
    {
        $base_url = "https://oncard.id/app/api/report-dashboard/jurnal";
        
        // Ensure kode_instansi is always included
        if (!isset($params['kode_instansi'])) {
            $params['kode_instansi'] = '467.598.080';
        }
        
        return $base_url . '?' . http_build_query($params);
    }

    private function execute_api_request($api_url)
    {
        $ch = curl_init();
        
        curl_setopt_array($ch, [
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 120, // 2 minutes timeout
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => true, // Always verify SSL in production
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_USERAGENT => 'OnCardExportBot/1.0',
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Cache-Control: no-cache'
            ]
        ]);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            log_message('error', "cURL Error: $error_msg");
            die("Gagal terhubung ke server API. Silakan coba lagi.");
        }
        
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($http_code !== 200) {
            log_message('error', "API returned HTTP code: $http_code for URL: $api_url");
            die("API mengembalikan kode status: $http_code");
        }
        
        return $response;
    }

    private function process_response_and_generate_csv_advanced($response, $params)
    {
        $data = json_decode($response, true);
        
        if (!$data || !isset($data['status'])) {
            log_message('error', "Invalid API response: " . substr($response, 0, 500));
            die("Respon API tidak valid");
        }
        
        if (!$data['status'] || empty($data['data'])) {
            die("Tidak ada data yang tersedia untuk parameter yang dipilih");
        }
        
        // Generate filename with parameters
        $filename = 'Laporan_Jurnal_' . $params['date_from'] . '_sd_' . $params['date_to'];
        if (isset($params['trx_type'])) {
            $filename .= '_' . $params['trx_type'];
        }
        
        $this->generate_csv_advanced($data['data'], $filename);
    }

    private function generate_csv_advanced($data, $filename)
    {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '.csv"');
        
        $output = fopen('php://output', 'w');
        fwrite($output, "\xEF\xBB\xBF"); // UTF-8 BOM
        
        // Write CSV headers based on transaction type detection
        $headers = $this->get_headers_for_data($data);
        fputcsv($output, $headers, ';');
        
        foreach ($data as $index => $record) {
            $row = $this->format_row_by_type($record, $index);
            fputcsv($output, $row, ';');
        }
        
        fclose($output);
        exit;
    }

    private function get_headers_for_data($data)
    {
        if (empty($data)) return ['No Data Available'];
        
        // Detect transaction type from first record
        $trx_type = $data[0]['management_type']['name_type'] ?? 'default';
        
        $headers = [
            'No', 
            'Nomor Invoice',
            'Tanggal',
            'Tipe Transaksi'
        ];
        
        switch ($trx_type) {
            case 'buy':
                return array_merge($headers, [
                    'Nama Siswa (Pembeli)',
                    'No. Rekening Siswa',
                    'Nama Merchant (Penjual)',
                    'No. Rekening Merchant',
                    'Nominal (Rp)',
                    'Saldo Akhir (Rp)',
                    'Metode Pembayaran',
                    'Keterangan',
                    'Status'
                ]);
                
            case 'sell':
                return array_merge($headers, [
                    'Nama Merchant (Penjual)',
                    'No. Rekening Merchant',
                    'Nama Pembeli',
                    'No. Rekening Pembeli',
                    'Nominal (Rp)',
                    'Saldo Akhir (Rp)',
                    'Metode Pembayaran',
                    'Keterangan',
                    'Status'
                ]);
                
            case 'top_up':
                return array_merge($headers, [
                    'Nama Pelanggan',
                    'No. Rekening',
                    'Nominal Topup (Rp)',
                    'Saldo Akhir (Rp)',
                    'Metode Topup',
                    'Keterangan',
                    'Status'
                ]);
                
            case 'topup_via_vendor':
                return array_merge($headers, [
                    'Nama Pelanggan',
                    'No. Rekening',
                    'Nominal Topup (Rp)',
                    'Saldo Akhir (Rp)',
                    'Metode Topup',
                    'Keterangan',
                    'Status'
                ]);
                
            case 'withdrawal':
                return array_merge($headers, [
                    'Nama Pelanggan',
                    'No. Rekening',
                    'Nominal Penarikan (Rp)',
                    'Saldo Akhir (Rp)',
                    'Metode Penarikan',
                    'Keterangan',
                    'Status'
                ]);
                
            case 'distribution':
                case 'fee':
                case 'admin_fee':
                case 'payment':
                case 'tagihan':
                case 'administrasi':
                case 'shopping':
                case 'transfer':
                case 'vendor_credit_topup':
                case 'topup_via_vendor':
                case 'master_debit_wd':
                case 'adm-topup':
                case 'withdrawal_business':
                case 'topup_via_vendor':
                case 'debts_payment':
                case 'shoping':
                case 'transfer_sender':
                case 'transfer_recipient':
                default:
                    return array_merge($headers, [
                        'Nama Akun 1',
                        'No. Rekening 1',
                        'Nama Akun 2',
                        'No. Rekening 2',
                        'Debit (Rp)',
                        'Kredit (Rp)',
                        'Saldo (Rp)',
                        'Jenis Transaksi',
                        'Keterangan',
                        'Status'
                    ]);
        }
    }

    private function format_row_by_type($record, $index)
    {
        date_default_timezone_set('Asia/Jakarta');
        $base = [
            $index + 1,
            $this->clean_field($record['invoice'] ?? '-'),
            isset($record['created_at']) ? date('d/m/Y H:i', strtotime($record['created_at'])) : '-',
            $this->clean_field(ucfirst($record['management_type']['name_type'] ?? 'unknown'))
        ];
        
        $trx_type = $record['management_type']['name_type'] ?? 'default';
        
        switch ($trx_type) {
            case 'buy':
                return array_merge($base, [
                    $this->clean_field($record['credit_account']['customers_name'] ?? 'Merchant'),
                    $this->clean_field($record['credit_account']['account_number'] ?? '-'),
                    $this->clean_field($record['debit_account']['customers_name'] ?? 'Siswa'),
                    $this->clean_field($record['debit_account']['account_number'] ?? '-'),
                    $this->format_amount($record['debit_amount'] ?? 0),
                    $this->format_amount($record['balance'] ?? 0),
                    $this->get_payment_method($record['description'] ?? ''),
                    $this->clean_field($record['description'] ?? '-'),
                    $this->clean_field(ucfirst($record['status']['status'] ?? 'unknown'))
                ]);
                
            case 'sell':
                return array_merge($base, [
                    $this->clean_field($record['credit_account']['customers_name'] ?? 'Merchant'),
                    $this->clean_field($record['credit_account']['account_number'] ?? '-'),
                    $this->clean_field($record['debit_account']['customers_name'] ?? 'Pembeli'),
                    $this->clean_field($record['debit_account']['account_number'] ?? '-'),
                    $this->format_amount($record['credit_amount'] ?? 0),
                    $this->format_amount($record['balance'] ?? 0),
                    $this->get_payment_method($record['description'] ?? ''),
                    $this->clean_field($record['description'] ?? '-'),
                    $this->clean_field(ucfirst($record['status']['status'] ?? 'unknown'))
                ]);
                
            case 'top_up':
                return array_merge($base, [
                    $this->clean_field($record['account']['customers_name'] ?? 'Pelanggan'),
                    $this->clean_field($record['account']['account_number'] ?? '-'),
                    $this->format_amount($record['credit_amount'] ?? 0),
                    $this->format_amount($record['balance'] ?? 0),
                    $this->get_payment_method($record['description'] ?? ''),
                    $this->clean_field($record['description'] ?? '-'),
                    $this->clean_field(ucfirst($record['status']['status'] ?? 'unknown'))
                ]);
                
            case 'topup_via_vendor':
                return array_merge($base, [
                    $this->clean_field($record['credit_account']['customers_name'] ?? 'Pelanggan'),
                    $this->clean_field($record['account']['account_number'] ?? '-'),
                    $this->format_amount($record['credit_amount'] ?? 0),
                    $this->format_amount($record['balance'] ?? 0),
                    $this->get_payment_method($record['description'] ?? ''),
                    $this->clean_field($record['description'] ?? '-'),
                    $this->clean_field(ucfirst($record['status']['status'] ?? 'unknown'))
                ]);
                
            case 'withdrawal':
                return array_merge($base, [
                    $this->clean_field($record['account']['customers_name'] ?? 'Pelanggan'),
                    $this->clean_field($record['account']['account_number'] ?? '-'),
                    $this->format_amount($record['debit_amount'] ?? 0),
                    $this->format_amount($record['balance'] ?? 0),
                    $this->get_payment_method($record['description'] ?? ''),
                    $this->clean_field($record['description'] ?? '-'),
                    $this->clean_field(ucfirst($record['status']['status'] ?? 'unknown'))
                ]);
                
            default:
                return array_merge($base, [
                    $this->clean_field($record['debit_account']['customers_name'] ?? '-'),
                    $this->clean_field($record['debit_account']['account_number'] ?? '-'),
                    $this->clean_field($record['credit_account']['customers_name'] ?? 
                        ($record['debit_account']['customers_name'] ?? '-')),
                    $this->clean_field($record['credit_account']['account_number'] ?? 
                        ($record['debit_account']['account_number'] ?? '-')),
                    $this->format_amount($record['debit_amount'] ?? 0),
                    $this->format_amount($record['credit_amount'] ?? 0),
                    $this->format_amount($record['balance'] ?? 0),
                    $this->get_transaction_type($record),
                    $this->clean_field($record['description'] ?? '-'),
                    $this->clean_field(ucfirst($record['status']['status'] ?? 'unknown'))
                ]);
        }
    }

    // Helper methods
    private function clean_field($value)
    {
        return trim(preg_replace('/\s+/', ' ', $value));
    }

    private function format_amount($amount)
    {
        return number_format((float)$amount, 0, ',', '.');
    }

    private function get_payment_method($description)
    {
        $desc = strtolower($this->clean_field($description));
        
        $methods = [
            'tunai' => 'Tunai',
            'cash' => 'Tunai',
            'transfer' => 'Transfer',
            'bank' => 'Transfer',
            'qris' => 'QRIS',
            'topup_via_vendor' => 'Topup Edupay',
            'topup' => 'Topup',
            'top up' => 'Topup',
            'mb' => 'Edupay',
            'withdraw' => 'Penarikan',
            'tarik' => 'Penarikan',
            'admin' => 'Admin',
            'fee' => 'Admin',
            'biaya' => 'Admin',
            'tagihan' => 'Tagihan',
            'bill' => 'Tagihan'
        ];
        
        foreach ($methods as $key => $method) {
            if (strpos($desc, $key) !== false) {
                return $method;
            }
        }
        
        return 'Lainnya';
    }

    private function get_transaction_type($record)
    {
        $type = $record['management_type']['name_type'] ?? '';
        $desc = strtolower($record['description'] ?? '');
        
        $types = [
            'distribution' => 'Distribusi',
            'fee' => 'Biaya',
            'admin_fee' => 'Biaya Admin',
            'payment' => 'Pembayaran',
            'tagihan' => 'Tagihan',
            'administrasi' => 'Administrasi',
            'shopping' => 'Belanja',
            'transfer' => 'Transfer',
            'vendor_credit_topup' => 'Topup Vendor',
            'topup_via_vendor' => 'Topup Master',
            'master_debit_wd' => 'Penarikan Master',
            'adm-topup' => 'Topup Admin',
            'withdrawal_business' => 'Penarikan Bisnis',
            'topup_via_vendor' => 'Topup via Vendor',
            'debts_payment' => 'Bayar Hutang',
            'shoping' => 'Belanja',
            'transfer_sender' => 'Pengirim Transfer',
            'transfer_recipient' => 'Penerima Transfer'
        ];
        
        return $types[$type] ?? ucfirst($type ?: 'Transaksi');
    }


    // ----------------------- ONTUITION NEEDS ----------------------------//

    public function export_jurnal_csv_ontuition()
    {
        // Set timeout to 60 seconds
        set_time_limit(1000);

        $idInstansi = $this->uri->segment(3);
        
        // Build API URL
        $api_url = "https://api.management-tagihan.oncard.id/api/show-tagihan-siswa-all/".$idInstansi;

        // Initialize cURL with comprehensive options
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 300,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_SSL_VERIFYPEER => false, // Only for testing, remove in production
            CURLOPT_SSL_VERIFYHOST => 0, // Only for testing, remove in production
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 3,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Cache-Control: no-cache',
                'keys: 5f3a6630-5cf0-442d-b981-a4a06ce9693b',
            ],
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
        ]);

        $response = curl_exec($ch);
        
        // Check for cURL errors first
        if (curl_errno($ch)) {
            $error_msg = 'cURL Error (' . curl_errno($ch) . '): ' . curl_error($ch);
            curl_close($ch);
            die("Gagal terhubung ke server: " . $error_msg);
        }

        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Handle HTTP errors
        if ($http_code === 0) {
            die("Tidak dapat terhubung ke server API. Periksa koneksi internet atau konfigurasi server.");
        }

        if ($http_code !== 200) {
            die("API mengembalikan kode status: $http_code");
        }

        $data = json_decode($response, true);
        // Generate CSV with current date in filename
         // Generate two CSV files in memory
    $summaryCsv = $this->generate_summary_csv($data);
    $detailCsv = $this->generate_detail_csv($data);

    // Create a temporary zip file
    $zipFilename = tempnam(sys_get_temp_dir(), 'zip');
    $zip = new ZipArchive();
    $zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE);

    // Add files to zip
    $zip->addFromString('summary_report.csv', $summaryCsv);
    $zip->addFromString('detail_report.csv', $detailCsv);
    $zip->close();

    // Send the zip file
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="Laporan_Tagihan_' . date('Y-m-d') . '.zip"');
    header('Content-Length: ' . filesize($zipFilename));
    readfile($zipFilename);

    // Clean up
    unlink($zipFilename);
    exit;
    }

    private function generate_summary_csv($data)
{
    $output = fopen('php://temp', 'w');
    
    // Add BOM for UTF-8
    fwrite($output, "\xEF\xBB\xBF");
    
    // Header row
    fputcsv($output, [
        'No', 'NIS', 'Nama Siswa', 'Kategori', 'Item Biaya',
        'Nominal Tagihan', 'Dibayarkan', 'Belum Dibayarkan',
        'Status', 'Tgl Penagihan', 'Jatuh Tempo'
    ]);
    
    // Data rows
    $counter = 1;
    foreach ($data as $student) {
        if (empty($student['tagihan'])) {
            fputcsv($output, [
                $counter++, 
                $student['nis'] ?? '-',
                $student['nama_lengkap'] ?? '-',
                '-', '-', '-', '-', '-', '-', '-', '-'
            ]);
            continue;
        }
        
        foreach ($student['tagihan'] as $tagihan) {
            $category = $tagihan['tagihan']['jenis_nominal_data']['name'] ?? '-';
            $item = $tagihan['tagihan']['nama_tagihan'] ?? '-';
            
            fputcsv($output, [
                $counter++,
                $student['nis'] ?? '-',
                $student['nama_lengkap'] ?? '-',
                $category,
                $item,
                isset($tagihan['jumlah_tagihan']) ? 'Rp' . number_format($tagihan['jumlah_tagihan'], 0, ',', '.') : 'Rp0',
                isset($tagihan['jumlah_dibayarkan']) ? 'Rp' . number_format($tagihan['jumlah_dibayarkan'], 0, ',', '.') : 'Rp0',
                isset($tagihan['jumlah_belum_dibayarkan']) ? 'Rp' . number_format($tagihan['jumlah_belum_dibayarkan'], 0, ',', '.') : 'Rp0',
                $tagihan['status_pembayaran'] ?? '-',
                isset($tagihan['tagihan']['tanggal_mulai_tagihan']) ? date('Y-m-d', strtotime($tagihan['tagihan']['tanggal_mulai_tagihan'])) : '-',
                isset($tagihan['tagihan']['tanggal_jatuh_tempo']) ? date('Y-m-d', strtotime($tagihan['tagihan']['tanggal_jatuh_tempo'])) : '-',
                
            ]);
        }
    }
    
    rewind($output);
    $csv = stream_get_contents($output);
    fclose($output);
    
    return $csv;
}

private function generate_detail_csv($data)
{
    $output = fopen('php://temp', 'w');
    
    // Add BOM for UTF-8
    fwrite($output, "\xEF\xBB\xBF");
    
    // Header row
    fputcsv($output, [
        'No', 'NIS', 'Nama', 'Kategori', 'Item Biaya', 
        'Date & Time', 'Channel', 'Pembayaran', 'Invoice'
    ]);
    
    // Data rows
    $counter = 1;
    foreach ($data as $student) {
        if (empty($student['tagihan'])) {
            continue;
        }
        
        foreach ($student['tagihan'] as $tagihan) {
            $category = $tagihan['tagihan']['jenis_nominal_data']['name'] ?? '-';
            $item = $tagihan['tagihan']['nama_tagihan'] ?? '-';
            
            if (empty($tagihan['tagihan_history'])) {
                fputcsv($output, [
                    $counter++,
                    $student['nis'] ?? '-',
                    $student['nama_lengkap'] ?? '-',
                    $category,
                    $item,
                    '-', '-', '-', '-'
                ]);
                continue;
            }
            
            foreach ($tagihan['tagihan_history'] as $history) {
                $channel = 'CASH / LAINNYA';
                if (isset($history['oncard_invoice'])) {
                    if (strpos($history['oncard_invoice'], 'QRIS') !== false) {
                        $channel = 'QRIS';
                    } elseif (strpos($history['oncard_invoice'], 'BRKS') !== false) {
                        $channel = 'BRKS-EDUPAY';
                    } elseif (strpos($history['oncard_invoice'], 'IPAYMU') !== false) {
                        $channel = 'IPAYMU';
                    }
                }
                
                fputcsv($output, [
                    $counter++,
                    $student['nis'] ?? '-',
                    $student['nama_lengkap'] ?? '-',
                    $category,
                    $item,
                    isset($history['tanggal_pembayaran']) ? date('Y-m-d H:i:s', strtotime($history['tanggal_pembayaran'])) : '-',
                    $channel,
                    isset($history['jumlah_bayar']) ? 'Rp' . number_format($history['jumlah_bayar'], 0, ',', '.') : 'Rp0',
                    $history['oncard_invoice'] ?? '-'
                ]);
            }
        }
    }
    
    rewind($output);
    $csv = stream_get_contents($output);
    fclose($output);
    
    return $csv;
}

}