<?php /** @var \App\Models\ProducerFilter[] $producerFilter */ ?>
<?php foreach ($producerFilter as $movie): ?>
    <li><a href="<?= "film/?id=" . $movie->getId() ?>"><?= $movie->getName() ?></a></li>
<?php endforeach; ?>