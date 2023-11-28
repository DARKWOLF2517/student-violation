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
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="inactive">Pending</option>
                    </select>
                </div>


                <div class="select-dropdown" id= "semester-btn" style="margin-left: 20px; width: 270px;">
                    <!-- Second dropdown -->
                    <select id="sort-select" class="form-control" style="text-align: center; ">
                        <option value="">Select School Year</option>
                        <option value="option1">1st Semester 2023-2024</option>
                    </select>
                </div>
            </div>
            <h4> <i class="fas fa-list mt-2"></i>  Violation records</h4>
                <div class="student-buttons d-flex justify-content-end">
                    <div class="btn-group" role="group">

                        <button class="btn me-2" data-toggle="modal" data-target="#myModal" @click=" this.clearViolation()">
                            <i class="fas fa-plus"></i> Add Violation Slip
                        </button>
                        <!-- {{-- <button class="btn me-2" id="download" onclick="  downloadTableData()">
                            <i class="fas fa-download"></i> Download
                        </button> --}} -->
                    </div>
                </div>

            <div class="table-container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Violation</th>
                        <th scope="col">Violation Status</th>
                        <th scope="col">Testimony</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="violations in this.violation_list" :id="violations.violation_list_id">
                            <th scope="row">{{ violations.student_id }}</th>
                            <td>{{ violations.student_id }}</td>
                            <td>Drunkenness</td>
                            <td style="color: green; font-weight:bold;">Active</td>
                            <!-- {{-- <td style="color: red; font-weight:bold;">Inactive</td>
                            <td style="color: yellow; font-weight:bold;">Pending</td> --}} -->
                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <!-- {{-- <button type="button" class="btn" data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"> View</i></button> --}} -->
                                    <button type="button" class="btn"  data-toggle="modal" data-target="#addTestimonyModal"><i class="fas fa-plus"></i> Add</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#editModal"> <i class="fas fa-pen"></i> Edit</button>
                                    <button type="button" class="btn"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Student Information</h5>
                </div>
                <div class="modal-body">
                    <!-- Use dropdowns instead of input fields -->
                    <p>Student Name: Queen Bahay Gwapa</p>
                    <p>Violation:
                        <select class="form-control">
                            <option value="NonWearingID">Non-wearing of School ID</option>
                            <option value="Littering">Littering</option>
                            <option value="GoodGrooming">Good Grooming</option>
                            <option value="Vandalism">Vandalism</option>
                            <option value="Smoking">Smoking</option>
                            <option value="OverSpeeding">Over Speeding</option>
                            <option value="Drunkenness">Drunkenness</option>
                            <option value="Contraband">Possession of Contraband</option>
                            <option value="Others">Others (Please specify)</option>
                        </select>
                    </p>
                    <p>Status:
                        <select class="form-control">
                            <option value="Active" selected>Active</option>
                            <option value="Inactive">Inactive</option>
                            <!-- Add more options as needed -->
                        </select>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<!-- Add new violation slip Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Violation Report Slip</h3>
            </div>
            <div class="modal-body">
                <form @submit.prevent="this.submitViolation">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">ID number of Student</label>
                        <input type="number" class="form-control" id="studentId" name="studentId" @click="this.idNumberFilter()" required v-model="this.violation.id">
                        <div id="suggestionList"></div>    
                    </div>
                    <div class="mb-3">
                        <label for="violationType" class="form-label">Type of Violation</label>
                        <input type="text" class="form-control" id="violationType" name="violationType" required v-model="this.violation.type_of_violation">
                
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3" v-model="this.violation.remarks"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" >Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Add Testimony Modal -->
<div class="modal" id="addTestimonyModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Testimony</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name of Student</label>
                        <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Queen Bahay Gwapa" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="violationOfficer" class="form-label">Name of Violation Officer</label>
                        <input type="text" class="form-control" id="violationOfficer" name="violationOfficer" placeholder="Juan dela Cruz" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="violationTypeGiven" class="form-label">Type of Violation Given</label>
                        <input type="text" class="form-control" id="violationTypeGiven" name="violationTypeGiven" placeholder="Drunkenness" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="testimonyDetails" class="form-label">Testimony Details</label>
                        <textarea class="form-control" id="testimonyDetails" name="testimonyDetails" rows="3" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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
            students_list:[],
            violation:{
                id: '',
                type_of_violation: '',
                remarks: '',
                officer: this.user_id,

            },
            violation_list:[],
        }
    },
    mounted(){
        console.log(this.user_id);
        this.getStudents();
        this.displayViolation();
    },
    methods:{
        clearViolation(){
            this.violation = {
                id: '',
                type_of_violation: '',
                remarks: '',
                officer: this.user_id,

            }
        },
        submitViolation(){
            axios.post('/create_violation', this.violation)
            .then(response => {
                console.log(response.data);
            })
            .catch(error => {
                console.log(error)
                alert('sadfd')
            });
        },

        getStudents(){
            axios.get('/get_students')
            .then(response => {

                const students = response.data.student_belongs;
                
                this.students_list = students.map(student => student.student_id);
            
            })
            .catch(error => {
                console.log(error)
            });
        },
        idNumberFilter(){
            const numberArray = this.students_list;
            const numberInput = document.getElementById('studentId');
            const suggestionList = document.getElementById('suggestionList');

            numberInput.addEventListener('input', function() {
            const userInput = parseInt(numberInput.value);
            const suggestions = numberArray.filter(num => {
                return num.toString().startsWith(userInput.toString());
            });

            // Display suggestions

            suggestionList.innerHTML = '';
            suggestions.forEach(suggestion => {
                const suggestionItem = document.createElement('div');
                suggestionItem.textContent = suggestion;
                suggestionItem.classList.add('suggestion');
                suggestionItem.addEventListener('click', function() {
                numberInput.value = suggestion;
                suggestionList.innerHTML = ''; // Clear suggestions after selection
                });
                suggestionList.appendChild(suggestionItem);
            });
            
            // Hide suggestion list if no suggestions
            if (userInput === 0 || suggestions.length === 0) {
                suggestionList.innerHTML = '';
            }
            });


        },  
        displayViolation(){
            axios.get('/getViolations')
            .then(response => {
                console.log(response.data)    
                this.violation_list = response.data;        
            })
            .catch(error => {
                console.log(error)
            });
        },
    }

}
</script>

<style>

.suggestion {
    cursor: pointer;
    padding: 5px;
    border: 1px solid #ccc;
}

.suggestion:hover {
    background-color: #f0f0f0;
}
</style>