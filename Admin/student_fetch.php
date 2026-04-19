<?php

require_once __DIR__ . '/../includes/config.php';

if ($pdo === null) {
	http_response_code(500);
	echo '<label>Total Records - 0</label><p>Database connection error.</p>';
	exit;
}

$limit = 10;
$page = isset($_POST['page']) ? max(1, (int) $_POST['page']) : 1;
$queryText = isset($_POST['query']) ? trim((string) $_POST['query']) : '';
$start = ($page - 1) * $limit;

try {
	if ($queryText !== '') {
		$like = '%' . $queryText . '%';
		$stCount = $pdo->prepare('SELECT COUNT(*) FROM student WHERE studName LIKE ? OR studID LIKE ?');
		$stCount->execute([$like, $like]);
		$total_data = (int) $stCount->fetchColumn();

		$stPage = $pdo->prepare('SELECT * FROM student WHERE studName LIKE ? OR studID LIKE ? ORDER BY programme, studID LIMIT ?, ?');
		$stPage->bindValue(1, $like, PDO::PARAM_STR);
		$stPage->bindValue(2, $like, PDO::PARAM_STR);
		$stPage->bindValue(3, $start, PDO::PARAM_INT);
		$stPage->bindValue(4, $limit, PDO::PARAM_INT);
		$stPage->execute();
		$result = $stPage->fetchAll();
	} else {
		$total_data = (int) $pdo->query('SELECT COUNT(*) FROM student')->fetchColumn();

		$stPage = $pdo->prepare('SELECT * FROM student ORDER BY programme, studID LIMIT ?, ?');
		$stPage->bindValue(1, $start, PDO::PARAM_INT);
		$stPage->bindValue(2, $limit, PDO::PARAM_INT);
		$stPage->execute();
		$result = $stPage->fetchAll();
	}
} catch (PDOException $e) {
	http_response_code(500);
	echo '<label>Total Records - 0</label><p>Query error.</p>';
	exit;
}

$output = '
<label>Total Records - '.$total_data.'</label>
<table class="table-striped">
  <tr>
  
    <th>MATRIC</th>
	 <th>COURSE</th>
    <th>NAME</th>
  </tr>
';
if ($total_data > 0)
{
  foreach ($result as $row)
  {
	 
    $output .= '
    <tr>
	 
      <td>'.htmlspecialchars((string) $row['studID'], ENT_QUOTES, 'UTF-8').'</td>
		<td>'.htmlspecialchars((string) $row['programme'], ENT_QUOTES, 'UTF-8').'</td>
      <td>'.htmlspecialchars((string) $row['studName'], ENT_QUOTES, 'UTF-8').'</td>
    </tr>
    ';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="3" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = $total_data > 0 ? (int) ceil($total_data / $limit) : 0;
$previous_link = '';
$next_link = '';
$page_link = '';

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

if ($total_data > 0 && !empty($page_array)) {
for($count = 0; $count < count($page_array); $count++)

{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id > $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
<hr>
';

echo $output;

?>
