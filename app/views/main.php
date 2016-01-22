<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<title>Div-Art Project Manager</title>
		
		<?php
			if ( ! empty($_css) && is_array($_css))
			{
				foreach ($_css as $file)
				{
					echo '<link rel="stylesheet" type="text/css" href="'.$file.'" media="screen" />';
				}
			}
		?>
	</head>
	
	<body>
		<div class="wrapper">
			<?php echo $_header; ?>
			
			<div class="container">
				<?php echo $_content; ?>
			</div>
			
			<div class="messages">
				<div class="container">
					<div class="messages-box">
					</div>
				</div>
			</div>
			
			<?php echo $_footer; ?>
		</div>
		<div class="loading">
		загурзка...
		</div>
		<?php
			if ( ! empty($_js) && is_array($_js))
			{
				foreach ($_js as $file)
				{
					echo '<script src="'.$file.'"></script>';
				}
			}
		?>
	</body>
</html>