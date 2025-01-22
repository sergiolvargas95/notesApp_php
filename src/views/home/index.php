<h2>My Notes</h2>
<div class="d-flex flex-wrap">
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $note): ?>
            <div class="card m-2" style="width: 15rem; min-height: 11rem;">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/note/view?id=<?php echo $note['id']?>">
                            <?php echo $note['title'] ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo $note['content'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No notes available</p>
    <?php endif; ?>
</div>


