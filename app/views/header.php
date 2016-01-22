<div class="navbar navbar-inverse navbar-fixed-top black_header" role="navigation">
      <div class="container">
        <div class="navbar-header">
		  <img src="/assets/img/logo.jpg" />
		</div>
 
        <div class="navbar-header">
          <span class="glyphicon glyphicon-chevron-right btn-lg greay"></span>
        </div>
       <div class="navbar-header">
     	<?php
			
			if (!empty($_menu)&&is_array($_menu))
			{
				foreach ($_menu as $row)
				{			
					echo '<a href="/'.$row->pages_model.'/'.$row->pages_method.'/" class="glyphicon btn-lg greay">'.$row->pages_name.'</a>';
				}
			}
		?>
		</span>
		</div>

		
        <div class="collapse navbar-collapse">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
		  
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle " data-toggle="dropdown"><span class="glyphicon glyphicon-align-justify"></span> </a>
			  <ul class="dropdown-menu">
				<li><a href="#">text #1</a></li>
				<li><a href="#">text #2</a></li>
				<li><a href="#">text #3</a></li>
				<li><a href="#" data-id="signout">Вихід</a></li>
			  </ul>
			</li>
		  </ul>
				
		<div class="navbar-right test">
			<span> email@mail.ru </span><br>
		</div>
		</div><!-- /.navbar-collapse -->
		</div>
	  </div>
</div>
