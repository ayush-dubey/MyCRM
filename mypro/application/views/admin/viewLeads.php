<div class="table-responsive">          
  <table class="table table-hover">
     <thead class="thead-inverse dark">
      <tr>
        <th>ID</th>
        <th>Firstname</th>
		 <th>Middlename</th>
        <th>Lastname</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Mobile</th>
		<th>Address</th>
		<th>Professoin</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result  as $r): ?>
		<tr><td><?php echo $r->client_id;?>
		</td>
		<td><?php echo $r->first_name;?>
		</td>
		<td><?php echo $r->middle_name;?>
		</td>
		<td><?php echo $r->last_name;?>
		</td>
		<td><?php echo $r->gender;?>
		</td>
		<td><?php echo $r->email;?>
		</td>
		<td><?php echo $r->mobile;?>
		</td>
		<td><?php echo $r->address;?>
		</td>
		<td><?php echo $r->profession;?>
		</td>
		<td><?php echo $r->status;?>
		</td>
		</tr>
	<?php endforeach; ?>
	 
    </tbody>
  </table>
  </div>
</div>