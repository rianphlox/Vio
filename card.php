<?php
    $conn = new mysqli('localhost', 'root', '', 'vio') or die("Failed to connect to Mysqli" . $conn->connect_error);
    
    if (!isset($_GET['location'])) {
        echo "Error";
    } else {
        $location = $conn->real_escape_string(htmlspecialchars($_GET['location']));
        $sql = "select * from solar_installations where location=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $location);
        $stmt->execute();
        $results = $stmt->get_result();
        $installations = $results->fetch_all(MYSQLI_ASSOC);
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DIRECTORATE OF ROAD TRAFFIC SERVICES (DRTS)</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="text-center">
    <div class="container p-4">
        <!-- Logo/Image -->
        <img src="./assets/img/vio.png" alt="DRTS Logo" class="img-fluid mt-1">

        <!-- First Bold Text -->
        <h2 class="font-weight-bold mt-4">DIRECTORATE OF ROAD TRAFFIC SERVICES (DRTS)</h2>

        <!-- Second Bold Text -->
        <h4 class="font-weight-bold mt-3">MAINTENANCE DIVISION</h4>

        <!-- Third Bold Text -->
        <h5 class="font-weight-bold mt-3">SOLAR INSTALLATIONS SERVICE CARD</h5>

        <!-- Additional Information -->
        <div class="text-left mt-4">
            
            <p><strong>Location/Traffic Area Command:</strong> .................<?php echo $installations[0]['location'] ?>.................................................................................</p>
            
            <p><strong>Capacity Of Inverter:</strong> ..................................................................................................</p>
            <p><strong>Battery Type:</strong> ..................................................................................................</p>
            <p><strong>No. Of Batteries:</strong> ..................................................................................................</p>
            
            <p><strong>No. Of Panels:</strong> ..................................................................................................</p>
            <p><strong>No. of Stand Alone Street Lights:</strong>  ..................................................................................................</p>
        </div>

        <!-- Table -->
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Service Rendered</th>
                    <th>(H) MTCE's Attestation</th>
                    <th>TAC's Attestation</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Row -->
                <?php foreach ($installations as $installation) : ?>
                        <?php extract($installation) ?>
                        <tr>
                          <td><?= $date?></td>
                          <td><?= $service_rendered ?></td>
                          <!-- <td><?= $MTCE_Attestation ?></td> -->
                          <td><?= $MTCE_Attestation == 'yes' ? 'Approved' : 'Not Approved'?></td>
                          <!-- <td><?= $tacs_attestation == "" ? "Awaiting Approval" : 'approved' ?></td> -->
                          <td>
                                <?php if ($tacs_attestation == 'yes'): ?>
                                    <img height="50px" src="data:image/png;base64,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BLDJ4webPkgFP6h8WK3hlKAIBQSAaydFGsqWob+HU4a6llKElIsQ7JQIlAABEkgJlByLiDqhKIN3EtlwygBp4MfWVViScfkMEYgdARJI7BqOXD51QlEnFiRxhA1lzJgx7SeN0AIVI1cZxYsIARJIRMqkKESACBABlwiQQFyizbGIABEgAhEhQAKJSJkUhQgQASKrt1RkAAABfklEQVTgEgESiEu0ORYRIAJEICIESCARKZOiEAEiQARcIkACcYk2xyICRIAIRIQACSQiZVIUIkAEiIBLBEggLtHmWESACBCBiBAggUSkTIpCBIgAEXCJAAnEJdociwgQASIQEQIkkIiUSVGIABEgAi4RIIG4RJtjEQEiQAQiQoAEEpEyKQoRIAJEwCUCJBCXaHMsIkAEiEBECJBAIlImRSECRIAIuESABOISbY5FBIgAEYgIARJIRMqkKESACBABlwiQQFyizbGIABEgAhEhQAKJSJkUhQgQASLgEgESiEu0ORYRIAJEICIESCARKZOiEAEiQARcIkACcYk2xyICRIAIRIQACSQiZVIUIkAEiIBLBEggLtHmWESACBCBiBAggUSkTIpCBIgAEXCJAAnEJdociwgQASIQEQIkkIiUSVGIABEgAi4RIIG4RJtjEQEiQAQiQoAEEpEyKQoRIAJEwCUCJBCXaHMsIkAEiEBECJBAIlImRSECRIAIuETgfwB96SURlIWVVQAAAABJRU5ErkJggg==" />

                                    <?php else: ?>

                                <?php endif; ?>
                              
                          </td>
                          <td><?= $remarks ?></td>
                        </tr>
                      <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


