
  <!--   Core   -->
  <script src="{{ asset('assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('assets/js/argon-dashboard.min.js?v=1.1.1') }}"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  @if(auth()->check())
	<script>
	  	const buttonLogout = document.querySelector('#logout-btn');

	  	const submitLogout = e => {
			e.preventDefault();
			localStorage.removeItem('access_token');
			location.href = '{{ route('logout') }}';
	  	}

	  	buttonLogout.addEventListener('click', submitLogout);
  	</script>
  @endif