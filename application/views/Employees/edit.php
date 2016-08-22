<div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open('employees/edit/'.$employee->id);?>
          <div class="form-group">
            <label for="first_name">First Name</label>
            <?php
              $data = array(
                      'type'  => 'text',
                      'name'  => 'first_name',
                      'id'    => 'first_name',
                      'value' => $employee->first_name,
                      'class' => 'form-control'
              );
              echo form_input($data);
            ?>
          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <?php
              $data = array(
                      'type'  => 'text',
                      'name'  => 'last_name',
                      'id'    => 'last_name',
                      'value' => $employee->last_name,
                      'class' => 'form-control'
              );
              echo form_input($data);
            ?>
          </div>
          <div class="form-group">
            <label for="designation">Designation</label>
            <?php
              $data = array(
                      'type'  => 'text',
                      'name'  => 'designation',
                      'id'    => 'designation',
                      'value' => $employee->designation,
                      'class' => 'form-control'
              );
              echo form_input($data);
            ?>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <?php
              $data = array(
                      'type'  => 'email',
                      'name'  => 'email',
                      'id'    => 'email',
                      'value' => $employee->email,
                      'class' => 'form-control'
              );
              echo form_input($data);
            ?>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
</div>
<br/>
