<style>
.list {
  display: table;
  border-spacing: 0 10px;
  padding: 0.5em 0;
}

.list > li {
  background-color: #e0e0e1;
  border-radius: 5px;
  color: #6c777f;
  display: table-row;
  width: 100%;
}
.list > li > label {
  border-bottom-left-radius: 5px;
  border-top-left-radius: 5px;
  background-color: #a1aab0;
  color: white;
  display: table-cell;
  min-width: 40%;
  padding: .5em;
  text-transform: capitalize;
}

.list > li > span {
  border-radius: 0 5px 5px 0;
  background-color: #e0e0e1;
  display: table-cell;
  padding: .5em;
}
</style>
<div class="card">
	<div class="card-header">
		<h4 class="ven">Withdraw Transaction</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover" id="tableExport"
				style="width: 100%;">
				<thead>
					<tr>
						<th>S.no</th>
						<th>Amount</th>
						<th>User</th>
						<th>Request Time</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if(!empty($transactions)):?>
						<?php $sno = 1; foreach ($transactions as $transaction):?>
							<tr>
								<td><?php echo $sno++;?></td>
								<td><?php echo $transaction['amount'];?></td>
								<td><a href="<?php echo base_url('withdraw_list/list?user_id='.$transaction['user_id']);?>"><?php echo $transaction['unique_id'];?></a></td>
								<td><?php echo $transaction['created_at'];?></td>
								<td><?php if($transaction['approved'] == 1){echo '<label class="badge badge-success">Approved</label>';}else{echo '<label class="badge badge-primary">Pending</label>';}?></td>
								<td>
									 <select  class="form-control border pay_status" id="<?php echo $transaction['id']?>">
                                          <option  disabled>..Select..</option>
                                          <?php if($transaction['approved'] == '0'){?>
                                              <option value="0" selected>Pending</option>
                                              <option value="1">Success</option>
                                          <?php }else{?>
                                          	<option value="0" >Pending</option>
                                              <option value="1" selected>Success</option>
                                          <?php }?>
                                      </select>
								</td>
							</tr>
						<?php endforeach;?>
				<?php else :?>
				<tr ><th colspan='7'><h3><center>No Transactions</center></h3></th></tr>
				<?php endif;?>
				</tbody>
			</table>
		</div>
	</div>
</div>