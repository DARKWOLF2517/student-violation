<template>
        <form @submit.prevent="this.login()">
            <div class="form-group">
            <label for="username">Email</label>
            <div class="input-group">
                <input type="text" class="form-control rounded-left" placeholder="Enter your username" required name="email" id="username" v-model="form.email" >
            </div>
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control rounded-left" placeholder="Enter your password" required name="password" id="password" v-model="form.password">
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
data() {
    return {
    form: {
        email: '',
        password: ''
    },
    error: '',

    };
},
mounted() {
    console.log("mounted")
},
methods:{
    login() {
        axios.post('/authenticate_user', this.form)
            .then(response => {
                if(response.data == 1){
                    window.location.href = '/admin_dashboard';
                }
                else if(response.data == 2){
                    window.location.href = '/clerk_dashboard';
                }
                else if(response.data == 3){
                    window.location.href = '/violation_officer_dashboard';
                }
                else if(response.data == 'error'){
                    this.error = '1';
                }
                console.log(response.data);
            })
            .catch(error => {
                console.log(error)
                alert('sadfd')
            });
    }
},

}
</script>
