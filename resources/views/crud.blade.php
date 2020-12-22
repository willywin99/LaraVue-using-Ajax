<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <style>
        .edit-status{

        }
    </style> --}}
</head>
<body>

    <div id="app">
        <h3>CRUD</h3>
        <input type="text" v-model="newCrud" >
        <button type="button" @click.prevent="addCrud" v-show="!editStatus">Add</button>
        <button type="button" @click.prevent="updateCrud()" v-show="editStatus">Update</button>
        <ul>
            <li v-for="(crud, index) in cruds">
                <span> @{{ crud.nama }} </span>
                <button type="button" v-on:click.prevent="editCrud(index, crud)"> Edit </button>
                ||
                <button type="button" v-on:click.prevent="removeCrud(index, crud)"> Delete </button>
            </li>
        </ul>
    </div>

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.1"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                newCrud: '',
                cruds: [],
                editStatus: false,
                tampungId: 0,
            },
            methods: {
                addCrud: function() {
                    let textInput = this.newCrud.trim();
                    if(textInput) {

                        // POST /someUrl
                        this.$http.post('/api/crud', {name: textInput}).then(response => {

                            this.cruds.unshift(
                                { nama: textInput }
                            )

                        });

                    }
                    // console.log(textInput);
                    this.newCrud = '';
                },
                removeCrud: function(index, crud) {
                    // console.log(crud.id);
                    // POST /someUrl
                    this.$http.post('/api/crud/delete/' + crud.id).then(response => {

                        this.cruds.splice(index, 1);

                    });
                },
                editCrud: function(index, crud) {
                    this.editStatus = !this.editStatus;
                    // console.log(this.cruds[index].nama);
                    this.newCrud = this.cruds[index].nama;
                    this.tampungId = this.cruds[index].id;
                    // console.log(this.tampungId)
                    // console.log(this.editStatus);
                },
                updateCrud: function() {
                    let textInput = this.newCrud.trim();
                    this.$http.post('/api/crud/edit/' + this.tampungId, {name: textInput}).then(response => {

                        this.$http.get('/api/crud').then(response => {

                            // // get body data
                            // this.someData = response.body;

                            let result = response.body.data;
                            this.cruds = result;

                            // console.log(response.body.data[0].nama);

                        });


                    });
                        this.editStatus = !this.editStatus;
                        // this.newCrud = '';
                }
            },
            mounted: function() {
                // GET /someUrl
                this.$http.get('/api/crud').then(response => {

                    // // get body data
                    // this.someData = response.body;

                    let result = response.body.data;
                    this.cruds = result;

                    // console.log(response.body.data[0].nama);

                });
            }
        })
    </script>

</body>
</html>
