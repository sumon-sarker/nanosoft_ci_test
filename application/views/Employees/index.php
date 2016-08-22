<div class="container">
  <?php if($this->session->flashdata('msg')){ ?>
    <div class="alert alert-success">
      <?php echo $this->session->flashdata('msg'); ?>
    </div>
  <?php } ?>

  <div class="row">
    <div class="col-md-12 text-right">
      <a class="btn btn-success" href="<?php echo base_url()?>employees/add">Add New Employee</a>
    </div>
  </div>
  <br/>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr style="background:#222222;color:white">
          <th class="text-center">ID</th>
          <th class="text-center">NAME</th>
          <th class="text-center">DESIGNATION</th>
          <th class="text-center">EMAIL</th>
          <th class="text-center">ACTIONS</th>
        </tr>
        <?php if(count($employees)){ ?>
          <?php foreach($employees as $employee) { ?>
            <tr>
              <td><?php echo $employee->id; ?></td>
              <td><?php echo $employee->first_name .' '. $employee->last_name; ?></td>
              <td><?php echo $employee->designation; ?></td>
              <td><?php echo $employee->email; ?></td>
              <td class="text-center">
                <a href="<?php echo base_url() .'employees/view/'.$employee->id ?>" class="btn btn-default">VIEW</a>
                <a href="<?php echo base_url() .'employees/edit/'.$employee->id ?>" class="btn btn-info">EDIT</a>
                <a onclick="return confirm('Do you want to delete this employee?')" href="<?php echo base_url() .'employees/delete/'.$employee->id ?>" class="btn btn-danger">DELETE</a>
              </td>
            </tr>
          <?php } ?>
        <?php } ?>
      </thead>
    </table>
  </div>

  <?php echo $this->pagination->create_links(); ?>
</div>
