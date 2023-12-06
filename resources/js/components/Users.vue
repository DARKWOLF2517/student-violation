<template>
    <div class="mt-2">
        <div class="row head-container">
            <div class="col-md-6 col-sm-12">
                <div class="input-container">
                    <input type="text" placeholder="Search">
                </div>
            </div>

            <div class="col-md-4 col-sm-12" style="display: flex; align-items: center; justify-content: flex-end; margin-right: 20px;">
                <div class="select-dropdown">
                    <!-- First dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center;">
                        <option value="" disabled selected><i class="fas fa-filter"></i> Sort by</option>
                        <option value="clerk">Clerk</option>
                        <option value="clerk">Violation Officer</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>


                <div class="select-dropdown" id= "semester-btn" style="margin-left: 20px; width: 270px;">
                    <!-- Second dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center; ">
                        <option value="">Select Semester</option>
                        <option value="option1">1st Semester 2023-2024</option>
                        <option value="option2">2nd Semester 2022-2023</option>
                        <option value="option3">1st Semester 2022-2023</option>
                    </select>
                </div>
            </div>
            <h4> <i class="fas fa-list mt-2"></i>  Student Records</h4>
            <div class="student-buttons d-flex justify-content-end">
                <div class="btn-group" role="group">
                    <!-- <button class="btn me-2" id="add-student-list-button" onclick="printTableData()">
                        <i class="fas fa-print"></i> Print
                    </button> -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#addUserModal"><i class="fas fa-plus"></i> Add New User</button>
                </div>
            </div>

            <div class="table-container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID number</th>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="users in this.users" :id="users.id">
                    <th scope="row">{{ users.id }}</th>
                    <td>{{ users.fullname }}</td>
                    <td>{{ users.role }}</td>
                    <td style="color: green;"><b>Enabled</b></td>
                    <!-- <td style="color: red;"><b>Disabled</b></td> -->
                    <td>
                        <div class="btn-group" role="group" aria-label="Action buttons">
                            <button type="button" class="btn">
                                <i style="color: green;" class="fas fa-check"></i> Enable
                            </button>
                            <button type="button" class="btn" ><i style="color: red;" class="fas fa-times"></i> Disable</button>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
            </div>
        </div>
    </div>


        <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Add new</h5>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="this.sendData"  id="submitData" >
                        <div class="form-group">
                        <label for="userId">User ID</label>
                        <input type="text" class="form-control" id="userId" v-model="formData.user_id">
                        </div>

                        <div class="form-group">
                        <label for="userName">Name</label>
                        <input type="text" class="form-control" id="userName" v-model="formData.name">
                        </div>

                        <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" class="form-control" id="userEmail" v-model="formData.email">
                        </div>

                        <div class="form-group">
                        <label for="userRole">Role</label>
                        <select class="form-control" id="userRole"  v-model="formData.role" >
                            <option v-for="role in this.roles" :value="role.role_id">{{ role.role_name }}</option>
                        </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Save</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

export default{
    data(){
        return{
            users: [],
            formData: {
                user_id: '',
                name: '',
                email: '',
                role: '',
            },
            roles: [],
        }
    },
    mounted(){
        console.log('mounted');
        this.fetchData();
    },
    methods:{
        fetchData(){
            axios.get('/users_get')
            .then(response => {

                // console.log(response.data);
                const users = response.data.users;
                const user_roles = response.data.user_roles;
                const role = response.data.roles;
                this.roles = role;
                users.forEach(user => {
                    user_roles.forEach(user_role =>{
                        role.forEach(role=>{

                            if (user_role.role_id ===  role.role_id){
                                if (user.id == user_role.user_id){
                                this.users.push({
                                id: user.id,
                                fullname:  user.fullname,
                                role: role.role_name,
                            });
                        }
                            }
                        })

                    });
                });


            })
            .catch(error => {
                console.log(error)
                alert('sadfd')
            });

        },
        sendData(){


            axios.post('/create_user', this.formData)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error)
                alert('sadfd')
            });
        },
    },
}
</script>
