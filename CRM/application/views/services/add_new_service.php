<div class="container">
	<h3 class="student">Add New Service</h3>
	
<form name="insertForm" class="form-horizontal" action="<?php echo base_url('Services/insert'); ?>"  onsubmit="return validateInsertForm()" method="POST">
<div class="myjumbo" >
 
	
	
    <div class="form-group">
      <label class="control-label col-sm-4 required">Service name</label>
      <div class="col-sm-2">
        <input type="text" name="service_name" class="form-control" placeholder="service name" required>
      </div>
	  </div>
	 
    
	
	
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-2">
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
</div> 
 
 </form>


</div>

