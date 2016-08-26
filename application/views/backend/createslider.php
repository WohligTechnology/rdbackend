<!-- <div class="row" style="padding:1% 0">
	<div class="col-md-12">
		<div class="pull-right">
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				Slider Details
			</header>
			<div class="panel-body">
				<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/createslidersubmit");?>' enctype='multipart/form-data'>
					<div class="panel-body">

            <div class="form-group">
            <label class="col-sm-2 control-label" for="normal-field">Order</label>
            <div class="col-sm-4">
            <input type="text" id="normal-field" class="form-control" name="order" value='<?php echo set_value('order');?>'>
            </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="normal-field">Image</label>
              <div class="col-sm-4">
                <input type="file" id="normal-field" class="form-control" name="image" value='<?php echo set_value(' image ');?>'>
              </div>
							<span>1400 x 1040 px</span>
            </div>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
							<div class="col-sm-4">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="<?php echo site_url("site/viewslider"); ?>" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
				</form>
				</div>
		</section>
		</div>
	</div> -->



	<div class="row">
	<div class="col s12">
	<h4 class="pad-left-15 capitalize">Create Slider</h4>
	</div>
	<form class='col s12' method='post' action='<?php echo site_url("site/createslidersubmit");?>' enctype= 'multipart/form-data'>


		<div class="row">
		<div class="input-field col s6">
		<label for="order">order</label>
		<input type="text" id="order" name="order" value='<?php echo set_value('order');?>'>
		</div>
		</div>


	<div class="row">
	<div class="file-field input-field col s12 m6">
	<div class="btn blue darken-4">
	<span>Image</span>
	<input type="file" name="image" multiple>
	</div>
	<div class="file-path-wrapper">
	<input class="file-path validate" type="text" placeholder="Upload image" value='<?php echo set_value('image');?>'>
	</div>
	</div>
	<span style=" display: block;
	">1440px X 728px</span>
	</div>



	<div class="row">
	<div class="col s12 m6">
	<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
	<a href="<?php echo site_url("site/viewslider"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
	</div>
	</div>
	</form>
	</div>
