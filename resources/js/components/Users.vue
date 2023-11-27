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
                        <option value="fines">Fines</option>
                        <option value="membership_fee">Membership Fee</option>
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Add New User
                    </button>
                </div>
            </div>

            <div class="table-container">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID number</th>
                    <th scope="col">User</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Queen Bahay</td>
                    <td>Violation Officer</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Action buttons">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td>Ma'am A</td>
                    <td>Violation Officer</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Action buttons">
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger">Delete</button>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</template>

<script>

export default{
    data(){
        return{

        }
    },
    mounted(){
        console.log('asdf');
        this.fetchData();
    },
    methods:{
        fetchData(){
            axios.get('/users_get')
            .then(response => {

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