<template>
    <div>
        <div class="container-fluid">
            <nav class="navbar navbar-dark bg-dark" id="nav-cust">
                <a class="navbar-brand" href="#">Customer Address Book</a>
            </nav>
        </div><br><br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form @submit.prevent="submit">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" v-model="fields.name" placeholder="Name">
                        </div><br>
                        <div class="form-group">
                            <label for="nic">NIC</label>
                            <input type="text" class="form-control" id="nic" v-model="fields.nic" placeholder="NIC">
                        </div><br>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" v-model="fields.address" placeholder="Address">
                        </div><br>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" v-model="fields.phone" placeholder="Phone">
                        </div><br>
                        
                        <button type="submit" class="btn btn-primary">Submit New Customer</button>
                    </form>
                </div>
            </div><br><br>

            <div class="row">
                <div class="row">
                    <input id="search" class="form-control" type="text" placeholder="Search" v-on:keyup="mySerchFunction()">
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">NIC</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Created time</th>
                            <th scope="col">Updated time</th>
                        </tr>
                    </thead>
                    <tbody id="mytable">
                        <tr v-for="cust in allcustomers" >
                            <td>{{ cust.id }}</td>
                            <td>{{ cust.name }}</td>
                            <td>{{ cust.nic }}</td>
                            <td>{{ cust.address }}</td>
                            <td>{{ cust.phone_numbers }}</td>
                            <td>{{ cust.created_at }}</td>
                            <td>{{ cust.updated_at }}</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                allcustomers: null,
                fields: {},
                search: "",
                query: ""
            }
        },

        methods: {
            submit() {
                axios.post('/api/customer', this.fields).then(response => {
                    this.fields = {};
                    alert('Submitted!');
                    this.init();
                }).catch (error => {
                    console.log('error');
                    alert('error');
                })
            },

            init(){
                axios.get('/api/customer').then(response => {
                    this.allcustomers = response.data;
                })
            },

            mySerchFunction(){
                var input, filter, table, tr, td, i, k, txtValue, stat, tdCount;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                table = document.getElementById("mytable");
                tr = table.getElementsByTagName("tr");

                for (i = 0; i < tr.length; i++) { 
                    td = tr[i].getElementsByTagName("td");
                    tdCount = td.length;
                    stat = 0;
                    for (k = 0; k < td.length; k++) {
                        if (td[k]) {
                            txtValue = td[k].textContent || td[k].innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                stat = 1;
                                if((stat==1) && (tdCount==td.length)){
                                    tr[i].style.display = "";
                                }else{
                                    tr[i].style.display = "none";
                                }
                            } else {
                                if((stat==1) && (tdCount==td.length)){
                                    tr[i].style.display = "";
                                }else{
                                    tr[i].style.display = "none";
                                }
                            }
                        }
                    }
                    
                }

            }
            
        },

        mounted() {
            this.init(); 
        }
        

    }

</script>