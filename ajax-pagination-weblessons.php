 	<script>
 $(document).ready(function(){
	load_data();
	function load_data(page)
	{
		$.ajax({
		url:"pagination.php",
		method:"POST",
			data:{page:page},
			success:function(data){
				$('#pagination_data').html(data);
			}
		})
	}
	
	$(document).on('click', '.pagination_link', function(){
		var page = $(this).attr("id");
		load_data(page);
	});
 
 });
 </script>
 
 <?php 
	$connect = mysqli_connect();
	$record_per_page = 5;
	$page = '';
	$output = '';
	if(isset($_POST['page']))
	{
		$page = $_POST["page"];
	}else{
		$Page = 1;
	}
	$start_from = ($page - 1)*$record_per_page;
	$query = "SELECT * student4 ORDER BY student_id DESC LIMIT $start_from, $record_per_page";
	$result = mysqli_query($connect, $query);
	$output .= "<table class='table table-bordered'>
				<tr>
					<th width='50%'>Name</th>
					<th width='50%'>Phone</th>
				</tr>
				";
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<th>'.$row["name"].'</th>
				<th>'.$row["name"].'</th>
			</tr>
		';
	}
	$output .= '</table><br/><div align="center">';
	$page_query = "SELECT * FROM student4 ORDER BY ID DESC";
	$page_result = mysqli_query($connect, $page_query);
	$total_records = mysqli_num_rows($page_result);
	$total_pages = ceil($total_records/$record_per_page);
	for($i=1; $i<=$total_pages; $i++)
	{
		$output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #CCC;' id='".$i."'>".$i."</span>";
	}
	echo $output;
 ?>