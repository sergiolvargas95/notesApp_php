<div class="d-flex justify-content-center align-items-center">
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title text-center">
                <?php echo isset($data['title']) ? 'Edit Note' : 'Create a New Note'; ?>
            </h5>

            <form method="POST" action="<?php echo isset($data['title']) ? '/note/updateNote' : '/note/createNote'; ?>">
                <?php if (isset($data['title'])): ?>
                    <!-- Si estás actualizando la nota y necesitas enviar el ID -->
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?? ''; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        placeholder="Title Note"
                        value="<?php echo $data['title'] ?? ''; ?>"
                        required
                    >
                </div>
                <div class="mb-3">
                    <textarea
                        class="form-control"
                        name="content"
                        placeholder="Leave a comment here"
                        id="content"
                        style="height: 100px"
                        required
                    ><?php echo $data['content'] ?? ''; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <?php echo isset($data['title']) ? 'Update Note' : 'Create Note'; ?>
                </button>
            </form>
        </div>
    </div>
</div>
