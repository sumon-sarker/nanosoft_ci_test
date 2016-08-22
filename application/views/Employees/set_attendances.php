<?php
function is_present($employee_id,$attendances){
  if (isset($attendances[$employee_id])) {
    return $attendances[$employee_id];
  }
  return false;
}
?>
<div class="container">
  <div class="alert alert-info">
    <ul>
      <li>Click on the "PRESENT" or "ABSENT" button to set Employee attendances</li>
      <li>Mouse over and see the todays status</li>
    </ul>
  </div>
  <div class="row">
    <?php if (count($employees)) { ?>
      <?php foreach ($employees as $key => $employee) {?>
        <div class="col-md-3">
          <?php
            $is_present = is_present($employee->id,$attendances);
            if($is_present=='present'){
          ?>
            <div class="thumbnail" style="overflow:hidden" data-toggle='tooltip' data-placement='top' title='This employee is Present today'>
          <?php } else if($is_present=='absent'){ ?>
            <div class="thumbnail" style="overflow:hidden" data-toggle='tooltip' data-placement='top' title='This employee is Absent today'>
          <?php } else{ ?>
            <div class="thumbnail" style="overflow:hidden">
          <?php } ?>
            <img class="img-responsive pull-left" style="max-height:80px" src="<?php echo base_url() ?>/nanosoft/img/team/3.jpg" alt="<?php echo $employee->first_name .' '. $employee->last_name ?>">
            <div class="pull-right" style="overflow:hidden">
              <h6 class="text-left"><?php echo $employee->first_name .' '. $employee->last_name ?></h6>
              <div class="absent_present">
                <?php if($is_present=='present'){?>
                  <span class="glyphicon glyphicon-ok-circle"></span>
                <?php }else if($is_present=='absent'){?>
                  <span class="glyphicon glyphicon-remove-circle"></span>
                <?php }else{ ?>
                  <button data-id="<?php echo $employee->id ?>" type="button" class="btn btn-success present">Present</button>
                  <button data-id="<?php echo $employee->id ?>" type="button" class="btn btn-danger absent">Absent</button>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    <?php } ?>
  </div>

  <div class="row">
    <div class="col-md-12">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>nanosoft/js/absent-present.js"></script>
