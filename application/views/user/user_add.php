<style>
        body {
            background: #f7f7f7;
        }
        .auth-form-light {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .auth-form-light .form-control {
            border-radius: 25px;
        }
        .auth-form-light .btn-primary {
            border-radius: 25px;
            background: #007bff;
            border: none;
        }
        .auth-form-light .btn-primary:hover {
            background: #0056b3;
        }
        .brand-logo img {
            max-width: 150px;
        }
    </style>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <!-- <div class="brand-logo">
                        <img src="<?php echo base_url()?>/assets/images/WCELogo.png" alt="logo">
                    </div> -->
					<?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
                    <?php } ?>
					<?php if ($this->session->flashdata('success')) { ?>
                        <div class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></div>
                    <?php } ?>
                    <h3 class="font-weight-light mb-4 text-center">Add User</h3>
                    <form method="post" action="<?php echo base_url()?>admin/user/add_user">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
									<label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                                </div>
                            </div>
							<div class="col-4">
                                <div class="form-group">
									<label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                            </div>
							<div class="col-4">
                                <div class="form-group">
									<label for="">Mobile</label>
                                    <input type="text" class="form-control" name="mobile_no" placeholder="Mobile" required>
                                </div>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-6">
                                <div class="form-group">
									<label for="">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Address" required>
                                </div>
                            </div>
							<div class="col-6">
                                <div class="form-group">
									<label for="">Designation</label>
									<select class="form-control" name="designation" id="">
										<option value="">Select Designation</option>
										<?php $designation = $this->db->get('designation')->result_array();
										 foreach ($designation as $d) { ?>
										<option value="<?php echo  $d['designation_id']; ?>"><?php echo  $d['designation']; ?></option>
										<?php }?>
									</select>
                                </div>
                            </div>
                        </div>
						<div class="row">
							<div class="col-6">
                                <div class="form-group">
									<label for="">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
							<div class="col-6">
                                <div class="form-group">
									<label for="">Profile Pic</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
