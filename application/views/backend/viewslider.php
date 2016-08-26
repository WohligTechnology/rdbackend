<!-- <div class="row" style="padding:1% 0">
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" href="<?php echo site_url("site/createslider"); ?>"><i class="icon-plus"></i>Create </a> &nbsp;
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Slider Details
            </header>
            <div class="drawchintantable">
                <?php $this->chintantable->createsearch("Slider List");?>
                <table class="table table-striped table-hover" id="" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="order">Order</th>
                            <th data-field="image">Image</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <?php $this->chintantable->createpagination();?>
            </div>
        </section>
        <script>
            function drawtable(resultrow) {
                      var image="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' width='80px' height='80px'></a>";
                return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.order + "</td><td>" + image + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editslider?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=\"return confirm('Are you sure you want to delete?');\" href='<?php echo site_url('site/deleteslider?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
            }
            generatejquery("<?php echo $base_url;?>");
        </script>
    </div>
</div> -->



<div class="row">
<div class="col s12">
<div class="row">
<div class="col s12 drawchintantable">
<?php $this->chintantable->createsearch("Slider");?>
<table class="highlight responsive-table">
<thead>
<tr>
  <th data-field="id">ID</th>
  <th data-field="order">Order</th>
  <th data-field="image">Image</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
<?php $this->chintantable->createpagination();?>
<div class="createbuttonplacement"><a class="btn-floating btn-large waves-effect waves-light blue darken-4 tooltipped" href="<?php echo site_url("site/createslider"); ?>"data-position="top" data-delay="50" data-tooltip="Create"><i class="material-icons">add</i></a></div>
</div>
</div>
<script>
function drawtable(resultrow) {
    var image="<a href='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' target='_blank'><img src='<?php echo base_url('uploads').'/'; ?>"+resultrow.image+"' width='80px' height='80px'></a>";
return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.order + "</td><td><img width='120' src='<?php echo base_url("uploads");?>/"+ resultrow.image +"'</td><td>" + resultrow.order + "</td><td><a class='btn btn-primary btn-xs waves-effect waves-light blue darken-4 z-depth-0 less-pad' href='<?php echo site_url('site/editslider?id=');?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Edit'><i class='fa fa-pencil propericon'></i></a><a class='btn btn-danger btn-xs waves-effect waves-light red pad10 z-depth-0 less-pad' onclick=\"return confirm('Are you sure you want to delete?');\") href='<?php echo site_url('site/deleteslider?id='); ?>"+resultrow.id+"' data-position='top' data-delay='50' data-tooltip='Delete'><i class='material-icons propericon'>delete</i></a></td></tr>";
}
generatejquery("<?php echo $base_url;?>");
</script>
