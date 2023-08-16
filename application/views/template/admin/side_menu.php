<div class="main-sidebar sidebar-style-2">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="<?php echo base_url()?>dashboard"> <img alt="image" src="<?php echo base_url()?>assets/img/logo.png" class="header-logo" /> 
                            <!--<span class="logo-name">Aegis</span>-->
						</a>
					</div>
					<div class="sidebar-user">
						<div class="sidebar-user-picture">
							<img alt="image" src="<?php echo base_url()?>assets/img/userbig.png">
						</div>
						<div class="sidebar-user-details">
							<div class="user-name"><?php echo $user->email;?></div>
							<div class="user-role"><?php echo $user->first_name.''.$user->last_name;?></div>
						</div>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Main</li>
						<li class="dropdown active"><a href="<?php echo base_url('dashboard');?>" class="nav-link "><i
									data-feather="monitor"></i><span>Dashboard</span>
							</a>
							
						</li>
						<?php if($this->ion_auth_acl->has_permission('withdrawal')):?>
						<li class="dropdown "><a href="<?php echo base_url('wallet_transactions/list');?>" class="nav-link "><i
									data-feather="monitor"></i><span>Transactions</span>
							</a>
						</li>
						<?php endif;?>
                        <?php if($this->ion_auth_acl->has_permission('admin') || $this->ion_auth_acl->has_permission('hr')):?>
                            <li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
                                        data-feather="copy"></i><span>All Users</span></a>
                                <ul class="dropdown-menu">
                                    <?php if($this->ion_auth_acl->has_permission('emp') || $this->ion_auth_acl->has_permission('hr')):?>
                                        <li><a class="nav-link" href="<?php echo base_url('emp_list/users')?>">Users</a></li>
                                    <?php endif;?>
                                </ul>
                            </li>
                        <?php  endif;?>
						<?php if($this->ion_auth_acl->has_permission('emp') || $this->ion_auth_acl->has_permission('hr')):?>
    						<li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
    									data-feather="copy"></i><span>Employees</span></a>
    							<ul class="dropdown-menu">
        							<?php if($this->ion_auth_acl->has_permission('emp')):?>
        								<li><a class="nav-link" href="<?php echo base_url('employee/r');?>">Add Employee</a></li>
        								<li><a class="nav-link" href="<?php echo base_url('role/r');?>">Add Role</a></li>
    								<?php endif;?>
    				            </ul>
    						</li>
						<?php  endif;?>
    						<li class="dropdown"><a href="#" class="nav-link has-dropdown"><i
    									data-feather="copy"></i><span>Settings</span></a>
    							<ul class="dropdown-menu">
        							<?php if($this->ion_auth_acl->has_permission('site_settings')):?>
        								<li><a class="nav-link" href="<?php echo base_url('settings/r');?>">Site Settings</a></li>
    								<?php endif;?>
    								<?php if($this->ion_auth_acl->has_permission('slider_settings')):?>
    									<li><a class="nav-link" href="<?php echo base_url('sliders/r');?>">Manage Sliders</a></li>
    								<?php endif;?>
    				            </ul>
    						</li>
					</ul>
				</aside>
			</div>