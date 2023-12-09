<template>
<div class="mt-2">
        <div class="row head-container">
            <h4> <i class="fas fa-list mt-2"></i>  Types of Violation and Sanctions</h4>
                <div class="table-container">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Violation Name</th>
                                <th scope="col">Sanction</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="violation in this.sanction_list">
                                <td style="width: 30%;">{{ violation.description}}</td>
                                <td>
                                    <ul v-for=" sanction in violation.sanction">
                                        <li>{{ sanction.description }}</li>
                                    </ul>
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
            sanction_list: [],
        }
    },
    mounted(){
        this.fetchSanction();
    },
    methods:{
        fetchSanction(){
            axios.get(`/fetch_violation_sanction_list`)
            .then(response => {
                console.log(response.data)
                this.sanction_list = response.data;
            })
            .catch(error => {
                console.log(error)
            });

        },

    }
}
</script>
