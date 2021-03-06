<?php

$page_title = 'البروفايل';

include('./layouts/header.php');

if (isset($_SESSION['usermail']))
{
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    require_once ('modules/Database.php');
    $db = new Database();	
?>

	<div class='card card1' style='width: 18rem;'>
		
			<?php

			if (isset($id) && ($_SESSION['id'] = $id))
			{
				$db->query("SELECT * FROM users WHERE id='$id'");
				$rowreg = $db->single();
				$countreg = $db->rowCount();

				if ($countreg > 0)
				{
					// register session with username
					$_SESSION['pic'] = $rowreg->userpic;
					$_SESSION['usermail'] = $rowreg->usermail;
					$_SESSION['user_desc'] = $rowreg->user_desc;
					$_SESSION['firstname'] = $rowreg->firstname;
					$_SESSION['lastname'] = $rowreg->lastname;
					?>
					
					<img class='card-img-top' src='<?php echo $_SESSION['pic'] ?>'>
					<div class='card-body'>
						<h5 class='card-title1'> <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?> </h5>
						<p class='card-text'> <?php echo $_SESSION['user_desc'] ?></p>
		
					<?php
		
				}

				$usermail = $_SESSION['usermail'];
				$db->query("SELECT id FROM users WHERE usermail = '$usermail'");
				$current_user = $db->single();
				$db->query("SELECT EventTitle, EventImg, id, status FROM events WHERE postby='$current_user->id'");
				$events = $db->resultSet();
				?>

				<section class="portfolio text-center" style="direction:rtl;">
						<div class="container">
							<h2 class="reg-ev text-center">الإيفنتات التي نشرها</h2>
							<div class="row mt-4">
							
								<?php
								if ($events) 
								{

									foreach ((array)$events as $event)
									{
										echo "<div class='col-md-3'>";

										if ($event->status == 'مجاني')
										{
											echo "<span class='home-stat alert alert-success'>مجاني</span>";
										}
										else if ($event->status == 'مدفوع')
										{
											echo "<span class='home-stat alert alert-success'>مدفوع</span>";
										}
										else
										{
											echo "<span class='home-stat alert alert-success'>ضروري الدفع</span>";
										}
										
										echo "<div class='port-img'>";
										echo "<a href='one-event-dashboard.php?id=" . $event->id . "'><img alt='an example' class='img-fluid' src='" . $event->EventImg . "' /></a>";
										echo "<div class='caption'>";
										echo "<h3><a href='one-event-dashboard.php?id=" . $event->id . "'>" . $event->EventTitle . "</a></h3>";
										echo "</div>";
										echo "</div>";
										echo "</div>";

									}
								}
								else
								{
									echo "<h2 class='alert alert-danger mt-5' style='margin: 0 auto 85px;'>لا يوجد إيفنتات منشورة له </h2>";
								}

								?>
							</div>
						</div>
				</section>
		
			<?php

			}
			else
			{

				$usermail = $_SESSION['usermail'];
				$db->query("SELECT * FROM users WHERE usermail = '$usermail'");
				$row2 = $db->single();
				$count2 = $db->rowCount();

			if ($count2 > 0)
			{

				// register session with username
				$_SESSION['userpic'] = $row2->userpic;
				$_SESSION['user_desc'] = $row2->user_desc;
				$_SESSION['firstname'] = $row2->firstname;
				$_SESSION['lastname'] = $row2->lastname;

			?>
				<img class='card-img-top' src='<?php echo $_SESSION['userpic'] ?>'>
				<div class='card-body'>
					<h5 class='card-title1'> <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?> </h5>
					<p class='card-text'> <?php echo $_SESSION['user_desc'] ?></p>

					<?php

					}

					if ($_SESSION['ID'] == '2')
					{
						echo " <a href='event-dashboard.php' class='btn btn-success'>لوحة تحكم البروفايل</a>";
					}
					else
					{
						echo " <a href='event-dashboard.php' class='btn btn-success'>لوحة تحكم البروفايل</a>";

					}

					?>
							
				</div>
	</div>

 	<?php

		$usermail = $_SESSION['usermail'];
        $db->query("SELECT id FROM users WHERE usermail = '$usermail'");
        $current_user = $db->single();
        $regby = $current_user->id;
        $db->query("SELECT * FROM events, users_registered WHERE events.id = users_registered.events_id AND users_registered.regby = '$regby' AND users_registered.events_status = events.status");
        $events = $db->resultSet();

	?>

        <section class="portfolio text-center" style="direction:rtl;">
            <div class="container">
                <h2 class="reg-ev text-center">الإيفنتات التي سجلت بها</h2>
                <div class="row">
                        
					<?php

					if ($events)
					{

						foreach ($events as $event)
						{
							echo "<div class='col-md-3'>";

							if ($event->status == 'مجاني')
							{
								echo "<span class='home-stat alert alert-success'>مجاني</span>";
							}
							else if ($event->status == 'مدفوع')
							{
								echo "<span class='home-stat alert alert-success'>مدفوع</span>";
							}
							else
							{
								echo "<span class='home-stat alert alert-success'>ضروري الدفع</span>";
							}
							echo "<div class='port-img'>";

							echo "<a href='user-event-dashboard.php?id=" . $event->events_id . "'><img alt='an example' class='img-fluid' src='" . $event->EventImg . "' /></a>";
							echo "<div class='caption'>";
							echo "<h3><a href='user-event-dashboard.php?id=" . $event->events_id . "'>" . $event->EventTitle . "</a></h3>";
							echo "</div>";
							echo "</div>";
							echo "</div>";

						}

					}
					else
					{
						echo "<h2 class='alert alert-danger mt-5' style='margin: 0 auto 85px;'>لا يوجد إيفنتات مسجل بها </h2>";
					}

					?>

				</div>
			</div>
		</section>

 	<?php

        $postBy = $_SESSION['ID'];
        $db->query("SELECT EventTitle, EventImg, id, status FROM events WHERE postby='$current_user->id'");
        $events = $db->resultSet();
	?>

        <section class="portfolio text-center" style="direction:rtl;">
            <div class="container">
            	<h2 class="reg-ev text-center">الإيفنتات التي نشرتها</h2>
				<div class="row">
                        
					<?php
					if ($events)
					{

						foreach ((array)$events as $event)
						{
							echo "<div class='col-md-3'>";

							if ($event->status == 'مجاني')
							{
								echo "<span class='home-stat alert alert-success'>مجاني</span>";
							}
							else if ($event->status == 'مدفوع')
							{
								echo "<span class='home-stat alert alert-success'>مدفوع</span>";
							}
							else
							{
								echo "<span class='home-stat alert alert-success'>ضروري الدفع</span>";
							}
							echo "<div class='port-img'>";

							echo "<a href='one-event-dashboard.php?id=" . $event->id . "'><img alt='an example' class='img-fluid' src='" . $event->EventImg . "' /></a>";
							echo "<div class='caption'>";
							echo "<h3><a href='one-event-dashboard.php?id=" . $event->id . "'>" . $event->EventTitle . "</a></h3>";
							echo "</div>";
							echo "</div>";
							echo "</div>";

						}
					}
					else
					{
						echo "<h2 class='alert alert-danger mt-5' style='margin: 0 auto 85px;'>لا يوجد إيفنتات منشورة لك </h2>";
					}

					?>
             
				</div>
			</div>
		</section>

	<?php
    }

	include('./layouts/footer.php');
}
else
{
    header ('location:index.php');
}

?>
