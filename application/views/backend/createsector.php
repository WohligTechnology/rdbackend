<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create sector</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createsectorsubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="name">name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">  <label>description</label>
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