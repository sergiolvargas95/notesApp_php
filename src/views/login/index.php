<div class="d-flex justify-content-center align-items-center">
    <div class="card" style="width: 20rem;">
        <div class="card-body">
            <h5 class="card-title text-center">Log In</h5>
            <form method="POST" action="/loginUser">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Type your Email..." required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Type your Password..." required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <p>Don't have you an account? <a href="/register">Sign Up</a></p>
            </form>
        </div>
    </div>
</div>

