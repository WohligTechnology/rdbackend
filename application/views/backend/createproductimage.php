<div class="row">
<div class="col s12">
<h4 class="pad-left-15">Create Project Image</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createproductimagesubmit");?>' enctype= 'multipart/form-data'>

 <div class="row" style="display:none">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('product', $product, set_value('product',$this->input->get("id"))); ?>
                 <label> Product</label>
            </div>
        </div>

 <div class="row">
<div class="input-field col s6">
<label for="Order">Order</label>
<input type="text" id="Order" name="order" value='<?php echo set_value('order');?>'>
</div>
</div>
 <div class="row">
            <div class="input-field col s12 m8">
                <?php echo form_dropdown('status', $status, set_value('status')); ?>
                 <label>Status</label>
            </div>
        </div>
        <div class="row">
<div class="file-field input-field col s12 m6">
<div class="btn blue darken-4">
<span>Image</span>
<input type="file" name="image" multiple>
</div>
<div class="file-path-wrapper">
<input class="file-path validate" type="text" placeholder="Upload one or more files" value='<?php echo set_value('image');?>'>
</div>
</div>
 <span style=" display: block;
    padding-top: 30px;"></span>
</div>
<!--
<div class="row saveclick">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewproductimage?id=").$this->input->get("id"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
-->

      <div class="row saveclick createbuttonplacement">
				<div class="col m12 s12">
					<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
					<a href="<?php echo site_url("site/viewproductimage?id=").$this->input->get("id"); ?>" class="waves-effect waves-light btn red">Cancel</a>
				</div>
			</div>
</form>
</div>
