<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
<title>Simple Steam</title>
<link rel="stylesheet" href="simplesteam.css" />
<h1>Simple Steam</h1>
</head>

<body>
	<?php
	session_start();
		echo "Welcome " . $_SESSION["username"] . "!";
		<img src=$_SESSION["avatar"] alt="avatar">  
	?>
</body>
</html>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", {
    title:{
      text: "My First Chart in CanvasJS"              
    },
    data: [              
    {
      // Change type to "doughnut", "line", "splineArea", etc.
      type: "column",
      dataPoints: [
        { label: "apple",  y: 10  },
        { label: "orange", y: 15  },
        { label: "banana", y: 25  },
        { label: "mango",  y: 30  },
        { label: "grape",  y: 28  }
      ]
    }
    ]
  });
  chart.render();
}
</script>