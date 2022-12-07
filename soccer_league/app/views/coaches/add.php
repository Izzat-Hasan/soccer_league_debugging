<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/coaches" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add coach</h2>
    <form action="<?php echo URLROOT; ?>/coaches/add" method="post">
      <div class="form-group">
        <label for="name">First Name: <sup>*</sup></label>
        <input type="text" name="firstname" class="form-control form-control-lg <?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['firstname']; ?>">
        <span class="invalid-feedback"><?php echo $data['firstname']; ?></span>
      </div>
      <div class="form-group">
        <label for="name">Last Name: <sup>*</sup></label>
        <input type="text" name="lastname" class="form-control form-control-lg <?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['lastname']; ?>">
        <span class="invalid-feedback"><?php echo $data['lastname']; ?></span>
      </div>
      <div class="form-group">
        <label for="email">email: <sup>*</sup></label>
        <input name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
      </div>

      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>