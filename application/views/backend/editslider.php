<!-- <section class="panel">
	<header class="panel-heading">
		Slider Details
	</header>
	<div class="panel-body">
		<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editslidersubmit");?>' enctype='multipart/form-data'>
			<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">Order</label>
				<div class="col-sm-4">
					<input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value(' order ',$before->order);?>'>
				</div>
			</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-4">
          <input type="file" id="normal-field" class="form-control" name="image" value="<?php echo set_value('image',$before->image);?>">
          <?php if($before->image != "")
          {	?>
            <br>
            <img src="<?php echo base_url('uploads')."/".$before->image; ?>" width="100px" height="100px">
        <?php	}
          ?>
        </div>
					<span>1400 x 1040 px</span>
      </div>
			<div class="form-group">
				<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
				<div class="col-sm-4">
					<button type="submit" class="btn btn-primary">Save</button>
					<a href='<?php echo site_url("site/viewslider"); ?>' class='btn btn-secondary'>Cancel</a>
				</div>
			</div>
		</form>
	</div>
</section> -->



<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit Slider</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editslidersubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">

<div class="row">
<div class="input-field col s6">
<label for="order">order</label>
<input type="text" id="order" name="order" value='<?php echo set_value('order',$before->order);?>'>
</div>
</div>

<div class="row">
   <div class="file-field input-field col m6 s12">
     <span class="img-center big">
                                   <?php if($before->image == "") { } else {
                                   ?><img src="<?php echo base_url('uploads')."/".$before->image; ?>">
                           <?php } ?>
                           </span>
     <div class="btn blue darken-4">
       <span>image</span>
       <input name="image" type="file" multiple>
     </div>
     <div class="file-path-wrapper">
       <input class="file-path validate" type="text" placeholder="Upload image" value="<?php echo set_value('image',$before->image);?>">
     </div>
   </div>
   <span style=" display: block;
 ">1440px X 728px</span>
 </div>



<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewslider"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
