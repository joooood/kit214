<h2>Synonyms of <?= htmlspecialchars($user['thesaurus']) ?></h2>

<?php if (empty($synonyms)): ?>
    <p>Loading...</p>
<?php else: ?>
    <ul>
        <?php foreach ($synonyms as $synonym): ?>
            <li><?= htmlspecialchars($synonym) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>