<div class="row">     
	<div class="col-lg-12 grid-margin stretch-card">
		<div class="card">
		<div class="card-body">
			<h4 class="card-title">Candidate List</h4>
			<!-- <a class="btn btn-primary" href="<?php echo base_url('admin/candidate/add'); ?>">Add Candidate</a> -->
			<div class="table-responsive">
			<table id="candidateTable" class="table table-striped">
				<thead>
				<tr>
					<th>
					Sr No.
					</th>
					<th>
					Candidate Name
					</th>
					<th>
					Candidate Mobile
					</th>
					<th>
					Candidate Email
					</th>
					<th>
					Candidate Program
					</th>
					<th>
						Action
					</th>
				</tr>
				</thead>
				<tbody>
				<?php $i = 1; foreach($candidate as $c){ ?>	
				<tr>
					<td class="py-1">
						<?php echo $i?>
					</td>
					<td>
					<?php echo $c['candidate_name']?>
					</td>
					<td>
					<?php echo $c['mobile_no']?>
					</td>
					<td>
					<?php echo $c['email_id']?>
					</td>
					<td>
					<?php echo $c['program']?>
					</td>
					<td>
						<a class="btn btn-warning" href="<?php echo base_url('admin/candidate/edit/'.$c['id']); ?>">Edit</a>
					</td>
				</tr>
				<?php $i++; } ?>
				</tbody>
			</table>
			</div>
		</div>
		</div>
	</div>
</div>

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
   $(document).ready(function() {
    $('#candidateTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true
    });
});
</script>
           