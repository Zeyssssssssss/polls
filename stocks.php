<?php
if (isset($_POST['itemid'])) {
    $itemid = $_POST['itemid'];
    $sql = "DELETE FROM stocks WHERE itemid = '$itemid'";
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <title> Stocks </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
        }

        /* Sidebar style */
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #333;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        /* Main content */
        .main-content {
            margin-left: 260px; /* Adjusted for sidebar width */
            width: calc(98% - 260px); /* Make sure container takes the remaining width */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px; 
            position:absolute;
        }
        h1 {
            text-align: center;
            font-size: 40px;

        }
        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container {
            max-width: 1100px;
            margin: 1rem auto;
            padding: 1rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
         
            color: #333;
        }

        /* Search bar styles */
        .search-bar {
            margin-bottom: 1rem;
            display: flex;
            justify-content: flex-end;
        }

        .search-bar input {
            padding: 0.5rem;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Stock table styles */
        .stock-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }

        .stock-table th,
        .stock-table td {
            padding: 0.75rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        .stock-table th {
            background-color: #f4f4f4;
        }

        /* Button styles */
        button {
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            background-color: #333;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 1rem;
        }

        button:hover {
            background-color: red;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 5px;
        }
        .modal-content {
            width: 850px;
            position: relative;
            left: 140px;
            bottom: 70px;
        }

        .inc {
            width: 819px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }


        .addstock{
        margin-bottom: 9px;
         }

         
           /* Logout Button */ 
.Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: rgb(255, 65, 65);
  margin-left: 90px;
  margin-top: 390px;
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 17px;
}

.sign svg path {
  fill: white;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}

/* button click effect*/
.Btn:active {
  transform: translate(2px ,1px);
}
    </style>
</head>
<body>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="User Profile.php"><i class="fa-solid fa-cog"></i> User Profile</a>
        <a href="dashboard.php"><i class="fa-solid fa-tachometer-alt"></i> Dashboard</a>
        <a href="inventory.php"><i class="fa-solid fa-file-alt"></i> Borrow </a>
        <a href="stocks.php"><i class="fa-solid fa-boxes"></i> Stocks</a>    
        <a href="tracker.php"><i class="fa-solid fa-map-marker-alt"></i>  Transaction Details</a>
        <a href="return.php"><i class="fa-solid fa-undo-alt"></i> Return Record</a>

        <button class="Btn">
  
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text">Logout</div>
</button>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <header>
            <h1>Stocks Management</h1>
        </header>

        <div class="container">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search Stocks..." onkeyup="filterTable()">
            </div>

            <h2>Current Stock</h2>
            <table class="stock-table" id="stock-table">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
           
            <div class="addstock">
           <a href="stocking.php " class="btn btn-success">Add New Stock</a>
           </div>


          
                <tbody>
                    <?php
                        include 'db.php';
                        $sql = "SELECT * FROM stocks";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?= $row['itemid']?></td>
                                    <td><?= $row['itemname']?></td>
                                    <td><?= $row['category']?></td>
                                    <td><?= $row['quantity']?></td>
                                    <td>
                                        <a href="#" class="btn btn-danger">DELETE</a>
                                        <a href="#" class="btn btn-primary">EDIT</a>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            
        </div>
    </div>

    <!-- Modal for editing stock -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Edit Stock</h2>

            <div class="inc">
                <label for="editItemId">Item ID</label>
                <input type="text" id="editItemId" readonly>

                <label for="editItemName">Item Name</label>
                <input type="text" id="editItemName">

                <label for="editCategory">Category</label>
                <input type="text" id="editCategory">

                <label for="editQuantity">Quantity</label>
                <input type="text" id="editQuantity">

                <button onclick="saveStock()">Save</button>
            </div>
        </div>
    </div>

    <script>
        let currentRow;

        function editStock(button) {
            currentRow = button.parentElement.parentElement;
            const itemId = currentRow.cells[0].innerText;
            const itemName = currentRow.cells[1].innerText;
            const category = currentRow.cells[2].innerText;
            const quantity = currentRow.cells[3].innerText;

            document.getElementById("editItemId").value = itemId;
            document.getElementById("editItemName").value = itemName;
            document.getElementById("editCategory").value = category;
            document.getElementById("editQuantity").value = quantity;

            document.getElementById("editModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }

        function saveStock() {
            const itemName = document.getElementById("editItemName").value;
            const category = document.getElementById("editCategory").value;
            const quantity = document.getElementById("editQuantity").value;

            currentRow.cells[1].innerText = itemName;
            currentRow.cells[2].innerText = category;
            currentRow.cells[3].innerText = quantity;

            closeModal();
        }

        // Delete row from table
        function deleteStock(button) {
            const row = button.parentElement.parentElement;
            row.remove();
        }

        // Filter table rows based on search input
        function filterTable() {
            const searchValue = document.getElementById("search").value.toLowerCase();
            const table = document.getElementById("stock-table");
            const rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName("td");
                let rowMatches = false;

                for (let j = 0; j < cells.length - 1; j++) { // Skip the action cell
                    if (cells[j].innerText.toLowerCase().indexOf(searchValue) > -1) {
                        rowMatches = true;
                        break;
                    }
                }

                rows[i].style.display = rowMatches ? "" : "none";
            }
        }
    </script>

        <script>
            // Delete row from database and table
function deleteStock(itemId, button) {
    if (confirm("Are you sure you want to delete this stock?")) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_stock.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const row = button.parentElement.parentElement;
                row.remove();
            }
        };
        xhr.send("itemid=" + itemId);
    }
}

        </script>


</script>
</body>
</html>
