<div class="col-sm-offset-4">
<p style="color:green;"><?php print_r($this->session->flashdata('update'));?></p>
</div>

<div class="col-sm-offset-4">
<p style="color:red;"><?php print_r($this->session->flashdata('delete'));?></p>
</div>
<div class="col-sm-offset-4">
<p style="color:green;"><?php print_r($this->session->flashdata('insert'));?></p>
</div>


<div class="table-responsive">          
  <table class="table table-hover">
     <thead class="thead-inverse">
      <tr>
        <th>#</th>
        <th>Name</th>		
        <th>Email</th>
        <th>Mobile</th>
		<th>Address</th>
		
      </tr>
    </thead>
    <tbody>
		<?php $i=1;?>
      <?php foreach($result as $r): ?>
		<tr>
			
			<td><?php echo $i; $i++;?>
			</td>
			<td><?php echo $r->first_name.' '.$r->middle_name.' '.$r->last_name;?>
			</td>
			<td><?php echo $r->email;?>
			</td>
			<td><?php echo $r->mobile;?>
			</td>
			<td><?php echo $r->address;?>
			</td>
			
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>