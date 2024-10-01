<?php

include "db.php";

if (isset($_GET['id'])){
    $id = $_GET['id'];
}

function vue_data_function($conn) {
    $sql = "SELECT * FROM notas";
    $result = $conn->query($sql);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return json_encode($data); 
}

$vueData = vue_data_function($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id="app">
        <table>
            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <a href="editNotes.php">
                <tr v-for="item in vue_data">
                    <td><h2>{{ item.titulo }}</h2></td>
                    <td>{{ item.data_criaçao }}</td>
                    <td>{{ item.conteudo }}</td>
                    <td>{{ item.inportante == 0 ? 'sim' : 'nao' }}</td>
                </tr>
            </a>
            <!-- <tr v-else>
                <td colspan="5" id="noitems">Nenhum item encontrado</td>
            <tr> -->
        </table>
    </div>




<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>

        const app = Vue.createApp({
            data() {
            return {
                vue_data: <?php echo$vueData; ?>
            }
            }
        })
        app.mount('#app');
        console.log(app.vue_data)
    </script>
</body>
</html>