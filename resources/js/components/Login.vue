<template>
            <form method="POST" class="login-form" onsubmit="return validateForm()">
            <div class="form-group">
            <label for="username">Email</label>
            <div class="input-group">
                <input type="text" class="form-control rounded-left" placeholder="Enter your username" required name="email" id="username">
            </div>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control rounded-left" placeholder="Enter your password" required name="password" id="password">
            </div>
            </div>
            <p class="text-danger error-message" id="error-message"></p>
            <div class="form-group text-center mt-2">
            <button type="submit" class="btn btn-primary rounded submit">Log In</button>
            </div>
        </form>
</template>


<script>
export default {
mounted() { 
    console.log("mounted")
},
}
</script>
