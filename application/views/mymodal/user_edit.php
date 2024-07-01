
<?php 
$uid = $this->session->userdata('user_id');
$user   = $this->db->get_where('user' , array('user_id' => $param2) )->result_array();
foreach ( $user as $row):
?>
<?php echo form_open(base_url() . 'admin/manage_user/update/'.$param2 , array('class' => 'form-horizontal group-border-dashed', 'enctype' => 'multipart/form-data'));?>

<div id="modal-loader" style="display: none; text-align: center;"> 
    <img src="<?php echo base_url(); ?>assets/images/preloader.gif" /> 
</div>

<h4 class="card-title" style="color:#163c7b">User Information</h4>
<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text"  name="name" value="<?php echo $row['name']; ?>" class="form-control" required placeholder="Enter User Name" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Mobile no</label>
            <input type="text"  name="mobile_no" value="<?php echo $row['mobile_no']; ?>" class="form-control" required placeholder="Enter Mobile no" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Email id</label>
            <input type="text"  name="email" value="<?php echo $row['email']; ?>" class="form-control"  placeholder="Enter Email" />
        </div>
    </div>

     
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Designation</label>
            <select name="designation" class="form-control">
                <option>Select Designation</option>
                <?php $designation= $this->db->get_where('designation',array())->result_array();
                
                    foreach ($designation as $designation):?>
                    <option value="<?php echo $designation['designation_id']; ?>" <?php if($designation['designation_id'] == $row['designation']){echo 'selected';}?>><?php echo $designation['designation']; ?></option>
             <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Profile Pic</label>
            <input type="file"  name="image" class="form-control"  />
            <a class="image-popup-vertical-fit" href="<?php echo $this->common_model->get_user_image_url($row['user_id']);?>">
               <img class="rounded me-2 shadow" alt="200x200" width="100" height="50" src="<?php echo $this->common_model->get_user_image_url($row['user_id']);?>">
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea type="text"  name="address" class="form-control" required placeholder="Enter Address"/><?php echo $row['address']; ?></textarea>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Password</label>
           
            <input type="password"name="password" class="form-control" value=""/>
        </div>
    </div>
</div>


<div class="col-sm-offset-3 col-sm-9 m-t-15">
  <button type="submit" class="btn btn-primary"><span class="btn-label"><i class="fa fa-refresh"></i></span>Update </button>
</div>

<?php form_close(); ?>
 <?php endforeach; ?> 





 
<!--end instant image dispaly--> 
