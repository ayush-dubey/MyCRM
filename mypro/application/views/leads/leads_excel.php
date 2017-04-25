<?php include('admin_header.php');?>
<div class="form-group">									
 
<form name="updateForm" class="form-horizontal" action="<?php echo base_url('exceldatainsert/ExcelDataAdd'); ?>"  onsubmit="return validateInsertForm()" method="POST">                     
<label>Excel File:</label>                        
<input type="file" name="userfile" />				                   
<input type="submit" value="upload" name="upload" />
</form>	
</div>
<?php include('admin_footer.php');?>