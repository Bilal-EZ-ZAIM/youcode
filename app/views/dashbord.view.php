<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

        .action-buttons button {
            padding: 5px 10px;
            margin: 5px;
            cursor: pointer;
        }

        .delete-button {
            background-color: #ff6666;
            color: #fff;
        }

        .edit-button {
            background-color: #4CAF50;
            color: #fff;
        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            z-index: 1000;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .popup h2 {
            margin-bottom: 15px;
            color: #333;
        }

        .popup label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        .popup input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .popup button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .popup button:hover {
            background-color: #45a049;
        }
         #id {
            display: none;
        }
        input{
            padding: 0;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>rol-id</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($result as $row): ?>
                <tr class="ts" value="1" hs="2">
                    <td>
                        <?php echo $row['nom']; ?>
                    </td>
                    <td>
                        <?php echo $row['prenom']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['role_id']; ?>
                    </td>
                    
                    <td class="action-buttons">
                        <button class="edit-button" value="<?php echo $row['id']; ?>">Edit</button>
                        <button class="delete-button">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="popup" class="popup">
        <form method="post">
        <h2>Edit Person Information</h2>
        <input type="text" id="id" name="id">
        <label for="editedName">Name:</label>
        <input type="text" id="editedName" name="editedName">
        <label for="editedPrenom">Prenom:</label>
        <input type="text" id="editedPrenom" name="editedPrenom">
        <label for="editedEmail">Email:</label>
        <input type="text" id="editedEmail" name="editedEmail">
        <label for="editedRole">Role ID:</label>
        <input type="text" id="editedRole" name="editedRole">
        <button type="submit" name="updit">updit</button>
        </form>
    </div>

    <script>
        let ts = document.querySelectorAll(".ts");
        let edit_button = document.querySelectorAll(".edit-button");
        console.log(ts);
        console.log(ts[0].children[1].textContent.trim());
        edit_button.forEach((item, index) => {
            item.addEventListener("click", (e) => {
                document.getElementById('popup').style.display = "block";
                console.log(ts[index].children[0].textContent.length);
                document.getElementById('editedName').value = ts[index].children[0].textContent.trim();
                document.getElementById('editedPrenom').value = ts[index].children[1].textContent.trim();
                document.getElementById('editedEmail').value = ts[index].children[2].textContent.trim();
                document.getElementById('editedRole').value = ts[index].children[3].textContent.trim();
                document.getElementById('id').value = e.target.value;

            })
        })
       

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

</body>

</html>