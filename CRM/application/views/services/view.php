<?php if($this->session->flashdata('update')){?> 
 <div align="center" class="alert alert-success"> 
<p style="color:green;"><?php print_r($this->session->flashdata('update'));?></p>
</div><?php }?>
<?php if($this->session->flashdata('delete')){?> 
<div class="alert alert-danger">
<p style="color:red;"><?php print_r($this->session->flashdata('delete'));?></p>
</div><?php }?>
<div class="col-sm-offset-4">
<p style="color:green;"><?php print_r($this->session->flashdata('insert'));?></p>
</div>

<div class="table-responsive">          
  <table class="table table-hover">
     <thead class="thead-inverse">
      <tr>
		
        <th>#</th>
        <th>Service</th>
        	
		<th></th>
		
		 </tr>
    </thead>
    <tbody>
		<?php $i=1;?>
      <?php foreach($result  as $r): ?>
		<tr>
			
			
			<td><?php echo $i; $i++;?>
			</td>
			<td><?php echo $r->service_name;?>
			</td>
			
			
			
			<td><form name="delete" class="form-horizontal" action="<?php echo base_url('Services/delete');?>"  method="POST">
			<input type="hidden" name="service_id" value="<?php echo $r->service_id;?>">
					<input type="submit" name="delete" class="btn btn-danger" value="Delete">
				</form>
			</td>
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>