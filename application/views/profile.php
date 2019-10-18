<div class="container py-4">
  <div class="row my-4">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <table class="table table-bordered table-striped">
                <tr>
                    <th colspan="2"><h4>User details<h4></th>
                </tr>
                    <tr>
                        <td>Username</td>
                        <td><?php echo $username ?> </td>
                    </tr>
                    <tr>
                        <td>First name</td>
                        <td><?php echo $firstname ?> </td>
                    </tr>
                    <tr>
                        <td>Last name</td>
                        <td><?php echo $lastname ?> </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email ?> </td>
                    </tr>
					<tr>
						<td>Role</td>
						<td><?php echo $role ?> </td>
					</tr>
					<tr>
						<td>date</td>
						<td><?php echo $birth ?> </td>
					</tr>
					<tr>
						<td>foto</td>
						<td><img width="100px;" src = "<?php echo base_url()."assets/uploads/".$userfile ?>" </td>
					</tr>

    
            </table>



        <?php 
            $success_msg = $this->session->flashdata('success_msg');
            if($success_msg){ ?>
            <div class="col-md-6 alert alert-success">
                <?php echo $success_msg ?>
            </div>
            <?php } ?>  
        <?php 
            $error_msg = $this->session->flashdata('error_msg');
            if($error_msg){ ?>
            <div class="col-md-6 alert alert-danger">
                <?php echo $error_msg ?>
            </div>
            <?php } ?> 
        </div>
  </div>



