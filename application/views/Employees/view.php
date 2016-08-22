<div class="container">
  <div class="jumbotron">
    <div class="row">
      <div class="col-md-4">
        <div class="text-center">
          <img style="max-height:120px;margin:auto" class="img-responsive" src="<?php echo base_url() ?>nanosoft/img/team/1.jpg" alt="<?php echo $employee->first_name . ' ' . $employee->last_name ?>">
        </div>
      </div>
      <div class="col-md-8">
        <h2><?php echo $employee->first_name . ' ' . $employee->last_name ?></h2>
        <p><?php echo $employee->designation ?></p>
        <p><?php echo $employee->email ?></p>
      </div>
    </div>
  </div>
</div>
