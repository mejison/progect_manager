<div class="wrap">
    <form method="post" role="form" action="/orgs/add/" data-callback="add_orgs_result">
        <div class="container">
            <h2 >Додати нову огранізацію</h2>
               <div class="col-md-4 col" >
                    <div>
                       <h3>Основні дані</h3>
                        <div class="from_group">
							<label>Назва:</label>
							<input type="text" class="form-control" data-field="orgs_name" required />
                        </div>
                        <div class="from_group">
							<label>Є платником:</label>
							<input type="text" class="form-control" data-field="orgs_payer"  required />
                        </div>
                        <div class="from_group">
							<label>В особі:</label>
							<input type="text" class="form-control" data-field="orgs_person" required />
						</div>
                        <div class="from_group">
							<label>На підставі:</label>
							<input type="text" class="form-control" data-field="orgs_basis"  required />
						</div>
                       <div class="from_group">
							<label>Телефони:</label>
							<textarea  class="form-control" data-field="orgs_phones"  required></textarea>	
						</div>
						<div class="from_group">						
							<label>E-Mail:</label>
							<textarea class="form-control" data-field="orgs_email" required ></textarea>
						</div>
						<div class="from_group">						
							<label>Коментарі:</label>
							<textarea class="form-control" data-field="orgs_comment" required ></textarea>
						</div>
					</div>
               </div>
               <div class="col-md-4 col">
                    
                    <div class="form_group">
                       <h3>Фактична адресса</h3>
                        <input type="hidden" data-field="fact_addr"/>
						<div class="row">
							<div class="col-lg-6">
								<div class="form_group">
									<label>Країна:</label>
									<input type="text" class="form-control" data-field="address_country" required />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<label>Індекс:</label>
									<input type="text" class="form-control" data-field="address_index"  required/>
								</div>
							</div>
                        </div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form_group">
									<label>Область:</label>
									<input type="text" class="form-control" data-field="address_obl" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form_group">
									<label>Район:</label>
									<input type="text" class="form-control" data-field="address_region"  />
								</div>
							</div>
                        </div>
						<div class="form_group">
							<label>Місто:</label>
							<input type="text" class="form-control" data-field="address_city"  required/>
                        </div>
						<div class="from_group">
							<label>Адреса:</label>
							<input type="text" class="form-control" data-field="address_address" required />
						</div>
						<div class="form_group">
							<input  checked type="checkbox" class="bottom"  >
							<label>Фактична адреса співпадає з юридичною</label>
						</div>
						<div class="form_group checked_btn" >
						   <h3>Юридична адреса</h3>
							<input type="hidden" data-field="jur_addr_id"/>
							<div class="form_group">
								<label>Країна:</label>
								<input type="text" class="form-control" data-field="address_jur_country"  />
							</div>
							<div class="form_group">
								<label>Індекс:</label>
								<input type="text" class="form-control" data-field="address_jur_index"  />
							</div>
							<div class="form_group">
								<label>Область:</label>
								<input type="text" class="form-control" data-field="address_jur_obl" />
							</div>
							<div class="form_group">
								<label>Район:</label>
								<input type="text" class="form-control" data-field="address_jur_region" />
							</div>
							<div class="form_group">
								<label>Місто:</label>
								<input type="text" class="form-control" data-field="address_jur_city"  />
							</div>
							<div class="form_group">
								<label>Адреса:</label>
								<input type="text" class="form-control" data-field="address_jur_address_jur" />
							</div>
					   </div>
				   </div>
		</div>
		<div class="col-md-4 col">
				<h3>Реквізити</h3>
				<div class="from_group">						
					<label>Юридична назва:</label>
					<input type="text" class="form-control" data-field="requisites_name" required />
				</div>
				<div class="from_group">						
					<label>Банк:</label>
					<input type="text" class="form-control" data-field="requisites_bank" required />
				</div>
				<div class="from_group">
					<label>МФО Банку:</label>
					<input type="text" class="form-control" data-field="requisites_mfo"  required/>
				</div>
				<div class="from_group">
					<label>ІПН/ЄДРПОУ:</label>
					<input type="text" class="form-control" data-field="requisites_code" required />
				</div>
				<div class="from_group">
					<label>Р/р:</label>
					<input type="text" class="form-control" data-field="requisites_current" required />
				</div></br>
				<div class="form_group">
					<button class="btn btn-success">Додати огранізацію</button>
				</div>
		</div>
    </form>
</div>
