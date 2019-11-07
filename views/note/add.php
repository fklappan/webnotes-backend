<?php include __DIR__ . "/../layout/header.php"; ?>

<h1>Neue Notiz</h1>
<p class="lead">Neue Notiz hinzufügen</p>

<form action="addnote" method="post">
<div class="form-group">
    <label for="title">Titel</label>
    <input type="text" class="form-control" id="title" placeholder="Titel" name="title">
  </div>
  <div class="form-group">
    <label for="content">Notiz</label>
    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Speichern</button>
</form>

<?php include __DIR__ . "/../layout/footer.php"; ?>