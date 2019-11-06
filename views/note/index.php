<h1>Übersicht der Notizen</h1>
<p class="lead">Hier sind alle Notizen hinterlegt</p>

<?php foreach ($notes as $note) : ?>
<div class="col">
    <div class="card w-95">
        <div class="card-body">
            <h4 class="card-title"><?php echo $note->title; ?></h4>
            <p class="card-text"><?php echo nl2br($note->content); ?></p>
            <!-- <a href="#" class="btn btn-outline-primary" onclick="changeState(this)">Favorit</a>-->
            <div class ="row">
                <a href="edit?id=<?php echo $note->id; ?>" class="btn btn-primary mx-3">Edit Note</a> 
                <form method="post" action="deletenote?id=<?php echo $note->id; ?>">
                    <input type="submit" class="btn btn-danger" value="Delete Note">
                </form>
            </div>
            
            <!-- <a href="deletenote?id=<?php echo $note->id; ?>" class="btn btn-danger">Delete Note</a> -->
        </div>
    </div>
</div>
<br>
<?php endforeach ?>
