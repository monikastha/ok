<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Detail</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="../styles/dashboard.css"> <!-- Link to Font Awesome for icons -->
    <style>
        .table-container {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1rem;
            text-align: left;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table th,
        table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .delete-btn, .edit-btn {
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
        }

        .delete-btn {
            background-color: red;
        }

        .delete-btn:hover {
            background-color: darkred;
            transform: scale(1.05);
        }

        .edit-btn {
            background-color: blue;
        }

        .edit-btn:hover {
            background-color: darkblue;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php
    include '../dbconnection/connection.php';
    include 'sidebar.php';
    ?>
    <!-- Show contact detail in table -->
    <div class="main-content">
        <div class="header">
            <div class="search-bar">
                <input type="text" placeholder="Search...">
            </div>
            <div class="notifications">
                <i class="fas fa-bell"></i>
                <i class="fas fa-envelope"></i>
                <i class="fas fa-user"></i>
            </div>
        </div>
        <h1>Contact Detail</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Message</th>
                        <th>Visitor ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch messages
                    $sql = "SELECT * FROM `message`";
                    $result = mysqli_query($conn, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $sn = 1; // Serial number counter
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $sn++ . "</td>
                                    <td>" . htmlspecialchars($row['description']) . "</td>
                                    <td>" . htmlspecialchars($row['visitor_id']) . "</td>
                                    <td> 
                                        <a href='edit.php?edit_id=" . $row['id'] . "' class='edit-btn'>Edit</a>
                                        <a href='delete_message.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this message?');\" class='delete-btn'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No messages found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include 'right-sidebar.php';
    ?>

    <script>
        function logout() {
            // Redirect to login page
            window.location.href = 'login.php';
        }
    </script>
</body>

</html>