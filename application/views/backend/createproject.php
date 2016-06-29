<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create project</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createprojectsubmit");?>' enctype= 'multipart/form-data'>
  <div class="row">
             <div class="input-field col s12 m8">
                 <?php echo form_dropdown('sector', $sector, set_value('sector')); ?>
                  <label>Service</label>
             </div>
         </div>
<div class="row">
<div class="input-field col s6">
<label for="title">title</label>
<input type="text" id="title" name="title" value='<?php echo set_value('title');?>'>
</div>
</div>
<!-- <div class="row">
<div class="file-field input-field col s12 m6">
<div class="btn blue darken-4">
<span>image</span>
<input type="file" name="image" multiple>
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text" placeholder="Upload one or more files" value='<?php echo set_value('image');?>'>
</div>
</div>
<span style=" display: block;
padding-top: 30px;"></span>
</div> -->
<div class="row"><label>description</label>
<div class="input-field col s12">
<textarea id="some-textarea" name="description" class="materialize-textarea" length="400"><?php echo set_value( 'description');?></textarea>

</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="order">order</label>
<input type="text" id="order" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>

<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewproject"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
