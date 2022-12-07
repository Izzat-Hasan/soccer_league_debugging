<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/players" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Player</h2>
    <form action="<?php echo URLROOT; ?>/players/add" method="post">
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
        <label for="birthdate">Birthdate: <sup>*</sup></label>
        <input name="birthdate" class="form-control form-control-lg <?php echo (!empty($data['birthdate_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['birthdate']; ?>">
        <span class="invalid-feedback"><?php echo $data['birthdate_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="rating">Rating: <sup>*</sup></label>
        <input name="rating" class="form-control form-control-lg <?php echo (!empty($data['rating_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['rating']; ?>">
        <span class="invalid-feedback"><?php echo $data['rating_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>