<div class="container">
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
		<th>SNo.</th>
        <th>Username</th>
        <th>Employee name</th>
		<th>Client name</th>
		 <th>Client Contact</th>
		<th>Status</th>
		
      </tr>
    </thead>
    <tbody>
		<?php $i=1;?>
      <?php foreach($result  as $r): ?>
		<tr>
			<td><?php echo $i; $i++;?>
			</td>
			<td><?php echo $r->username;?>
			</td>
			<td><?php echo $r->fname.' '.$r->mname.' '.$r->lname;?>
			</td>
			<td><?php echo $r->first_name.' '.$r->middle_name.' '.$r->last_name;?>
			</td>
			<td><?php echo $r->mobile;?>
			</td>
			<td><?php echo $r->status;?>
			</td>
						
			
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>
</div>