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
                        <select id="sort-select" class="form-control" style="text-align: center;" v-model="filterStatus" @change="filterItems">
                            <option value="" disabled selected><i class="fas fa-filter"></i> Sort by</option>
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
                            <tr v-for="violations in this.filter_violation_status" :id="violations.violation_list_id">
                                <th scope="row">{{ violations.student_id }}</th>
                                <td>{{ violations.student_name }}</td>
                                <td style="width: 20%;">{{ violations.types_of_violation }}</td>
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
                filter_violation_status:[],
                filterStatus: '',
                searchTerm:'',
            }
        },
        mounted(){
            this.getStudents();
            this.displayViolation();
            this.fetchViolationType();
        },
        created(){

        },
        methods:{
            filterItems() {
            //FILTER OF FINES
            // this.filter_violation_status = this.violation_list.filter(item => {
            //     // console.log(item.status.toString());
            //     return (
            //         item.status.toString().includes(this.filterStatus)||
            //         item.student_name.toLowerCase().includes(this.searchTerm.toLowerCase())||
            //         item.student_id.toString().includes(this.searchTerm) 

            //     );
            // });
            // Filter based on searchTerm from textbox
            let filteredBySearch = this.violation_list;
            if (this.searchTerm) {
                const searchTermLower = this.searchTerm.toLowerCase();
                filteredBySearch = filteredBySearch.filter(item => 
                    item.student_name.toLowerCase().includes(searchTermLower) ||
                    item.student_id.toString().includes(this.searchTerm)
                );
            }

            // Filter based on filterStatus from select option
            let filteredByStatus = this.violation_list;
            if (this.filterStatus) {
                filteredByStatus = filteredByStatus.filter(item =>
                    item.status.toString().includes(this.filterStatus)
                );
            }

            // Merge the results of both filters (independently applied)
            this.filter_violation_status = filteredBySearch.filter(item =>
                filteredByStatus.includes(item)
            );


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
                    // console.log(response.data)
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
                        const matchedViolationType = violation_type.find(type => violate.violation_type_id === type.violation_type_id);
                        const matchedUser = users.find(user => user.id === violate.violation_officer_id);
                        const matchedSanction = violation_sanction.find(vs => vs.violation_list_id === violate.violation_list_id);
                        const matchedSanctionList = sanction_list.find(sl => sl.sanction_id === (matchedSanction ? matchedSanction.sanction_id : null));

                        if (matchedStudent && matchedViolationType && matchedUser) {
                            const violationData = {
                                violation_list_id: violate.violation_list_id,
                                types_of_violation: matchedViolationType.description,
                                student_id: violate.student_id,
                                student_name: matchedStudent.name,
                                status: violate.status,
                                violation_officer: matchedUser.fullname,
                                remarks: violate.remarks,
                                sanction: matchedSanctionList ? matchedSanctionList.description : '',
                            };
                            violationList.push(violationData);
                        }
                    });

                    this.violation_list = violationList;
                    this.filter_violation_status = this.violation_list;
                    // console.log(this.violation_list);
    
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
    