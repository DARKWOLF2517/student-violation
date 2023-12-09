<template>
    <div class="mt-2">
        <div class="row head-container">
            <div class="col-md-6 col-sm-12">
                <div class="input-container">
                    <input type="text" placeholder="Search" v-model="searchTerm" @input="filterItems">
                </div>
            </div>

            <div class="col-md-4 col-sm-12" style="display: flex; align-items: center; justify-content: flex-end; margin-right: 20px;">
                <div class="select-dropdown">
                    <!-- First dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center;"   v-model="filterStatus" @change="filterItems">
                        <option value="" disabled selected><i class="fas fa-filter"></i> Sort by</option>
                        <option v-for="role in this.roles" :value="role.role_id">{{ role.role_name }}</option>

                    </select>
                </div>

            </div>
            <h4> <i class="fas fa-list mt-2"></i>  Users</h4>
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
                <tr v-for="user in this.filtered_users" :id="users.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.fullname }}</td>
                    <td>{{ user.role }}</td>
                    <td style="color: green;" v-if="user.status == 1"><b>Enabled</b></td>
                    <td style="color: red;" v-else-if="user.status == 0"><b>Disabled</b></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Action buttons" v-if="user.id != this.user_id">
                            <button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#enableUserModal" @click="this.status = user.status, this.status_value.status = 1 ,this.status_value.id = user.id"><i style="color: green;" class="fas fa-check"></i> Enable</button>
                            <button type="button" class="btn"  data-bs-toggle="modal" data-bs-target="#enableUserModal" @click="this.status = user.status, this.status_value.status = 0 ,this.status_value.id = user.id"><i style="color: red;" class="fas fa-times"></i> Disable</button>
                        </div>
                    </td>
                </tr>

                </tbody>
            </table>
            </div>
        </div>
    </div>
<!-- Enable User Modal -->
    <div class="modal fade" id="enableUserModal" tabindex="-1" role="dialog" aria-labelledby="enableUserModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enableUserModalLabel" v-if="this.status_value.status == 1">Enable User Account</h5>
                    <h5 class="modal-title" id="enableUserModalLabel" v-else-if="this.status_value.status == 0">Disable User Account</h5>
                </div>
                <div class="modal-body">
                        <Label v-if="this.status_value.status == 1">Are you sure you want to Enable this user's Account?</Label>
                        <Label v-else-if="this.status_value.status == 0">Are you sure you want to Disable this user's Account?</Label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="Enable" class="btn btn-success"  @click="this.updateStatus()" data-bs-dismiss="modal" v-if="this.status_value.status == 1">Enable</button>
                            <button type="Enable" class="btn btn-success"  @click="this.updateStatus()" data-bs-dismiss="modal" v-else-if="this.status_value.status == 0">Disable</button>
                        </div>
                </div>
            </div>
        </div>

        <!-- Add user Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title center-text" id="editModalLabel"> New User</h5>
                </div>
                <div class="modal-body">
                    <form @submit="this.sendData"  id="submitData" >
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" >Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

export default{
    props:['user_id'],
    data(){
        return{
            status:'',
            status_value:{
                status: '',
                id : '',
            },
            users: [],
            formData: {
                user_id: '',
                name: '',
                email: '',
                role: '',
            },
            roles: [],
            filtered_users:[],
            filterStatus: '',
            searchTerm:'',
        }
    },
    mounted(){
        console.log(this.user_id);
        this.fetchData();
    },
    methods:{

        updateStatus(){
            axios.put('/update_user_status', this.status_value)
            .then(response => {
                console.log(response.data);
                this.fetchData();
            })
            .catch(error => {
                console.log(error)
            });
        },


        filterItems() {
            console.log(this.filterStatus)
            let filteredBySearch = this.users;
            if (this.searchTerm) {
                const searchTermLower = this.searchTerm.toLowerCase();
                filteredBySearch = filteredBySearch.filter(item =>
                    item.fullname.toLowerCase().includes(searchTermLower) ||
                    item.id.toString().includes(this.searchTerm)
                );
            }

            // Filter based on filterStatus from select option
            let filteredByStatus = this.users;
            if (this.filterStatus) {
                filteredByStatus = filteredByStatus.filter(item =>
                    item.role_id.toString().includes(this.filterStatus)
                );
            }

            // Merge the results of both filters (independently applied)
            this.filtered_users = filteredBySearch.filter(item =>
            filteredByStatus.includes(item)
            );



        },
        fetchData(){
            axios.get('/users_get')
            .then(response => {

                // console.log(response.data);
                const users = response.data.users;
                const user_roles = response.data.user_roles;
                const role = response.data.roles;
                this.roles = role;
                this.users = [];
                users.forEach(user => {
                    user_roles.forEach(user_role =>{
                        role.forEach(role=>{

                            if (user_role.role_id ==  role.role_id ){
                                if (user.id == user_role.user_id){
                                this.users.push({
                                id: user.id,
                                fullname:  user.fullname,
                                role: role.role_name,
                                role_id: role.role_id,
                                status: user.status,
                            });
                        }
                            }
                        })

                    });
                });

                this.filtered_users =  this.users;

            })
            .catch(error => {
                console.log(error)

            });

        },
        sendData(){
            axios.post('/create_user', this.formData)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error)
            });
        },

    },
}
</script>
