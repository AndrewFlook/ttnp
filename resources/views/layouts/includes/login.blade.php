<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginlabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="loginForm" role="form" method="POST" action="{{ route('login') }}">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-label-group">
						<input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
						<label for="email">Email address</label>
					</div>
					<div class="form-label-group">
						<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
						<label for="password">Password</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-lg btn-primary btn-block">
						{{ __('Login') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
