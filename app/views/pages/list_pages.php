<div class="wrap">
    <div class="container">
        <h2 >Список сторінок</h2>
			<div class="col-md-12" >
				<table class="table table_show">
					<thead>
						<tr>
							<th>Заголовок</th>
							<th>Модель</th>
							<th>Метод</th>
							<th>Меню?</th>
							<th>Адміністратор </th>
							<th>Розробник</th>
							<th>Кліент</th>
							<th>Дії</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<?php 
								foreach ($_list_pages as $_pages)
								{			
									
						?>
									<td>
									<form method="post" role="form" action="/pages/save/" data-callback="reload">
										<input type="hidden" class="form-control" data-field="pages_id" value="<?php if(!empty($_pages)){echo $_pages->pages_id;}?>"/>
										<input type="text" class="form-control" data-field="pages_name" value="<?php if(!empty($_pages)){echo $_pages->pages_name;}?>" />
									</td>
									<td>
									</td>
									<td>
									</td>
									<td>
										<input type="checkbox" class="form-control" data-field="pages_menu" <?php if(!empty($_pages)){if($_pages->pages_menu){ echo "checked";}}?>/>							
									</td>
									<td>
									<input type="checkbox" class="form-control" data-field="pages_access_1" <?php if(!empty($_pages)){if($_pages->pages_access_1){echo "checked";}}?>/>
									</td>
									<td>
										<input type="checkbox" class="form-control" data-field="pages_access_2" <?php if(!empty($_pages)){if($_pages->pages_access_2){echo "checked";}}?>/>
									</td>
									<td>
										<input type="checkbox" class="form-control" data-field="pages_access_3" <?php if(!empty($_pages)){if($_pages->pages_access_3){echo "checked";}}?>/>
									</td>
									<td>
										<button type="submit" value="Submit">Зберегти</button>
										</form>
									</td>
								</tr>
						<?php 
								}
						?>
					</tbody>
				</table>				
 			</div>
		</div>
	</div>
</div>

