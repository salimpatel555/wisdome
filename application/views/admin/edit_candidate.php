<style>
        .hidden-section {
            display: none;
        }
</style>
<div class="row">
	<div class="col-md-12">
		<h3 class="mb-4 btn btn-dark" id="personalDetailsButton">Personal Details</h3>
		<h3 class="mb-4 btn btn-dark" id="documentDetailsButton">Document</h3>
		<!-- Personal Details Section -->
		<div id="personalDetailsSection">
		    <form action="<?php echo base_url('admin/candidate/update/') . $candidate->id ?>" method="post">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" name="first_name" value="<?php echo $candidate->candidate_name ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="middle_name">Middle Name</label>
							<input type="text" class="form-control" name="middle_name" value="<?php echo $candidate->middle_name ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" name="last_name" value="<?php echo $candidate->last_name ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="mobile">Mobile Number</label>
							<input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $candidate->mobile_no ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="phone1">Alternate Mobile no 1</label>
							<input type="text" class="form-control" id="phone1" name="phone1" value="<?php echo $candidate->alt_mobile_no1 ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="phone2">Alternate Mobile no 2</label>
							<input type="text" class="form-control" id="phone2" name="phone2" value="<?php echo $candidate->alt_mobile_no2 ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" value="<?php echo $candidate->address ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="country">Country</label>
							<input type="text" class="form-control" id="country" name="country" value="<?php echo $candidate->countries ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="dob">Date of Birth</label>
							<input type="date" class="form-control" id="dob" name="dob" value="<?php echo $candidate->dob ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="gender">Gender</label>
							<select name="gender" id="gender" class="form-control">
								<option value="Male" <?php echo ($candidate->gender == 'Male') ? 'selected' : ''; ?>>Male</option>
								<option value="Female" <?php echo ($candidate->gender == 'Female') ? 'selected' : ''; ?>>Female</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="marital_status">Marital Status</label>
							<select name="marital_status" id="marital_status" class="form-control">
								<option value="Married" <?php echo ($candidate->marital_status == 'Married') ? 'selected' : ''; ?>>Married</option>
								<option value="Unmarried" <?php echo ($candidate->marital_status == 'Unmarried') ? 'selected' : ''; ?>>Unmarried</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="passport_number">Passport Number</label>
							<input type="text" class="form-control" id="passport_number" name="passport_number" value="<?php echo $candidate->passport_number ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="passport_issue_date">Passport Issue Date</label>
							<input type="date" class="form-control" id="passport_issue_date" name="passport_issue_date" value="<?php echo $candidate->passport_issue_date ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="passport_expiry_date">Passport Expiry Date</label>
							<input type="date" class="form-control" id="passport_expiry_date" name="passport_expiry_date" value="<?php echo $candidate->passport_expiry_date ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="country">Applicant Contact Number</label>
							<input type="text" class="form-control" id="country" name="contact_number" value="<?php echo $candidate->mobile_no ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="country">Alternate Number</label>
							<input type="text" class="form-control" id="country" name="alternate_number" value="<?php echo $candidate->mobile_no ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="country">Official Email</label>
							<input type="email" class="form-control" id="" name="email_id" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="country">Personal Email</label>
							<input type="email" class="form-control" id="" name="personal_email" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
				</div>
				<h4>Emergency Contact:</h4>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Father Name</label>
							<input type="text" class="form-control" id="" name="father_name" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Father Contact Number</label>
							<input type="text" class="form-control" id="" name="f_contact_number" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Father Email</label>
							<input type="email" class="form-control" id="" name="f_email_id" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Mother Name</label>
							<input type="text" class="form-control" id="" name="mother_name" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Mother Contact Number</label>
							<input type="text" class="form-control" id="" name="m_contact_number" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="country">Mother Email</label>
							<input type="email" class="form-control" id="" name="m_email_id" value="<?php echo $candidate->email_id ?>">
						</div>
					</div>
				</div>
				<h4>Education</h4>
				<div class="row my-3">
					<div id="educationFields" class="col-12">
						<!-- Dynamic education fields will be appended here -->
					</div>
					<div class="col-12">
						<button type="button" class="btn btn-success" onclick="addEducationField()">Add Education</button>
					</div>
				</div>
				<button type="submit" class="btn btn-primary my-3">Submit</button>
			</form>
		</div>

		<!-- Document Details Section -->
		<div id="documentDetailsSection" class="hidden-section">
			<form action="submit_document_details.php" method="post">
				<div class="form-group">
					<label for="document_type">Document Type</label>
					<input type="text" class="form-control" id="document_type" name="document_type" required>
				</div>
				<div class="form-group">
					<label for="document_number">Document Number</label>
					<input type="text" class="form-control" id="document_number" name="document_number" required>
				</div>
				<div class="form-group">
					<label for="document_issue_date">Issue Date</label>
					<input type="date" class="form-control" id="document_issue_date" name="document_issue_date" required>
				</div>
				<div class="form-group">
					<label for="document_expiry_date">Expiry Date</label>
					<input type="date" class="form-control" id="document_expiry_date" name="document_expiry_date" required>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>


<script>
	document.getElementById('personalDetailsButton').addEventListener('click', function() {
		document.getElementById('personalDetailsSection').style.display = 'block';
		document.getElementById('documentDetailsSection').style.display = 'none';
	});

	document.getElementById('documentDetailsButton').addEventListener('click', function() {
		document.getElementById('personalDetailsSection').style.display = 'none';
		document.getElementById('documentDetailsSection').style.display = 'block';
	});

	// Show personal details section by default
	document.getElementById('personalDetailsSection').style.display = 'block';
	document.getElementById('documentDetailsSection').style.display = 'none';
</script>	

<script>
        function addEducationField() {
            const educationFieldsDiv = document.getElementById('educationFields');
            const newEducationField = document.createElement('div');
            newEducationField.classList.add('card', 'education-card');
            newEducationField.innerHTML = `
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Degree</label>
                                <input type="text" class="form-control" name="degree[]" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Institution</label>
                                <input type="text" class="form-control" name="institution[]" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control" name="year[]" required>
                            </div>
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeEducationField(this)">Remove</button>
                        </div>
                    </div>
                </div>
            `;
            educationFieldsDiv.appendChild(newEducationField);
        }

        function removeEducationField(button) {
            const educationCard = button.closest('.card');
            educationCard.remove();
        }
    </script>
