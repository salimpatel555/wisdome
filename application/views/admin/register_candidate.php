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
            <div class="col-lg-8">
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
                    <h3 class="font-weight-light mb-4 text-center">Register Candidate</h3>
                    <form method="post" action="<?php echo base_url()?>admin/candidate/candidate_action">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="candidate_name" placeholder="Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_id" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                        </div> -->
                        <div class="mt-3">
                            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
