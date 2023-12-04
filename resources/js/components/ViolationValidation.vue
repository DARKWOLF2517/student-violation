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
                        <option value="approved">Approved</option>
                        <option value="declined">Declined</option>
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
            <h4> <i class="fas fa-list mt-2"></i>  Testimony</h4>
            <div class="student-buttons d-flex justify-content-end">
                <div class="btn-group" role="group">
                    <!-- <button class="btn me-2" id="add-student-list-button" onclick="printTableData()">
                        <i class="fas fa-print"></i> Print
                    </button> -->
                    <!-- {{-- <button class="btn me-2" id="add-student-button" onclick="  downloadTableData()">
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
                        <tr v-for="violation in this.violation_list"  :id="violation.violation_list_id">
                            <th scope="row">{{ violation.student_id }}</th>
                            <td>{{ violation.student_name }}</td>
                            <td>{{ violation.types_of_violation }}</td>
                            <td v-if="violation.status == 1" style="color: green; font-weight:bold;">Approved</td>
                            <td v-else-if="violation.status == 0" style="color: rgb(174, 174, 10); font-weight:bold;">Pending</td>
                            <td v-else-if="violation.status == 2" style="color: red; font-weight:bold;">Declined</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <!-- {{-- <button type="button" class="btn" data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"> View</i></button> --}} -->
                                    <button type="button" class="btn" @click="this.showTestimonyModal(violation.violation_list_id)"  data-toggle="modal" data-target="#viewModal" ><i class="fas fa-eye" ></i> View</button>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Action buttons">
                                    <button type="button" class="btn" data-toggle="modal" data-target="#addSanctionModal" > <i class="fas fa-check"></i> Approve</button>
                                    <button type="button" class="btn" @click="this.decision = 0,this.id = violation.violation_list_id, this.validate()"><i class="fas fa-times"></i> Disapprove</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- APPROVE/Add sanction  Modal -->
<div class="modal fade" id="addSanctionModal"  tabindex="-1" aria-labelledby="addSanctionLabel" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Sanction</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name of Student</label>
                        <input type="text" class="form-control" id="studentName" name="studentName"  readonly>
                    </div>

                    <div class="mb-3">
                        <label for="violationOfficer" class="form-label">Name of Violation Officer</label>
                        <input type="text" class="form-control" id="violationOfficer" name="violationOfficer"  readonly>
                    </div>

                    <div class="mb-3">
                        <label for="violationTypeGiven" class="form-label">Type of Violation Given</label>
                        <input type="text" class="form-control" id="violationTypeGiven" name="violationTypeGiven"  readonly>
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea  class="form-control" id="remarks" name="remarks" rows="3"  readonly></textarea>
                    </div>
                    <div class="mb-3">
                    <label for="sanctionTypeGiven" class="form-label">Select Sanction</label>
                    <select class="form-select" id="sanctionTypeGiven" name="sanctionTypeGiven">
                        <option value="1">1st Offense</option>
                        <option value="2">2nd Offense</option>
                        <option value="3">3rd Offense</option>
                    </select>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Approve</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>

<!-- View testimony Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">Testimony</h5>
            </div>
            <div class="modal-body"> <!-- Added a modal-body for better structure -->
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Witness Name</th>
                            <th scope="col">Testimony</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Using v-for to loop through testimonies -->
                        <tr v-for="testimony in this.testimony_list_temporary" :key="testimony.violation_list_id">
                            <td>{{ testimony.name }}</td>
                            <td>{{ testimony.testimony }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</template>

<script>

export default{
    props:[],
    data(){
        return{
            id: '',
            decision: 0,
            violation_list: [],
            testimony_list:[],
            testimony_list_temporary:[],
            violation_testimony_id: 0,

        }
    },
    mounted(){
        this.showData();
        this.showTestimony();
    },
    methods:{
        validate(){

            axios.put(`/updateViolationStatus/${this.id}/${this.decision}`)
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => {
                    // console.error('Error updating user:', error);
                    alert('Error updating user:', error)
                });
        },
        showData(){
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
                console.log('asdfads');
            })
            .catch(error => {
                console.log(error)
            });
        },
        showTestimony(){
            axios.get('/getTestimony')
            .then(response => {
                this.testimony_list = response.data;
                console.log(this.testimony_list)
            })
            .catch(error => {
                console.log(error)
            });
        },
        showTestimonyModal(id){
            this.testimony_list_temporary = [];
            this.testimony_list.forEach(testimony=>{
                if(testimony.violation_list_id === id){
                    this.testimony_list_temporary.push({
                        name: testimony.name,
                        testimony: testimony.testimony,
                    });
                }
            })
        },

    }
}
</script>
