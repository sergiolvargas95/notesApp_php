<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Iniciar sesión</h5>
                <form method="POST" action="/login">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Type your Email..." required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Type your Password..." required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">LogIn</button>
                </form>
            </div>
        </div>
    </div>
</div>
