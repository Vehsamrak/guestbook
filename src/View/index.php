<?php
use Entity\Entry;

/** @var Entry[] $entries */
?>

<html>
<body>

<h3>Гостевая книга</h3>

<form method="post">
    <p>
        Ваше имя: <input type="text" name="entry_author"/>
    </p>

    <p>
        <textarea name="entry_text" id="" cols="30" rows="10" title="Текст сообщения"></textarea>
    </p>

    <p>
        <input type="submit" value="Оставить запись"/>
    </p>
</form>

<p>Количество оставленных записей: <?= count($entries) ?></p>
<hr>
<?php foreach ($entries as $entry) { ?>
    <p>
        <strong>Автор</strong>: <?= $entry->getAuthor() ?><br/>
        Дата: <?= $entry->getCreatedAt() ?>
    </p>
    <p>
        <?= $entry->getText() ?>
    </p>
    <hr/>
<?php } ?>

</body>
</html>
