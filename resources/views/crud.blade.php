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
        <button type="button" @click.prevent="updateCrud" v-show="editStatus">Update</button>
        <ul>
            <li v-for="(crud, index) in cruds">
                <span> @{{ crud.nama }} </span>
                <button type="button" v-on:click="editCrud(index)"> Edit </button>
                ||
                <button type="button" v-on:click="removeCrud(index)"> Delete </button>
            </li>
        </ul>
    </div>

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                newCrud: '',
                cruds: [
                    { id: 1,    nama: 'Muhammad Iqbal Mubarok', },
                    { id: 2,    nama: 'Ruby Purwanti', },
                    { id: 3,    nama: 'Faqih Muhammad', },
                ],
                editStatus: false,
            },
            methods: {
                addCrud: function() {
                    let textInput = this.newCrud.trim();
                    if(textInput) {
                        this.cruds.unshift(
                            { nama: textInput }
                        )
                    }
                    // console.log(textInput);
                },
                removeCrud: function(index) {
                    this.cruds.splice(index, 1);
                },
                editCrud: function(index) {
                    this.editStatus = !this.editStatus;
                    // console.log(this.editStatus);
                }
            },

        })
    </script>

</body>
</html>
