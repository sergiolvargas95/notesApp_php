<div class="d-flex justify-content-center align-items-center">
    <div class="card" style="width: 30rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Create a new note</h5>
            <form method="POST" action="/note/noteUser">
                <div class="mb-3">
                    <input type="title" name="title" id="title" class="form-control" placeholder="Title Note" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="content" placeholder="Leave a comment here" id="content" style="height: 100px"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Create Note</button>
            </form>
        </div>
    </div>
</div>

