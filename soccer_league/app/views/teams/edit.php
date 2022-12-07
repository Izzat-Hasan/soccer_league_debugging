<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>/teams" class="btn btn-light">Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Edit Team</h2>
    <form action="<?php echo URLROOT; ?>/teams/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="name">Team Name: <sup>*</sup></label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="color">Team Color: <sup>*</sup></label>
        <textarea name="color" class="form-control form-control-lg <?php echo (!empty($data['color_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['color']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['color_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>