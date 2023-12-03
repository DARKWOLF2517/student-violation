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
                        <th scope="col">ID Number</th>
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
                            <td>{{ violations.student_name }}</td>
                            <td>{{ violations.types_of_violation }}</td>
                            <td v-if="violations.status == 1" style="color: green; font-weight:bold;">Active</td>
                            <td v-else-if="violations.status == 0" style="color: red; font-weight:bold;">Inactive</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <!-- {{-- <button type="button" class="btn" data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"> View</i></button> --}} -->
                                    <button type="button" class="btn"  @click="this.id = violations.violation_list_id, this.clickAddTestimonies()"  data-toggle="modal" data-target="#addTestimonyModal"><i class="fas fa-plus"></i> Add</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#editModal"> <i class="fas fa-pen"></i> Edit</button>
                                    <button type="button" class="btn" @click="this.id = violations.violation_list_id " data-toggle="modal" data-target="#deleteConfirmation" ><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- Add new violation slip Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Violation Report Slip</h3>
            </div>
            <div class="modal-body">
                <form @submit="this.submit">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Add Testimony Modal -->
<div class="modal fade" id="addTestimonyModal"  tabindex="-1" aria-labelledby="addTestimonyLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Testimony</h4>
            </div>
            <div class="modal-body">
                <form @submit.prevent="this.submitTestimonies()">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name of Student</label>
                        <input type="text" class="form-control" id="studentName" name="studentName"  readonly v-model="addTestimonyView.student_name">
                    </div>

                    <div class="mb-3">
                        <label for="violationOfficer" class="form-label">Name of Violation Officer</label>
                        <input type="text" class="form-control" id="violationOfficer" name="violationOfficer"  readonly v-model="addTestimonyView.violation_officer">
                    </div>

                    <div class="mb-3">
                        <label for="violationTypeGiven" class="form-label">Type of Violation Given</label>
                        <input type="text" class="form-control" id="violationTypeGiven" name="violationTypeGiven"  readonly v-model="addTestimonyView.types_of_violation">
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea  class="form-control" id="remarks" name="remarks" rows="3"  readonly v-model="addTestimonyView.remarks"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="violationTypeGiven" class="form-label">Name of Witness</label>
                        <input type="text" class="form-control" id="violationTypeGiven" name="violationTypeGiven" required v-model="addTestimonyView.witness">
                    </div>

                    <div class="mb-3">
                        <label for="testimonyDetails" class="form-label">Testimony Details</label>
                        <textarea class="form-control" id="testimonyDetails" name="testimonyDetails" rows="3" required v-model="addTestimonyView.testimonyDetails"></textarea>
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


    <!-- Delete confirmation -->
    <div class="modal fade " id="deleteConfirmation" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><b>Are you sure you want to delete this Violation?</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" @click="deleteViolation()" data-dismiss="modal">Delete</button>
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
            submit: this.submitViolation,
            id: 0,
            students_list:[],
            violation:{
                id: '',
                type_of_violation: '',
                remarks: '',
                officer: this.user_id,

            },
            violation_list:[],
            addTestimonyView :{
                violation_list_id: 'sdf',
                types_of_violation: '',
                student_id:'',
                student_name: '',
                status: '',
                violation_officer: '',
                remarks: '',
                witness:'',
                testimonyDetails: '',
            },
        }
    },
    mounted(){
        console.log(this.user_id);
        this.getStudents();
        this.displayViolation();
    },
    methods:{
        deleteViolation(){
            console.log(this.id);
            axios.delete(`/delete_violation/${this.id}`)
                    .then(response => {
                        console.log(response.data);
                        this.displayViolation();
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 422) {
                            this.errors = error.response.data.errors;
                        }
                        alert(error)

            });
        },
        submitTestimonies(){
            axios.post('/create_testimony', this.addTestimonyView)
            .then(response => {
                console.log(response.data);

            })
            .catch(error => {
                console.log(error)
                alert('sadfd')
            });
        },
        clickAddTestimonies(){
            this.addTestimonyView = [];
            const temp = [];
            this.violation_list.forEach(violate=>{
                if (violate.violation_list_id === this.id){
                    temp.push({
                                violation_list_id : violate.violation_list_id,
                                types_of_violation: violate.types_of_violation,
                                student_id: violate.student_id,
                                student_name: violate.student_name,
                                status: violate.status,
                                violation_officer: violate.violation_officer,
                                remarks: violate.remarks,

                    })
                }
            });
            temp.forEach(element => {
                this.addTestimonyView = {
                violation_list_id: element.violation_list_id,
                types_of_violation: element.types_of_violation,
                student_id:element.student_id,
                student_name: element.student_name,
                status: element.status,
                violation_officer: element.violation_officer,
                remarks: element.remarks,
                witness:'',
                testimonyDetails: '',

            }
                
            });
            console.log(this.addTestimonyView)
            
        },
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
                this.displayViolation();
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
                this.violation_list = [];
                const students = response.data.students;
                const violation = response.data.violations;
                violation.forEach(violate=>{
                    students.forEach(stud => {
                        if (stud.student_id === violate.student_id){
                            this.violation_list.push({
                                violation_list_id : violate.violation_list_id,
                                types_of_violation: violate.types_of_violation,
                                student_id: violate.student_id,
                                student_name: stud.name,
                                status: violate.status,
                                violation_officer: violate.violation_officer_id,
                                remarks: violate.remarks,
                            })
                        }
                    });
                })
                console.log(this.violation_list);        
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