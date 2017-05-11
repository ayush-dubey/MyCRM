<div class="container">
<?php if($this->session->flashdata('message')){?>
          <div align="center" class="alert alert-success">      
            <?php echo $this->session->flashdata('message')?>
          </div>
        <?php } ?>

<br><br>

<div align="center">
<form action="<?php echo base_url(); ?>index.php/uploadcsv/import" 
method="post" name="upload_excel" enctype="multipart/form-data">
<div class="myjumbo">
<div class="form-group">
<input type="file" name="file" id="file">
</div>
<div class="form-group">
<button type="submit" id="submit" name="import" class="btn btn-primary">Import</button>
</div>
</div>
</form>

</div>
</div>