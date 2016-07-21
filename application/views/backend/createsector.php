<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create sector</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createsectorsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="name">Name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="name">Order</label>
<input type="text" id="order" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
<div class=" row">
<div class=" input-field col s6">
<?php echo form_dropdown("type",$type,set_value('type'));?>
<label>Image Type</label>
</div>
</div>
<div class="row">
<div class="file-field input-field col s12 m6">
<div class="btn blue darken-4">
<span>Image1</span>
<input type="file" name="image1" multiple>
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text" placeholder="Upload one or more files" value='<?php echo set_value('image1');?>'>
</div>
</div>
<span style=" display: block;">Small 428px X 330px</span>
<span style=" display: block;"> OR Big 428px X 660px</span>
</div>
<div class="row">
<div class="file-field input-field col s12 m6">
<div class="btn blue darken-4">
<span>Image2</span>
<input type="file" name="image2">
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text" placeholder="Upload one or more files" value='<?php echo set_value('image2');?>'>
</div>
</div>
<span style=" display: block;">1920px X 595px</span>
</div>
<div class="row">  <label>Description</label>
<div class="input-field col s12">
<textarea id= "some-textarea" name="description" class="materialize-textarea" length="400"><?php echo set_value( 'description');?></textarea>
</div>
</div>

<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewsector"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
