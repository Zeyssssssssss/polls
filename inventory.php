<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>
    <title>Borrow</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1px;
            text-align: center;
            font-style: italic;
        }

        /* Responsive navigation bar */
        nav {
            display: flex;
            justify-content: space-between;
            background-color: #444;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        nav ul li {
            margin-right: 1rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
        }

        /* Responsive layout */
        .container {
            padding: 2rem;
        }

        .search-bar {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
        }

        .search-bar input {
            padding: 0.5rem;
            width: 200px;
        }

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .inventory-table th, .inventory-table td {
            padding: 0.75rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        .inventory-table th {
            background-color: #f4f4f4;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }

            .search-bar input {
                width: 100%;
            }

            .inventory-table, .inventory-table th, .inventory-table td {
                display: block;
                width: 100%;
            }

            .inventory-table th, .inventory-table td {
                text-align: right;
                padding-left: 50%;
            }

            .inventory-table th::before, .inventory-table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 45%;
                padding-left: 1rem;
                font-weight: bold;
                text-align: left;
            }
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

        .green-button {
            background-color: green; 
            color: white; 
            border: none; 
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px; 
            cursor: pointer;
            border-radius: 5px;
        }

        .green-button:hover {
            background-color: darkgreen; 
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

    <header>
        <h1> CONSTRUCTRACK </h1>
    </header>

    <div class="container">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search Inventory...">
            <form method="post" action="addstock.php">
                <button type="submit" name="myButton" class="green-button">Add New Record</button>
            </form>
        </div>

        <table class="inventory-table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Item Return</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Item ID">001</td>
                    <td data-label="Item Name">Excavator</td>
                    <td data-label="Category">Heavy Machinery</td>
                    <td data-label="Quantity">5</td>
                    <td data-label="Item Return">56</td>
                </tr>
                <tr>
                    <td data-label="Item ID">002</td>
                    <td data-label="Item Name">Bulldozer</td>
                    <td data-label="Category">Heavy Machinery</td>
                    <td data-label="Quantity">3</td>
                    <td data-label="Item Return">56</td>
                </tr>
            </tbody>
        </table>

        <!-- Placeholder for item details -->
        <div id="item-details" style="margin-top: 20px; display: none;">
            <h3>Item Details</h3>
            <p id="details-content"></p>
        </div>
    </div>

    <script>
        // Search functionality
        $(document).ready(function() {
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".inventory-table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Handle details button click event
            $(".details-btn").on("click", function() {
                var itemId = $(this).data('id');
                
                // Fetch item details from the server using AJAX
                $.ajax({
                    url: 'get_item_details.php',
                    type: 'GET',
                    data: { id: itemId },
                    success: function(response) {
                        $('#details-content').html(response);
                        $('#item-details').show();
                    }
                });
            });
        });
    </script>

</body>
</html>
