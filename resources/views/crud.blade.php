<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div id="app">
        <h3>CRUD</h3>
        <input type="text" >
        <button type="button">Add</button>
        <ul>
            <li v-for="(crud, index) in cruds">
                <span> @{{ crud.nama }} </span>
                <button type="button"> Edit </button>
                ||
                <button type="button"> Delete </button>
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
                    { id: 1,    nama: 'Muhammad Iqbal Mubarok' },
                    { id: 2,    nama: 'Ruby Purwanti' },
                    { id: 3,    nama: 'Faqih Muhammad' },
                ],
            }
        })
    </script>

</body>
</html>
