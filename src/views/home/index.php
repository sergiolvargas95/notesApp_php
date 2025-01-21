<h2>My Notes</h2>
<div class="container">
    <ul>
        <?php if (!empty($data)): ?>
            <?php foreach ($data as $note): ?>
                <a href="/nota?id=<?php ?>">
                    <div class="note-preview">
                        <div class="title">
                            <?= $note->getTitle() ?>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No notes available</li>
        <?php endif; ?>
    </ul>
</div>
