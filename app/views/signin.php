<form method="post" role="form" action="/users/signin/" data-callback="reload">
	<div class="row">
		<div class="col-md-6 col-md-offset-3" >
			<div class="form-group">
				<label>Email:</label>
				<input type="text" class="form-control" data-field="signin_email" required="required" />
			</div>
				
			<div class="form-group">
				<label>Пароль</label>
				<input type="password" class="form-control" data-field="signin_pass" required="required" />
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success pull-right">Увійти</button>
				<div class="signin_recovery">
					<a href="/users/recovery">Забули пароль?</a>
				</div>
			</div>
		</div>
	</div>
</form>