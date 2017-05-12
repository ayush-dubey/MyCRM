
<div class="container">
	<h3 class="student">Update Employee Profile</h3>
	<p class="para">Note: (*) fields are mandatory</p>
<form name="employeeUpdateForm" class="form-horizontal" action="<?php echo base_url('ViewEmployee/update_employee'); ?>"  onsubmit="return validateemployeeUpdateForm()" method="POST">
<div class="myjumbo">
   <div class="form-group">
      <label class="control-label col-sm-4 required"> Designation</label>
      <div class="col-sm-6">          
        <select class="form-control branch" name="role">
     <option value="0">--select--</option>
     <option value="manager"<?php if(strcasecmp($mydata->role,"manager")==0){ echo "selected" ;} ?> >manager</option>
     <option value="employee"<?php if(strcasecmp($mydata->role,"employee")==0){ echo "selected" ;} ?> >employee</option>
    </select>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4 required">Name</label>
      <div class="col-sm-2">
        <input type="text" name="first_name" class="form-control" value="<?php echo $mydata->first_name;?>" required>
      </div>
	  <div class="col-sm-2">
        <input type="text" name="middle_name" class="form-control" value="<?php echo $mydata->middle_name;?>" >
      </div>
	  <div class="col-sm-2">
        <input type="text" name="last_name" class="form-control" value="<?php echo $mydata->last_name;?>" required>
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-4 required"> contact number</label>
      <div class="col-sm-6">          
        <input type="text" name="mobile" class="form-control" value="<?php echo $mydata->mobile;?>" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 required"> email address </label>
      <div class="col-sm-6">          
        <input type="email" name="email" class="form-control" value="<?php echo $mydata->email;?>" required>
      </div>
    </div>
	<div class="form-group">
      <label class="control-label col-sm-4 ">Father's Name</label>
      <div class="col-sm-6">          
        <input type="text" name="father_name" class="form-control" value="<?php echo $mydata->father_name;?>"  >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4 ">Address</label>
      <div class="col-sm-6">          
        <input type="text" name="address" class="form-control" value="<?php echo $mydata->address;?>"  >
      </div>
    </div>
	<div class="form-group">        
      <div class="col-sm-offset-8 col-sm-2">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </div>
</div> 
    <input type="hidden" value="<?php echo $mydata->employee_id;?>" name="employee_id">  
</form>
</div> 
