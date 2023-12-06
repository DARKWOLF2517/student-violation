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
                        <select id="sort-select" class="form-control" style="text-align: center;" v-model="filterStatus" @change="this.filterItems()">
                            <option value="4" disabled selected><i class="fas fa-filter"></i> Sort by</option>
                            <option value="1">Approved</option>
                            <option value="2">Declined</option>
                            <option value="0">Pending</option>
                        </select>
                    </div>
                </div>
                <h4> <i class="fas fa-list mt-2"></i>  Violation records</h4>

    
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">ID Number</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Violation</th>
                            <th scope="col">Violation Status</th>
                            <th scope="col">Sanction</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <tr v-for="violations in this.filtered_violation_status" :id="violations.violation_list_id">
                                <th scope="row">{{ violations.student_id }}</th>
                                <td>{{ violations.student_name }}</td>
                                <td>{{ violations.types_of_violation }}</td>
                                <td v-if="violations.status == 1" style="color: green; font-weight:bold;">Approved</td>
                                <td v-else-if="violations.status == 0" style="color: rgb(174, 174, 10); font-weight:bold;">Pending</td>
                                <td v-else-if="violations.status == 2" style="color: red; font-weight:bold;">Declined</td>
                                <td>{{ violations.sanction }}</td>
                            </tr>
                        </tbody>
                    </table>
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
                violation_list:[],
                violation_type : [],
                filtered_violation_status:[],
                filterStatus:4
            }
        },
        mounted(){
            this.getStudents();
            this.displayViolation();
            this.fetchViolationType();
        },
        created(){
            this.filterItems();
        },
        methods:{
            filterItems() {
                //FILTER OF violation
                this.filtered_violation_status = [];
                this.violation_list.forEach(violations=>{
                    if (this.filterStatus == violations.status ){
                        this.filtered_violation_status.push({
                            violation_list_id: violations.violation_list_id,
                            types_of_violation: violations.types_of_violation,
                            student_id: violations.student_id,
                            student_name: violations.student_name,
                            status: violations.status,
                            violation_officer: violations.violation_officer,
                            remarks: violations.remarks,
                            sanction: violations.sanction,
                        });
                    }
                })
                console.log( this.filtered_violation_status)
            },
            fetchViolationType(){
    
                axios.get(`/fetch_violation_type`)
                .then(response => {
                    this.violation_type = response.data;
                })
                .catch(error => {
                    console.log(error)
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
            displayViolation(){
                axios.get('/getViolations')
                .then(response => {
                    console.log(response.data)
                    this.violation_list = [];
                    const students = response.data.students;
                    const violation = response.data.violations;
                    const violation_type = response.data.violation_type;
                    const users = response.data.user;
                    const violation_sanction = response.data.violation_sanction;
                    const sanction_list = response.data.sanction_list;

                    const violationList = [];
    
                    violation.forEach(violate => {
                        const matchedStudent = students.find(stud => stud.student_id === violate.student_id);
                        if (matchedStudent) {
                            const matchedViolationType = violation_type.find(type => violate.violation_type_id === type.violation_type_id);
                            if (matchedViolationType) {
                                const matchedUser = users.find(user => user.id === violate.violation_officer_id);
                                if (matchedUser) {

                                    violation_sanction.forEach(violation_sanction => {
                                        if (violation_sanction.violation_list_id === violate.violation_list_id){
                                            sanction_list.forEach(sanction_list => {

                                                if(sanction_list.sanction_id == violation_sanction.sanction_id){
                                                    // console.log(sanction_list.description)
                                                    violationList.push({
                                                    violation_list_id: violate.violation_list_id,
                                                    types_of_violation: matchedViolationType.description,
                                                    student_id: violate.student_id,
                                                    student_name: matchedStudent.name,
                                                    status: violate.status,
                                                    violation_officer: matchedUser.fullname,
                                                    remarks: violate.remarks,
                                                    sanction: sanction_list.description,
                                                });
                                                }
                                            });
                                        }
                                    });

                                }
                            }
                        }
                    });
    
                    // Assuming you want to assign violationList to this.violation_list
                    this.violation_list = violationList;
                    this.filtered_violation_status = this.violation_list;
    
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
    