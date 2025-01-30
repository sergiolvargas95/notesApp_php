<h2>My Notes</h2>
<div class="d-flex flex-wrap">
    <?php if (!empty($data)): ?>
        <?php foreach ($data as $note): ?>
            <div class="card m-2 border border-white shadow p-3 mb-5 bg-white rounded" style="width: 15rem; min-height: 11rem;">
                <div class="card-body">
                        <h5 class="card-title">
                            <a href="/note/view?id=<?php echo $note['id']?>" class="link-secondary link-offset-2 link-underline link-underline-opacity-0">
                                <?php echo $note['title'] ?>
                            </a>
                        </h5>
                    <p class="card-text"><?php echo $note['content'] ?></p>
                </div>
                <button
                    class="btn btn-danger delete-note-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteModal"
                    data-note-id="<?php echo $note['id']; ?>">
                    <img src="/src/public/images/basura-llena.png" alt="Delete" style="width: 20px; filter: invert(100%) brightness(100%);">
                </button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No notes available</p>
    <?php endif; ?>
</div>

<!-- Incluir el archivo modal -->
<?php include 'src/views/modals/deleteModal.php'; ?>