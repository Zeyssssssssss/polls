<?php
// database connection
$equipmentData = [
    ['id' => '001', 'name' => 'Excavator', 'status' => 'Available', 'location' => 'Warehouse A', 'last_checked' => '2024-10-07'],
    ['id' => '002', 'name' => 'Bulldozer', 'status' => 'In Use', 'location' => 'Site B', 'last_checked' => '2024-10-05'],
    ['id' => '003', 'name' => 'Crane', 'status' => 'Under Maintenance', 'location' => 'Workshop', 'last_checked' => '2024-09-30'],
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location: addform.php");
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <title>Transaction Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            margin-left: 260px;
            padding: 20px;
            flex-grow: 1;
        }

        .navbar {
            background-color: #333;
            padding: 15px;
            color: white;
            text-align: center;
        }

        .navbar h1 {
            margin: 0;
        }

        .container {
            margin: 20px;
        }

        .search-container {
            margin-bottom: 20px;
            width: 400px;
        }

        .search-container input {
            padding: 10px;
            width: 80%;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .button-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .green-button, .filter {
            padding: 8px 15px;
            font-size: 14px;
            border: none;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .green-button {
            background-color: green;
        }

        .green-button:hover {
            background-color: darkgreen;
        }

        .filter {
            background-color: green;
        }

        .filter:hover {
            background-color: #3e8e3e;
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
        <a href="inventory.php"><i class="fa-solid fa-file-alt"></i> Borrow</a>
        <a href="stocks.php"><i class="fa-solid fa-boxes"></i> Stocks</a>    
        <a href="tracker.php"><i class="fa-solid fa-map-marker-alt"></i> Transaction Details</a>
        <a href="return.php"><i class="fa-solid fa-undo-alt"></i> Return Record</a>

        <button class="Btn">
  
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text">Logout</div>
</button>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <div class="navbar">
            <h1>Transaction Details</h1>
        </div>

        <div class="container">
            <div class="search-container">
                <input type="text" id="search" placeholder="Search for equipment..." onkeyup="filterTable()">
            </div>

            <!-- Button Container for Add New Record and Filter -->
            <div class="button-container">
                <form method="post" action="">
                    <button type="submit" name="myButton" class="green-button">Add New Record</button>
                </form>
                <button type="button" class="filter">Filter</button>
            </div>

            <table id="trackerTable">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Employee ID</th>
                        <th>Last Checked</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include 'db.php';
                        $sql = "SELECT * FROM additem";
                        $result  = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <tr>
                                    <td><?= $row['id']?></td>
                                    <td><?= $row['item']?></td>
                                    <td><?= $row['quantity']?></td>
                                    <td><?= $row['status']?></td>
                                    <td><?= $row['employee id']?></td>
                                    <td><?= $row['date']?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterTable() {
            const input = document.getElementById("search").value.toUpperCase();
            const table = document.getElementById("trackerTable");
            const tr = table.getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                const td = tr[i].getElementsByTagName("td");
                let showRow = false;

                for (let j = 0; j < td.length; j++) {
                    if (td[j] && td[j].innerHTML.toUpperCase().indexOf(input) > -1) {
                        showRow = true;
                    }
                }

                tr[i].style.display = showRow ? "" : "none";
            }
        }
    </script>

</body>
</html>
