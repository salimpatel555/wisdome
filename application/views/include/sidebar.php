<?php if(!empty($this->session->userdata('admin_is_login'))){?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('dashboard')?>">
              <i class="icon-grid menu-icon" active></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
					<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Candidate</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo base_url('admin/candidate/register_candidate')?>">Register Candidate</a></li>
								<li class="nav-item"><a class="nav-link" href="<?php echo base_url('candidate')?>">Candidate List</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Masters</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
              </ul>
            </div>
          </li>
					<li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
              </ul>
            </div>
          </li>
         
         
        </ul>
      </nav>
<?php }?>
