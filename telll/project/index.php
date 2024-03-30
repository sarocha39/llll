<!DOCTYPE html>
<html>

<head>
    <title>Port Checker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 60px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        select,
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Check Port</h1>
        <form method="post" action="">
            <label for="ip">IP Address:</label>
            <input type="text" name="ip" id="ip">

            <label for="ports">Ports:</label>
            <select name="ports" id="ports">
                <option value="80">80 </option>
                <option value="25">25 </option>
                <option value="22">22 </option>
            </select>
            <input type="submit" name="submit" value="Check">
        </form>
    </div>
    <?php

    if (isset($_POST['submit'])) {
        $ip = $_POST['ip'];
        $ports = $_POST['ports'];
        echo scanNetwork($ip, $ports);
    }

    function scanNetwork($ip, $ports)
    {
        if (empty($ip) || empty($ports)) {
            return 'IP address or ports cannot be empty.';
        }

        $command = sprintf('nmap -Pn -sV -p %s %s', $ports, $ip);
        $output = shell_exec($command);

        if (empty($output)) {
            return 'No output from nmap command.';
        }
        echo "<p>$output</p>";
    }

    ?>
</body>

</html>