@extends('layout.app')
@section('content')
@php
use Carbon\Carbon;
@endphp
<div class="main-content">
	<div class="grid grid-cols-12 gap-6 mt-6">
		<div class="xl:col-span-12 col-span-12">
			<div class="box custom-box">
				<div class="box-header justify-between">
					<div class="box-title">Relevé kilométrique</div>
				</div>
				<div class="box-body">
                    <form class="flex flex-wrap items-end gap-4" action="{{ route('covoiturage.vehicule_releve_kilometrique_create') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_vehicule" value="{{ $vehicule->id_vehicule }}">
                        <div class="form-group flex flex-col">
                            <label for="month" class="mb-2 font-medium">Mois:</label>
                            <select name="month" id="month" style="width:150px" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </select>
                        </div>
                        <div class="form-group flex flex-col">
                            <label for="year" class="mb-2 font-medium">Année:</label>
                            <select name="year" id="year" style="width:150px" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </select>
                        </div>
                        <div class="form-group flex flex-col">
                            <label for="kilometrage" class="mb-2 font-medium">Kilométrage:</label>
                            <input type="number" name="kilometrage" id="kilometrage" class="form-control border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Entrez le kilométrage">
                        </div>
                        <button type="submit" style="background-color:rgba(29,78,216,var(--tw-bg-opacity))!important" class="bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                            Déclarer
                        </button>
                    </form>
					<div class="table-responsive">
						<table class="table whitespace-nowrap min-w-full">
							<thead>
								<tr class="border-b border-defaultborder">
                                    <th scope="col" class="text-start">Nombre de kilométrage</th>
									<th scope="col" class="text-start">Mois</th>
									<th scope="col" class="text-start">Année</th>
                                    <th scope="col" class="text-start">Date de déclaration</th>
								</tr>
							</thead>
							<tbody>
                                @forelse($vehicule->releve as $releve)
                                    <tr class="border-b border-defaultborder">
                                        <td class="capitalize">{{ $releve->kilometrage }} Kilométres</td>
                                        <td class="capitalize">{{ $releve->month }}</td>
                                        <td class="capitalize">{{ $releve->year }}</td>
                                        <td class="capitalize">{{ $releve->created_at }}</td>
                                    </tr>
                                @empty
                                <p>Aucun relevé n'a été enregistré</p>
                                @endforelse
							</tbody>
						</table>
					</div>
				</div>
				<div class="box-footer hidden border-t-0">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	document.addEventListener('DOMContentLoaded', function() {
	    const currentYear = new Date().getFullYear();
	    const currentMonth = new Date().getMonth() + 1;
	    const startYear = 2010;
	    const yearSelect = document.getElementById('year');
	    const monthSelect = document.getElementById('month');
	    const months = [
	        'Janvier', 'Février', 'Mars', 'Avril',
	        'Mai', 'Juin', 'Juillet', 'Août',
	        'Septembre', 'Octobre', 'Novembre', 'Décembre'
	    ];
	
	    for (let year = currentYear; year >= startYear; year--) {
	        yearSelect.options.add(new Option(year, year));
	    }
	
	    populateMonths(currentMonth);
	
	    yearSelect.addEventListener('change', function() {
	        const selectedYear = parseInt(this.value);
	        const limitMonth = selectedYear === currentYear ? currentMonth : 12;
	        populateMonths(limitMonth);
	    });
	
	    function populateMonths(limitMonth) {
	        monthSelect.innerHTML = ''; // Clear existing options
	        for (let index = 0; index < limitMonth; index++) {
	            monthSelect.options.add(new Option(months[index], index + 1));
	        }
	    }
	});
</script>
<script>$('#sidebar-reservations').addClass('active');</script>
@stop
