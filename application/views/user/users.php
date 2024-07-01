
<div class="row">     
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
		<div class="card-body">
			<h4 class="card-title">Users List</h4>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
            Add User
            </button>
			<div class="table-responsive my-3">
			<table id="userTable" class="table table-striped">
				<thead>
					<tr>
						<th>Sr No.</th>
						<th>Name</th>
						<th>Mobile</th>
						<th>Email</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; foreach($users as $user): ?>    
					<tr>
						<td class="py-1"><?php echo $i; ?></td>
						<td><?php echo $user['name']; ?></td>
						<td><?php echo $user['mobile_no']; ?></td>
						<td><?php echo $user['email']; ?></td>
						<td>
							<?php if($user['status'] == 0): ?>
								<span class="badge badge-success">Active</span>
							<?php else: ?>
								<span class="badge badge-danger">Inactive</span>
							<?php endif; ?>
						</td>
						<td>
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							 Option
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#myModal22" data-id="<?php echo base_url() . 'admin/view_modal/user_edit/'.$user['user_id'];?>" id="menu1"><i class="mdi mdi-pencil"></i> Edit</a>
							<?php if($user['status']=='0'): ?>
								<a class="dropdown-item" href="<?php echo base_url() . 'admin/manage_user/disable_user/'. $user['user_id'];?>"><i class="mdi mdi-block-helper"></i> Disable</a>
								<?php elseif($user['status'] =='1'): ?>
								<a class="dropdown-item" href="<?php echo base_url() . 'admin/manage_user/enable_user/'. $user['user_id'];?>"><i class="mdi mdi-lock-open-check-outline"></i> Enable</a>
								<?php endif; ?>
							</div>
							</div>
						</td>
					</tr>
					<?php $i++; endforeach; ?>
				</tbody>
			</table>
			</div>
		</div>
		</div>
	</div>
</div>

<?php foreach ($users as $row): ?>
    <!-- Edit Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url()?>admin/manage_user/update/<?php echo $row['user_id']; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $row['name']; ?>" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="mobile_no">Mobile</label>
                                    <input type="text" class="form-control" name="mobile_no" placeholder="Mobile" value="<?php echo $row['mobile_no']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address" rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <select class="form-control" name="designation" id="designation" required>
                                        <option value="">Select Designation</option>
                                        <?php foreach ($designation as $d): ?>
                                            <option value="<?php echo $d['designation_id']; ?>" <?php echo ($row['designation_id'] == $d['designation_id']) ? 'selected' : ''; ?>><?php echo $d['designation']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="image">Profile Pic</label>
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
    </div>
<?php endforeach; ?>

<!-- Modal -->
 <div class="row">
	<div class="col-10">
		<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addUserModalLabel">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url()?>admin/manage_user/add" enctype="multipart/form-data">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" name="name" placeholder="Name" required>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="mobile_no">Mobile</label>
											<input type="text" class="form-control" name="mobile_no" placeholder="Mobile" required>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-12">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="email" class="form-control" name="email" placeholder="Email" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="address">Address</label>
											<textarea class="form-control" name="address" id="" cols="10" rows="5"></textarea>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="designation">Designation</label>
											<select class="form-control" name="designation" id="designation" required>
												<option value="">Select Designation</option>
												<?php $designation = $this->db->get('designation')->result_array();
													foreach ($designation as $d) { ?>
												<option value="<?php echo $d['designation_id']; ?>"><?php echo $d['designation']; ?></option>
												<?php }?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="password">Password</label>
											<input type="password" class="form-control" name="password" placeholder="Password" required>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="image">Profile Pic</label>
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
		</div>
	</div>
 </div>



<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script>
   $(document).ready(function() {
    $('#userTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true
    });
});
</script>
