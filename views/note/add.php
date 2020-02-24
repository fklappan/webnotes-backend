<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="center form-group">
  <div class="center">
    <h1>Neue Notiz</h1>
    <p>Neue Notiz hinzufügen</p>
  </div>
  
  <form action="addnote" method="post">
  <div class="form-group">
      <div class="title">Titel</div>
      <input type="text" class="form-control" id="title" placeholder="Titel" name="title">
  </div>
  <div class="form-group">
    <div class="title">Notiz</div>
      <textarea class="form-control" id="content" rows="3" name="content"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="button">Speichern</button>
  </div>
  </form>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>