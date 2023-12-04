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
            <h4> <i class="fas fa-list mt-2"></i>  Violation Validation</h4>
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
                                    <button type="button" class="btn" data-toggle="modal" data-target="#addSanctionModal" @click="this.decision = 1,this.id = violation.violation_list_id,this.violation_type_id = violation.violation_type_id , this.fetchViolation()" > <i class="fas fa-check"></i> Approve</button>
                                    <button type="button" class="btn" data-toggle="modal" data-target="#confirmationDisaprove"  @click="this.decision = 2,this.id = violation.violation_list_id, this.addSanction()"><i class="fas fa-times"></i> Disapprove</button>
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
                <form @submit.prevent="this.addSanction">
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Name of Student</label>
                        <input type="text" class="form-control" id="studentName" name="studentName"  readonly v-model="sanction_modal.student_name">
                    </div>

                    <div class="mb-3">
                        <label for="violationOfficer" class="form-label">Name of Violation Officer</label>
                        <input type="text" class="form-control" id="violationOfficer" name="violationOfficer"  readonly v-model="sanction_modal.violation_officer">
                    </div>

                    <div class="mb-3">
                        <label for="violationTypeGiven" class="form-label">Type of Violation Given</label>
                        <input type="text" class="form-control" id="violationTypeGiven" name="violationTypeGiven"  readonly  v-model="sanction_modal.types_of_violation">
                    </div>
                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea  class="form-control" id="remarks" name="remarks" rows="3"  readonly v-model="sanction_modal.types_of_violation">
                        </textarea>
                    </div>
                    <div class="mb-3">
                    <label for="sanctionTypeGiven" class="form-label">Select Sanction</label>
                    <select class="form-select" id="sanctionTypeGiven" name="sanctionTypeGiven" v-model="sanction_modal.sanction">
                        <option v-for="sanction in this.sanction_drop_down" :value="sanction.sanction_id">{{ sanction.description }}</option>
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
            violation_type_id: '',
            decision: 0,
            violation_list: [],
            testimony_list:[],
            testimony_list_temporary:[],
            violation_testimony_id: 0,
            sanction_modal: [],
            sanction_list: [],
            sanction_drop_down: [],
        }
    },
    mounted(){
        this.showData();
        this.showTestimony();
        this.fetchSanction();
    },
    methods:{
        fetchViolation(){
            this.violation_list.forEach(violation=>{
                if (violation.violation_list_id === this.id){
                    this.sanction_modal = {
                        student_name: violation.student_name,
                        violation_officer: violation.violation_officer,
                        types_of_violation: violation.types_of_violation,
                        violation_type_id: violation.violation_type_id,
                        remarks: violation.remarks,
                        sanction: '',
                        violation_list_id: this.id
                    }
                }


                
            })
            this.sanction_drop_down = [],
            this.sanction_list.forEach(sanction=>{
                    if (sanction.violation_type_id === this.violation_type_id){
                        this.sanction_drop_down.push({
                            sanction_id: sanction.sanction_id,
                            description: sanction.description,
                            violation_type_id: sanction.violation_type_id,
                        })
                    }
                })
            console.log(this.sanction_drop_down)
        },
        fetchSanction(){
            axios.get('/sanction_list')
            .then(response => {
                this.sanction_list = response.data;
            })
            .catch(error => {
                console.log(error)
            });
        },
        updateViolationStatus() {
            //for updating violation status
            axios.put(`/updateViolationStatus/${this.id}/${this.decision}`)
                .then(response => {
                    console.log(response.data)
                })
                .catch(error => {
                    // console.error('Error updating user:', error);
                    alert('Error updating user:', error)
                });
        },
        addSanction(){
            this.updateViolationStatus();
            //for adding sanction
            axios.put(`/add_sanction`, this.sanction_modal)
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
                this.violation_list = [];
                const students = response.data.students;
                const violation = response.data.violations;
                const violation_type = response.data.violation_type;
                const users = response.data.user;

                const violationList = [];

                violation.forEach(violate => {
                    const matchedStudent = students.find(stud => stud.student_id === violate.student_id);
                    if (matchedStudent) {
                        const matchedViolationType = violation_type.find(type => violate.violation_type_id === type.violation_type_id);
                        if (matchedViolationType) {
                            const matchedUser = users.find(user => user.id === violate.violation_officer_id);
                            if (matchedUser) {
                                violationList.push({
                                    violation_list_id: violate.violation_list_id,
                                    types_of_violation: matchedViolationType.description,
                                    student_id: violate.student_id,
                                    student_name: matchedStudent.name,
                                    status: violate.status,
                                    violation_officer: matchedUser.fullname,
                                    violation_type_id: violate.violation_type_id,
                                    remarks: violate.remarks,
                                });
                            }
                        }
                    }
                });

                // Assuming you want to assign violationList to this.violation_list
                this.violation_list = violationList;

            })
            .catch(error => {
                console.log(error)
            });
        },
        showTestimony(){
            axios.get('/getTestimony')
            .then(response => {
                this.testimony_list = response.data;
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
