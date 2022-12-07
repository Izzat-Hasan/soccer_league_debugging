<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Players</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/players/add" class="btn btn-primary">
       Add player
      </a>
    </div>
  </div>
  <div class="list-group">
  <?php foreach($data['players'] as $player) : ?>
    <a href="<?php echo URLROOT; ?>/players/show/<?php echo $player->id; ?>" class="list-group-item list-group-item-action"><?php echo $player->name?></a>
  <?php endforeach; ?>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>