
<div class="container">
	<h3 class="student">Update Lead</h3>
	<p class="para">Note: (*) fields are mandatory</p>
<form name="leadRegisterForm" class="form-horizontal" action="<?php echo base_url('Leads/update_leads'); ?>"  onsubmit="return validateLeadRegisterForm()" method="POST">
<div class="myjumbo">
  
	<div class="form-group">
      <label class="control-label col-sm-4 ">Name</label>
      <div class="col-sm-2">
        <input type="text" name="first_name" class="form-control" value="<?php echo $mydata->first_name;?>" >
      </div>
	  <div class="col-sm-2">
        <input type="text" name="middle_name" class="form-control" value="<?php echo $mydata->middle_name;?>" >
      </div>
	  <div class="col-sm-2">
        <input type="text" name="last_name" class="form-control" value="<?php echo $mydata->last_name;?>" >
      </div>
    </div>
    
	
    <div class="form-group">
      <label class="control-label col-sm-4 ">Gender</label>
		<div class="col-sm-6">          
			<select class="form-control branch" name="gender">
			<option <?php if(strcasecmp($mydata->gender,"Male")==0){ echo "selected" ;} ?> value="Male">Male</option>
			<option <?php if(strcasecmp($mydata->gender,"Female")==0){ echo "selected" ; } ?> value="Female">Female</option>
			</select>
			
      </div>
	  </div> 
	
    
    <div class="form-group">
      <label class="control-label col-sm-4 required"> contact number</label>
      <div class="col-sm-6">          
        <input type="text" name="mobile" class="form-control" value="<?php echo $mydata->mobile;?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 "> email address </label>
      <div class="col-sm-6">          
        <input type="email" name="email" class="form-control" value="<?php echo $mydata->email;?>" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 ">Address</label>
      <div class="col-sm-6">          
        <input type="text" name="address" class="form-control" value="<?php echo $mydata->address;?>"  >
      </div>
    </div>
	
	
	<div class="form-group">
      <label class="control-label col-sm-4 ">Profession</label>
      <div class="col-sm-6">          
        <input type="text" name="profession" class="form-control" value="<?php echo $mydata->profession;?>"  >
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4 ">Next Follow Up Date</label>
      <div class="col-sm-6">          
        <input type="date" name="follow_up_date" class="form-control" value="<?php echo $mydata->follow_up_date;?>"  >
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4 ">Status</label>
		<div class="col-sm-6">          
			<select class="form-control branch" name="status">
			<option <?php if(strcasecmp($mydata->status,"No Status")==0){ echo "selected" ;} ?> value="No Status">No Status</option>
			<option <?php if(strcasecmp($mydata->status,"Pending")==0){ echo "selected" ; } ?> value="Pending">Pending</option>
			<option <?php if(strcasecmp($mydata->status,"Converted")==0){ echo "selected"; }  ?> value="Converted">Converted</option>
			<option <?php if(strcasecmp($mydata->status,"Rejected")==0) {echo "selected" ;} ?> value="Rejected">Rejected</option>
		</select>
      </div>
	  </div>
	  
		<div class="form-group">
			<label for="comment">Comment:</label>
			<textarea name="comment" class="form-control" rows="5" id="comment"></textarea>
		</div>
		
		<div class="form-group">
			<label for="Services">Services</label><br>
			<?php foreach($result  as $r){ ?><div class="col-sm-3"><input type="checkbox" name="services[]" value="<?php echo $r->service_id;?>" ><?php echo $r->service_name;?></div><?php } ?>
			
		</div>

	<div class="form-group">        
      <div class="col-sm-offset-8 col-sm-2">
        <button type="submit" class="btn btn-success">Update Lead</button>
      </div>
    </div>
	
</div> 
    <input type="hidden" value="<?php echo $mydata->client_id;?>" name="client_id">  
</form>
</div> 
