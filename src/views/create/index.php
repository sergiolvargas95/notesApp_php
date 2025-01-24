<div class="d-flex justify-content-center align-items-center">
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title text-center">
                <?php
                    echo !empty($data[0]) && null !== $data[0]->getTitle() ? 'Edit Note' : 'Create a New Note';
                ?>
            </h5>

            <form method="POST" action="<?php echo !empty($data[0]) && null !== $data[0]->getTitle() ? '/note/updateNote' : '/note/createNote'; ?>">
                <?php if (!empty($data[0]) && null !== $data[0]->getTitle()): ?>
                    <!-- Si estás actualizando la nota y necesitas enviar el ID -->
                    <input type="hidden" name="idNote" id="idNote" value="<?php echo $data[0]->getId() ?? ''; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="form-control"
                        placeholder="Title Note"
                        value="<?php echo isset($data[0]) ? $data[0]->getTitle() : ''; ?>"
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
                    ><?php echo isset($data[0]) ? $data[0]->getContent() : ''; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    <?php echo isset($data[0]) && null !== $data[0]->getTitle() ? 'Update Note' : 'Create Note'; ?>
                </button>
            </form>
        </div>
    </div>
</div>
