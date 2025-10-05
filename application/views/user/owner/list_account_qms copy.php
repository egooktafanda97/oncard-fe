<style>
.service-management-table tr td[colspan="10"] {
  background-color: #e9ecef;
  font-size: 1rem;
  font-weight: 600;
}

</style>
<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Agensi</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Daftar Agensi</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
			  
				<div class="row">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);">
                            <h4 class="mb-0"  style="font-weight:bolder; color:white;"><i class='bx bx-building-house mr-2'></i> Instansi Menunggu Konfirmasi</h4>
                        </div>
                            <div class="card-body" style="padding:0px!important;">
                            <div class="table-responsive">
                                <table class="table mb-0 service-management-table">
                                <thead class="table-light">
                                    <tr>
                                    <th>No.</th>
                                    <th>Institution</th>
                                    <th>Service Provider</th>
                                    <th>Join Method</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Expiration</th>
                                    <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="service-management-content">
                                    <tr>
                                    <td colspan="7" class="text-center">Loading data...</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>

                    <style>
                    /* Table Styling */
                    .service-management-table {
                        border-collapse: separate;
                        border-spacing: 0;
                        width: 100%;
                        font-size: 0.9rem;
                    }
                    
                    .service-management-table th {
                        background-color: #f8f9fa;
                        color: #495057;
                        font-weight: 600;
                        padding: 12px 15px;
                        border-bottom: 2px solid #dee2e6;
                    }
                    
                    .service-management-table td {
                        padding: 12px 15px;
                        vertical-align: middle;
                        border-top: 1px solid #e9ecef;
                    }
                    
                    /* Status Badges */
                    .status-badge {
                        display: inline-block;
                        padding: 5px 10px;
                        border-radius: 20px;
                        font-size: 0.75rem;
                        font-weight: 600;
                        text-transform: uppercase;
                    }
                    
                    .status-pending {
                        background-color: #fff3cd;
                        color: #856404;
                    }
                    
                    .status-active {
                        background-color: #d4edda;
                        color: #155724;
                    }
                    
                    .status-expired {
                        background-color: #f8d7da;
                        color: #721c24;
                    }
                    
                    /* Service Provider Info */
                    .service-provider {
                        font-weight: 600;
                        color: #343a40;
                    }
                    
                    .service-method {
                        font-size: 0.8rem;
                        color: #6c757d;
                        font-style: italic;
                    }
                    
                    /* Action Buttons */
                    .action-btn {
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        padding: 6px 12px;
                        border-radius: 4px;
                        font-size: 0.8rem;
                        font-weight: 500;
                        cursor: pointer;
                        transition: all 0.2s;
                    }
                    
                    .activate-btn {
                        background-color: #28a745;
                        color: white;
                        border: none;
                    }
                    
                    .activate-btn:hover {
                        background-color: #218838;
                    }
                    
                    .deactivate-btn {
                        background-color: #dc3545;
                        color: white;
                        border: none;
                    }
                    
                    .deactivate-btn:hover {
                        background-color: #c82333;
                    }
                    
                    /* Institution Info */
                    .institution-info {
                        display: flex;
                        align-items: center;
                    }
                    
                    .institution-code {
                        font-size: 0.8rem;
                        color: #6c757d;
                    }
                    </style>
                                        
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <h2>atau</h2>
                    </div>
                </div>

                <div class="row">
                        <div class="col-12">
                            <div class="card institution-form-card">
                                <div class="card-header bg-primary text-white" style="background-image: linear-gradient(to right bottom, #14a09f, #00ab9a, #0db58e, #39be7e, #5dc669);">
                                <h4 class="mb-0" style="font-weight:bolder; color:white;"><i class='bx bx-building-house mr-2'></i> Tambah Institusi QMS</h4>
                                </div>
                                <div class="card-body">
                                    <form id="institutionForm" class="institution-form">
                                        <!-- Basic Information -->
                                        <fieldset class="form-section">
                                        <legend><i class='bx bx-info-circle mr-2'></i>Basic Information</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="username" name="username" placeholder=" " value="">
                                                <label for="username"><i class='bx bx-user mr-2'></i> Username</label>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input type="email" class="form-control" id="email" name="email" placeholder=" " value="">
                                                <label for="email"><i class='bx bx-envelope mr-2'></i> Email</label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input type="password" class="form-control" id="password" name="password" placeholder=" " value="">
                                                <label for="password"><i class='bx bx-lock-alt mr-2'></i> Password</label>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="institution_name" name="institution_name" placeholder=" " value="">
                                                <label for="institution_name"><i class='bx bx-buildings mr-2'></i> Institution Name</label>
                                            </div>
                                            </div>
                                        </div>
                                        </fieldset>

                                        <!-- Address Information -->
                                        <fieldset class="form-section">
                                        <legend><i class='bx bx-map mr-2'></i>Address Information</legend>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="address1" name="address1" placeholder=" ">
                                                <label for="address1">Address Line 1</label>
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="address2" name="address2" placeholder=" ">
                                                <label for="address2">Address Line 2</label>
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="address3" name="address3" placeholder=" ">
                                                <label for="address3">Address Line 3</label>
                                            </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder=" ">
                                                <label for="zipcode"><i class='bx bx-map-pin mr-2'></i> Zip Code</label>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="telephone1" name="telephone1" placeholder=" ">
                                                <label for="telephone1"><i class='bx bx-phone mr-2'></i> Telephone 1</label>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="telephone2" name="telephone2" placeholder=" ">
                                                <label for="telephone2"><i class='bx bx-phone mr-2'></i> Telephone 2</label>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="fax" name="fax" placeholder=" ">
                                                <label for="fax"><i class='bx bx-printer mr-2'></i> Fax</label>
                                            </div>
                                            </div>
                                        </div>
                                        </fieldset>

                                        <!-- Additional Information -->
                                        <fieldset class="form-section">
                                        <legend><i class='bx bx-detail mr-2'></i>Additional Information</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input type="url" class="form-control" id="website" name="website" placeholder=" ">
                                                <label for="website"><i class='bx bx-globe mr-2'></i> Website</label>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group floating-label">
                                                <input type="text" class="form-control" id="institution_code" name="institution_code" placeholder=" " readonly>
                                                <label for="institution_code"><i class='bx bx-barcode mr-2'></i> Institution Code</label>
                                                <small class="form-text text-muted">Auto-generated unique code</small>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                        </fieldset>

                                        <!-- File Uploads -->
                                        <fieldset class="form-section p-5" style="border-radius:0px!important;">
                                        <legend><i class='bx bx-cloud-upload mr-2'></i>Media Uploads</legend>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group file-upload-group">
                                                <label for="avatar"><i class='bx bx-image mr-2'></i> Avatar</label>
                                                <div class="file-upload-wrapper">
                                                <input type="file" class="file-upload-input" id="avatar" name="avatar" multiple>
                                                <span class="file-upload-label">Choose files (max 2)</span>
                                                <span class="file-upload-button"><i class='bx bx-upload'></i></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group file-upload-group">
                                                <label for="cover"><i class='bx bx-image-alt mr-2'></i> Cover Image</label>
                                                <div class="file-upload-wrapper">
                                                <input type="file" class="file-upload-input" id="cover" name="cover">
                                                <span class="file-upload-label">Select files</span>
                                                <span class="file-upload-button"><i class='bx bx-upload'></i></span>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </fieldset>

                                        <!-- Submit Button -->
                                        <div class="form-footer p-4">
                                        <button type="submit" id="btnSxm" class="btn btn-primary submit-btn">
                                            <i class='bx bx-save mr-2'></i> Save Institution
                                        </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>

                            <!-- Include BX Icons -->
                            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

                            <style>
                            /* Base Styles */
                            .institution-form-card {
                                border: none;
                                border-radius: 10px;
                                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                                overflow: hidden;
                            }
                            
                            .card-header {
                                padding: 1.5rem;
                                font-weight: 600;
                                font-size: 1.25rem;
                            }
                            
                            .card-body {
                                padding: 2rem;
                            }
                            
                            /* Form Section Styles */
                            .form-section {
                                border: 1px solid #e0e0e0;
                                border-radius: 8px;
                                padding: 1.5rem;
                                margin-bottom: 2rem;
                                background: #f9fafb;
                            }
                            
                            .form-section legend {
                                font-size: 1rem;
                                font-weight: 600;
                                color: #4a5568;
                                padding: 0 0.5rem;
                                width: auto;
                                margin-bottom: 0;
                            }
                            
                            /* Floating Label Styles */
                            .form-group {
                                margin-bottom: 1.5rem;
                                position: relative;
                            }
                            
                            .floating-label input {
                                height: 50px;
                                padding-top: 18px;
                                border: 1px solid #e2e8f0;
                                border-radius: 6px;
                                background-color: #fff;
                                transition: all 0.2s ease;
                            }
                            
                            .floating-label input:focus {
                                border-color: #14A09F;
                                box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.2);
                            }
                            
                            .floating-label label {
                                position: absolute;
                                top: 15px;
                                left: 12px;
                                color: #718096;
                                font-size: 0.875rem;
                                pointer-events: none;
                                transition: all 0.2s ease;
                            }
                            
                            .floating-label input:focus + label,
                            .floating-label input:not(:placeholder-shown) + label {
                                top: 5px;
                                left: 12px;
                                font-size: 0.75rem;
                                color: #14A09F;
                            }
                            
                            /* File Upload Styles */
                            .file-upload-group {
                                margin-bottom: 1.5rem;
                            }
                            
                            .file-upload-group label {
                                display: block;
                                margin-bottom: 0.5rem;
                                font-weight: 500;
                                color: #4a5568;
                            }
                            
                            .file-upload-wrapper {
                                position: relative;
                                display: flex;
                                align-items: center;
                            }
                            
                            .file-upload-input {
                                position: absolute;
                                left: 0;
                                top: 0;
                                opacity: 0;
                                width: 100%;
                                height: 100%;
                                cursor: pointer;
                            }
                            
                            .file-upload-label {
                                flex: 1;
                                padding: 12px 15px;
                                border: 1px dashed #cbd5e0;
                                border-radius: 6px;
                                background-color: #f8fafc;
                                color: #718096;
                                overflow: hidden;
                                text-overflow: ellipsis;
                                white-space: nowrap;
                            }
                            
                            .file-upload-button {
                                margin-left: 10px;
                                padding: 12px 15px;
                                background-color: #14A09F;
                                color: white;
                                border-radius: 6px;
                                cursor: pointer;
                                transition: background-color 0.2s;
                            }
                            
                            .file-upload-button:hover {
                                background-color: #3182ce;
                            }
                            
                            /* Submit Button Styles */
                            .form-footer {
                                text-align: right;
                                margin-top: 2rem;
                            }
                            
                            .submit-btn {
                                padding: 12px 24px;
                                font-weight: 600;
                                border-radius: 6px;
                                transition: all 0.2s;
                                background-color: #14A09F;
                                border: none;
                            }
                            
                            .submit-btn:hover {
                                background-color: #3182ce;
                                transform: translateY(-2px);
                                box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
                            }
                            
                            /* Responsive Adjustments */
                            @media (max-width: 768px) {
                                .card-body {
                                padding: 1.5rem;
                                }
                                
                                .form-section {
                                padding: 1rem;
                                }
                            }
                            </style>

                            <script>

                                document.addEventListener('DOMContentLoaded', function() {
                                    const generateSegment = () => {
                                    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                    let result = '';
                                    for (let i = 0; i < 3; i++) {
                                        result += chars.charAt(Math.floor(Math.random() * chars.length));
                                    }
                                    return result;
                                    };

                                    const code = `${generateSegment()}.${generateSegment()}.${generateSegment()}`;
                                    document.getElementById('institution_code').value = code;


                                    // Form validation
function validateForm(formData) {
  const errors = {};
  
  // Required fields validation
  const requiredFields = [
    'username', 'email', 'password', 'institution_name', 
    'address1', 'zipcode', 'telephone1'
  ];
  
  requiredFields.forEach(field => {
        if (!formData.get(field)) {  // Added missing parenthesis here
        errors[field] = `${field.replace('_', ' ')} is required`;
        }
    });
  
  // Email validation
  if (formData.get('email') && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.get('email'))) {
    errors.email = 'Please enter a valid email address';
  }
  
  // Password validation
  if (formData.get('password') && formData.get('password').length < 6) {
    errors.password = 'Password must be at least 6 characters';
  }
  
  // Phone number validation
  if (formData.get('telephone1') && !/^[0-9]{10,15}$/.test(formData.get('telephone1'))) {
    errors.telephone1 = 'Please enter a valid phone number';
  }
  
  if (formData.get('telephone2') && !/^[0-9]{10,15}$/.test(formData.get('telephone2'))) {
    errors.telephone2 = 'Please enter a valid phone number';
  }
  
  
  return Object.keys(errors).length ? errors : null;
}

// Handle form submission
document.getElementById('institutionForm').addEventListener('submit', function(e) {
  e.preventDefault();
  
  const form = e.target;
  const formData = new FormData(form);
  
  // Validate form
  const errors = validateForm(formData);
  
  if (errors) {
    // Display errors to user
    Object.keys(errors).forEach(field => {
      const input = form.querySelector(`[name="${field}"]`);
      const feedback = document.createElement('div');
      feedback.className = 'invalid-feedback';
      feedback.textContent = errors[field];
      
      const parent = input.parentElement;
      parent.classList.add('was-validated');
      
      // Remove existing feedback if any
      const existingFeedback = parent.querySelector('.invalid-feedback');
      if (existingFeedback) {
        existingFeedback.remove();
      }
      
      parent.appendChild(feedback);
      input.classList.add('is-invalid');
    });
    
    showToast('error', 'Please correct the errors in the form');
    return;
  }
  
  // Prepare the payload
  const payload = {
    username: formData.get('username'),
    email: formData.get('email'),
    password: formData.get('password'),
    institution_name: formData.get('institution_name'),
    address1: formData.get('address1'),
    address2: formData.get('address2'),
    address3: formData.get('address3'),
    zipcode: formData.get('zipcode'),
    telephone1: formData.get('telephone1'),
    telephone2: formData.get('telephone2'),
    fax: formData.get('fax'),
    website: formData.get('website'),
    institution_code: formData.get('institution_code')
  };
  
  // Handle file uploads separately if needed
  const avatarFiles = formData.getAll('avatar');
  const coverFile = formData.get('cover');
  
  // For files, you might need to handle them differently
  // This example sends them as part of FormData
  const requestData = new FormData();
  for (const key in payload) {
    requestData.append(key, payload[key]);
  }
  
  // Append files
  avatarFiles.forEach(file => {
    if (file.size > 0) requestData.append('avatar', file);
  });
  
  if (coverFile.size > 0) {
    requestData.append('cover', coverFile);
  }
  
  $('#btnSxm').html('<i class="bx bx-loader bx-spin mr-2"></i> Processing...');
$('#btnSxm').attr('disabled', 'disabled');
$('#btnSxm').css('cursor', 'not-allowed');
  
  // Make the API call
  axios.post('https://api.qrion.id/qms/auth/add-new-institution', requestData, {
    headers: {
      'Authorization': 'Bearer ' + localStorage.getItem('_is_admin'),
      'Content-Type': 'multipart/form-data' // Important for file uploads
    }
  })
  .then(response => {
    console.log('Institution created successfully:', response.data);
    showToast('success', 'Institution created successfully!');
    
    // Reset form
    form.reset();
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    form.querySelectorAll('.was-validated').forEach(el => el.classList.remove('was-validated'));
    
    // Reset institution code (generate new one)
    const code = `${generateSegment()}.${generateSegment()}.${generateSegment()}`;
    document.getElementById('institution_code').value = code;
  })
  .catch(error => {
    console.error('Error creating institution:', error);
    
    let errorMessage = 'Failed to create institution';
    if (error.response) {
      if (error.response.data && error.response.data.message) {
        errorMessage = error.response.data.message;
      } else if (error.response.status === 401) {
        errorMessage = 'Unauthorized - Please login again';
      } else if (error.response.status === 400) {
        errorMessage = 'Validation error - Please check your inputs';
      }
    }
    
    showToast('error', errorMessage);
  })
  .finally(() => {
    $('#btnSxm').html('<i class="bx bx-save mr-2"></i> Save Institution');
    $('#btnSxm').attr('disabled', false);
    $('#btnSxm').css('cursor', 'pointer');
  });
});



                                });
                                // File input handling
                                document.querySelectorAll('.file-upload-input').forEach(input => {
                                    input.addEventListener('change', function(e) {
                                    const wrapper = this.closest('.file-upload-wrapper');
                                    const label = wrapper.querySelector('.file-upload-label');
                                    
                                    if (this.files && this.files.length > 1) {
                                        label.textContent = this.files.length + ' files selected';
                                    } else {
                                        label.textContent = this.files[0]?.name || 'No file chosen';
                                    }
                                    });
                                });
                            </script>
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

        <div class="modal fade" id="activationModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Activate Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                    <label class="form-label">Institution Code</label>
                    <input type="text" class="form-control" id="modalInstitutionCode" readonly>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Service Provider</label>
                    <input type="text" class="form-control" id="modalServiceProvider" readonly>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Expiration Days</label>
                    <input type="number" class="form-control" id="modalExpiredDays" value="1000" min="1">
                    <div class="form-text">Number of days until service expires</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="confirmActivation">Confirm Activation</button>
                </div>
                </div>
            </div>
        </div>


		<script type="text/javascript">

            let idsett = '';

            $('#modalImportData').on('hidden.bs.modal', function () {
                // $('#modalSetCard').modal('toggle');
                idsett = '';
                
            });
            
			$(document).ready(function () {
                // showData();

                $('.box1val').attr('style','display:none;');
                $('.box10val').attr('style','display:none;');
            });
			function loadServiceManagement() {
            const tbody = document.querySelector('.service-management-content');
            tbody.innerHTML = '<tr><td colspan="10" class="text-center">Loading data...</td></tr>';

            axios.get('https://api.qrion.id/qms/institution-service-providers/request-install', {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_is_admin')
                }
            })
            .then(response => {
                const data = response.data.response; // actual array
                tbody.innerHTML = '';

                if (!data || data.length === 0) {
                tbody.innerHTML = '<tr><td colspan="10" class="text-center">Tidak ada services yang menunggu untuk dikonfirmasi.</td></tr>';
                return;
                }

                // Grouping by institution code
                const grouped = {};
                data.forEach(item => {
                const code = item.institution.institution_code;
                if (!grouped[code]) {
                    grouped[code] = {
                    institution: item.institution,
                    services: []
                    };
                }
                grouped[code].services.push(item);
                });

                let index = 1;
                Object.values(grouped).forEach(group => {
                // Institution header row (full width)
                const institutionRow = document.createElement('tr');
                institutionRow.innerHTML = `
                    <td colspan="10" style="background:#f1f3f5; font-weight:bold;">
                    <i class='bx bx-building-house mr-2'></i>
                    ${group.institution.name} <span class="institution-code ml-2">(${group.institution.institution_code})</span>
                    </td>
                `;
                tbody.appendChild(institutionRow);

                // Rows for each service under this institution
                group.services.forEach(item => {
                    const isPending = item.statusManager.status_number === 1002;
            const isActive = !isPending && new Date(item.service_expired_at) > new Date();
            const needsActivation = isPending; // show activate button only if pending


                    // Determine status
                    let statusClass, statusText;
                    if (isActive) {
                    statusClass = 'status-active';
                    statusText = item.statusManager.name;
                    } else if (item.statusManager.status_number === 1002) {
                    statusClass = 'status-pending';
                    statusText = item.statusManager.name;
                    } else {
                    statusClass = 'status-expired';
                    statusText = 'Expired';
                    }

                    const row = document.createElement('tr');
                    row.innerHTML = `
                    <td>${index++}</td>
                    <td></td> <!-- Skipped because institution is in header -->
                    <td>
                        <div class="service-provider">${item.serviceProvider.name}</div>
                        <div class="service-method">${item.serviceProvider.description || 'No description'}</div>
                    </td>
                    <td>${item.join_method}</td>
                    <td>
                        <span class="status-badge ${statusClass}">${statusText}</span>
                    </td>
                    <td>
                        ${moment(item.created_at).format('DD/MM/YYYY HH:mm:ss')} WIB
                    </td>
                    <td>
                        ${new Date(item.service_expired_at).toLocaleDateString()}
                        <div class="text-small text-muted">${isActive ? 'Expired' : ''}</div>
                    </td>
                    <td>
                    <button class="action-btn ${isActive ? 'deactivate-btn' : 'activate-btn'}" 
        onclick="toggleServiceStatus('${item.uuid}', '${item.serviceProvider.name}', ${isActive}, '${item.institution.institution_code}')">
  <i class='bx ${isActive ? 'bx-power-off' : 'bx-check'}'></i>
  ${isActive ? 'Deactivate' : 'Activate'}
</button>
                    </td>
                    `;
                    tbody.appendChild(row);
                });
                });
            })
            .catch(error => {
                console.error('Error loading data:', error);
                tbody.innerHTML = `
                <tr>
                    <td colspan="7" class="text-center text-danger">
                    Error loading data: ${error.message}
                    </td>
                </tr>
                `;
            });
            }


            let currentActivationData = {
                uuid: null,
                serviceProvider: null,
                institutionCode: null
                };

                function showActivationModal(item) {
                currentActivationData = {
                    uuid: item.uuid,
                    serviceProvider: item.serviceProvider.name,
                    institutionCode: item.institution.institution_code
                };

                
                // Set modal values
                document.getElementById('modalInstitutionCode').value = item.institution.institution_code;
                document.getElementById('modalServiceProvider').value = item.serviceProvider.name;
                
                // Show modal
                const modal = new bootstrap.Modal(document.getElementById('activationModal'));
                modal.show();
                }

                // Event listener for confirm button
                document.getElementById('confirmActivation').addEventListener('click', function() {
                const expiredDays = parseInt(document.getElementById('modalExpiredDays').value) || 1000;
                
                activateService(
                    currentActivationData.uuid,
                    currentActivationData.serviceProvider,
                    currentActivationData.institutionCode,
                    expiredDays
                );
                
                // Hide modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('activationModal'));
                modal.hide();
                });

                function toggleServiceStatus(uuid, serviceName, isCurrentlyActive, institutionCode) {
                if (isCurrentlyActive) {
                    // Deactivate immediately without modal
                    if (confirm(`Are you sure you want to deactivate ${serviceName}?`)) {
                    deactivateService(uuid, serviceName);
                    }
                } else {
                    // For activation, show modal
                    const item = {
                    uuid,
                    serviceProvider: { name: serviceName },
                    institution: { institution_code: institutionCode }
                    };
                    showActivationModal(item);
                }
                }

                function activateService(uuid, serviceProvider, institutionCode, expiredDays) {
                const url = `https://api.qrion.id/qms/institution-service-providers/activations-service/${serviceProvider}`;
                
                const requestData = {
                    institution_code: institutionCode,
                    status: "active",
                    expired_days: expiredDays
                };
                
                axios.put(url, requestData, {
                    headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('_is_admin'),
                    'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    console.log('Activation successful:', response.data);
                    showToast('success', `Service ${serviceProvider} activated successfully`);
                    loadServiceManagement(); // Refresh the table
                })
                .catch(error => {
                    console.error('Activation failed:', error);
                    showToast('error', `Failed to activate ${serviceProvider}: ${error.message}`);
                });
                }

                function deactivateService(uuid, serviceName) {
                // Implement your deactivation API call here
                console.log(`Deactivating ${serviceName} with UUID: ${uuid}`);
                showToast('info', `Would deactivate ${serviceName} in a real implementation`);
                // Refresh after action
                setTimeout(loadServiceManagement, 1000);
                }

            // Load data when page is ready
            document.addEventListener('DOMContentLoaded', loadServiceManagement);

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
		</script>