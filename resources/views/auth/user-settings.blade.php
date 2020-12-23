@extends('dashboard.layout')

@section('content')

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Налаштуваня</h1>

					<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-toggle="list" href="#account" role="tab">
          Особисті дані
        </a>
									<a class="list-group-item list-group-item-action" data-toggle="list" href="#password" role="tab">
          Пароль
        </a>

								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="account" role="tabpanel">

									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Публічна інформація</h5>
										</div>
										<div class="card-body">
											<form>
												<div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															<label class="form-label" for="inputUsername">Ім'я користувача</label>
															<input type="text" class="form-control" id="inputUsername" placeholder="ваше ім'я">
														</div>
														<div class="mb-3">
															<label class="form-label" for="inputUsername">Про себе</label>
															<textarea rows="2" class="form-control" id="inputBio" placeholder="напишіть декілька слів про себе"></textarea>
														</div>
													</div>
													<div class="col-md-4">
														<div class="text-center">
															<img alt="Charles Hall" src="../dashboard/img/avatars/avatar.jpg" class="rounded-circle img-responsive mt-2" width="128" height="128" />
															<div class="mt-2">
																<span class="btn btn-primary"><i class="fas fa-upload"></i> Оновити фото</span>
															</div>
															<small>Для кращого результату завантажуйте фото розміру 128px на 128px в форматі .jpg</small>
														</div>
													</div>
												</div>

												<button type="submit" class="btn btn-primary">Зберегти зміни</button>
											</form>

										</div>
									</div>

									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Приватна інформація</h5>
										</div>
										<div class="card-body">
											<form>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputFirstName">Ім'я</label>
														<input type="text" class="form-control" id="inputFirstName" placeholder="ваше ім'я">
													</div>
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputLastName">Прізвище</label>
														<input type="text" class="form-control" id="inputLastName" placeholder="ваше прізвище">
													</div>
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputEmail4">Email-адреса</label>
													<input type="email" class="form-control" id="inputEmail4" placeholder="ваш Email">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputEmail4">друга Email-адреса</label>
													<input type="text" class="form-control" id="inputEmail4" placeholder="ваш другий Email">
												</div>
													<div class="row">
													<div class="mb-3 col-md-6">
														<label class="form-label" for="inputCity">Місто</label>
														<input type="text" class="form-control" id="inputCity">
													</div>
													<div class="mb-3 col-md-4">
														<label class="form-label" for="inputState">Стать</label>
														<select id="inputState" class="form-control">
                    <option selected>Обрати...</option>
                    <option>Чоловіча</option>
					<option>Жіноча</option>
				     </select>
													</div>
												</div>
												<button type="submit" class="btn btn-primary">Зберегти зміни</button>
											</form>

										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="password" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Пароль</h5>

											<form>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordCurrent">Поточний пароль</label>
													<input type="password" class="form-control" id="inputPasswordCurrent">
													<small><a href="#">Забули пароль?</a></small>
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew">Новий пароль</label>
													<input type="password" class="form-control" id="inputPasswordNew">
												</div>
												<div class="mb-3">
													<label class="form-label" for="inputPasswordNew2">Повторіть новий пароль</label>
													<input type="password" class="form-control" id="inputPasswordNew2">
												</div>
												<button type="submit" class="btn btn-primary">Зберегти зміни</button>
											</form>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>

@endsection