<html>
<head>
<?php include("db_connect.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- jQuery -->
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
</head>
<body class="">

	
	<div class="container" style="min-height:500px;">
	<div class=''>
	</div><div class="container home">	
	<h2>Admin Panel</h2>		 
	<table id="data_table" class="table table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Password</th>
				<th>Rank</th>	
				<th>Folder</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$sql_query = "SELECT id, username, `password`, rank, folder FROM user_db LIMIT 10";
			$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
			while( $developer = mysqli_fetch_assoc($resultset) ) {
			?>
			   <tr id="<?php echo $developer ['id']; ?>">
			   <td><?php echo $developer ['id']; ?></td>
			   <td><?php echo $developer ['username']; ?></td>
			   <td><?php echo $developer ['password']; ?></td>
			   <td><?php echo $developer ['rank']; ?></td>   
			   <td><?php echo $developer ['folder']; ?></td> 
			   </tr>
			<?php } ?>
		</tbody>
    </table>	
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#data_table').Tabledit({
		deleteButton: true,
		editButton: false,   		
		columns: {
		  identifier: [0, 'id'],                    
		  editable: [[1, 'username'], [2, 'password'], [3, 'rank'], [4, 'folder']]
		},
		hideIdentifier: true,
		url: 'live_edit.php'		
	});
});

</script>
<div class="insert-post-ads1" style="margin-top:20px;">

</div>
</div>
</body></html>


                                                                                                       
