<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Coaches</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/coaches/add" class="btn btn-primary">
       Add a coach
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['coaches'] as $coach) : ?>
    <a href="<?php echo URLROOT; ?>/coaches/show/<?php echo $coach->id; ?>" class="list-group-item list-group-item-action"><?php echo $coach->name?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>